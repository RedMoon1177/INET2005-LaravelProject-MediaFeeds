<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Sodium\compare;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect('home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'content' => 'required|max:100'
        ]);

        $newPost = new Post();
        $newPost->title = $request->title;
        $newPost->content = $request->content;
        $newPost->imgUrl = $request->imgUrl;
        $newPost->extUrl = $request->extUrl;
        $newPost->created_by = Auth::id();
        $newPost->save();

        return redirect(route('home'))->with('status','New Post Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->imgUrl = $request->imgUrl;
        $post->extUrl = $request->extUrl;
        $post->save();

        return redirect(route('home'))->with('status','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        $post->deleted_by = Auth::id();
        $post->save();

        return redirect(route('home'))->with('status','Post Deleted');
    }
}
