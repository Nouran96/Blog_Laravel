<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();

        $numOfPages = (int)ceil($posts->count() / 3);

        return view('posts.index', [
            'posts'=> $posts,
            'numOfPages' => $numOfPages,
            'count' => 1
        ]);
    }

    public function show() {
        $request = request();
        $postId = $request->post;

        $post = Post::find($postId);

        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create() {
        $users = User::all();

        return view('posts.create', [
            'users' => $users 
        ]);
    }

    public function store(Request $request) {
        // $request = request();

        $validatedData = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:5'
        ], [
            'title.min' => 'Please the title has minimum of 3 characters',
            'title.required' => 'Please Enter the title field',
            'description.min' => 'Please the title has minimum of 5 characters',
            'description.required' => 'Please Enter the description field'
        ]);

        // dd($validatedData);

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('posts.index');
    }

    public function edit() {
        $users = User::all();
        $post = Post::find(request()->post);

        return view('posts.edit', [
            'users' => $users,
            'post' => $post
        ]);
    }

    public function update() {
        $request = request();

        Post::where('id', $request->post)->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('posts.index');
    }

    public function destroy() {
        $request = request();

        Post::where('id', $request->post)->delete();

        return redirect()->route('posts.index');
    }
}
