@extends('layouts.app')

@section('content')
    <h1>{{$books->title}}</h1>
    <br>
    <div>
        <p class="text-monospace">{!!$books->description!!}</p>
    </div>
    <div>
        <tr>
            <a href="" class="btn btn-primary">Download</a>
        </tr>
        <tr>
            <a href="/library" class="btn btn-secondary"> Go Back</a>
        </tr>
    </div>
@endsection

