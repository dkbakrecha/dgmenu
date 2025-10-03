<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="Dharmendra" />
    <title>{{ env('APP_NAME') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('dashboard/styles.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <style>
        nav.sb-topnav.navbar.navbar-expand.navbar-light.bg-light {
            border-bottom: 1px solid #EFEFEF;
        }

        .dashboard-heading {
            display: block;
            width: 100%;
            position: relative;
            background-color: #eeeeee;
            background-image: linear-gradient(124deg, #eeeeee 0%, #f5e3ae 100%);
        }

        .sb-sidenav .sb-sidenav-menu .nav .nav-link {
            padding-top: 1.4rem;
            padding-bottom: 1.2rem;
            border-bottom: 1px solid #EFEFEF;
        }

        .sb-sidenav-light .sb-sidenav-menu .nav-link:hover {
            color: #212529;
            background-color: #e9ecef;
        }

        .dashboard-heading h1 {
            color: #999;
            font-size: 1.6rem;
        }

        img.table-img {
            width: 50px;
            height: 50px;
            border-radius: 4px;
        }



        
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ route('board') }}">{{ env('APP_NAME') }}</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 p-4" id="sidebarToggle" href="#!">
            <span class="material-symbols-outlined">apps</span>
        </button>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="{{ route('board') }}">
                            <span class="material-symbols-outlined pe-2">home</span>
                            Dashboard
                        </a>

                        @if(!empty($business->title))

                        <a href="{{ route('business.edit', $business->id) }}" class="nav-link">
                            <span class="material-symbols-outlined pe-2">storefront</span>
                            Update Business
                        </a>
                        <a href="{{ route('business_item.index') }}" class="nav-link">
                            <span class="material-symbols-outlined pe-2">event_list</span>
                            Items
                        </a>
                        <a href="{{ route('business_item.create') }}" class="nav-link">
                            <span class="material-symbols-outlined pe-2">event_list</span>
                            Add Item
                        </a>
                        <a href="{{ route('menu_section.index') }}" class="nav-link">
                            <span class="material-symbols-outlined pe-2">event_list</span>
                            Section
                        </a>
                        <a href="{{ route('roomList') }}" class="nav-link">
                            <span class="material-symbols-outlined pe-2">qr_code</span>
                            Business QR
                        </a>

                        <a href="{{ route('themes') }}" class="nav-link">
                            <span class="material-symbols-outlined pe-2">qr_code</span>
                            Theme
                        </a>
                        <a href="{{ route('roomList') }}" class="nav-link">
                            <span class="material-symbols-outlined pe-2">qr_code</span>
                            Contact
                        </a>
                        @else
                        <a href="{{ route('business.create') }}" class="nav-link">
                            <span class="material-symbols-outlined pe-2">storefront</span>
                            Business
                        </a>
                        @endif

                        @if(auth()->user()->role == 1)
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <span class="material-symbols-outlined pe-2">storefront</span>
                            Users
                        </a>

                        <a href="{{ route('business_listing.index') }}" class="nav-link">
                            <span class="material-symbols-outlined pe-2">storefront</span>
                            Business Listing
                        </a>

                        @endif

                        <a class="nav-link" href="{{ route('sign-out') }}">
                            <span class="material-symbols-outlined pe-2">logout</span>
                            Logout
                        </a>


                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    @if(auth()->user()->role == 1)
                    Super Admin
                    @elseif(auth()->user()->role == 2)
                    User
                    @else
                    Business Admin
                    @endif
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                @yield('header')

                @yield('content')

            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; {{ env('APP_NAME') }} 2023</div>
                        <div style="display:none;">
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
 <!-- Bootstrap core JavaScript-->
 <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('dashboard/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('dashboard/datatables-simple-demo.js') }}"></script>

    @yield('javascript')
</body>

</html>