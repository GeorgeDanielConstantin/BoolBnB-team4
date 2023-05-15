<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ env('APP_NAME', 'Laravel') }}</title>

  <!-- Vite -->
  @vite(['resources/js/app.js'])
</head>

<body>
  <header>
    @include('layouts.partials._navbar')
  </header>

  <main>
    <div class="py-5">
      @yield('content')
    </div>
  </main>
</body>

</html>
