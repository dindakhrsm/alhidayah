
                            <div class="form-group {{ $errors->has('tanggal') ? 'has-error' : '' }}">
                                {!!Form::label('tanggal', 'Tanggal')  !!}
                                {!! Form::date('tanggal', null, ['class'=> 'form-control']) !!}
                                @if($errors->has('tanggal'))
                                    <span class="help-block"> {{ $errors->first('tanggal') }}</span>
                                @endif
                            </div>


                            <div class="form-group {{ $errors->has('imam') ? 'has-error' : '' }}">
                                {!! Form::label('imam', 'Imam') !!}
                                {!! Form::text('imam', null, ['class'=> 'form-control']) !!}
                                @if($errors->has('imam'))
                                    <span class="help-block"> {{ $errors->first('imam') }}</span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('khotib') ? 'has-error' : '' }}">
                                {!! Form::label('khotib', 'Khotib') !!}
                                {!! Form::text('khotib', null, ['class'=> 'form-control']) !!}
                                @if($errors->has('khotib'))
                                    <span class="help-block"> {{ $errors->first('khotib') }}</span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('keterangan') ? 'has-error' : '' }}">
                                {!! Form::label('keterangan', 'Keterangan') !!}
                                {!! Form::text('keterangan', null, ['class'=> 'form-control']) !!}
                                @if($errors->has('keterangan'))
                                    <span class="help-block"> {{ $errors->first('keterangan') }}</span>
                                @endif
                            </div>


                        {{--    <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                {!! Form::label('image', 'Feature Image') !!}
                                <br>

                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="{{($post->image_url) ? $post->image_url : 'http://placehold.it/200x150&txt=No+Image'}}"  alt="...">
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
                            </div>--}}

                            <hr>
                            {!! Form::submit('Simpan', ['class'=> 'btn btn-primary']) !!}
