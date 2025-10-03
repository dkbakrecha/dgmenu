@extends('layouts/minimal')
@include('elements.banner')

@section('content')

<div class="container">
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-10">
      <div class="row shadow rounded-4 overflow-hidden">

        <!-- Form Column -->
        <div class="col-md-6 col-12 bg-white p-5">
          <h2 class="text-center mb-3" style="color: #3E3321;">Verify Your Account</h2>
          <p class="text-center text-muted mb-4">Enter the 6-digit verification code sent to your email or phone.</p>

          <form method="POST" action="{{ route('verify.custom') }}">
            @csrf

            <!-- Verification Code -->
            <div class="input-group mb-3">
              <span class="input-group-text">
                <span class="material-symbols-outlined">key</span>
              </span>
              <div class="form-floating flex-grow-1">
                <input type="text" maxlength="6" id="verification_code" class="form-control @error('verification_code') is-invalid @enderror" name="verification_code" placeholder="Enter Verification Code" required autofocus>
                <label for="verification_code">Verification Code</label>
                @error('verification_code')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <button type="submit" class="btn btn-dark w-100">Verify</button>
          </form>
        </div>

        <!-- Image Column -->
        <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center bg-light">
          <img src="https://images.pexels.com/photos/3184465/pexels-photo-3184465.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=600" 
               alt="Verification Illustration" 
               class="img-fluid rounded">
        </div>

      </div>
    </div>
  </div>
</div>

<!-- Google Material Icons -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">

@endsection
