@extends('layouts.dashboard')

@section('header')
<div class="dashboard-heading pb-1 pt-4">
    <div class="container-fluid px-4">
        <h1 class="">Section Add</h1>
    </div>
</div>
@endsection

@section('content')
<div class="container px-4 px-lg-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12">
                <form method="POST" action="{{ route('menu_section.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card card-primary">
                        <div class="card-body">
                            <div>
                                <table>
                                    <tr>
                                        <td colspan="2">
                                            <div class="form-group">
                                                <label for="section_title">Title</label>
                                                <input type="text" name="section_title" id="section_title" class="form-control" required>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <a href="#" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Create" class="btn btn-success float-right">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection