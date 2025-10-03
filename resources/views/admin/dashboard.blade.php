@extends('layouts/admin')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <h4>Welcome {{ auth()->user()->name }}</h4>

        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                <div class="mb-4 card border-light">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                            <div><span class="fs-6 text-uppercase fw-semi-bold">Users</span></div>
                        </div>
                        <h2 class="fw-bold mb-1">{{ $usersCount }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection