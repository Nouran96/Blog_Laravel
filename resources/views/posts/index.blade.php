@extends('layouts.app')

@section('content')

<div class="container m-5">
  <a href="{{route('posts.create')}}" class="btn btn-success mb-5">Create Post</a>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Created At</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
      {{--@if($loop->index < 3*$count)--}}
      <tr>
        <th scope="row">{{$post->id}}</th>
        <td>{{$post->title}}</td>
        <td>{{$post->description}}</td>
        <td>{{$post->created_at->toDateString()}}</td>
        <td>
          <a href="{{route('posts.show', ['post' => $post->id])}}" class="btn btn-primary btn-sm">View</a>
          <a href="{{route('posts.edit', ['post' => $post->id])}}" class="btn btn-warning btn-sm">Edit</a>
          <form id="deleteForm-{{$post->id}}" method="POST" action="{{route('posts.destroy', ['post' => $post->id])}}" style="display:inline">
            <!-- <a href="#" class="btn btn-danger btn-sm">Delete</a> -->
            @csrf
            {{method_field('DELETE')}}
            <button type="button" onclick="deletePost({{$post->id}})" class="btn btn-danger btn-sm">Delete</button>
          </form>
        </td>
        
      </tr>
      {{--@endif--}}
    @endforeach
    </tbody>
  </table>

  <nav aria-label="Page navigation example">
  <ul class="pagination my-3">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    @while($count <= $numOfPages)
      <li class="page-item"><a class="page-link" href="#">{{$count}}</a></li>
      @php
        $count++
      @endphp
    @endwhile
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
</div>

@endsection