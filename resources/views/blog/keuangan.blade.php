@extends('layouts.main')

{{-- @section('head-script')
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment-with-locales.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
@endsection --}}

@section('title')
    <h1><b>Laporan Keuangan Masjid</b></h1><br>
@endsection

@section('content')
    @include('backend.cetaklaporan._content')
@endsection

{{-- @section('script')
    <script src={{asset("js/bootstrap.min.js")}}></script>
    <!-- jQuery 2.2.3 -->
    <script src={{asset("backend/js/jquery-2.2.3.min.js")}}></script>
    <!-- Bootstrap 3.3.6 -->
    <script src={{asset("backend/js/bootstrap.min.js")}}></script>
    <!-- AdminLTE App -->

    <script src={{asset("backend/js/app.min.js")}}></script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker6').datetimepicker();
            $('#datetimepicker7').datetimepicker({
                useCurrent: true //Important! See issue #1075
            });
            $('#datetimepicker6').on('dp.change', function (e) {
                $('#datetimepicker7').data('DateTimePicker').minDate(e.date);
            });
            $('#datetimepicker7').on('dp.change', function (e) {
                $('#datetimepicker6').data('DateTimePicker').maxDate(e.date);
            });
        });
    </script>
@endsection --}}