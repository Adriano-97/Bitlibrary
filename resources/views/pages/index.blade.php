<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="{!! asset('/img/logo.png') !!}">
    </head>
@extends('layouts.app')

@section('content')

    @guest
        {{-- Jumbotron --}}
        <div class="jumbotron" id="homeJumbo" style="background-image: url(&quot;/img/homeBackground.jpg&quot;);background-size: cover;opacity: 1;">
            <div>
                <div>
                    <h1 class="text-center" id="h1id" style="font-family: 'Alegreya Sans', sans-serif;background-color: rgba(21,162,184,0.62);">Welcome To BitLibrary</h1>
                </div>
                <p class="text-center" id="parid" style="background-color: rgba(70,187,205,0.85);">
                    <br> Bitlibrary is a Q&A Blog for programmers. Here you can upload or download documents related to programming. And with your help, we will build a library for multiple questions about programming.<br><br>
                </p>
                <br><br>
                <div id="btnDiv">
                    <a class="btn btn-primary" href="/login" role="button" id="login">Login</a>
                    <a class="btn btn-success" href="/register" role="button" id="register">Register</a>
                </div>
            </div>
        </div>
        {{-- Thumbnail --}}
        <div class="container item">
            <h1 class="text-center">Join The Community<br></h1>
            <div class="row">
                <div class="col-lg-4 col-xl-4 text-center item">
                    <a class="fas fa-cloud-upload-alt" id="iconThumb" href="/register"></a>
                    <h2>Upload a Document<br></h2>
                    <p>Be part of the community, upload documents related to coding. This way other members can have access to it. Plus, you will have it available on the cloud for free.<br><br></p>
                </div>
                <div class="col-lg-4 col-xl-4 text-center item">
                    <a class="icon-share" id="iconThumb" href="/register"></a>
                    <h2>Share your thoughts<br></h2>
                    <p>Share your ideas or post your questions. Other members from the community will help you arrive at the final solution or benefit from your thought process.</p>
                </div>
                <div class="col-lg-4 col-xl-4 text-center item">
                    <a class="fas fa-file-download" id="iconThumb"href="/register"></a>
                    <h2>Download a File</h2>
                    <p>Get access to your files, plus a library of content the community has made available for you.<br></p>
                </div>
            </div>
        </div>
    @else
        {{-- Jumbotron --}}
        <div class="jumbotron" id="homeJumbo" style="background-image: url(&quot;/img/homeBackground.jpg&quot;);background-size: cover;opacity: 1;">
            <div>
                <div>
                    <h1 class="text-center" id="h1id" style="font-family: 'Alegreya Sans', sans-serif;background-color: rgba(21,162,184,0.62);">Welcome {{Auth::user()->name}}</h1>
                </div>
                <br><br>
                <div id="btnDiv">
                    <a class="btn btn-primary" href="/posts" role="button" id="register" style="opacity:0.85">Blog</a>
                    <a class="btn btn-success" href="/library" role="button" id="register" style="opacity:0.85">Library</a>
                    <a class="btn btn-success" href="/dashboard" role="button" id="register" style="opacity:0.85">Dashboard</a>
                </div>
            </div>
        </div>
        {{-- Thumbnail --}}
        <div class="container item">
            <h1 class="text-center" style="opacity:0.85">Join The Community<br></h1>
            <div class="row">
                <div class="col-lg-4 col-xl-4 text-center item">
                    <a class="fas fa-cloud-upload-alt" id="iconThumb" href="/library/create"></a>
                    <h2>Upload a Document<br></h2>
                    <p>Be part of the community, upload documents related to coding. This way other members can have access to it. Plus, you will have it available on the cloud for free.<br><br></p>
                </div>
                <div class="col-lg-4 col-xl-4 text-center item">
                    <a class="icon-share" id="iconThumb" href="/posts/create"></a>
                    <h2>Share your thoughts<br></h2>
                    <p>Share your ideas or post your questions. Other members from the community will help you arrive at the final solution or benefit from your thought process.</p>
                </div>
                <div class="col-lg-4 col-xl-4 text-center item">
                    <a class="fas fa-file-download" id="iconThumb"href="/library"></a>
                    <h2>Download a File</h2>
                    <p>Get access to your files, plus a library of content the community has made available for you.<br></p>
                </div>
            </div>
        </div>
    @endguest
@endsection
</html>
