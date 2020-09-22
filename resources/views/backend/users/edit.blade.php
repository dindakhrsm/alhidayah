@extends('layouts.backend.main')

@section('title', 'Al-Hidayah | Edit User')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User
                <small>Edit User</small>
            </h1>
            <ol class="breadcrumb">
                {{-- <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>--}}
                <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
                <li><a href="{{route('backend.users.index')}}">User</a></li>
                <li class="active"> Edit User </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">

                        <!-- /.box-header -->
                        <div class="box-body ">
                            {!! Form::model($user, [
                           'method'=> 'PUT',
                           'route' => ['backend.users.update', $user->id],
                           'files' => TRUE
  ]                       )!!}
                            @include('backend.users.form')
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

@include('backend.users.script')
