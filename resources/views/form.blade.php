
<div class="form-group {{ $errors->has('kategori') ? 'has-error' : '' }}">
    {!!Form::label('kategori', 'Nama Kategori ')  !!}
    {!! Form::text('kategori', null, ['class'=> 'form-control']) !!}
    @if($errors->has('kategori'))
        <span class="help-block"> {{ $errors->first('kategori') }}</span>
    @endif
</div>

{{--
{!! Form::submit('Simpan', ['class'=> 'btn btn-primary']) !!}--}}
<div class="box-footer">
    <button type="submit" class="btn btn-primary">{{ $kategoritransaksi->exists ? 'Update' : 'Save' }}</button>
    <a href="{{url('kategoritransaksi')}}" class="btn btn-default">Cancel</a>
</div>