@extends('layouts/app')

@section('page-title', 'Contact Us')


@section('content')


<!-- Main Content-->
<main class="mb-4 pt-4">


    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5">
            
            <div class="col-md-8 offset-md-2">
                        <p>We look forward to assisting you and building a lasting relationship. Your voice matters, and we are here to listen. Reach out to us today!</p>

                        <form method="post" action="{{ route('sendContact') }}" id="contactForm">
                            @csrf
                            <div class="form-floating mb-2">
                                <input class="form-control" id="name" name="name" required type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Name</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <div class="form-floating mb-2">
                                <input class="form-control" id="email" name="email" required type="email" placeholder="Enter your email..." data-sb-validations="required,email" />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <div class="form-floating mb-2">
                                <textarea class="form-control" id="message" name="message" required placeholder="Enter your message here..." style="height: 12rem" data-sb-validations="required"></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                            <br />
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage">
                                <div class="text-center text-danger mb-3">Error sending message!</div>
                            </div>
                            <!-- Submit Button-->
                            <div class="d-grid">
                                <button class="btn btn-lg btn-warning" id="submitButton" type="submit">Submit</button>
                            </div>
                        </form>
           


        </div>
    </div>
</div>
</main>
@endsection