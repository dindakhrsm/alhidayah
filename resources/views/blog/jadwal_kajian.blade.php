@extends('layouts.main_full')

@section('title')
    <h1> <b>Jadwal Kajian</b></h1><br>
@endsection

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body ">
                        @include('backend.jadwalkajian.message')

                        @if(! $posts->count())
                            <div class="alert alert-danger">
                                <strong>No Record Found !</strong>
                            </div>
                        @else
                            <table class="table table-bordered table-striped" style="border:2px inset grey">
                                <thead>
                                <tr style="border:2px inset grey">
                                    <td width="80" style="border:2px inset grey"><b>Hari</b></td>
                                    <td width="80" style="border:2px inset grey"><b>Tanggal</b></td>
                                    <td width="80" style="border:2px inset grey"><b>Jam</b></td>
                                    <td width="80" style="border:2px inset grey"><b>Tempat</b></td>
                                    <td width="80" style="border:2px inset grey"><b>Narasumber</b></td>
                                    <td width="120" style="border:2px inset grey"><b>Tema</b></td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr style="border:2px inset grey">
                                        <td style="border:2px inset grey">{{$post->hari}}</td>
                                        <td style="border:2px inset grey">{{$post->tanggal}}</td>
                                        <td style="border:2px inset grey">{{$post->jam}}</td>
                                        <td style="border:2px inset grey">{{$post->tempat}}</td>
                                        <td style="border:2px inset grey">{{$post->narasumber}}</td>
                                        <td style="border:2px inset grey">{{$post->tema}}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <div class="pull-left">
                            {{--  <ul class="pagination no-margin">
                                  <li><a href="#">&laquo;</a></li>
                                  <li><a href="#">1</a></li>
                                  <li><a href="#">2</a></li>
                                  <li><a href="#">3</a></li>
                                  <li><a href="#">&raquo;</a></li>
                              </ul>--}}
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

@endsection
