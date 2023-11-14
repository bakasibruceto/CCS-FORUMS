<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function insert(Request $request) {
        try {
            $userId = auth()->user()->id;
            $title = $request->input('post_title');
            $tags = $request->input('post_tag');
            $markdown = $request->input('post_markdown');


            ForumPost::create([
                'user_id'=> $userId,
                'title' => $title,
                'tags' => $tags,
                'markdown' => $markdown,
            ]);

            return response()->json(['message' => 'Text inserted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while inserting text'], 500);
        }
    }

    public function show(Request $request) {

    }

}
