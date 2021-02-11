<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Library') }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css')  }}">
</head>
<body>
    <div class="container">
        @include('shared/navbar')
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}"></script>
    @stack('inline-scripts')
</body>
</html>