@extends('layouts.backend.main')

@section('title', 'Al-Hidayah | Tambah Kategori')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Kategori
                <small>Tambah Kategori Baru</small>
            </h1>
            <ol class="breadcrumb">
                {{-- <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>--}}
                <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
                <li><a href="{{route('backend.categories.index')}}">Kategori</a></li>
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
                          {!! Form::model($category, [
                         'method'=> 'POST',
                         'route' => 'backend.categories.store',
                         'files' => TRUE,
                         'id' => 'category-form'
]                       )!!}
                            @include('backend.categories.form')
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

@include('backend.categories.script')
