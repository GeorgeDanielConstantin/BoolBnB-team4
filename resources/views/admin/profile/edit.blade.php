@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card p-4 mb-4 rounded-lg">
          @include('admin.profile.partials.update-profile-information-form')
        </div>

        <div class="card p-4 mb-4 rounded-lg">
          @include('admin.profile.partials.update-password-form')
        </div>

        <div class="card p-4 mb-4 rounded-lg">
          @include('admin.profile.partials.delete-user-form')
        </div>
      </div>
    </div>
  </div>
@endsection
