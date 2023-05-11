@extends('layouts.app')
@section('content')
  <div class="container jumbotron d-flex flex-column align-items-center justify-content-center text-center">
    <img class="my-1" src="{{ Vite::asset('resources/img/logo.png') }}" alt="" height="150" width="150">
    <h1 class="my-1">
      Laravel 9
      <span class="fs-6 fw-light text-muted"> - Bootstrap 'n Auth</span>
    </h1>
  </div>
@endsection
