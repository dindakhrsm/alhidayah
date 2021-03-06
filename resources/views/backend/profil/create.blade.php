@extends('layouts.backend.main')

@section('title', 'Al-Hidayah | Tambah Baru')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Konten
                <small>Profil</small>
            </h1>
            <ol class="breadcrumb">
                {{-- <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>--}}
                <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
                <li><a href="{{route('backend.profil.index')}}">Profil</a></li>
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
                          {!! Form::model($post, [
                         'method'=> 'POST',
                         'route' => 'backend.profil.store',
                         'files' => TRUE
]                       )!!}

                            @include('backend.profil.form')
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

@include('backend.profil.script')
