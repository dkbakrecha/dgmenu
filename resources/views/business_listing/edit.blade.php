@extends('layouts.dashboard')

@section('header')
<div class="dashboard-heading pb-1 pt-4">
    <div class="container-fluid px-4">
        <h1>Update Business Listing</h1>
    </div>
</div>
@endsection

@section('content')
<div class="container px-4 px-lg-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12">
                
                <form method="POST" action="{{ route('business_listing.update', $businessListing->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <div class="form-group row">
                                            <label for="business_name" class="col-sm-2 col-form-label">Business Name</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="business_name" id="business_name" class="form-control" value="{{ $businessListing->business_name }}" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="business_description" class="col-sm-2 col-form-label">Description</label>
                                            <div class="col-sm-4">
                                            <input type="textarea" name="business_description" id="business_description" class="form-control" value="{{ $businessListing->business_description }}" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="location" class="col-sm-2 col-form-label">Address</label>
                                            <div class="col-sm-4">
                                            <input type="textarea" name="location" id="location" class="form-control" value="{{ $businessListing->location }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="map_address" class="col-sm-2 col-form-label">Map Address</label>
                                            <div class="col-sm-4">
                                            <input type="text" name="map_address" id="map_address" class="form-control" value="{{ $businessListing->map_address }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="contact_phone" class="col-sm-2 col-form-label">Contact Number</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="contact_phone" id="contact_phone" class="form-control" value="{{ $businessListing->contact_phone }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="contact_email" class="col-sm-2 col-form-label">Email Address</label>
                                            <div class="col-sm-4">
                                            <input type="text" name="contact_email" id="contact_email" class="form-control" value="{{ $businessListing->contact_email }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="website" class="col-sm-2 col-form-label">Website</label>
                                            <div class="col-sm-4">
                                            <input type="text" name="website" id="website" class="form-control" value="{{ $businessListing->website }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="instagram_page" class="col-sm-2 col-form-label">Instagram Page</label>
                                            <div class="col-sm-4">
                                            <input type="text" name="instagram_page" id="instagram_page" class="form-control" value="{{ $businessListing->instagram_page }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="facebook_page" class="col-sm-2 col-form-label">Facebook Page</label>
                                            <div class="col-sm-4">
                                            <input type="text" name="facebook_page" id="facebook_page" class="form-control" value="{{ $businessListing->facebook_page }}">
                                            </div>
                                        </div>

                                        <h2>Add New Images</h2>
                <div class="form-group">
                    <label for="images">Images</label>
                    <input type="file" name="images[]" class="form-control-file" multiple>
                </div>
                
                                 

                              
                        </div>

                        <div class="card-footer text-muted">
                                        <a href="#" class="btn btn-secondary">Cancel</a>
                                <input type="submit" value="Update" class="btn btn-success float-right">
                                        </div>
                    </div>

        
                                
                               
                </form>

                <h2>Update Images</h2>
                <div class="row">
                    @foreach($businessListing->images as $image)
                        <div class="col-md-2 mb-2">
                            <div class="card">
                                <img src="{{ asset('storage/' . $image->image_path) }}" class="card-img-top" alt="Business Image">
                                <div class="card-body text-center">
                                    <button type="button" class="btn btn-danger delete-image" data-id="{{ $image->id }}" data-url="{{ route('business.image.delete', ['id' => $businessListing->id, 'imageId' => $image->id]) }}">
                                        Delete Image
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.delete-image').on('click', function() {
            var button = $(this);
            var url = button.data('url');
            var imageId = button.data('id');

            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    button.closest('.col-md-4').remove(); // Remove the image card from the DOM
                    alert(response.message);
                },
                error: function(xhr) {
                    alert('An error occurred while deleting the image.');
                }
            });
        });
    });
</script>
@endsection