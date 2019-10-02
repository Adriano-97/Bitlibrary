@extends('layouts.app')

@section('content')
    <h1>Library</h1>
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
                        <td><a href="/library/{{$book->id}}" class="btn btn-default">More details</a></td>
                        <td><a href="" class="btn btn-default">Download</a></td>
                    </tr>
                @endforeach
                </tbody>
        </table>
    @else
        <p>No Books found</p>
    @endif

@endsection
