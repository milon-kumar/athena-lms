<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "All Post";
        $posts = Post::with(['user','comments'])->where('course_id',stdCourseId())->latest()->paginate(35);
        //return view('backend.student.pages.post.news_feed',compact('posts'));
        return view('frontend.v2.pages.student.post.newsfeed',compact('title','posts'));
    }

    public function myPost()
    {
        $title = "My Post";
        $posts = Post::where('user_id',auth()->id())->paginate(12);
        return view('frontend.v2.pages.student.post.my_post',compact('title','posts'));
    }

    public function todayPost()
    {
        $title = "Today Post";
        $posts = Post::whereDate('created_at', Carbon::today())->paginate(12);
        return view('frontend.v2.pages.student.post.today_post',compact('title','posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view('backend.student.pages.post.create');
        $title = "Create Post";

        return view('frontend.v2.pages.student.post.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     * @throws ValidationException
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'title'=>'required',
            'image'=>'image|mimes:jpg,jpeg,webp,png|max:350',
            'description'=>'required|max:50000'
        ]);

        Post::create([
           'user_id'=>Auth::id(),
           'course_id'=>stdCourseId(),
           'title'=>$request->input('title'),
           'slug'=>Str::slug($request->integer('title')),
           'description'=>$request->input('description'),
           'image'=>uploadImage($request),
        ]);
        toast('Post Created','success');
        return redirect()->route('student.post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Post Details";
        $post = Post::with(['comments'=>function($q) {
            $q->orderBy('created_at','DESC');
        },'comments.user:id,name,image','comments.replayComments','comments.replayComments.user:id,name,image','user'])->findOrFail($id);

        $viewKey = 'video_'.$post->id;
        if (!Session::has($viewKey)){
            $post->increment('view_count');
        }
        Session::put($viewKey,1);
        //return view('backend.student.pages.post.show',compact('post'));
        return view('frontend.v2.pages.student.post.show',compact('title','post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Edit Post";
        $post = Post::findOrFail($id);
        //return view('backend.student.pages.post.edit',compact('post'));
        return view('frontend.v2.pages.student.post.edit',compact('title','post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        $post->update([
            'user_id'=>Auth::id(),
            'title'=>$request->input('title'),
            'slug'=>Str::slug($request->integer('title')),
            'description'=>$request->input('description'),
            'image'=>uploadImage($request,$post),
        ]);
        toast('Post Updated','success');
        return redirect()->route('student.post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        if ($post->image){
            @unlink($post->image);
        }
        $post->delete();
        toast('Post Updated','success');
        return redirect()->route('student.post.index');
    }

    public function commentStore(Request $request)
    {
        Comment::create([
            'user_id' => Auth::id(),
            'course_id'=>stdCourseId(),
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
