
@extends('layouts.app')

@section('content')

      <div class="card my-5 mx-auto" style="max-width: 60%;">
        <div class="card-header">Post Info</div>
        <div class="card-body">
            <h5 class="card-title"><strong>Title: </strong>{{$post->title}}</h5>
            <h5><strong>Description:</strong> </h5>
            <p class="card-text">{{$post->description}}</p>
        </div>
    </div>

    <div class="card my-5 mx-auto" style="max-width: 60%;">
        <div class="card-header">Post Creator Info</div>
        <div class="card-body">
            <h5 class="card-title"><strong>Name: </strong>{{$post->user->name}}</h5>
            <p class="card-text"><strong>Email: </strong>{{$post->user->email}}</p>
            <p class="card-text"><strong>Created At: </strong>{{$post->created_at->format('l jS \\of F Y h:i:s A')}}</p>
        </div>
    </div>
@endsection