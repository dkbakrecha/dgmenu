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
          <p class="text-center text-muted mb-4">Enter your email to receive a reset link.</p>

          @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
              {{ Session::get('message') }}
            </div>
          @endif

          <form action="{{ route('forget.password.post') }}" method="POST">
            @csrf

            <!-- Email Input -->
            <div class="input-group mb-3">
              <span class="input-group-text"><span class="material-symbols-outlined">mail</span></span>
              <div class="form-floating flex-grow-1">
                <input type="email" id="email_address" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address" required autofocus>
                <label for="email_address">Email Address</label>
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <button type="submit" class="btn btn-dark w-100">Send Password Reset Link</button>
          </form>

          <div class="text-center mt-4">
            <a href="{{ route('login') }}" class="text-decoration-none">Remember your password? <strong>Login here</strong></a>
          </div>
        </div>

        <!-- Image Column (hidden on small screens) -->
        <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center bg-light">
          <img src="https://images.pexels.com/photos/262978/pexels-photo-262978.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=600" 
               alt="Restaurant SaaS Illustration" 
               class="img-fluid rounded">
        </div>

      </div>
    </div>
  </div>
</div>

<!-- Google Material Icons -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">

@endsection
