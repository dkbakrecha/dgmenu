@extends('layouts/app')
@section('hide-header') {{-- This hides the header --}} @endsection

@section('content')
<style>
    .card picture img {
    width: 100%;
}

.featured .card {
    box-shadow: 0 4px 16px 0 rgba(0, 0, 0, .12);
}

.step-title {
    font-weight: 700;
    padding-top: 1em;
    text-transform: uppercase;
    color: #3E3321;
}
    </style>
<header class="bg-dark">
    <div class="container px-5">
        <div class="row">
            <div class="col-lg-7">
                <div class="my-5">
                    <h1 class="display-5 fw-bolder mb-2 pt-lg-5 text-white">Improve your customer experience with QR menu</h1>
                    <p class="lead text-white-50 mb-2">Present your business in a whole new way. Pocket friendly QR Menu System for your Business with customize according to Business Needs</p>
                    <p class="lead text-white-50 mb-4">Restaurants | Hotels | Chefs | Bakeries | Spa | Super markets</p>
                    <div class="d-grid gap-3 d-sm-flex">
                        <a class="btn btn-warning btn-lg px-4" href="{{ route('register-user') }}">Register Your Business</a><br />
                    </div>
                    <div class="mt-2 text-warning"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffc107"><path d="m344-60-76-128-144-32 14-148-98-112 98-112-14-148 144-32 76-128 136 58 136-58 76 128 144 32-14 148 98 112-98 112 14 148-144 32-76 128-136-58-136 58Zm34-102 102-44 104 44 56-96 110-26-10-112 74-84-74-86 10-112-110-24-58-96-102 44-104-44-56 96-110 24 10 112-74 86 74 84-10 114 110 24 58 96Zm102-318Zm-42 142 226-226-56-58-170 170-86-84-56 56 142 142Z"/></svg> TRUSTED BY 100+ BRANDS</div>
                </div>
            </div>
            <div class="col-lg-5 p-5 text-center">
                <img src="{{ asset('/img/menuphone.png') }}" class="img w-50" alt="DGmenu.in QR Based" title="QR Based Digital Menu">
            </div>
        </div>
    </div>
</header>

@include('elements.sectionempower')


<section class="bg-light featured section" id="howitworks" tabindex="-1">
        <div class="container">
            <div class="row">
                <div class="col col-md-8 mx-auto">
                <h2 class="p-5 pb-0 px-0 text-black text-center">In three simple steps, you will have the quickest, easiest, and most cost-effective solution. </h2>
                </div>
                <div class="main-features__list col-md-12 p-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card ">
                                <picture>
                                    <img src="https://demo.digirestrosaas.s.arrangic.com/front-images/register.png" alt="DigiMenu" loading="lazy">
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
                                    <img src="https://demo.digirestrosaas.s.arrangic.com/front-images/form.png" alt="DigiMenu" loading="lazy">
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
                                    <img src="https://demo.digirestrosaas.s.arrangic.com/front-images/qr.png" alt="DigiMenu" loading="lazy">
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


              
<section class="py-5" id="outlets">
    <div class="container">
        <h2 class="pb-2 h3 border-bottom">Outlet Types</h2>
        <p>Discover the perfect digital menu solution tailored to your business needs.</p>
        <p>We're 100% web-based.<br />
