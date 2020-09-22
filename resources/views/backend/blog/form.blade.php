
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
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

{{--                                <textarea id="editor1" name="editor1" rows="10" cols="80">--}}
{{--                                            This is my textarea to be replaced with CKEditor.--}}
{{--                    </textarea>--}}

{{--                                <textarea id="konten" class="form-control" name="konten" rows="10" cols="50"></textarea>--}}
{{----}}
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
{{--                            <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>--}}
{{--                            <script>--}}
{{--                                var konten = document.getElementById("konten");--}}
{{--                                CKEDITOR.replace(konten,{--}}
{{--                                    language:'en-gb'--}}
{{--                                });--}}
{{--                                CKEDITOR.config.allowedContent = true;--}}
{{--                            </script>--}}
