<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Michelf\Markdown;

class MarkDownController extends Controller
{
    public function index()
    {
        return view('create-thread');
    }

    public function convertToHtml(Request $request)
    {
        $markdownText = $request->input('markdown_text');
        $htmlContent = Markdown::defaultTransform($markdownText);

        return response()->json(['html_content' => $htmlContent]);
    }
}
