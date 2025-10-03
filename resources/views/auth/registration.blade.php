@extends('layouts/minimal')
@include('elements.banner')

@section('content')

  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-10">
        <div class="row shadow rounded-4 overflow-hidden">

          <!-- Form Column -->
          <div class="col-md-6 col-12 bg-white p-5">
            <h2 class=" mb-3" style="color: #3E3321;">Register Here</h2>
            <p class="text-muted mb-4">Sign up to share feedback or manage your business.</p>

            <form action="{{ route('register.custom') }}" method="POST">
              @csrf

              <!-- Name -->
              <div class="input-group mb-3">
                <span class="input-group-text"><span class="material-symbols-outlined">person</span></span>
                <div class="form-floating flex-grow-1">
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Full Name" required>
                  <label for="name">Full Name</label>
                  @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <!-- Email -->
              <div class="input-group mb-3">
                <span class="input-group-text"><span class="material-symbols-outlined">mail</span></span>
                <div class="form-floating flex-grow-1">
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email Address" required>
                  <label for="email">Email Address</label>
                  @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <!-- Password -->
              <div class="input-group mb-3">
                <span class="input-group-text"><span class="material-symbols-outlined">lock</span></span>
                <div class="form-floating flex-grow-1">
                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                  <label for="password">Password</label>
                  @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <!-- Captcha -->
              <div class="input-group mb-3">
                <span class="input-group-text"><span class="material-symbols-outlined">verified_user</span></span>
                <div class="form-floating flex-grow-1">
                  <input type="text" id="captcha" name="captcha" class="form-control @error('captcha') is-invalid @enderror" placeholder="Enter captcha" required>
                  <label for="captcha">Enter Captcha</label>
                  @error('captcha')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <span class="input-group-text p-0 px-4 text-bg-dark">{!! session('captcha') !!}</span>
              </div>

              <button type="submit" class="btn btn-dark w-100">Register Now</button>
            </form>


            <div class="text-center mt-4">
              <a href="{{ route('login') }}" class="text-decoration-none">Already registered? <strong>Login here</strong></a>
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


<!-- Google Material Icons -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">


@endsection