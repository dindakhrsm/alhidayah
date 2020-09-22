@extends('layouts.backend.main')

@section('title', 'Al-Hidayah | Halaman Jadwal Kajian')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Halaman Jadwal Kajian
                <small>(Tampilan Jadwal Kajian)</small>
            </h1>
            <ol class="breadcrumb">
                {{-- <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>--}}
                <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
                <li><a href="{{route('backend.jadwalkajian.index')}}">Jadwal Kajian</a></li>
                <li class="active"> Konten Kajian </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="pull-left">
                                <a href="{{route('backend.jadwalkajian.create')}}" class="btn btn-success"> Tambah Baru </a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body ">
                            @include('backend.jadwalkajian.message')

                            @if(! $posts->count())
                                <div class="alert alert-danger">
                                    <strong>No Record Found !</strong>
                                </div>
                            @else
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <td width="80">Action</td>
                                        <td width="80">Hari</td>
                                        <td width="80">Tanggal</td>
                                        <td width="80">Jam</td>
                                        <td width="80">Tempat</td>
                                        <td width="80">Narasumber</td>
                                        <td width="80">Tema</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>
                                                {!! Form::open(['method'=>'DELETE', 'route'=>['backend.jadwalkajian.destroy', $post->id]]) !!}
                                                <a href="{{ route('backend.jadwalkajian.edit', $post->id) }}" class="btn btn-xs btn-default">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button type="submit" class="btn btn-xs btn-danger">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                                {!! Form::close() !!}
                                            </td>
                                            <td>{{$post->hari}}</td>
                                            <td>{{$post->tanggal}}</td>

                                            <td>{{$post->jam}}</td>
                                            <td>{{$post->tempat}}</td>
                                            <td>{{$post->narasumber}}</td>
                                            <td>{{$post->tema}}</td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <div class="pull-left">

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


