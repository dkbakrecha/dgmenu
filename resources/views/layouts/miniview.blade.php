<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name=description content="--" />
    <meta name="author" content="Dharmendra" />
    
    @if(request()->getHost() == 'localhost')
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-636X0548CD"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-636X0548CD');
    </script>
    @endif

    <title>{{ env('APP_NAME') }}</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <style>
      .desktop-view {
    max-width: 420px;
    margin: 0 auto;
}

body.body {
    background: #EEE;
}

      header{
        background: #FFF8E7;
        background-image:url("{{ asset('img/foodback.png') }}")
      }

      .restaurant-address{
        background-position: center;
        position:relative;
        background: #fdedd4;
      }

      .restaurant-address span{
        font-weight: 600;
        color:#e18f20;
      }


      .restaurant-address p {
    color: #31322d;
    padding-right: 75px;
}

.restaurant-address span.material-symbols-outlined {
    position: absolute;
    right: 25px;
    top: 65px;
    color: #11547d;
    font-size: 40px;
}

h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .cta-section {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        .cta-section .cta-icon {
            font-size: 1.5rem;
            cursor: pointer;
            color: #007bff;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 10px;
        }
        .cta-section .cta-icon:hover {
            color: #0056b3;
        }
        .cta-section .cta-icon span {
            margin-top: 5px;
            font-size: 0.9rem;
        }
        .rating {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin: 0 auto 20px;
        }
        .rating input {
            display: none;
        }
        .rating label {
            font-size: 1.5rem;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #ccc;
        }
        .rating label .material-icons {
            font-size: 2rem;
        }
        .rating label span {
            margin-top: 5px;
            font-size: 0.9rem;
        }
        .rating input:checked + label .material-icons {
            color: #FFD700;
        }
        .rating input:checked + label span {
            font-weight: bold;
        }
        .modal-content {
            padding: 15px;
        }
        .list-group-item {
            display: flex;
            align-items: center;
            font-size: 1rem;
        }
        .list-group-item i {
            font-size: 1.5rem;
            margin-right: 10px;
        }

        
      </style>
      <link href="{{ asset('css/common.css') }}" rel="stylesheet" />
    @yield('page-meta')
</head>

<body class="body">
    
      <div class="desktop-view">


    @yield('header')

    @include('flash-message')



    <!-- Main Content-->
    @yield('content')
    </div>
    @include('elements.mobilenav')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('copyUrl').addEventListener('click', function() {
            navigator.clipboard.writeText(window.location.href).then(() => {
                alert('URL copied to clipboard!');
            });
        });
    </script>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>