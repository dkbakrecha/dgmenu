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


<section class="bg-light" id="features">
    <div class="container">
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-2">
            
            <div class="col col-lg-8 d-flex align-items-start about-us">
                <div>
                    <h2 class="mb-4">Preserving timeless recipes — connecting food lovers through taste and tradition.</h2>
                    <h3>Our Vision</h3>

                    <p>At <span class="fw-bolder">dgmenu.in</span>, we believe food is more than nourishment — it's a bridge between cultures, families, and generations. Our mission is to preserve authentic recipes gathered from classic cookbooks, handwritten notes, and culinary experiences, and make them available for everyone, free of cost.</p>
                    <h3>What We Offer for Users</h2>

                    <p>Our platform is designed for those who love discovering and learning about food.</p>
                    <ul>
                        <li>
                    <span class="fw-bolder">Authentic Recipes:</span> Many of our recipes come directly from old, original books and handwritten notes, carefully tested, refined, and preserved for future generations.
                    </li>
                    <li>
                    <span class="fw-bolder">Free Access:</span> Create a free account to explore and enjoy recipes anytime, anywhere.
                    </li>
                    <li>
                    <span class="fw-bolder">Cultural Diversity:</span> Experience flavors from across India and around the world.
                    </li>
                    <li>
                    <span class="fw-bolder">Ease of Use:</span> Whether you're a beginner or a seasoned cook, our platform makes learning and cooking effortless.
                    </li>
                    </ul>
                    <h3>Beyond Recipes - Supporting Businesses</h3>

                    While our main focus is sharing recipes, dgmenu.in also supports the food industry by helping restaurants and cafes build their online presence. Businesses can create free digital profiles, showcase their menus, and manage customer feedback through our Pro Services.

                    <h3>Our Story</h3>

                    dgmenu.in began as a personal effort to preserve culinary knowledge collected from decades of reading, experimenting, and note-taking. What started as a digital recipe notebook has grown into a platform for both food enthusiasts and food businesses — where tradition meets innovation.

                    <h3>Our Promise</h3>

                    We are committed to keeping dgmenu.in simple, trustworthy, and community-driven — where authentic recipes are preserved with respect, and the love of food continues to inspire generations.
                                    
                    <h3 class="mb-2">Our Mission</h3>
                    <p>On the mission to promote "Make in India".</p>

                
                </div>
            </div>

           <div class="col col-lg-4">

    

    <h5 class="fw-bold mb-3">Quick Facts</h5>

    <ul class="list-group">
        <li class="list-group-item d-flex align-items-center">
            <i class="bi bi-geo-alt-fill me-2 text-primary"></i> 5+ Countries Represented
        </li>
        <li class="list-group-item d-flex align-items-center">
            <i class="bi bi-journal-text me-2 text-success"></i> 300+ Authentic Recipes
        </li>
        <li class="list-group-item d-flex align-items-center">
            <i class="bi bi-people-fill me-2 text-warning"></i> Trusted by Home Cooks Worldwide
        </li>
        <li class="list-group-item d-flex align-items-center">
            <i class="bi bi-stars me-2 text-info"></i> 100% Free Forever
        </li>
    </ul>

    <!-- Try Something New -->
    <div class="mt-4 p-3 border rounded shadow-sm bg-light mb-3">
        <h5 class="fw-bold mb-2 d-flex align-items-center">
            <i class="bi bi-lightbulb-fill text-warning me-2"></i> Try Something New
        </h5>
        <p class="mb-3">Discover a random recipe from our collection.</p>

        <a href="{{ route('recipes.random') }}" class="btn btn-primary w-100">
            <i class="bi bi-shuffle me-1"></i> Random Recipe
        </a>
    </div>

    <!-- Quick Facts Box -->
    <div class="text-center mb-4">
        <img src="{{ asset('img/logobg.png') }}" alt="{{ env('APP_NAME') }}" class="w-100 p-5 pt-0">
    </div>  

</div>

        </div>
    </div>
</section>

@endsection