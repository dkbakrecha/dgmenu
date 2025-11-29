@extends('layouts.app')

@section('page-title', 'Contact Us')

@section('content')
<!-- Header -->
<div class="bg-dark py-5 text-center text-white mb-5">
    <div class="container">
        <h1 class="display-4 fw-bold">Contact Us</h1>
        <p class="lead text-white-50 mx-auto" style="max-width: 700px;">
            We'd love to hear from you. Get in touch with us!
        </p>
    </div>
</div>

<!-- Main Content -->
<div class="container py-5">
    <div class="row g-5">
        <!-- Left Column: Contact Info & Map -->
        <div class="col-lg-5">
            <div class="row g-4 mb-4">
                <!-- Phone -->
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm text-center py-4 bg-light rounded-4">
                        <div class="card-body">
                            <div class="mb-3 text-primary">
                                <i class="bi bi-telephone-fill fs-2"></i>
                            </div>
                            <h5 class="fw-bold">Phone</h5>
                            <p class="text-muted mb-0">207-8767-452</p>
                        </div>
                    </div>
                </div>
                <!-- Whatsapp -->
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm text-center py-4 bg-light rounded-4">
                        <div class="card-body">
                            <div class="mb-3 text-success">
                                <i class="bi bi-whatsapp fs-2"></i>
                            </div>
                            <h5 class="fw-bold">Whatsapp</h5>
                            <p class="text-muted mb-0">082-123-234-345</p>
                        </div>
                    </div>
                </div>
                <!-- Email -->
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm text-center py-4 bg-light rounded-4">
                        <div class="card-body">
                            <div class="mb-3 text-danger">
                                <i class="bi bi-envelope-fill fs-2"></i>
                            </div>
                            <h5 class="fw-bold">Email</h5>
                            <p class="text-muted mb-0">support@yoursite.com</p>
                        </div>
                    </div>
                </div>
                <!-- Shop -->
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm text-center py-4 bg-light rounded-4">
                        <div class="card-body">
                            <div class="mb-3 text-warning">
                                <i class="bi bi-shop fs-2"></i>
                            </div>
                            <h5 class="fw-bold">Our Shop</h5>
                            <p class="text-muted mb-0">2443 Oak Ridge Omaha, QA 45065</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map -->
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509374!2d144.9537353153166!3d-37.816279742021665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf577d22e4200f92d!2sFederation%20Square!5e0!3m2!1sen!2sau!4v1645678901234!5m2!1sen!2sau" 
                    width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>

        <!-- Right Column: Contact Form -->
        <div class="col-lg-7">
            <div class="ps-lg-4">
                <h2 class="fw-bold mb-3">Get In Touch</h2>
                <p class="text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>

                <form method="post" action="{{ route('sendContact') }}" id="contactForm">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input class="form-control form-control-lg bg-light border-0" id="name" name="name" required type="text" placeholder="Your Name...">
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input class="form-control form-control-lg bg-light border-0" id="email" name="email" required type="email" placeholder="example@yourmail.com">
                    </div>

                    <div class="mb-3">
                        <label for="subject" class="form-label fw-bold">Subject</label>
                        <input class="form-control form-control-lg bg-light border-0" id="subject" name="subject" type="text" placeholder="Title...">
                    </div>

                    <div class="mb-4">
                        <label for="message" class="form-label fw-bold">Message</label>
                        <textarea class="form-control form-control-lg bg-light border-0" id="message" name="message" required placeholder="Type Here..." rows="5"></textarea>
                    </div>

                    <button class="btn btn-warning btn-lg w-100 text-white fw-bold py-3 rounded-pill" id="submitButton" type="submit">Send Now</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Footer Info Section (Optional, to match the bottom part of the image if it's not part of the main footer) -->


<style>
    .form-control:focus {
        box-shadow: none;
        border: 1px solid var(--bs-warning) !important;
    }
    .btn-warning {
        background-color: #d48c56; /* Match the brown/orange tone */
        border-color: #d48c56;
    }
    .btn-warning:hover {
        background-color: #c07a48;
        border-color: #c07a48;
    }
    .text-warning {
        color: #d48c56 !important;
    }
</style>
@endsection