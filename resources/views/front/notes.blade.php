@extends('layouts/app')

@section('header')
<!-- Page Header-->
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Learning Resources</h1>
                    <span class="subheading">Transform your future with our learning resources. Unlock your potential.</span>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection

@section('content')

<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">

            @foreach ($posts as $post)
            <!-- Post preview-->
            <div class="post-preview">
                <a href="{{ route('posts.view', $post->title_slug) }}">
                    <h2 class="post-title">{{ $post->title }}</h2>
                </a>
            </div>
            <!-- Divider-->
            <hr class="my-4" />

            @endforeach

            <!-- Pager <a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a>-->
            <div class="d-flex justify-content-center mb-4">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection