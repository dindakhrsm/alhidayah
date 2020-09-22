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
{{--<div class="container">
    <div class="row mtb-60">
        <div class="heading">
            <h1 style="text-align: center"> Foto Kegiatan </h1>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="well">
                    <a class="example-image-link" href="#" data-lightbox="example-set" data-title="Caption Images"><img class="thumbnail img-responsive" alt="Bootstrap template" src="{{asset('img/Post_Image_1.jpeg')}} "/> </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="well">
                    <a class="example-image-link" href="#" data-lightbox="example-set" data-title="Caption Images"><img class="thumbnail img-responsive" alt="Bootstrap template" src="{{asset('img/Post_Image_2.jpeg')}} " /></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="well">
                    <a class="example-image-link" href="{{asset('img/Post_Image_3.jpeg')}}" data-lightbox="example-set" data-title="Caption Images"><img class="thumbnail img-responsive" alt="Bootstrap template" src="{{asset('img/Post_Image_3.jpeg')}} " /></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="well">
                    <a class="example-image-link" href="http://www.prepbootstrap.com/Content/images/shared/houses/h7.jpg" data-lightbox="example-set" data-title="Caption Images"><img class="thumbnail img-responsive" alt="Bootstrap template" src="{{asset('img/galeri_1.jpeg')}} " /></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="well">
                    <a class="example-image-link" href="http://www.prepbootstrap.com/Content/images/shared/houses/h3.jpg" data-lightbox="example-set" data-title="Caption Images"><img class="thumbnail img-responsive" alt="Bootstrap template" src="{{asset('img/galeri_2.jpeg')}} " /></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="well">
                    <a class="example-image-link" href="http://www.prepbootstrap.com/Content/images/shared/houses/h6.jpg" data-lightbox="example-set" data-title="Caption Images"><img class="thumbnail img-responsive" alt="Bootstrap template" src="{{asset('img/galeri_3.jpeg')}} "/></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="well">
                    <a class="example-image-link" href="http://www.prepbootstrap.com/Content/images/shared/houses/h1.jpg" data-lightbox="example-set" data-title="Caption Images"><img class="thumbnail img-responsive" alt="Bootstrap template" src="{{asset('img/galeri_4.jpeg')}} " /></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="well">
                    <a class="example-image-link" href="http://www.prepbootstrap.com/Content/images/shared/houses/h2.jpg" data-lightbox="example-set" data-title="Caption Images"><img class="thumbnail img-responsive" alt="Bootstrap template" src="{{asset('img/galeri_5.jpg')}} " /></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="well">
                    <a class="example-image-link" href="http://www.prepbootstrap.com/Content/images/shared/houses/h5.jpg" data-lightbox="example-set" data-title="Caption Images"><img class="thumbnail img-responsive" alt="Bootstrap template" src="{{asset('img/galeri_6.jpg')}} " /></a>
                </div>
            </div>
        </div>
    </div>
</div>--}}

@if(! $posts->count())
    <div class="alert alert-warning">
        <p>Nothing Found</p>
    </div>
@else
    @foreach($posts as $post)
        <article class="post-item post-shadow">
            {{--menampilkan hanya jika artikel memiliki gambar--}}
            @if($post->image_url)
                <div class="post-item-image">
                    <a href="{{route('blog.show', $post->id)}}">
                        {{--<img src={{asset("img/Post_Image_1.jpeg")}} alt="">--}}
                        <img src="{{$post->image}}" alt="">
                    </a>
                </div>
            @endif
            <div class="post-item-body">
                <div class="padding-10">
                    <h2><a href="{{route('blog.show', $post->id)}}">{{$post->title}}</a></h2>
                    {!! $post->excerpt_html !!}
                </div>

                <div class="post-meta padding-10 clearfix">
                    <div class="pull-left">
                        <ul class="post-meta-group">
                            <li><i class="fa fa-user"></i><a href="#"> {{$post->author->name}}</a></li>
                            <li><i class="fa fa-clock-o"></i><time> {{$post->date}}</time></li>
                            <li><i class="fa fa-folder"></i><a href="{{route('category', $post->category->slug)}}">{{$post->category->title}}</a></li>
                            {{--  <li><i class="fa fa-tags"></i>
                                {!! $post->tags_html !!}
                              </li>--}}
                            <?php $commentsNumber = $post->comments->count() ?>
                            <li><i class="fa fa-comments"></i><a href="{{route('blog.show', $post->id)}}#post-comments">{{$commentsNumber}} {{str_plural('Comment', $commentsNumber)}}</a></li>
                        </ul>
                    </div>
                    <div class="pull-right">
                        <a href="{{route('blog.show', $post->id)}}">Lanjutkan Membaca &raquo;</a>
                    </div>
                </div>
            </div>
        </article>
    @endforeach
@endif
<nav>
    {{-- <ul class="pager">
         <li class="previous disabled"><a href="#"><span aria-hidden="true">&larr;</span> Newer</a></li>
         <li class="next"><a href="#">Older <span aria-hidden="true">&rarr;</span></a></li>
     </ul>--}}
    {{$posts->links()}}
</nav>


<!-- ======= Hero Section ======= -->
{{--<section id="hero" class="team">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
                <div class="kotak">
                    <div class="row" data-aos="fade-left">
                        <div class="col-md-12 text-center">
                        --}}{{--    <h1><?php echo $title ?></h1>--}}{{--
                            <h1>#</h1>
                            <hr>
                        </div>


                --}}{{--        <?php foreach($galeris as $galeri) { ?>--}}{{--
                        <div class="col-lg-4 col-md-6 galeri">
                            <div class="member" data-aos="zoom-in" data-aos-delay="100">
                                <div class="pic"><img src="#" class="img-fluid" alt=""></div>
                                <div class="member-info">
                                  --}}{{--  <h4><?php echo strip_tags($galeri->judul_galeri) ?></h4>--}}{{--
                                    <h4>#</h4>
                                    <span>#</span>
                                </div>
                            </div>
                        </div>
                     --}}{{--   <?php } ?>--}}{{--

                        <div class="col-md-12  justify-content-center">
                            <br><br>
                            <hr>
                            <p class="text-center">
                            --}}{{--    {{ $galeris->links() }}--}}{{--
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>--}}

@endsection

{{-- @section('script')
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src={{asset("js/bootstrap.js")}}></script>

    <!-- jQuery Lightbox -->
    <script src={{asset("js/lightbox-plus-jquery.min.js")}}></script>
    <script src={{asset("js/bootstrap.min.js")}}></script>
@endsection --}}

