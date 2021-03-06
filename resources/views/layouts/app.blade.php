<!DOCTYPE html>
<html>

<body>

    <div id="app">
        @include('inc.navbar')
           <main class="py-4">
            @include('inc.messages')
            <div class = 'px-5'>
                @yield('content')
            </div>
            <div class="footer-basic">
                    <footer id="myFooter">
                        <p id="footer" class="copyright" style="opacity: 1;">Bitlord &nbsp;2019</p>
                    </footer>
            </div>
        </main>
    </div>
    <script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
    <script src="/js/bootstrapJs/jquery.min.js"></script>
    <script src="/js/bootstrapJs/bootstrap.min.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
</body>
</html>

{{-- Old CSS Styles --}}
{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
{{-- </head> --}}
