<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Comment;

use Auth;

class CommentController extends Controller
{
    
    
    
    public function store(Request $request)
    {
        $user = auth()->user();
        $data = $request->all();
    
        $validator = Validator::make($data, [
            'comment' => 'required|max:191',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        
        $comment = new Comment();
        $comment->comment = $data['comment'];
        $comment->user_id = $user->id;
        $comment->content_id = $data['content_id'];
        $comment->save();
        
        $comments = Comment::where('content_id', $data['content_id'])
                            ->orderBy('created_at', 'desc')
                            ->get();
                            
        return view('comment', ['comments' => $comments]);
    }
    
    

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
