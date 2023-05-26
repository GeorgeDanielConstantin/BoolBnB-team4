<!doctype html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/svg+xml" href="/images/BBnB_logo.png" />
  <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ env('APP_NAME', 'Laravel') }} | @yield('title')</title>

  <!-- Vite -->
  @vite(['resources/js/app.js'])
</head>

<body>
  <header>
    @include('layouts.partials._navbar')
  </header>

  <main>
    <div class="">

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