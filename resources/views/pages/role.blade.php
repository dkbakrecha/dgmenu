@extends('layouts/minimal')
@include('elements.banner')

@section('content')


<section class="py-5 bg-light" id="features">
    <div class="container">
        <div class="g-4 justify-content-center py-5 row">
            
            
            <div class="col-8 join-area">
					<div class="started">
						<h2>Continue as</h2>
						<p>Please Select Proper Type. It will not be update later. </p>
					</div>
					<a href="{{ route('update.role.post', ['role' => 3]) }}" class="welcome-box h-auto">
						<div class="d-flex align-items-center">
							<img src="{{ asset('img/waiter.png') }}" alt="">
							<div class="ms-2">
								<h5>RESTAURANT</h5>
								<p>Great food feedback faster here. Manage menu and order super easy.</p>
							</div>
						</div>    
					</a>
					<a href="{{ route('update.role.post', ['role' => 2]) }}" class="welcome-box h-auto">
						<div class="d-flex align-items-center">
							<img src="{{ asset('img/man.png') }}" alt="">
							<div class="ms-2">
								<h5>CUSTOMER</h5>
								<p>Finding food here easier. Benefit of referral program.</p>
							</div>
						</div>
					</a>
				</div>
        </div>
        
    </div>
</section>

@endsection