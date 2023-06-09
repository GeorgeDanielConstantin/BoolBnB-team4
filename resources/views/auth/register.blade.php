@extends('layouts.app')

@section('content')
  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card">
          <div class="card-header">{{ __('Register') }}</div>

          <div class="card-body">
            <form id="registration-form" method="POST" action="{{ route('register') }}">
              @csrf

              <div class="mb-4 row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-8">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" autofocus>

                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="mb-4 row">
                <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                <div class="col-md-8">
                  <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror"
                    surname="surname" value="{{ old('surname') }}" autofocus>

                  @error('surname')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="mb-4 row">
                <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>

                <div class="col-md-8">
                  <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                    name="date_of_birth" value="{{ old('date_of_birth') }}" autofocus>

                  @error('date_of_birth')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="mb-4 row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-8">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email">

                    <!-- <span id="email-error"></span> -->

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="mb-4 row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-8">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password" minlength="8">

                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="mb-4 row">
                <label for="password-confirm"
                  class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-8">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password" minlength="8">
                    <span id="password-error" style="color: red;"></span>
                </div>
              </div>

              <div class="mb-4 row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
  // const form = document.getElementById('registration-form');
  // const emailInput = document.getElementById('email');
  // const emailError = document.getElementById('email-error');

  // form.addEventListener('submit', function(event) {
  //     if (!emailInput.validity.valid) {
  //         event.preventDefault();
  //         emailError.textContent = 'Please enter a valid email address.';
  //     }
  // });

  const form = document.querySelector('form');
  const passwordField = document.getElementById('password');
  const confirmPasswordField = document.getElementById('password-confirm');

  const passwordError = document.getElementById('password-error');

  // Function to check if the passwords match
  function validatePassword() {
      if (passwordField.value !== confirmPasswordField.value) {
          passwordError.innerText = 'Passwords do not match';
          return false;
      } else {
          passwordError.innerText = '';
          return true;
      }
  }

  form.addEventListener('submit', function (event) {
    if (!validatePassword()) {
      event.preventDefault(); // Prevent form submission
    }
  });

  // Attach an event listener to the confirm password field
  confirmPasswordField.addEventListener('keyup', validatePassword);

</script>
@endsection