No app download required.</p>

        <div class="row g-4 py-5 row-cols-1 row-cols-lg-5 justify-content-center">
            <div class="col d-flex align-items-start bg-light2 m-1 r1">
                <div class="p-3">
                    <span class="material-symbols-outlined outline-icon">dining</span>
                    <h3 class="h4 fw-bolder">Fine Dine</h3>
                </div>
            </div>

            <div class="col d-flex align-items-start bg-light2 m-1 r1">
                <div class="p-3">
                    <span class="material-symbols-outlined outline-icon">local_cafe</span>
                    <h3 class="h4 fw-bolder">Cafe</h3>
                </div>
            </div>

            <div class="col d-flex align-items-start bg-light2 m-1 r1">

                <div class="p-3">
                    <span class="material-symbols-outlined outline-icon">fastfood</span>
                    <h3 class="h4 fw-bolder">QSR</h3>
                </div>
            </div>

            <div class="col d-flex align-items-start bg-light2 m-1 r1">

                <div class="p-3">
                    <span class="material-symbols-outlined outline-icon">wine_bar</span>
                    <h3 class="h4 fw-bolder">Bar & Brewery</h3>
                </div>
            </div>

            <div class="col d-flex align-items-start bg-light2 m-1 r1">

                <div class="p-3">
                    <span class="material-symbols-outlined outline-icon">local_pizza</span>
                    <h3 class="h4 fw-bolder">Pizzeria</h3>
                </div>
            </div>

            <div class="col d-flex align-items-start bg-light2 m-1 r1">

                <div class="p-3">
                    <span class="material-symbols-outlined outline-icon">cooking</span>
                    <h3 class="h4 fw-bolder">Cloud Kitchen</h3>
                </div>
            </div>

            <div class="col d-flex align-items-start bg-light2 m-1 r1">

                <div class="p-3">
                    <span class="material-symbols-outlined outline-icon">ramen_dining</span>
                    <h3 class="h4 fw-bolder">Food Court</h3>
                </div>
            </div>

            <div class="col d-flex align-items-start bg-light2 m-1 r1">

                <div class="p-3">
                    <span class="material-symbols-outlined outline-icon">bakery_dining</span>
                    <h3 class="h4 fw-bolder">Bakery</h3>
                </div>
            </div>

            <div class="col d-flex align-items-start bg-light2 m-1 r1">

                <div class="p-3">
                    <span class="material-symbols-outlined outline-icon">cake</span>
                    <h3 class="h4 fw-bolder">Desserts</h3>
                </div>
            </div>
        </div>
    </div>
</section>




<section class="py-5 bg-light" id="features">
    <div class="container">
    <img src="{{ asset('/img/india-map.webp') }}" class="country-map" alt="DGmenu.in">

        <h2 class="pb-2 h3 border-bottom">Why QR Menu (DGmenu.in)?</h2>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="col d-flex align-items-start">
                <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                    <span class="material-symbols-outlined outline-icon">menu_book</span>
                </div>
                <div>
                    <h2 class="h4 fw-bolder">Instant menu updates</h2>
                    <p>The venue can update the menu immediately to reflect out-of-stock items and price changes, avoiding the need to reprint menus.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                    <span class="material-symbols-outlined outline-icon">file_download_off</span>
                </div>
                <div>
                    <h2 class="h4 fw-bolder">No Download Necessary</h2>
                    <p>Unlike app-based solutions, customers don't need to download any full menu apps. They only need to scan a code and the contactless menu is visible immediately.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                    <span class="material-symbols-outlined outline-icon">devices_off</span>
                </div>
                <div>
                    <h2 class="h4 fw-bolder">No additional Hardware</h2>
                    <p>QR Menu provides the cheapest entry point for restaurants and hotels going digital, especially over tablet and kiosk options.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                    <span class="material-symbols-outlined outline-icon">king_bed</span>
                </div>
                <div>
                    <h2 class="h4 fw-bolder">Increase Hospitality </h2>
                    <p>Hospitality globally is experiencing a staffing crisis. High-volume restaurants use a QR menu for table & pick up orders.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                    <span class="material-symbols-outlined outline-icon">payments</span>
                </div>
                <div>
                    <h2 class="h4 fw-bolder">Increase cost efficiency</h2>
                    <p>Using QR code menus can provide significant savings over printing and disposable menu.</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                    <span class="material-symbols-outlined outline-icon">hotel_class</span>
                </div>
                <div>
                    <h2 class="h4 fw-bolder">More 5-star reviews</h2>
                    <p>Restaurants with QR menus are reporting an increase in 5start reviews because guests appreciate the convenience.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section faqs gradient-light--lean-left">
            <div class="container">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="row">
                        <div class="col-md-6 offset-md-3 text-center">
                            <h2 class="mt-5 text-center title">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">FAQ</font>
                                </font>
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 mb-5 offset-md-2">

                        <div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
      What is a QR menu system?
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">A QR menu system is a digital menu solution that uses QR codes to allow customers to access restaurant menus and related information using their smartphones or tablets. It eliminates the need for physical menus and promotes a contactless dining experience.</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
      How do I access the QR menu?
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">To access the QR menu, simply open your smartphone's camera app and scan the QR code provided by the restaurant. Alternatively, you can use a QR code scanner app if your camera app doesn't support QR code scanning.</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
      What information can I find on the QR menu?
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">The QR menu typically includes the restaurant's food and beverage offerings, prices, descriptions, special promotions, allergen information, and sometimes even images of the dishes. Some QR menu systems also offer features like ordering and requesting service.</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
      Is the QR menu system secure?
      </button>
    </h2>
    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Yes, QR menu systems are designed with security in mind. The information is typically hosted on secure servers, and the QR codes do not contain personal or sensitive data. It's a safe and convenient way to access menu information.</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingFive">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
      Do I need an internet connection to use the QR menu system?
      </button>
    </h2>
    <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Yes, you will need an internet connection to access the QR menu. However, some QR menu systems provide a downloadable PDF version of the menu for offline viewing in case of poor connectivity.</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingSix">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
      Is the QR menu system eco-friendly?
      </button>
    </h2>
    <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Yes, using a QR menu system can be more environmentally friendly than printing and disposing of paper menus. It reduces paper waste and supports sustainability efforts.</div>
    </div>
  </div>
