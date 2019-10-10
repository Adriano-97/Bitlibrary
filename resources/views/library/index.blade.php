@extends('layouts.app')

@section('content')
    <div>
        <tr>
            <h1 scope= "col">Library</h1>
            <a href="/library/create" class="btn btn-dark" scope="col">Add a book</a>
        </tr>
    </div>
    <br>
    @if (count($books) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Book Name</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{$book->title}}</td>
                        <td><a href="/library/{{$book->id}}" class="btn btn-primary" id="register" >More details</a></td>
                        <td>
                            <form action="/download/{{$book->id}}">
                            <input class="btn btn-primary float-right " id="register" type="submit" value="Download">
                            </form>
                        </tr>
                @endforeach
                </tbody>
        </table>
    @else
        <p>No Books found</p>
    @endif

@endsection
