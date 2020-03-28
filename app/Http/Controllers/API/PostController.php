<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

use App\Http\Resources\PostResource;
use App\Post;

class PostController extends Controller
{
    public function index() {

        // Used in collection of model objects
        return PostResource::collection(
            Post::with('user')->paginate(5) // Eager loading with pagination
        );
    }

    public function show($post) {

        // Used in single model object
        return new PostResource(
            Post::find(
                $post // Url Parameter instead of request()->post
            )
        );
    }

    public function store(PostRequest $request) {

        $post = Post::create($request->only(['title', 'description', 'user_id']));

        return new PostResource($post);
    }
}
