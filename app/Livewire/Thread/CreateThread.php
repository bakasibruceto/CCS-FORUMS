<?php

namespace App\Livewire\Thread;

use App\Livewire\Traits\HighlighterJS;
use App\Livewire\Traits\MarkdownEditor;
use Livewire\Component;
use App\Models\ForumPost;
use App\Models\Category;
use App\Models\Tags;
use Illuminate\Support\Facades\Auth;

class CreateThread extends Component
{
    use HighlighterJS, MarkdownEditor;

    public $subject = '';
    public $tags = [];
    public $user;
    public $textareaLength = 0;
    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.thread.create-thread', [
            'parsedMarkdown' => $this->parseMarkdown(),
            'allTags' => Tags::all(),
        ]);
    }

    public function searchTags($search)
    {
        $this->tags = Tags::where('name', 'like', '%' . $search . '%')->get();
    }

    public function removeTag($tagToRemove)
    {
        // $tagsArray = explode(',', $this->tags);
        // $tagsArray = array_filter($tagsArray, function ($tag) use ($tagToRemove) {
        //     return trim($tag) !== trim($tagToRemove);
        // });

        // $this->tags = implode(',', $tagsArray);

        $this->tags = array_filter($this->tags, function ($tag) use ($tagToRemove) {
            return trim($tag) !== trim($tagToRemove);
        });
    }

    public function addTag($tagName)
    {
        if (count($this->tags) < 3) {
            $this->tags[] = $tagName;
        }
    }

    public function savePost()
    {
        try {
            // Validate the input if needed
            $this->validate([
                'subject' => 'required|max:255',
                'markdown' => 'required',
            ]);

            // Save the post to the database
            $post = ForumPost::create([
                'user_id' => $this->user->id,
                'title' => $this->subject,
                'markdown' => $this->markdown,
            ]);

            // Handle the tags
            foreach ($this->tags as $tagName) {
                // Trim the tag name and skip if it's empty
                $tagName = trim($tagName);
                if (!$tagName) continue;

                // Find the tag by its name or create it
                $tag = Tags::firstOrCreate(['name' => $tagName]);

                // Create a new category with the post ID and tag ID
                Category::create([
                    'post_id' => $post->id,
                    'tag_id' => $tag->id,
                ]);
            }

            // Reset the form fields after saving
            $this->subject = '';
            $this->tags = '';
            $this->markdown = '';

            // Optionally, you can redirect the user after saving
            // session()->flash('success', 'Post saved successfully!');
            return redirect()->to('/');

        } catch (\Exception $e) {
            // Log the exception for debugging
            \Log::error($e);

            // session()->flash('error', 'An error occurred while saving the post.');
            return redirect()->back();
            // return redirect()->route('/');
        }
    }



}
