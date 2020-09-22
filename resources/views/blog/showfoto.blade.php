@extends('layouts.main_full')


@section('content')
    <div class="container">
    @if(! $images->count())

        <div class="alert alert-warning">
            <p>Nothing Found</p>
        </div>
    @else
        @foreach($images as $image)
            <div class="col-md-4">
            <article class="post-item post-shadow">
                {{--menampilkan hanya jika artikel memiliki gambar--}}
                @if($image->image_url)
                    <div class="post-item-image">

                            <img src="{{$image->image_url}}" alt="">
                        </a>
                    </div>
                @endif
                <div class="post-item-body">

                    <div class="post-meta padding-10 clearfix">
                        <div class="pull-left">
                            <ul class="post-meta-group">
                                <li><i class="fa fa-user"></i><a href="#"> {{$image->author->name}}</a></li>


                            </ul>
                        </div>
                    </div>
                </div>
            </article>

            </div>
        @endforeach
    @endif

    </div>
@endsection
