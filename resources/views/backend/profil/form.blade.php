
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                {!!Form::label('title', 'Judul Profil')  !!}
                                {!! Form::text('title', null, ['class'=> 'form-control']) !!}
                                @if($errors->has('title'))
                                    <span class="help-block"> {{ $errors->first('title') }}</span>
                                @endif
                            </div>


                            <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                                {!! Form::label('body', 'Isi') !!}
                                {!! Form::textarea('body', null, ['class'=> 'form-control']) !!}
                                @if($errors->has('body'))
                                    <span class="help-block"> {{ $errors->first('body') }}</span>
                                @endif
                            </div>


                            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
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
                            </div>

                            <hr>
                            {!! Form::submit('Simpan', ['class'=> 'btn btn-primary']) !!}
