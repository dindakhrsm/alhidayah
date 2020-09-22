@extends('layouts.backend.main')

@section('title', 'Al-Hidayah | Halaman Jadwal Jumatan')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Halaman Jadwal Jumat
                <small>(Tampilan Jadwal Jumat)</small>
            </h1>
            <ol class="breadcrumb">
               {{-- <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>--}}
                <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
                <li><a href="{{route('backend.jadwaljumatan.index')}}">Jadwal Jumat</a></li>
                <li class="active"> Konten Jumat </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="pull-left">
                                <a href="{{route('backend.jadwaljumatan.create')}}" class="btn btn-success"> Tambah Baru </a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body ">
                           @include('backend.jadwaljumatan.message')

                            @if(! $posts->count())
                            <div class="alert alert-danger">
                               <strong>No Record Found !</strong>
                            </div>
                            @else
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <td width="80">Action</td>
                                    <td width="80">Tanggal</td>
                                    <td width="80">Imam</td>
                                    <td width="80">Khotib</td>
                                    <td width="120">Keterangan</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                <tr>
                                    <td>
                                        {!! Form::open(['method'=>'DELETE', 'route'=>['backend.jadwaljumatan.destroy', $post->id]]) !!}
                                       <a href="{{ route('backend.jadwaljumatan.edit', $post->id) }}" class="btn btn-xs btn-default">
                                        <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="submit" class="btn btn-xs btn-danger">
                                        <i class="fa fa-times"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                    <td>{{$post->tanggal}}</td>
                                   {{-- <td>{{$post->author->name}}</td>--}}
                                    <td>{{$post->imam}}</td>
                                    <td>{{$post->khotib}}</td>
                                    <td>{{$post->keterangan}}</td>
                                  {{--  <td>{{$post->created_at}}</td>--}}
                                  {{--  <td>
                                        <abbr title="{{ $post->dateFormatted(true) }}"> {{ $post->dateFormatted() }}</abbr>
                                        &nbsp;|
                                        --}}{{--<span class="label label-success">Published</span>--}}{{--
                                        {!! $post->publicationLabel()  !!}
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
                                {{$posts->render()}}
                            </div>
                            <div class="pull-right">

                                <small>{{ $postCount }} {{str_plural('Item', $postCount)}}</small>
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


