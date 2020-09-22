@extends('layouts.main_full')

@section('title')
    <h1> <b>Jadwal Jumatan</b></h1><br>
@endsection

@section('content')

{{--   <div class="container">
       <h2>Jadwal Jumatan</h2>
       <p>Jadwal jumatan masjid Al-Hidayah</p>
       <table class="table table-bordered" style="border:2px inset grey">
           <thead>
           <tr style="border:2px inset grey">
               <th style="border:2px inset grey">Tanggal</th>
               <th style="border:2px inset grey">Imam</th>
               <th style="border:2px inset grey">Khotib</th>
               <th style="border:2px inset grey">Keterangan</th>
           </tr>
           </thead>
           <tbody>
           <tr style="border:2px inset grey">
               <td style="border:2px inset grey">16012020</td>
               <td style="border:2px inset grey">Ust..</td>
               <td style="border:2px inset grey">Ust..</td>
               <td style="border:2px inset grey">....</td>
           </tr>
           <tr>
               <td style="border:2px inset grey">16012020</td>
               <td style="border:2px inset grey">Ust..</td>
               <td style="border:2px inset grey">Ust..</td>
               <td style="border:2px inset grey">....</td>
           </tr>
           <tr>
               <td style="border:2px inset grey">16012020</td>
               <td style="border:2px inset grey">Ust..</td>
               <td style="border:2px inset grey">Ust..</td>
               <td style="border:2px inset grey">....</td>
           </tr>
           </tbody>
       </table>
   </div>--}}
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <!-- /.box-header -->
                <div class="box-body ">
                    @include('backend.jadwaljumatan.message')

                    @if(! $posts->count())
                        <div class="alert alert-danger">
                            <strong>No Record Found !</strong>
                        </div>
                    @else
                        <table class="table table-bordered table-striped" style="border:2px inset grey">
                            <thead>
                            <tr style="border:2px inset grey">

                                <td width="80" style="border:2px inset grey"><b>Tanggal</b></td>
                                <td width="80" style="border:2px inset grey"><b>Imam</b></td>
                                <td width="80" style="border:2px inset grey"><b>Khotib</b></td>
                                <td width="120" style="border:2px inset grey"><b>Keterangan</b></td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr style="border:2px inset grey">
                                    <td style="border:2px inset grey">{{$post->tanggal}}</td>
                                    {{-- <td>{{$post->author->name}}</td>--}}
                                    <td style="border:2px inset grey">{{$post->imam}}</td>
                                    <td style="border:2px inset grey">{{$post->khotib}}</td>
                                    <td style="border:2px inset grey">{{$post->keterangan}}</td>
                                    {{--  <td>{{$post->created_at}}</td>--}}
                                    {{--  <td>
                                          <abbr title="{{ $post->dateFormatted(true) }}"> {{ $post->dateFormatted() }}</abbr>
                                          &nbsp;|
                                          --}}{{--<span class="label label-success">Published</span>--}}{{--
                                          {!! $post->publicationLabel()  !!}
                                      </td>--}}
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
