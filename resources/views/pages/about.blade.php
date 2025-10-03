@extends('layouts/app')


@section('content')

<header class="bg-dark">
    <div class="container px-5">
        <div class="row gx-5">
            <div class="col-lg-6">
                <div class="my-5">
                    <h1 class="text-white fw-bolder mb-2">About Us</h1>
                </div>
            </div>
        </div>
    </div>
</header>


<section class="py-5 bg-light" id="features">
    <div class="container">
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-2">
            <div class="col col-lg-4 d-flex align-items-start">
                <img src="{{ asset('img/logobg.png') }}" alt="{{ env('APP_NAME') }}" class="w-100 p-5">
            </div>
            <div class="col col-lg-8 d-flex align-items-start about-us">
                <div>
                    <h2 class="mb-4">Serving you, so you can serve better!</h2>
                    <p><span class="fw-bolder">DGMenu</span> is a digital menu platform designed to help restaurants and other food establishments create and manage their menus. Our mission is to help businesses increase their efficiency and revenue by providing a user-friendly platform that allows them to create, edit, and display their menus digitally.</p>
                    <p><span class="fw-bolder">DGMenu</span> is based in India and offers a range of features, including customizable templates, offers and online ordering. Our platform is designed to be easy to use for both businesses and customers, with features like QR code scanning and online ordering.</p>
                    <h3 class="mb-2">Our Mission</h3>
                    <p>On the mission to promote "Make in India".</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection