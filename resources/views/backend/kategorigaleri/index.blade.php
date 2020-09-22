@extends('layouts.backend.main')

@section('title', 'Al-Hidayah | Kategori Foto')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Daftar Kategori Foto
                <small>(Tampilan Semua Kategori Foto)</small>
            </h1>
            <ol class="breadcrumb">
                {{-- <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>--}}
                <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
                <li><a href="{{route('backend.kategorigaleri.index')}}">Kategori Gambar</a></li>
                <li class="active"> Semua Kategori Gambar</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="pull-left">
                                <a href="{{route('backend.kategorigaleri.create')}}" class="btn btn-success"> Tambah Baru </a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body ">
                            @include('backend.kategorigaleri.message')

                            @if(! $categories->count())
                                <div class="alert alert-danger">
                                    <strong>No Record Found !</strong>
                                </div>
                            @else
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <td width="80">Action</td>
                                        <td>Nama Kategori Galeri</td>
                                        <td width="120">Jumlah Foto</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>
                                                {!! Form::open(['method'=>'DELETE', 'route'=>['backend.kategorigaleri.destroy', $category->id]]) !!}
                                                <a href="{{ route('backend.kategorigaleri.edit', $category->id) }}" class="btn btn-xs btn-default">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                @if($category->id == config('cms.default_category_id'))
                                                    <button onclick="return false"  type="submit" class="btn btn-xs btn-danger disabled">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                @else
                                                    <button onclick="return confirm('Apakah Anda Yakin?');"  type="submit" class="btn btn-xs btn-danger">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                @endif

                                                {!! Form::close() !!}
                                            </td>
                                            <td>{{$category->nama_kategori}}</td>
                                            <td>{{$category->images->count()}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <div class="pull-left">

                                {{$categories->render()}}
                            </div>
                            <div class="pull-right">

                                <small>{{ $categoriesCount }} {{str_plural('Item', $categoriesCount)}}</small>
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


