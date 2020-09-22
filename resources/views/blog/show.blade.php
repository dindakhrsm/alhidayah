@extends('layouts.main')

@section('title')
    {{-- <h1> <b>{{$post->title}}</b></h1><br> --}}
    <br><br>
@endsection

@section('content')
    <article class="post-item post-detail post-shadow">

        @if($post->image_url)
            <div class="post-item-image">
                <a href="#">
                    <img src={{asset($post->image_url)}} alt="{{$post->title}}">
                </a>
            </div>
        @endif

        <div class="post-item-body">
            <div class="padding-10">
                <h1>{{$post->title}}</h1>

                <div class="post-meta no-border">
                    <ul class="post-meta-group">
                        <li><i class="fa fa-user"></i><a href="#"> {{$post->author->name}}</a></li>
                        <li><i class="fa fa-clock-o"></i><time> {{$post->date}}</time></li>
                        <li><i class="fa fa-folder"></i><a href="{{route('category', $post->category->slug)}}">{{$post->category->title}}</a></li>
                        {{--    <li><i class="fa fa-tags"></i>{!! $post->tags_html  !!} </li>--}}
                        <?php $commentsNumber = $post->comments->count() ?>
                        <li><i class="fa fa-comments"></i><a href="#post-comments">{{$commentsNumber}} {{str_plural('Comment', $commentsNumber)}}</a></li>
                    </ul>
                </div>
                {!! $post->body !!}
            </div>
        </div>
    </article>
    <article class="post-author padding-10 post-shadow" style="padding:10px;">
        <div class="media">
            <div class="media-left">
                <a href="#">
                    <img alt="Author 1" src={{asset("img/author.jpg")}} class="media-object">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading"><a href="#">{{$post->author->name}}</a></h4>
                <div class="post-author-count">
                    <a href="#">
                        <i class="fa fa-clone"></i>
                        90 posts
                    </a>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis ad aut sunt cum, mollitia excepturi neque sint magnam minus aliquam, voluptatem, labore quis praesentium eum quae dolorum temporibus consequuntur! Non.</p>
            </div>
        </div>
    </article>
<div>
     @include('blog.comments')
</div>

@endsection
