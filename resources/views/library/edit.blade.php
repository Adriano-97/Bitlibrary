@extends('layouts.app')

@section('content')
    <h1>Edit Book</h1>
    {!! Form::open(['action' => ['LibraryController@update', $books->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $books->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Description')}}
            {{Form::textarea('body', $books->description, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Short Description'])}}
        </div>
        <div class = "form-goup">
            {{Form::file('pdf_file')}}
        </div>
        {{Form::hidden('_method', 'PATCH')}}
        <br><br>
        {{ Form::submit('Submit', ['class' => 'btn btn-primary float-right' ,'id'=>"register"]) }}
        {!! Form::close() !!}
         {{-- Delete BTN --}}
        {!! Form::open(['action' => ['LibraryController@destroy', $books->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        {!! Form::submit("Delete", ['class'=>'btn btn-danger float-left']) !!}
        {!! Form::close() !!}

@endsection
