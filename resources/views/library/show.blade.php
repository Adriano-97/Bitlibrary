@extends('layouts.app')

@section('content')
    <h1>{{$books->title}}</h1>
    <br>
    <div>
        <p class="text-monospace">{!!$books->description!!}</p>
    </div>
    <div>
        <tr>
            <a href="/library" class="btn btn-secondary float-left"> Go Back</a>
        </tr>
        <tr >
        <form action="/download/{{$books->id}}">
            <input class="btn btn-primary float-right" type="submit" value="Download">
        </form>
        </tr>
        <tr>
            @if(Auth::user()->id == $books->posterId)
                <a href="/library/{{$books->id}}/edit" class="btn btn-primary float-right mr-1">Edit</a>
            @endif
        </tr>


    </div>
@endsection

