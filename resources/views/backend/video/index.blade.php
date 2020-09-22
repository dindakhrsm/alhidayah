@extends('layouts.backend.main')

@section('title', 'Al-Hidayah | Daftar Video')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Daftar Konten
                <small>(Tampilan Semua Video)</small>
            </h1>
            <ol class="breadcrumb">
               {{-- <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>--}}
                <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
                <li><a href="{{route('backend.video.index')}}">Video</a></li>
                <li class="active"> Semua Video</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="pull-left">
                                <a href="{{route('backend.video.create')}}" class="btn btn-success"> Tambah Baru </a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body ">
                           @include('backend.video.message')

                            @if(! $videos->count())
                            <div class="alert alert-danger">
                               <strong>No Record Found !</strong>
                            </div>
                            @else
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <td width="50">Action</td>
                                    <td width="150">Judul</td>
                                    <td width="120">Keterangan</td>
                                    <td width="120">Video</td>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($videos as $video)
                                <tr>
                                    <td>
                                        {!! Form::open(['method'=>'DELETE', 'route'=>['backend.video.destroy', $video->id]]) !!}
                                        <a href="{{ route('backend.video.edit', $video->id) }}" class="btn btn-xs btn-default">
                                        <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="submit" class="btn btn-xs btn-danger">
                                        <i class="fa fa-times"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                    <td>{{$video->judul_video}}</td>
                                    <td>{{$video->ket_video}}</td>
                                    <td>{{$video->video}}</td>
                                  {{--  <td>{{$post->created_at}}</td>--}}
                                   {{-- <td>
                                        <abbr title="{{ $video->dateFormatted(true) }}"> {{ $video->dateFormatted() }}</abbr>
                                        &nbsp;|
                                        --}}{{--<span class="label label-success">Published</span>--}}{{--
                                        {!! $video->publicationLabel()  !!}
                                    </td>--}}
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                                @endif
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <div class="pull-left">
                          {{--  <ul class="pagination no-margin">
                                <li><a href="#">&laquo;</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">&raquo;</a></li>
                            </ul>--}}
                                {{$videos->render()}}
                            </div>
                            <div class="pull-right">

                                <small>{{ $videoCount }} {{str_plural('Item', $videoCount)}}</small>
                            </div>
                        </div>

                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>

@endsection


