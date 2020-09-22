@extends('layouts.main')

@section('slider')
    <div class="container">
        <!-- /.carousel or slider-->
        {{-- @if(Request::is('/')) --}}
    <!-- Menampilkan Hari, Bulan dan Tahun -->
        <div style="text-align: center; font-weight:bold; font-family: 'Century Schoolbook L';">
            <script type='text/javascript'>
                <!--
                var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                var date = new Date();
                var day = date.getDate();
                var month = date.getMonth();
                var thisDay = date.getDay(),
                    thisDay = myDays[thisDay];
                var yy = date.getYear();
                var year = (yy < 1000) ? yy + 1900 : yy;
                document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                //-->
            </script>
        </div>

        <!-- Menampilkan Jam (Aktif) -->
        <div id='jam' style="text-align: center; font-weight:bold;font-family: 'Century Schoolbook L';"></div>


        <marquee style="background:green; color:white; font-size:20px;font-family: 'Century Schoolbook L';"><b>Assalamu'alaikum, Selamat Datang di Website Masjid Al-Hidayah Badan Pengawas Tenaga Nuklir</b>  </marquee>
        <br>
        <br>
        <div id="myCarousel" class="carousel slide widget-shadow" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src= {{url('img/Post_Image_2.jpeg')}} style="width:100%;">
                    <div class="carousel-caption" style="top:60%;bottom:auto;">
                        <h1 style="font-size:50pt; font-weight: bolder; text-shadow: 3px 2px 1px grey; background-color: #1b6d85;"><b>Masjid Al-Hidayah</b></h1>
                        <p style="font-size:25pt; background-color: #00acd6;">Badan Pengawas Tenaga Nuklir</p>
                    </div>
                </div>

                <div class="item">
                    <img src= {{url('img/Post_Image_3.jpeg')}}   style="width:100%;">
                    <div class="carousel-caption" style="top:45%;bottom:auto;">
                        <h1 style="font-size:50pt; font-weight: bolder; text-shadow: 3px 2px 1px grey; background-color: #1b6d85;"><b>Masjid Al-Hidayah</b></h1>
                        <p  style="font-size:25pt; background-color: #00acd6">Badan Pengawas Tenaga Nuklir</p>
                    </div>
                </div>

                <div class="item">
                    <img src= {{url('img/Post_Image_1.jpeg')}}  style="width:100%;">
                    <div class="carousel-caption" style="top:25%;bottom:auto;">
                        <h1 style="font-size:50pt; font-weight: bolder; text-shadow: 3px 2px 1px grey;background-color: #1b6d85;"><b>Masjid Al-Hidayah</b></h1>
                        <p  style="font-size:25pt; background-color: #00acd6">Badan Pengawas Tenaga Nuklir</p>
                    </div>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <br>
        <br>
        <br>
    {{-- @endif --}}
    <!-- /.carousel or slider-->
    </div>
@endsection

@section('title')
    <!-- /.this part is for the search result-->
    @if($term = request('term'))
        <div class="alert alert-info">
            <p>Hasil pencarian dari : <strong>{{ $term }}</strong></p>
        </div>
    @endif
@endsection

@section('content')
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
                            <img src="{{$post->image_url}}" alt="">
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
@endsection
