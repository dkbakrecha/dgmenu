@extends('layouts.app')

@section('hide-header') @endsection

@section('content')

<div class="container px-4 px-lg-5">
    <div class="container py-5">
        @if(!empty($business->title))
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title mb-3">Business Menu</h5>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('business_item.index') }}" class="btn btn-outline-primary d-flex align-items-center">
                            <span class="material-symbols-outlined pe-2">event_list</span> Items
                        </a>
                        <a href="{{ route('business_item.create') }}" class="btn btn-outline-success d-flex align-items-center">
                            <span class="material-symbols-outlined pe-2">add</span> Add Item
                        </a>
                        <a href="{{ route('menu_section.index') }}" class="btn btn-outline-secondary d-flex align-items-center">
                            <span class="material-symbols-outlined pe-2">view_list</span> Section
                        </a>
                        <a href="{{ route('roomList') }}" class="btn btn-outline-dark d-flex align-items-center">
                            <span class="material-symbols-outlined pe-2">qr_code</span> Business QR
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="alert alert-warning d-flex align-items-center" role="alert">
                <span class="material-symbols-outlined me-2">storefront</span>
                <div>
                    No business found. <a href="{{ route('business.create') }}" class="alert-link">Create a business profile</a> to get started.
                </div>
            </div>
        </div>
    </div>
@endif


        <!-- Profile & Business Overview -->
         <!-- Overview Summary -->
        <div class="row">
            <div class="col-lg-12">
                @include('partials.stats_tile')
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">@include('partials.profile-info')</div>
            <div class="col-lg-6">@include('partials.business-info')</div>
        </div>
        
        <!-- Feedback Summary & Charts -->
        <div class="row mt-2 mb-2 hide">
            <div class="col-md-4">@include('partials.feedback-summary')</div>
            <div class="col-md-4" style="height:250px;">
                <canvas id="moodChart"></canvas>
            </div>
            <div class="col-md-4">
                <canvas id="feedbackTrendChart"></canvas>
            </div>
        </div>

        

    </div>
</div>

@endsection

@push('scripts')
@include('partials.charts')
@endpush
