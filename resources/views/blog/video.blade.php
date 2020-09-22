@extends('layouts.main_full')
{{-- @section('head-script')
    <!-- CSS Bootstrap -->
    <link href={{url("css/bootstrap.css")}} rel="stylesheet"/>
    <link href={{url("css/style.css")}} rel="stylesheet"/>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>

    <!-- CSS bawaan -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
    <link rel="stylesheet" href={{asset("css/bootstrap.min.css")}}>
    <link rel="stylesheet" href={{asset("css/custom.css")}}>

    <!-- CSS Lightbox -->
    <link href={{url("css/lightbox.css")}} rel="stylesheet"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection --}}
@section('content')
<div class="container">
    <div class="row mtb-60">
        <div class="heading">
            <h1 style="text-align: center"> Video Ceramah </h1>
        </div>
        <br>
        <div class="row">
            @foreach($videos as $video)
                <div class="col-md-4">
                    <div class="well">
                        <a class="example-image-link" href="#" data-lightbox="example-set" data-title="Caption Images">
                            <iframe class="thumbnail img-responsive"  src="{{$video->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></a>
                    </div>
                </div>
            @endforeach

           {{-- <div class="col-md-4">
                <div class="well">
                    <a class="example-image-link" href="#" data-lightbox="example-set" data-title="Caption Images">
                        <iframe class="thumbnail img-responsive"  src="https://www.youtube.com/embed/o_zUYX979OE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="well">
                    <a class="example-image-link" href="#" data-lightbox="example-set" data-title="Caption Images">
                        <iframe class="thumbnail img-responsive"  src="https://www.youtube.com/embed/7x83iJhiNrU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="well">
                    <iframe class="thumbnail img-responsive"  src="https://www.youtube.com/embed/NWeFPT59wc0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></a>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-4">
                <div class="well">
                    <a class="example-image-link" href="#" data-lightbox="example-set" data-title="Caption Images">
                        <iframe class="thumbnail img-responsive"  src="https://www.youtube.com/embed/x-CVzDlJhac" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="well">
                    <a class="example-image-link" href="#" data-lightbox="example-set" data-title="Caption Images">
                        <iframe class="thumbnail img-responsive"  src="https://www.youtube.com/embed/_vtOi6AuadE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="well">
                    <a class="example-image-link" href="#" data-lightbox="example-set" data-title="Caption Images">
                    <iframe class="thumbnail img-responsive"  src="https://www.youtube.com/embed/3fefLl5FSkk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="well">
                    <a class="example-image-link" href="#" data-lightbox="example-set" data-title="Caption Images">
                        <iframe class="thumbnail img-responsive"  src="https://www.youtube.com/embed/SpjqzVKTuy4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="well">
                    <a class="example-image-link" href="#" data-lightbox="example-set" data-title="Caption Images">
                        <iframe class="thumbnail img-responsive"  src="https://www.youtube.com/embed/t6vsozPFySQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="well">
                    <iframe class="thumbnail img-responsive"  src="https://www.youtube.com/embed/NXAtqODeJoQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></a>
                </div>
            </div>
        </div>
    </div>--}}
</div>
    </div>
</div>
@endsection

@section('script')
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src={{url("js/bootstrap.js")}}></script>

    <!-- jQuery Lightbox -->
    <script src={{url("js/lightbox-plus-jquery.min.js")}}></script>
    <script src={{asset("js/bootstrap.min.js")}}></script>
@endsection
