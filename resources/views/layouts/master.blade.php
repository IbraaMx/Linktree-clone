<!doctype html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/coreui.min.css') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
 </head>

 <body class="c-app">
    <div class="c-wrapper">
        <header class="c-header c-header-light c-header-fixed d-flex justify-content-center align-items-center">
            <h2>{{ config('app.name') }}</h2>
        </header>
        <div class="c-body">
            <main class="c-main d-flex align-items-center">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </main>
        </div>
        <footer class="c-footer justify-content-center">
            <div>LinkTree Clone By: <a class="text-danger" href="https://ibram.ovh">Ibram Nagy</a></div>
        </footer>
    </div>

<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="{{ asset('js/coreui.min.js') }}"></script>
 </body>
</html>
