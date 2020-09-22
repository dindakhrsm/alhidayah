@extends('layouts.backend.main')

@section('title', 'Al-Hidayah | Dashboard')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body ">
                        <h3>Selamat Datang di Dashboard!</h3>
                        <p class="lead text-muted">Assalamu'alaikum {{Auth::user()->name}}, Selamat Datang di Dashboard</p>

                        <h4>Tambah Konten</h4>
                        {{-- <p><a href="#" class="btn btn-primary">Tulis postingan di sini</a> </p> --}}
                        <p><a href="{{route('backend.blog.create')}}" class="btn btn-primary">Tulis postingan di sini</a> </p>
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


