
                            <div class="form-group {{ $errors->has('judul_video') ? 'has-error' : '' }}">
                                {!!Form::label('judul_video', 'Judul')  !!}
                                {!! Form::text('judul_video', null, ['class'=> 'form-control']) !!}
                                @if($errors->has('judul_video'))
                                    <span class="help-block"> {{ $errors->first('judul_video') }}</span>
                                @endif
                            </div>


                            <div class="form-group excerpt">
                                {!! Form::label('ket_video', 'Keterangan') !!}
                                {!! Form::text('ket_video', null, ['class'=> 'form-control']) !!}
                                @if($errors->has('ket_video'))
                                    <span class="help-block"> {{ $errors->first('ket_video') }}</span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('video') ? 'has-error' : '' }}">
                                {!! Form::label('video', 'URL Video') !!}
                                {!! Form::text('video', null, ['class'=> 'form-control']) !!}
                                @if($errors->has('video'))
                                    <span class="help-block"> {{ $errors->first('video') }}</span>
                                @endif
                            </div>





                            <hr>
                            {!! Form::submit('Simpan', ['class'=> 'btn btn-primary']) !!}
