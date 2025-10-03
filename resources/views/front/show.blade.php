@extends('layouts/app')

@section('page-meta')
<meta property="og:url" content="{{ Request::url() }}" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $post->title }}" />
<meta property="og:description" content="{{ Str::limit(strip_tags($post->content), 80)  }}" />
<meta property="og:image" content="{{ asset('/img/welcome_exam.png') }}" />
@endsection

@section('header')
<!-- Page Header-->
<header class="masthead" style="background-image: url('../img/post-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-12 col-lg-12 col-xl-10">
                <div class="post-heading">
                    <h1 class="text-center">{{ $post->title }}</h1>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection

@section('content')
<!-- Post Content-->
<article class="mb-4">
    <div class="container px-4 px-lg-12">
        <div class="row gx-4 gx-lg-12 justify-content-center">
            <div class="col-md-12 col-lg-12 col-xl-10 post-content">

                {!! $post->content !!}

                <div class="mt-4 row">
                    @if ($post->previousPost())
                    <div class="prev-nav col-md-6">
                        <a href="{{ $post->previousPost()->title_slug }}" rel="prev">
                            <span>Previous</span>
                            {{ $post->previousPost()->title }}
                        </a>
                    </div>
                    @endif
                    @if ($post->nextPost())
                    <div class="col-md-6 next-nav text-right">
                        <a href="{{ $post->nextPost()->title_slug }}" rel="next">
                            <span>Next</span>
                            {{ $post->nextPost()->title }}
                        </a>
                    </div>
                    @endif
                </div> <!-- end s-content__pagenav -->
            </div>
        </div>
    </div>
</article>
@endsection