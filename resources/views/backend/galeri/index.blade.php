@extends('layouts.backend.main')

@section('title', 'Al-Hidayah | Daftar Foto')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Daftar Foto
                <small>(Tampilan Semua Foto)</small>
            </h1>
            <ol class="breadcrumb">
               {{-- <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>--}}
                <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
                <li><a href="{{route('backend.galeri.index')}}">Foto</a></li>
                <li class="active"> Semua Postingan</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="pull-left">
                                <a href="{{route('backend.galeri.create')}}" class="btn btn-success"> Tambah Baru </a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body ">
                           @include('backend.galeri.message')

                            @if(! $images->count())
                            <div class="alert alert-danger">
                               <strong>No Record Found !</strong>
                            </div>
                            @else
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <td width="50">Action</td>
                                    <td width="150">Judul Foto</td>
                                    <td width="120">Author</td>
                                    <td width="150">Kategori Foto</td>
                                    <td width="160">File Foto</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($images as $image)
                                <tr>
                                    <td>
                                        {!! Form::open(['method'=>'DELETE', 'route'=>['backend.galeri.destroy', $image->id]]) !!}
                                        <a href="{{ route('backend.galeri.edit', $image->id) }}" class="btn btn-xs btn-default">
                                        <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="submit" class="btn btn-xs btn-danger">
                                        <i class="fa fa-times"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                    <td>{{$image->judul_gambar}}</td>
                                    <td>{{$image->author->name}}</td>
                                    <td>{{$image->imagecategory->nama_kategori}}</td>

                                  {{--  <td>{{$post->created_at}}</td>--}}
                                    <td>{{$image->image}}
                                     {{--   <abbr title="{{ $image->dateFormatted(true) }}"> {{ $image->dateFormatted() }}</abbr>--}}

                                        {{--<span class="label label-success">Published</span>--}}
                                       {{-- {!! $image->publicationLabel()  !!}--}}
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                                @endif
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <div class="pull-left">

                                {{$images->render()}}
                            </div>
                            <div class="pull-right">

                                <small>{{ $imageCount }} {{str_plural('Item', $imageCount)}}</small>
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


