@extends('layouts.dashboard')

@section('header')
<div class="dashboard-heading pb-1 pt-4">
    <div class="container-fluid px-4">
        <h1 class="">QR's</h1>
    </div>
</div>
@endsection

@section('content')

<div class="container px-4 px-lg-5">
    <div class="container py-5">
        <div class="row">

            @foreach ($rooms as $room)
            
            <div class="card card-primary col-3">
                <div class="card-body">
                
                    <a href="{{ route('roomSpace',base64_encode($room->id . '--' . $room->business_id) ) }}" target="_BLANK">
                        <h4>Table : {{ $room->room_number }} Preview</h4>
                    </a>

                    <div>
                        <img src="data:image/png;base64, {!! base64_encode( QrCode::size(200)->format('png')->generate( route('qr',base64_encode($room->id . '--' . $room->business_id) ) ) ) !!}">
                    </div>
                    

                    <a class="btn btn-primary" href="{{ URL::to('/room/pdf/' . $room->id) }}">Export to PDF</a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            @endforeach

        </div>
    </div>
</div>
@endsection