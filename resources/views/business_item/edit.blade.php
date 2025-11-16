@extends('layouts.app')

@section('header')
<div class="dashboard-heading pb-1 pt-4">
    <div class="container-fluid px-4">
        <h1 class="">Item Edit</h1>
    </div>
</div>
@endsection

@section('content')

<div class="container px-4 px-lg-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">

            </div>
            <div class="col-lg-8">
                <form method="POST" action="{{ route('business_item.update', $businessItem->id) }}" enctype="multipart/form-data">
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
                                                        <input type="text" name="title" id="title" class="form-control" value="{{ $businessItem->title }}" required>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <input type="textarea" name="description" id="description" class="form-control" value="{{ $businessItem->description }}">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="form-group">
                                                        <label for="price">Price</label>
                                                        <input type="textarea" name="price" id="price" class="form-control" value="{{ $businessItem->price }}" required>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="form-group">
                                                        <label for="price">Price Min (If Any)</label>
                                                        <input type="text" name="price_min" id="price_min" class="form-control" value="{{ $businessItem->price_min }}">
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td colspan="2">
                                                    <div class="form-group">
                                                        <label for="section_id">Menu Sections</label>
                                                        <select name="section_id" id="section_id" class="form-control">
                                                            <option value="">Select Section</option>
                                                            @foreach($menuSections as $_section)
                                                            <option value="{{ $_section->id }}" @if($businessItem->section_id == $_section->id) selected @endif>{{ $_section->section_title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="form-group">
                                                        <label for="item_order">Menu Order</label>
                                                        <input type="text" name="item_order" id="item_order" class="form-control" value="{{ $businessItem->item_order }}">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="menu_image">Menu Logo</label>
                                                    <input type="file" name="menu_image" id="menu_image" class="form-control">
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