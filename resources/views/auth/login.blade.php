@extends('layouts/minimal')

@include('elements.banner')


@section('content')


<!-- Login Page (Styled like Registration Page) -->
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-10">
        <div class="row shadow rounded-4 overflow-hidden">

          <!-- Left Column: Form -->
          <div class="col-md-6 bg-white p-5">
            <h2 class="mb-1" style="color: #3E3321;">Welcome Back</h2>
            <p class="text-muted mb-4">Login Here</p>

            <form method="POST" action="{{ route('login.custom') }}" autocomplete="off">
              @csrf
             
              @if ($errors->has('email'))
                <div class="text-danger small">{{ $errors->first('email') }}</div>
              @endif
              @if ($errors->has('password'))
                <div class="text-danger small">{{ $errors->first('password') }}</div>
              @endif

            <div class="input-group mb-3">
                <span class="input-group-text"><span class="material-symbols-outlined">mail</span></span>

              <div class="form-floating ">

              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email_address" name="email" placeholder="name@example.com" required>
              <label for="email_address">Email address</label>
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            </div>

            <div class="input-group mb-3">
                              <span class="input-group-text"><span class="material-symbols-outlined">lock</span></span>

            <div class="form-floating ">
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="New Password" required>
              <label for="password">New Password</label>
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            </div>

              

              <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>

              <div class="text-center mt-3">
                <a href="{{ route('forget.password.get') }}" class="text-decoration-none">Forgot Password?</a>
              </div>
            </form>

            <div class="my-4">
              <hr class="hr hr-blurry" />
              <a href="{{ route('auth.google') }}" class="btn btn-outline-secondary w-100">
                <img src="https://img.icons8.com/color/48/000000/google-logo.png" alt="Google Logo" style="width:24px; margin-right: 10px; vertical-align: middle;">
                <span>Continue with Google</span>
              </a>
            </div>

            <div class="text-center">
              <a href="{{ route('register-user') }}" class="text-decoration-none">Don't have an account? <strong>Sign Up</strong></a>
            </div>
          </div>

          <!-- Right Column: Illustration -->
          <div class="align-items-center bg-light col-md-6 d-md-flex">
            <img src="https://images.pexels.com/photos/2696064/pexels-photo-2696064.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=600" 
              alt="Restaurant Login Illustration" 
              class="img-fluid rounded">
          </div>

        </div>
      </div>
    </div>
  </div>

<!-- Include Google Material Icons -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
@endsection