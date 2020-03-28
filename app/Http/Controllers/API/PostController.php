<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index() {

        // Used in collection of model objects
        return PostResource::collection(
            Post::all()
        );
    }

    public function show() {
        $postId = request()->post;

        $post = Post::find($postId);

        // Used in single model object
        return new PostResource($post);
    }
}
