<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function postCommentStore(Request $request)
    {
        Comment::create([
            'user_id' => Auth::id(),
            'course_id'=>courseId(),
            'commentable_id'=>$request->input('commentable_id'),
            'commentable_type'=>'App\\Models\\Post',
            'message'=>$request->input('message'),
            'image'=>$request->hasFile('image') ? $request->file('image')->store('/images', ['disk' =>'my_files']) : '',
        ]);

        toast('Comment Posted Successfully','success');
        return redirect()->back();
    }

    public function postCommentReplayStore(Request $request)
    {
        Comment::create([
            'user_id' => Auth::id(),
            'course_id'=>courseId(),
            'comment_id'=>$request->input('commentId'),
            'commentable_id'=>$request->input('commentable_id'),
            'commentable_type'=>'App\\Models\\Post',
            'is_replay'=>true,
            'message'=>$request->input('message'),
            'image'=>$request->hasFile('image') ? $request->file('image')->store('/images', ['disk' =>'my_files']) : '',
        ]);
        toast('Replay Posted Successfully','success');
        return redirect()->back();
    }
}
