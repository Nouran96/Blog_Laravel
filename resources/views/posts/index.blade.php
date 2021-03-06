@extends('layouts.app')

@section('content')

<div class="container m-5">
  <a href="{{route('posts.create')}}" class="btn btn-success mb-5">Create Post</a>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Slug</th>
        <th scope="col">Description</th>
        <th scope="col">Created At</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
      <tr>
        <th scope="row">{{$post->id}}</th>
        <td>{{$post->title}}</td>
        <td>{{$post->slug}}</td>
        <td>{{$post->description}}</td>
        <td>{{$post->created_at->toDateString()}}</td>
        <td>
          <a href="{{route('posts.show', ['post' => $post->id])}}" class="btn btn-primary btn-sm">View</a>
          <a href="{{route('posts.edit', ['post' => $post->id])}}" class="btn btn-warning btn-sm">Edit</a>
          <form id="deleteForm-{{$post->id}}" method="POST" action="{{route('posts.destroy', ['post' => $post->id])}}" style="display:inline">
            @csrf
            {{method_field('DELETE')}}
            <button type="button" onclick="deletePost({{$post->id}})" class="btn btn-danger btn-sm">Delete</button>
          </form>
        </td>
        
      </tr>
    @endforeach
    </tbody>
  </table>

{{ $posts->links() }}
</div>

@endsection