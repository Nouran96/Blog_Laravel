<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();

        return view('posts.index', [
            'posts'=> $posts
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
}
