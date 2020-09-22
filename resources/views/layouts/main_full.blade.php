<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Al-Hidayah | BAPETEN</title>

    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href={{asset("css/bootstrap.min.css")}}>
    @yield('head-script')
    <link rel="stylesheet" href={{asset("css/custom.css")}}>
</head>

<body>
@include('layouts._navbar')
@yield('slider')

<div class="container">
    <div class="row">
        <div style="padding-left: 15px">
            @yield('title')
        </div>
        <div class="col-md-12">
            @yield('content')
        </div>
    </div>
</div>

<footer style="background:cadetblue; bottom:0px; position:absolute; width:100%;">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <p class="copyright" style="color:black;">&copy; Bagian Data dan Informasi BAPETEN 2020</p>
            </div>
            <div class="col-md-4">
             {{--   <nav>
                    <ul class="social-icons">
                        <li><a href="#" class="i fa fa-facebook"></a></li>
                        <li><a href="#" class="i fa fa-twitter"></a></li>
                        <li><a href="#" class="i fa fa-google-plus"></a></li>
                        <li><a href="#" class="i fa fa-github"></a></li>
                    </ul>
                </nav>--}}
            </div>
        </div>
    </div>
</footer>
@yield('script')

</body>
</html>

