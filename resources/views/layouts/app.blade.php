<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />


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
        <h1 class="my-3">
          @yield('title')
        </h1>
      </div>
      
      @if (session('message_content'))
          <div class="alert alert-{{ session('message_type') ? session('message_type') : 'success' }}">
            {{ session('message_content') }}
          </div>
        @endif
      
      @yield('content')
      
      
    </div>
  </main>

  @yield('modals')
</body>

</html>
