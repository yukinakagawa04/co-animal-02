<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class AdminCommentController extends Controller
{
    public function index()
    {
        $comments = Comment::orderBy('created_at', 'desc')->get();
        return view('admin.comment.index', ['comments' => $comments]);
    }
    
    public function show(Request $request, $content_id)
    {
        $comments = Comment::where('content_id', $content_id)
                           ->orderBy('created_at', 'desc')
                           ->get();
    
        return view('admin.comment.show', compact('comments'));
    }
}