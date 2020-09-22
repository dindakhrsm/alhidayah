
{{--}}
<div class="container">

    <div class="content-wrapper">
        <div class="row  justify-content-center">

            <section class="content">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Tambah Kategori
                        <a href="{{ url('/kategoritransaksi') }}" class="float-right btn btn-sm btn-primary">Kembali</a>
                    </div>

                    <div class="card-body">

                       <form method="post" action="{{ url('/kategoritransaksi/aksi') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Nama Kategori Baru</label>
                                <input type="text" name="kategori" class="form-control">
                                @if($errors->has('kategori'))
                                    <span class="text-danger"><strong>{{ $errors->first('kategori') }}</strong></span>
                                @endif
                            </div>
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </form>


                    </div>
                </div>
            </div>
            </section>
        </div>
    </div>
</div>
@endsection--}}

@extends('layouts.backend.main')

@section('title', 'Al-Hidayah | Kategori transaksi')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Kategori Transaksi
                <small>Tambah Kategori Baru</small>
            </h1>

            <ol class="breadcrumb">
                {{-- <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>--}}
                <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
                <li><a href="{{url('/kategoritransaksi')}}">Kategori Transaksi</a></li>
                <li class="active"> Tambah Baru</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body ">

                            {!! Form::model($kategoritransaksi, [
                           'method'=> 'POST',
                           'route' => 'blog.kategorikeuangan.aksi',
                           'files' => TRUE,
                           'id' => 'kategoritransaksi-form'])!!}

                            @include('form')

                            {!! Form::close() !!}

                        </div>

                        <!-- /.box-body -->


                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- ./row -->
        </section>

        <!-- /.content -->
    </div>
@endsection



