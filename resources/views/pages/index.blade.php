<!DOCTYPE html>
<html>
@extends('layouts.app')

@section('content')
    <div class="jumbotron" id="homeJumbo" style="background-image: url(&quot;/img/homeBackground.jpg&quot;);background-size: cover;opacity: 1;">
        <div>
            <div>
                <h1 class="text-center" id="h1id" style="font-family: 'Alegreya Sans', sans-serif;background-color: rgba(21,162,184,0.62);">Welcome To BitLibrary</h1>
            </div>
            <p class="text-center" id="parid" style="background-color: rgba(70,187,205,0.72);">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam.
                <br><br><br>
            </p>
            <br><br>
            <div id="btnDiv">
                <a class="btn btn-primary" href="/login" role="button" id="login">Login</a>
                <a class="btn btn-success" href="/register" role="button" id="register">Register</a>
            </div>
        </div>
    </div>

@endsection
