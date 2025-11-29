@extends('layouts/app')

@section('page-title', 'Find Best Restaurants and Foods')

@section('content')

<div class="bg-light py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold text-dark">Find Best Restaurants & Foods</h1>
            <p class="lead text-muted">Discover top-rated restaurants and delicious cuisines near you.</p>
        </div>

        <div class="row">
            <!-- Mobile Filter Toggle Button -->
            <div class="d-lg-none mb-3">
                <button class="btn btn-primary w-100" type="button" data-bs-toggle="offcanvas" data-bs-target="#filterOffcanvas" aria-controls="filterOffcanvas">
                    <i class="bi bi-funnel-fill me-2"></i> Filter Results
                </button>
            </div>

            <!-- Sidebar Filter (Desktop & Mobile Offcanvas) -->
            <div class="col-lg-3 mb-4">
                <div class="offcanvas-lg offcanvas-start" tabindex="-1" id="filterOffcanvas" aria-labelledby="filterOffcanvasLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="filterOffcanvasLabel">Filter Results</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#filterOffcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body p-0">
                        <div class="card shadow-sm border-0 w-100">
                            <div class="card-body">
                                <h5 class="card-title mb-3 d-none d-lg-block">Filter Results</h5>
                                <form id="searchForm" action="{{ route('resturents') }}" method="GET">
                                    <div class="mb-3">
                                        <label for="search" class="form-label">Search</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                                            <input type="text" class="form-control border-start-0" id="search" name="search" value="{{ request()->input('search') }}" placeholder="Restaurant name...">
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Cuisine Type</label>
                                        <div class="d-flex flex-column gap-2">
                                            @foreach(['Italian', 'Chinese', 'Mexican', 'Indian', 'American'] as $cuisine)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="cuisine_type[]" id="cuisine_{{ $loop->index }}" value="{{ $cuisine }}" {{ is_array(request()->input('cuisine_type')) && in_array($cuisine, request()->input('cuisine_type')) ? 'checked' : '' }} onchange="submitForm()">
                                                <label class="form-check-label" for="cuisine_{{ $loop->index }}">{{ $cuisine }}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Restaurant List -->
            <div class="col-lg-9">
                <div class="row g-4">
                @forelse ($businessListings as $businessListing)
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm border-0 hover-shadow transition-all">
                            <div class="position-relative">
                                <img src="{{ $businessListing->cover_image ? asset($businessListing->cover_image) : 'https://via.placeholder.com/400x250?text=Restaurant' }}" class="card-img-top" alt="{{ $businessListing->business_name }}" style="height: 200px; object-fit: cover;">
                                <span class="position-absolute top-0 end-0 m-2 badge bg-success">{{ $businessListing->rating ?? '4.5' }} <i class="bi bi-star-fill small"></i></span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-truncate"><a href="{{ route('biz', $businessListing->id) }}" class="text-decoration-none text-dark stretched-link">{{ $businessListing->business_name }}</a></h5>
                                <p class="card-text text-muted small mb-2">
                                    <i class="bi bi-geo-alt-fill text-danger me-1"></i> {{ $businessListing->location }}
                                </p>
                                @if(!empty($businessListing->cuisine_type))
                                <p class="card-text small mb-2">
                                    <i class="bi bi-tags-fill text-primary me-1"></i> {{ $businessListing->cuisine_type }}
                                </p>
                                @endif
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="text-muted small"><i class="bi bi-chat-left-text me-1"></i> 200 Reviews</span>
                                    <button class="btn btn-sm btn-outline-primary rounded-pill">View Menu</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <img src="https://cdn-icons-png.flaticon.com/512/2748/2748558.png" alt="No results" width="100" class="mb-3 opacity-50">
                        <h4>No restaurants found</h4>
                        <p class="text-muted">Try adjusting your filters or search query.</p>
                    </div>
                @endforelse
                </div>

                <!-- Pagination -->
                <div class="mt-5 d-flex justify-content-center">
                    {{ $businessListings->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jscript')
<script>
        // Function to submit the form when a checkbox is clicked
        function submitForm() {
            document.getElementById('searchForm').submit();
        }

        // Function to submit the form when Enter key is pressed
        function checkEnter(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                document.getElementById('searchForm').submit();
            }
        }
    </script>

@endsection