<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ env('APP_NAME', 'Laravel') }} | @yield('page-name')</title>

  <!-- Vite -->
  @vite(['resources/js/app.js'])
</head>

<body>
  <header>
    @include('layouts.partials._navbar')
  </header>

  <main>
    <div class="container">

      <div class="d-flex justify-content-between align-items-start">
        <h1>
          @yield('title')
        </h1>
      </div>

      <div class="py-3">
        @yield('content')
      </div>
    </div>
  </main>

  @yield('modals')
</body>

</html>
