@extends('layouts.app')

@section('header')
<div class="dashboard-heading pb-1 pt-4">
    <div class="container-fluid px-4">
        <h1>Dashboard</h1>
    </div>
</div>
@endsection

@section('content')

<div class="container px-4 px-lg-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="h4">Users</div>
                        <p class="text-muted mb-0">{{ $usersCount }}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="h4">Items</div>
                        <p class="text-muted mb-0"></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="h4">QR</div>
                        <p class="text-muted mb-0"></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="h4">Scans</div>
                        <p class="text-muted mb-0">{{ $visitorsCount }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Full Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ auth()->user()->name }}</p>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ auth()->user()->email }}</p>
                            </div>
                        </div>


                    </div>


                </div>

            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection