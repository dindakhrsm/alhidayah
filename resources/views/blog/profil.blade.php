@extends('layouts.main')

@section('title')
<h1> <b>Struktur Organisasi Masjid </b></h1><br>
@endsection

@section('content')

<article class="post-item post-detail post-shadow">
    <div class="post-item-body">
        <div class="padding-10">
            <h1>{{$posts->title}}</h1>

            <div class="post-meta no-border">
                <ul class="post-meta-group">
                    <li><i class="fa fa-user"></i><a href="#"> {{$posts->author->name}}</a></li>
                </ul>
            </div>

           <div class="post-item-image">
               <a href="#">
               </a>
           <img src ="{!! $posts->image_url !!}">
           </div>

            {!! $posts->body !!}

        </div>
    </div>
</article>


@endsection
