<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function insert(Request $request) {
        try {
            $quillContent = $request->input('content');
            $userId = auth()->user()->id;

            ForumPost::create([
                'user_id'=> $userId,
                'text' => $quillContent,
            ]);

            return response()->json(['message' => 'Text inserted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while inserting text'], 500);
        }
    }

    public function show(Request $request) {

    }

}
