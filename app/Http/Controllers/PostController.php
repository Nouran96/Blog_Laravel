<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use App\User;

class PostController extends Controller
{
    public function index() {
        $posts = Post::paginate(5);

        return view('posts.index', [
            'posts'=> $posts,
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

    public function store(PostRequest $request) {

        Post::create($request->only(['title', 'description', 'user_id']));

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

    public function update(PostRequest $request) {

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
