<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Parsedown;

class ForumPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'tags',
        'markdown',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function parseMarkdown($postId)
    {
        $post = ForumPost::findOrFail($postId);

        // You can pass additional data to the view if needed
        $data = [
            'parsedMarkdown' => $this->parseMarkdownContent($post->markdown),
            'post' => $post,
        ];

        return view('markdown-parser', $data);
    }

    private function parseMarkdownContent($markdown)
    {
        // Create Parsedown instance
        $parsedown = new Parsedown();

        // Parse Markdown content
        $parsedMarkdown = $parsedown->text($markdown);

        // Highlight code blocks using Highlight.js
        $parsedMarkdown = $this->highlightCodeBlocks($parsedMarkdown);

        return $parsedMarkdown;
    }


}
