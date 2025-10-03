<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name=description content="For QR Menu" />
    <meta name="author" content="Dharmendra" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-636X0548CD"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-636X0548CD');
    </script>

    <title>{{ env('APP_NAME') }}</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="{{ asset('css') }}/biz-{{ $pgBusiness->theme }}.css" rel="stylesheet" />

    <style>
        .preview-bar {
            width: 250px;
            left: auto;
            height: 113px;
            border-radius: 10px;
            bottom: 65px;
            right: 15px;
            border: 1px solid;
            text-align: center;
        }

        @media only screen and (max-width: 768px) {
            .preview-bar{
                display: none;
            }
        }
    </style>

    @yield('page-meta')
</head>

<body>
    @include('flash-message')
    @if (!empty(auth()->user()))
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-bottom preview-bar">
        <div class="container px-4 px-lg-5">
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <form method="POST" action="{{ route('business.update-preview', $pgBusiness->id ) }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="room_id" value="{{ $id }}">
                    <input type="hidden" name="business_id" value="{{ $pgBusiness->id }}">
                    <select name="theme" id="preview-theme"class="form-select" aria-label="Default select example">
                        @foreach($businessThemes as $_key => $_value)
                        <option value="{{ $_key }}" {{ $pgBusiness->theme == $_key?"selected":"" }}>{{ $_value }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-outline-success" type="submit">Update</button>
                </form>
            </div>
        </div>
    </nav>
    @endif

    @include('themes.' . $pgBusiness->theme . ".header")
    @include('themes.' . $pgBusiness->theme . '.content')

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <span class="text-muted">© {{ env('APP_NAME') }}</span>
        </div>
    </footer>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-bottom">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">Menu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    @foreach($pgMenuSections as $section)

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#Section{{ $section->id }}">{{ $section->section_title }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>