<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->

        <link rel="stylesheet" href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback')}}">
        <link rel="stylesheet" href="{{asset('../plugins/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('../dist/css/adminlte.min.css')}}">

        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>

    <script src="{{asset('../plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('../plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('../dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('../dist/js/demo.js')}}"></script>
</html>
