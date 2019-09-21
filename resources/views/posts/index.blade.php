@extends('layouts.page')

@section('body')

    <h1>Post</h3>
    @if(count($posts) > 1)
    @foreach ($posts as $post)
        <div class="card card-body bg-light">
            <h3>
            <a href="posts.{{$post->id}}"> {{$post->title}} </a>
            </h3>
            <small>
                {{$post->created_at}}
            </small>
        </div>
    @endforeach
    @else
        <p>No Posts found.</p>
    @endif
@endsection