</div>
                                      
                                                    </div>
                    </div>
                </div>
            </div>
        </section>
<section class="section section-testimonials gradient-light--lean-left hide">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-md-left">
                        <h2 class="title">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Testimonial</font>
                            </font>
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="swiper-container pt-5 pb-6 swiper-container-initialized swiper-container-horizontal" style="cursor: grab;">
                            <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                                                                    <div class="swiper-slide testimony__card p-3 swiper-slide-active" style="width: 382px;">
                                        <blockquote class="blockquote shadow">
                                            <p class="mb-4">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">
                                                        I love the convenience of the QR menu system! It's quick, easy to use, and helps maintain a contactless dining experience. Plus, it's eco-friendly. Highly recommended!</font>
                                                </font>
                                            </p>
                                            <footer class="blockquote-footer d-flex align-items-center">
                                                <div class="testimony__avatar d-inline-block mr-3">
                                                                                                            <img class="rounded-circle" width="55" height="55" src="http://demo.digirestrosaas.s.arrangic.com/storage/testimonial_image/16935719842564_avatar3.jpg" alt="DigiMenu" loading="lazy">
                                                                                                    </div>
                                                <div class="testimony__info d-inline-block">
                                                        <span class="info-name d-block" style="margin-left:12px;">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">
                                                                    Sarah D</font>
                                                            </font>
                                                        </span>
                                                </div>
                                            </footer>
                                        </blockquote>
                                    </div>
                                                                    <div class="swiper-slide testimony__card p-3 swiper-slide-next" style="width: 382px;">
                                        <blockquote class="blockquote shadow">
                                            <p class="mb-4">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">
                                                        I'm impressed with how user-friendly the QR menu system is. I can browse the menu, place orders, and even request service without needing to flag down a waiter. Such a time-saver!</font>
                                                </font>
                                            </p>
                                            <footer class="blockquote-footer d-flex align-items-center">
                                                <div class="testimony__avatar d-inline-block mr-3">
                                                                                                            <img class="rounded-circle" width="55" height="55" src="http://demo.digirestrosaas.s.arrangic.com/storage/testimonial_image/16935720279040_avatar15.jpg" alt="DigiMenu" loading="lazy">
                                                                                                    </div>
                                                <div class="testimony__info d-inline-block">
                                                        <span class="info-name d-block" style="margin-left:12px;">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">
                                                                    Lisa M</font>
                                                            </font>
                                                        </span>
                                                </div>
                                            </footer>
                                        </blockquote>
                                    </div>
                                                                    <div class="swiper-slide testimony__card p-3" style="width: 382px;">
                                        <blockquote class="blockquote shadow">
                                            <p class="mb-4">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">
                                                        QR menus are the future, and I'm all for it! It's so much easier to see pictures of dishes, read descriptions, and make informed choices.</font>
                                                </font>
                                            </p>
                                            <footer class="blockquote-footer d-flex align-items-center">
                                                <div class="testimony__avatar d-inline-block mr-3">
                                                                                                            <img class="rounded-circle" width="55" height="55" src="http://demo.digirestrosaas.s.arrangic.com/storage/testimonial_image/16935721825274_avatar13.jpg" alt="DigiMenu" loading="lazy">
                                                                                                    </div>
                                                <div class="testimony__info d-inline-block">
                                                        <span class="info-name d-block" style="margin-left:12px;">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">
                                                                    Emily W</font>
                                                            </font>
                                                        </span>
                                                </div>
                                            </footer>
                                        </blockquote>
                                    </div>
                                                            </div>
                            <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span></div>
                            <div class="swiper-button-prev rounded swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-disabled="true"></div>
                            <div class="swiper-button-next rounded swiper-button-disabled" tabindex="-1" role="button" aria-label="Next slide" aria-disabled="true"></div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                    </div>
                </div>
            </div>
        </section>
 
@include('elements.sectionpricing')
@endsection