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
        <div class="col-md-8">
            @yield('content')
        </div>
        <div class="col-md-4">
            @include('layouts._sidebar')
        </div>
    </div>
</div>
<footer style="background:cadetblue;">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <p class="copyright" style="color:black;">&copy; Bagian Data dan Informasi BAPETEN 2020</p>
            </div>
            <div class="col-md-4">
                <nav>
                    <ul class="social-icons">
                        <li><a href="#" class="i fa fa-facebook"></a></li>
                        <li><a href="#" class="i fa fa-twitter"></a></li>
                        <li><a href="#" class="i fa fa-google-plus"></a></li>
                        <li><a href="#" class="i fa fa-github"></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</footer>
{{-- <script src={{asset("js/bootstrap.min.js")}}></script> --}}
<script src="{{ asset('js/easy.qrcode.js') }}"></script>
<script>
    //https://www.cssscript.com/qr-code-generator-logo-title/
    var qrcode = new QRCode("qr-ovo", {
        text: "08129908399#RINASARI%20(Bend.Masjid Alhidayah)%20",
        logo: "{{asset('img/ovo.png')}}",
        width: 220,
        height: 220,
        colorDark : "#000000",
        colorLight : "#ffffff",
        correctLevel : QRCode.CorrectLevel.H
    });
</script>


    <script type="text/javascript">
        // 1 detik = 1000
        window.setTimeout("waktu()",1000);
    function waktu() {
        var tanggal = new Date();
        setTimeout("waktu()",1000);
        document.getElementById("jam").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
    }
</script>



@yield('script')

</body>
</html>

