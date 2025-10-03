@extends('layouts/app')
@section('hide-header') {{-- This hides the header --}} @endsection
@section('content')
<header class="bg-dark">
    <div class="container px-5 py-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="my-5">
                    <h1 class="display-5 fw-bolder text-white mb-2">Better Feedback<br /> Better Productddd.</h1>
                    <p class="lead text-white-50 mb-4">Collect feedback from your users in a better way.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <img src="{{ asset('/img/dg_feedback_home.png') }}" class="img w-100" alt="DGmenu.in QR Based" title="QR Based Digital Menu">
            </div>
        </div>
    </div>
</header>



<section class="bg-light featured section" id="howitworks" tabindex="-1">
<div class="container">
    <div class="row">
        <div class="col col-md-8 mx-auto">
        <h2 class="p-5 pb-0 px-0 text-dark text-center">In three simple steps, you will have the quickest, easiest, and most cost-effective solution. </h2>
        </div>
        <div class="main-features__list col-md-12 p-5">
            
            <div class="row">
                <div class="col-md-4">
                    <div class="card ">
                        <picture>
                            <img src="https://demo.digirestrosaas.s.arrangic.com/front-images/register.png" alt="DigiMenu" class="w-100" loading="lazy">
                        </picture>
                        <div class="step-title text-center">
                            <font style="vertical-align: inherit; white-space: break-spaces;">CREAT YOUR ACCOUNT </font>
                        </div>
                        <div class="text text-center p-3">
                            <font style="">You will only need your personal details to register.</font>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card  animation-float-slow ">
                        <picture>
                            <img src="https://demo.digirestrosaas.s.arrangic.com/front-images/form.png" alt="DigiMenu" loading="lazy" class="w-100">
                        </picture>
                        <div class="step-title text-center">
                            <font style="vertical-align: inherit; white-space: break-spaces;">UPLOAD YOUR PRODUCTS</font>
                        </div>
                        <div class="text text-center p-3">
                            <font style="vertical-align: inherit; white-space: break-spaces;">Add your categories and food items from your control panel.</font>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <picture>
                            <img src="https://demo.digirestrosaas.s.arrangic.com/front-images/qr.png" alt="DigiMenu" loading="lazy" class="w-100">
                        </picture>
                        <div class="step-title text-center">
                            <font style="vertical-align: inherit; white-space: break-spaces;">SHOW THE QR CODE</font>
                        </div>
                        <div class="text text-center p-3">
                            <font style="vertical-align: inherit; white-space: break-spaces;">Download the QR code of your panel and show it to your customers.</font>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<div class="feature-area bg-light2 pt-5 pb-5">
    <!-- Background Shape -->
    <div class="background-shape animate__animated animate__fadeInLeft" style="animation-duration: 4s;"></div>

    <!-- Curve Top & Bottom Shape -->
    <div class="curve-shape-top"></div>
    <div class="curve-shape-bottom"></div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-9 col-lg-8 mb-4">
                <div class="section-heading text-center text-dark">
                    <h2>Stop guessing &amp; build what your customers need</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row g-4 justify-content-center">
            <!-- Single Feature Area -->
            <div class="col-12 col-sm-10 col-md-6 col-lg-6">
                <div class="card feature-card border-0 shadow">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-tools text-primary fs-2 me-3"></i>
                        <div>
                            <h6 class="mb-1">Suggestions</h6>
                            <span class="text-muted">Collect suggestions and ideas from your customers to help you iterate and improve faster</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Feature Area -->
            <div class="col-12 col-sm-10 col-md-6 col-lg-6">
                <div class="card feature-card border-0 shadow">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-brush text-success fs-2 me-3"></i>
                        <div>
                            <h6 class="mb-1">Feature Like/Dislike</h6>
                            <span class="text-muted">Quickly see which ideas have traction as your users like the ideas they’d love to see</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Feature Area -->
            <div class="col-12 col-sm-10 col-md-6 col-lg-6">
                <div class="card feature-card border-0 shadow">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-twitter text-danger fs-2 me-3"></i>
                        <div>
                            <h6 class="mb-1">Product Roadmap</h6>
                            <span class="text-muted">Generate a roadmap from your suggestions, showing planned, in progress and completed features</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Feature Area -->
            <div class="col-12 col-sm-10 col-md-6 col-lg-6">
                <div class="card feature-card border-0 shadow">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-bug text-success fs-2 me-3"></i>
                        <div>
                            <h6 class="mb-1">Your unique code</h6>
                            <span class="text-muted">When you register, you are given a QR code that will only be from your board.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    
@endsection