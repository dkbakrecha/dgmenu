@extends('layouts/admin')

@section('breadcrumb')
    <div class="col-sm-6">
        <h2 class="m-0">Add Tag</h2>
    </div><!-- /.col -->  
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <form method="POST" action="{{ route('tags.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            
                            <div class="form-group">
                                <label for="name">Name </label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="#" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Create" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection