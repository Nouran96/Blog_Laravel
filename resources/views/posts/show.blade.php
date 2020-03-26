
@extends('layouts.app')

@section('content')

      <div class="card mb-3" style="max-width: 18rem;">
        <div class="card-header">Post Info</div>
        <div class="card-body">
            <h5 class="card-title"><strong>Title: </strong>{{$post->title}}</h5>
            <p class=" small card-text">{{$post->created_at->toDateString()}}</p>
            <h5><strong>Description:</strong> </h5>
            <p class="card-text">{{$post->description}}</p>
        </div>
    </div>
@endsection