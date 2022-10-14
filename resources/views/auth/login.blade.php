@extends('layouts.auth')

@section('title', 'LOGIN')

@section('content')
    <div class="container mt-5">
    <div class="row">
      <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="login-brand font-weight-bold">
          eBLU
        </div>

        <div class="card card-primary">
          <div class="card-header"><h4>{{ __('Login') }}</h4></div>

          <div class="card-body">
            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
            @csrf
                <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

              <div class="form-group">
                   <label for="password" class="control-label">{{ __('Password') }}</label>
                  {{-- <div class="float-right">
                    <a href="auth-forgot-password.html" class="text-small">
                      Forgot Password?
                    </a>
                </div> --}}
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" required>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                  {{ __('Login') }}
                </button>
              </div>
            </form>
      </div>
    </div>
  </div>

@endsection