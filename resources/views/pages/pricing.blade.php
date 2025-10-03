@extends('layouts/app')
@section('page-title', 'Pricing')

@section('content')
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

</style>

<section class="py-5 bg-light" id="features">
    <div class="container">
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-2">
            <div class="col col-lg-12 d-flex align-items-center pricing">
            <table>
                    <tr >
                        <td rowspan="5" style="text-align: center; background:#FFF;">
                        <img src="https://s22.postimg.cc/8mv5gn7w1/paper-plane.png" alt="" class="pricing-img">
                        <div>Starter</div>
                        </td>
                        <td>6 Categories / 40 Items</td>
                    </tr>
                    <tr>                        
                        <td>Digital menu customize (From pre themes)</td>
                    </tr>
                    <tr>
                        <td>Menu QR Code</td>
                    </tr>
                    <tr>
                        <td>Simple Dashboard</td>
                    </tr>
                    <tr>
                        <td>Email Support</td>
                    </tr>
                    <tr>
                    	<td rowspan="10" style="text-align: center; background:#FFF;">
                        <img src="https://s28.postimg.cc/ju5bnc3x9/plane.png" alt="" class="pricing-img">
                        <div>Professional</div>
                        </td>
                        <td>Unlimited Items/Categories</td>
                    </tr>
                    <tr>
                        <td>Customize theme by Business Requirement</td>
                    </tr>
                    <tr>
                        <td>Table based QR codes</td>
                    </tr>
                    <tr>
                        <td>Order from QR Menu</td>
                    </tr>
                    <tr>
                        <td>Customer Lists</td>
                    </tr>
                    <tr>
                        <td>Offer Management for better customer support</td>
                    </tr>
                    <tr>
                        <td>24/7 support</td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{ route('register-user') }}" class="btn btn-outline-dark p-2 pe-3 ps-3 active ms-3" title="support">Get Start Free</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>

@include('elements.readytostart')
@endsection