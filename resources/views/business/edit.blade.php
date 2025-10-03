@extends('layouts.app')

@section('header')
<div class="dashboard-heading pb-1 pt-4">
    <div class="container-fluid px-4">
        <h1>Edit Business</h1>
    </div>
</div>
@endsection

@section('content')

<div class="container px-4 px-lg-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12">
                <form method="POST" action="{{ route('business.update', $business->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div>
                                        <table>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="form-group">
                                                        <label for="title">Title</label>
                                                        <input type="text" name="title" id="title" class="form-control" value="{{ $business->title }}" required>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="form-group">
                                                        <label for="contact">Contact Number</label>
                                                        <input type="text" name="contact" id="contact" class="form-control" value="{{ $business->contact }}" required>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="form-group">
                                                        <label for="email_address">Email Address</label>
                                                        <input type="text" name="email_address" id="email_address" class="form-control" value="{{ $business->email_address }}" required>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <input type="textarea" name="description" id="description" class="form-control" value="{{ $business->description }}" required>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="form-group">
                                                        <label for="theme">Theme</label>
                                                        <select name="theme" id="theme" class="form-control">
                                                            <option value="default" {{ $business->theme == "default"?"selected":"" }}>default</option>
                                                            <option value="minimenu" {{ $business->theme == "minimenu"?"selected":"" }}>minimenu</option>
                                                            <option value="black-cafe" {{ $business->theme == "black-cafe"?"selected":"" }}>Black Cafe</option>
                                                            <option value="cream-blue" {{ $business->theme == "cream-blue"?"selected":"" }}>Creamy Menu</option>
                                                            <option value="mercury-menu" {{ $business->theme == "mercury-menu"?"selected":"" }}>Mercury Menu</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="logo">Logo</label>
                                                    <input type="file" name="logo" id="logo" class="form-control">
                                                    
                                                    {{ $business->logo }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <input type="textarea" name="address" id="address" class="form-control" value="{{ $business->address }}" required>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
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
                            <input type="submit" value="Update" class="btn btn-success float-right">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection