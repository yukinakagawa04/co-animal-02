<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Comment;
use App\Http\Controllers\Admin;
use Auth;

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
    
        return view('admin.comment.index', compact('comments'));
    }
    
    public function edit(Comment $comment)
    {
        return view('comment.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'comment' => 'required|max:191',
        ]);
    
        $comment->comment = $request->comment;
        $comment->save();
        return redirect()->route('content.show', ['content' => $comment->content_id])->with('success', 'コメントを更新しました。');

    }
    
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('success', 'コメントを削除しました。');
    }

}