
                            <div class="form-group {{ $errors->has('judul_gambar') ? 'has-error' : '' }}">
                                {!!Form::label('judul_gambar', 'Judul')  !!}
                                {!! Form::text('judul_gambar', null, ['class'=> 'form-control']) !!}
                                @if($errors->has('judul_gambar'))
                                    <span class="help-block"> {{ $errors->first('judul_gambar') }}</span>
                                @endif
                            </div>


                            <div class="form-group {{ $errors->has('ket_gambar') ? 'has-error' : '' }}">
                                {!! Form::label('ket_gambar', 'Keterangan Gambar') !!}
                                {!! Form::text('ket_gambar', null, ['class'=> 'form-control']) !!}
                                @if($errors->has('ket_gambar'))
                                    <span class="help-block"> {{ $errors->first('ket_gambar') }}</span>
                                @endif
                            </div>



                            <div class="form-group {{ $errors->has('imagecategory_id') ? 'has-error' : '' }}">
                                {!! Form::label('imagecategory_id', 'Kategori gambar') !!}
                                {!! Form::select('imagecategory_id', App\Imagecategory::pluck('nama_kategori', 'id'), null, ['class'=> 'form-control', 'placeholder'=>'Pilih Kategori']) !!}
                                @if($errors->has('imagecategory_id'))
                                    <span class="help-block"> {{ $errors->first('imagecategory_id') }}</span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                {!! Form::label('image', 'Upload Foto') !!}
                                <br>

                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="{{($image->image_url) ? $image->image_url : 'http://placehold.it/200x150&txt=No+Image'}}"  alt="...">
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
