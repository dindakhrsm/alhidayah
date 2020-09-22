
<div class="form-group {{ $errors->has('nama_kategori') ? 'has-error' : '' }}">
    {!!Form::label('nama_kategori', 'Judul Kategori Foto')  !!}
    {!! Form::text('nama_kategori', null, ['class'=> 'form-control']) !!}
    @if($errors->has('nama_kategori'))
        <span class="help-block"> {{ $errors->first('nama_kategori') }}</span>
    @endif
</div>

<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
    {!! Form::label('slug') !!}
    {!! Form::text('slug', null, ['class'=> 'form-control']) !!}
    @if($errors->has('slug'))
        <span class="help-block"> {{ $errors->first('slug') }}</span>
    @endif
</div>
{{--
{!! Form::submit('Simpan', ['class'=> 'btn btn-primary']) !!}--}}
<div class="box-footer">
    <button type="submit" class="btn btn-primary">{{ $category->exists ? 'Update' : 'Save' }}</button>
    <a href="{{route('backend.kategorigaleri.index')}}" class="btn btn-default">Cancel</a>
</div>
