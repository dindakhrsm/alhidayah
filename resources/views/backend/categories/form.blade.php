
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
                                @if($errors->has('title'))
                                    <span class="help-block"> {{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            {{--
                            {!! Form::submit('Simpan', ['class'=> 'btn btn-primary']) !!}--}}
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">{{ $category->exists ? 'Update' : 'Save' }}</button>
                                <a href="{{route('backend.categories.index')}}" class="btn btn-default">Cancel</a>
                            </div>