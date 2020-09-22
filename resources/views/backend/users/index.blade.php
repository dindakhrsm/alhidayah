@extends('layouts.backend.main')

@section('title', 'Al-Hidayah | User')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Daftar User
                <small>(Tampilan Semua User)</small>
            </h1>
            <ol class="breadcrumb">
               {{-- <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>--}}
                <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
                <li><a href="{{route('backend.users.index')}}">User</a></li>
                <li class="active"> Semua User</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="pull-left">
                                <a href="{{route('backend.users.create')}}" class="btn btn-success"> Tambah Baru </a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body ">
                           @include('backend.users.message')

                            @if(! $users->count())
                            <div class="alert alert-danger">
                               <strong>No Record Found !</strong>
                            </div>
                            @else
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <td width="80">Action</td>
                                    <td>Nama</td>
                                    <td>E-mail</td>
                                 {{--   <td>Role</td>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>
                                        {!! Form::open(['method'=>'DELETE', 'route'=>['backend.users.destroy', $user->id]]) !!}
                                        <a href="{{ route('backend.users.edit', $user->id) }}" class="btn btn-xs btn-default">
                                        <i class="fa fa-edit"></i>
                                        </a>
                                        @if($user->id == config('cms.default_user_id'))
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
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td></td>

                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                                @endif
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <div class="pull-left">
                                {{$users->render()}}
                            </div>
                            <div class="pull-right">

                                <small>{{ $usersCount }} {{str_plural('Item', $usersCount)}}</small>
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


