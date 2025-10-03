<!DOCTYPE html>
<html>

<head>
    <title>DG Menu</title>
    <style>
        /** Define the margins of your page **/
        @page {
            margin: 100px 25px;
        }

        header {
            position: fixed;
            top: -60px;
            left: 0px;
            right: 0px;
            height: 50px;

            /** Extra personal styles **/
            background-color: #03a9f4;
            color: white;
            text-align: center;
            line-height: 35px;
        }

        footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 50px;

            /** Extra personal styles **/
            background-color: #03a9f4;
            color: white;
            text-align: center;
            line-height: 35px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <!-- Define header and footer blocks before your content -->
    <header>
        Free QR Menu Service
    </header>

    <footer>
        Copyright &copy; dgmenu.in <?php echo date("Y"); ?>
    </footer>
    <div class="container px-4 px-lg-5">
        <div class="container py-5">
            <div class="row">
                <div class="card card-primary content-justify-center" style="">
                    <center>
                        <div class="">
                            <br />
                            <br />

                            <h2 style="font-size: 50px;"> {{ $room['business']['title'] }} </h2>


                            <br />
                            <br />
                            <br />
                            <br />

                            <h1 style="font-size: 80px;">Scan</h1>

                            <br />
                            <img src="data:image/png;base64, {!! base64_encode( QrCode::size(300)->format('png')->generate( route('qr',base64_encode($room['id'] . '--' . $room['business_id']) ) ) ) !!}">
                            <br />
                            <br />
                            <h1 style="font-size: 50px;">For Menu</h1>
                            
                            <br />
                        </div>
                    </center>
                </div>

            </div>
        </div>
    </div>
</body>

</html>