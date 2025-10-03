@extends('layouts.app')

@section('header')
<div class="dashboard-heading pb-1 pt-4">
    <div class="container-fluid px-4">
        <h1>Theme</h1>
    </div>
</div>
@endsection

@section('content')
<div class="container px-4 px-lg-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12">
                <form method="POST" action="{{ route('business.update-theme', $business->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row theme-wrapper p-2">
                                @foreach($businessThemes as $_key => $_value)
                                <div class="col-md-3 p-2 mt-1 option {{ $business->theme == $_key?'active':'' }}">
                                    <label for="{{ $_key }}">
                                        <input type="radio" name="theme" id="{{ $_key }}" value="{{ $_key }}" {{ $business->theme == $_key?"checked":"" }}>
                                        <span>{{ $_value }}</span>
                                    </label>
                                </div>
                                @endforeach
                            </div>
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