@extends('layouts/minimal')

@include('elements.banner')

@section('content')

<div class="container">
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-10">
      <div class="row shadow rounded-4 overflow-hidden">

        <!-- Form Column -->
        <div class="col-md-6 col-12 bg-white p-5">
          <h2 class="text-center mb-3" style="color: #3E3321;">Reset Your Password</h2>
          <p class="text-center text-muted mb-4">Enter your email and new password below.</p>

          <form action="{{ route('reset.password.post') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <!-- Email -->
            <div class="input-group mb-3">
              <span class="input-group-text"><span class="material-symbols-outlined">mail</span></span>
              <div class="form-floating flex-grow-1">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email_address" name="email" placeholder="Email address" required>
                <label for="email_address">Email Address</label>
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <!-- New Password -->
            <div class="input-group mb-3">
              <span class="input-group-text"><span class="material-symbols-outlined">lock</span></span>
              <div class="form-floating flex-grow-1">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="New Password" required>
                <label for="password">New Password</label>
                @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <!-- Confirm Password -->
            <div class="input-group mb-4">
              <span class="input-group-text"><span class="material-symbols-outlined">lock</span></span>
              <div class="form-floating flex-grow-1">
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password-confirm" name="password_confirmation" placeholder="Confirm Password" required>
                <label for="password-confirm">Confirm Password</label>
                @error('password_confirmation')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <button class="btn btn-dark w-100" type="submit">Reset Password</button>
          </form>
        </div>

        <!-- Image Column (hidden on small screens) -->
        <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center bg-light">
          <img src="https://images.pexels.com/photos/262978/pexels-photo-262978.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=600" 
               alt="Password Reset Illustration" 
               class="img-fluid rounded">
        </div>

      </div>
    </div>
  </div>
</div>

<!-- Google Material Icons -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">

@endsection
