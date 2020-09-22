@extends('layouts.backend.main')

@section('title', 'Al-Hidayah | Edit Jadwal Jumat')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Konten
                <small>Edit Jadwal Jumatan</small>
            </h1>
            <ol class="breadcrumb">
                {{-- <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>--}}
                <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
                <li><a href="{{route('backend.jadwaljumatan.index')}}">Jadwal Jumatan</a></li>
                <li class="active"> Edit Jadwal Jumatan</li>
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
                           'method'=> 'PUT',
                           'route' => ['backend.jadwaljumatan.update', $post->id],
                           'files' => TRUE
  ]                       )!!}

                            {{--  <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                  {!!Form::label('title', 'Judul')  !!}
                                  {!! Form::text('title', null, ['class'=> 'form-control']) !!}
                                  @if($errors->has('title'))
                                      <span class="help-block"> {{ $errors->first('title') }}</span>
                                      @endif
                              </div>

                              <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                                  {!! Form::label('slug') !!}
                                  {!! Form::text('slug', null, ['class'=> 'form-control']) !!}
                              </div>

                              <div class="form-group excerpt">
                                  {!! Form::label('excerpt', 'Ringkasan') !!}
                                  {!! Form::textarea('excerpt', null, ['class'=> 'form-control']) !!}
                                  @if($errors->has('excerpt'))
                                      <span class="help-block"> {{ $errors->first('excerpt') }}</span>
                                  @endif
                              </div>

                              <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                                  {!! Form::label('body', 'Isi') !!}
                                  {!! Form::textarea('body', null, ['class'=> 'form-control']) !!}
                                  @if($errors->has('body'))
                                      <span class="help-block"> {{ $errors->first('body') }}</span>
                                  @endif
                              </div>

                              <div class="form-group {{ $errors->has('published_at') ? 'has-error' : '' }}">
                                  {!! Form::label('published_at', 'Tanggal Publikasi') !!}
                                  <div class='input-group date' id='datetimepicker1'>
                                      {!! Form::text('published_at', null, ['class'=> 'form-control', 'placeholder'=>'Y-m-d H:i:s']) !!}
                                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                                  </div>
                                  @if($errors->has('published_at'))
                                      <span class="help-block"> {{ $errors->first('published_at') }}</span>
                                  @endif
                              </div>

                              <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                                  {!! Form::label('category_id', 'Kategori') !!}
                                  {!! Form::select('category_id', App\Category::pluck('title', 'id'), null, ['class'=> 'form-control', 'placeholder'=>'Pilih Kategori']) !!}
                                  @if($errors->has('category_id'))
                                      <span class="help-block"> {{ $errors->first('category_id') }}</span>
                                  @endif
                              </div>

                              <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                  {!! Form::label('image', 'Feature Image') !!}
                                  <br>

                                  <div class="fileinput fileinput-new" data-provides="fileinput">
                                      <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                          <img src="http://placehold.it/200x150&txt=No+Image"  alt="...">
                                      </div>
                                      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                      <br>
                                      <div>
                                          <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span> <span class="fileinput-exists">Change</span> {!! Form::file('image')  !!} </span>
                                          <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                      </div>
                                  </div>
                                  @if($errors->has('image'))
                                      <span class="help-block"> {{ $errors->first('image') }}</span>
                                  @endif
                              </div>

                              <hr>
                              {!! Form::submit('Simpan', ['class'=> 'btn btn-primary']) !!}--}}
                            @include('backend.jadwaljumatan.form')
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

@include('backend.jadwaljumatan.script')
