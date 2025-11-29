@extends('layouts.app')


<!-- Main content -->
@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-sm-6">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>
    </div>

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

</div>
@endsection