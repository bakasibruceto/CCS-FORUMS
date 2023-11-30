<?php

namespace App\Livewire\Thread;

use App\Livewire\Traits\HighlighterJS;
use App\Livewire\Traits\MarkdownEditor;
use Livewire\Component;
use App\Models\ForumPost;
use App\Models\Category;
use App\Models\Tags;
use Illuminate\Support\Facades\Auth;

class EditThread extends Component
{
    use HighlighterJS, MarkdownEditor;
    public $subject = '';
    public $tags = [];
    public $user;
    public $textareaLength = 0;

    public $postId;

    public function mount($postId)
    {
        $this->postId = $postId;

    }

    public function render()
    {
        return view('livewire.thread.edit-thread', [
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

        $this->tags = array_filter($this->tags->toArray(), function ($tag) use ($tagToRemove) {
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

            // Fetch the post from the database
            $post = ForumPost::find($this->postId);

            if (!$post) {
                // Handle the case when the post with the given ID is not found
                throw new \Exception("Post with ID {$this->postId} not found");
            }

            // Update the post
            $post->title = $this->subject;
            $post->markdown = $this->markdown;
            $post->save();

            $tagsArray = $this->tags instanceof \Illuminate\Support\Collection ? $this->tags->toArray() : $this->tags;

            $currentTagIds = array_map(function ($tagName) {
                $tag = Tags::where('name', trim($tagName))->first();
                return $tag ? $tag->id : null;
            }, $tagsArray);

            // Remove null values
            $currentTagIds = array_filter($currentTagIds);

            foreach ($this->tags as $tagName) {
                // Trim the tag name and skip if it's empty
                $tagName = trim($tagName);
                if (!$tagName)
                    continue;

                // Find the tag by its name
                $tag = Tags::where('name', $tagName)->first();

                if ($tag) {
                    // Check if a category with the same post_id and tag_id already exists
                    $existingCategory = Category::where('post_id', $post->id)->where('tag_id', $tag->id)->first();

                    if (!$existingCategory) {
                        // Create a new category with the tag ID
                        $category = new Category;
                        $category->post_id = $post->id;
                        $category->tag_id = $tag->id;
                        $category->save();
                    }
                }
            }
            Category::where('post_id', $post->id)->whereNotIn('tag_id', $currentTagIds)->delete();

            // Reset the form fields after saving
            $this->reset(['subject', 'tags', 'markdown']);

            // Optionally, you can redirect the user after saving
            // session()->flash('success', 'Post updated successfully!');
            return redirect()->to("/thread/{$this->postId}");

        } catch (\Exception $e) {
            // Log the exception for debugging
            \Log::error($e);

            // session()->flash('error', 'An error occurred while updating the post.');
            return redirect()->back();
            // return redirect()->route('/');
        }
    }

}





