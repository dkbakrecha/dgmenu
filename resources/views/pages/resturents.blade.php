@extends('layouts/app')

@section('page-title', 'Find Best Restaurants and Foods')

@section('content')

<header class="bg-dark">
    <div class="container px-5">
        <div class="row gx-5">
            <div class="col-lg-6">
                <div class="my-5">
                    <h1 class="text-white fw-bolder mb-2">Restaurants</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container resturent-list mt-4">



        <div class="row">
            <div class="col-md-3">
                <!-- Search Form -->
                <form id="searchForm" action="{{ route('resturents') }}" method="GET">
                    <div class="form-group">
                        <input type="text" class="form-control" id="search" name="search" value="{{ request()->input('search') }}" placeholder="Search business listings...">
                    </div>
                    
                    <div class="form-group">
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="cuisine_type[]" id="italian" value="Italian" {{ is_array(request()->input('cuisine_type')) && in_array('Italian', request()->input('cuisine_type')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="italian">Italian</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="cuisine_type[]" id="chinese" value="Chinese" {{ is_array(request()->input('cuisine_type')) && in_array('Chinese', request()->input('cuisine_type')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="chinese">Chinese</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="cuisine_type[]" id="mexican" value="Mexican" {{ is_array(request()->input('cuisine_type')) && in_array('Mexican', request()->input('cuisine_type')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="mexican">Mexican</label>
                            </div>
                            <!-- Add more checkboxes for other cuisine types -->
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-md-9">
                <div class="row">
                @foreach ($businessListings as $businessListing)
                    <div class="col-md-6">
                    <a href="{{ route('biz', $businessListing->id) }}" class="restaurant-card">
                        <h2 class="restaurant-name">
                        {{ $businessListing->business_name }}
                        </h2>
                        @if(!empty($businessListing->cuisine_type))
                        <p class="restaurant-cuisine">Cuisines: {{ $businessListing->cuisine_type }}</p>
                        
                            @endif
                        <p class="restaurant-address">
                            <span class="material-symbols-outlined">pin_drop</span> 
                            {{ $businessListing->location }}
                        </p>
                        <div class="restaurant-reviews">
                            <span class="total-reviews">4.5 stars (200 reviews)</span>
                            <div class="review-count">
                                
                            <span class="material-symbols-outlined">rate_review</span>
                                <span>200</span>
                            </div>
                        </div>
                        <img src="https://img.icons8.com/ios-glyphs/30/bookmark-ribbon.png" alt="Bookmark Icon" class="bookmark-icon" width="24" height="24">
                    </a>

                    </div>
                    @endforeach
                </div>
            
            </div>
            
        </div>


        <!-- Custom Pagination Controls -->
        <div class="pagination-wrapper d-flex justify-content-between align-items-center mt-4">
            <!-- Previous Button -->
            @if ($businessListings->onFirstPage())
                <span class="btn btn-secondary disabled">Previous</span>
            @else
                <a href="{{ $businessListings->previousPageUrl() }}" class="btn btn-primary">Previous</a>
            @endif

            <!-- Page Indicator -->
            <span>Page {{ $businessListings->currentPage() }} of {{ $businessListings->lastPage() }}</span>

            <!-- Next Button -->
            @if ($businessListings->hasMorePages())
                <a href="{{ $businessListings->nextPageUrl() }}" class="btn btn-primary">Next</a>
            @else
                <span class="btn btn-secondary disabled">Next</span>
            @endif
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