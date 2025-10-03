@extends('layouts/app')

@section('content')
<header class="bg-dark">
    <div class="container px-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="my-5">
                    <h1 class="display-5 fw-bolder text-white mb-2"> Improve your customer experience with QR menu</h1>
                    <p class="lead text-white-50 mb-4">Present your business in a whole new way. Pocket friendly QR Menu System for your Business with customize according to Business Needs</p>
                    <div class="d-grid gap-3 d-sm-flex">
                        <a class="btn btn-primary btn-lg px-4 me-sm-3" href="{{ route('login') }}">Login</a>
                        <a class="btn btn-outline-light btn-lg px-4" href="{{ route('register-user') }}">Get Started</a>
                    </div>

                    <!-- resources/views/home.blade.php -->

<form action="{{ route('search.results') }}" method="GET" id="search-form">
    <input type="text" name="query" placeholder="Search recipes or restaurants" id="search-input" required autocomplete="off">
    <select name="type" id="search-type">
        <option value="all">All</option>
        <option value="recipes">Recipes</option>
        <option value="restaurants">Restaurants</option>
    </select>
    <button type="submit">Search</button>
</form>

<!-- Suggestion box for displaying live search suggestions -->
<div id="suggestion-box" style="display:none; border: 1px solid #ddd; position: absolute; background-color: #fff; width: 100%; max-height: 200px; overflow-y: auto;"></div>

<script>
        const suggestionUrl = "{{ route('search.suggestions') }}";

document.getElementById('search-input').addEventListener('input', function() {
    let query = this.value;
    let type = document.getElementById('search-type').value;

    if (query.length > 2) {  // Trigger suggestions after 3 characters
        fetch(`${suggestionUrl}?query=${encodeURIComponent(query)}&type=${encodeURIComponent(type)}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(response => response.json())
        .then(data => {
            let suggestionBox = document.getElementById('suggestion-box');
            suggestionBox.innerHTML = '';
            suggestionBox.style.display = data.length ? 'block' : 'none';

            data.forEach(item => {
                let suggestionItem = document.createElement('div');
                suggestionItem.innerHTML = `<strong>${item.title || item.business_name}</strong>`;
                suggestionItem.onclick = function() {
                    document.getElementById('search-input').value = item.title || item.business_name;
                    suggestionBox.style.display = 'none';
                };
                suggestionBox.appendChild(suggestionItem);
            });
        });
    }
});
</script>

                </div>
            </div>
            <div class="col-lg-4">
                <img src="{{ asset('/img/dgmenuqr.svg') }}" class="img" alt="DGmenu.in QR Based" title="QR Based Digital Menu">
            </div>
        </div>
    </div>
</header>

<section class="py-5" id="outlets">
    <div class="container">
        <h2 class="pb-2 h3 border-bottom">Outlet Types</h2>
        <p>Discover the perfect digital menu solution tailored to your business needs.</p>

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

@endsection