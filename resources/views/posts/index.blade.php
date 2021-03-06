@extends('layouts.app')

@section('content')

    <h1>Post</h3>
    @if(count($posts) > 0)
    @foreach ($posts as $post)
        <div class="well">
            <div class="row">
                <div class = "col-md-3 col-sm-3">
                   <img style = "width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                </div>
                <div class = "col-md-8 col-sm-8">
                    <h3>
                        <a href="posts/{{$post->id}}"> {{$post->title}} </a>
                    </h3>
                    <small>
                        {{$post->created_at}} by {{$post->user->name}}
                    </small>
                </div>
            </div>
        </div>
    @endforeach
    {{$posts->links()}}
    @else
        <p>No Posts found.</p>
    @endif
@endsection
