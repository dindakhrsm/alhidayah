@extends('layouts.backend.main')

@section('title', 'Al-Hidayah | Edit Foto')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Konten
                <small>Edit Postingan</small>
            </h1>
            <ol class="breadcrumb">
                {{-- <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>--}}
                <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
                <li><a href="{{route('backend.galeri.index')}}">Foto Galeri</a></li>
                <li class="active"> Edit Galeri </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">

                        <!-- /.box-header -->
                        <div class="box-body ">
                            {!! Form::model($image, [
                           'method'=> 'PUT',
                           'route' => ['backend.galeri.update', $image->id],
                           'files' => TRUE
  ]                       )!!}


                            @include('backend.galeri.form')
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

@include('backend.galeri.script')
