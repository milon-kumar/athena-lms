<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Community Post News Feed";
        $course = Course::findOrFail(courseId());
        $posts = Post::with(['user','comments'])->where('course_id',courseId())->latest()->paginate(35);
        return view('backend.admin.pages.post.news_feed',compact('posts','course','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Community Post Create";
        $course = Course::findOrFail(courseId());
        return view('backend.admin.pages.post.create',compact('title','course'));
    }

    /**
     * Store a newly created resource in storage.
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
            'course_id'=>courseId(),
            'title'=>$request->input('title'),
            'slug'=>Str::slug($request->integer('title')),
            'description'=>$request->input('description'),
            'image'=>uploadImage($request),
        ]);
        toast('Post Created','success');
        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Post Details";
        $post = Post::with(['comments'=>function($q) {
            $q->orderBy('created_at','DESC');
        },'comments.user:id,name,image','comments.replayComments','comments.replayComments.user:id,name,image','course','user'])->findOrFail($id);

        $viewKey = 'video_'.$post->id;
        if (!Session::has($viewKey)){
            $post->increment('view_count');
        }
        Session::put($viewKey,1);

        return view('backend.admin.pages.post.show',compact('post','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('backend.admin.pages.post.edit',compact('post'));
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
        return redirect()->route('admin.post.index');
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
        return redirect()->route('admin.post.index');
    }
}
