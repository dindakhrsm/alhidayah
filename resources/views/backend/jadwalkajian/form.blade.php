<div class="form-group {{ $errors->has('hari') ? 'has-error' : '' }}">
    {!! Form::label('hari', 'Hari') !!}
    {!! Form::text('hari', null, ['class'=> 'form-control']) !!}
    @if($errors->has('hari'))
        <span class="help-block"> {{ $errors->first('hari') }}</span>
    @endif
</div>


<div class="form-group {{ $errors->has('tanggal') ? 'has-error' : '' }}">
    {!!Form::label('tanggal', 'Tanggal')  !!}
    {!! Form::date('tanggal', null, ['class'=> 'form-control']) !!}
    @if($errors->has('tanggal'))
        <span class="help-block"> {{ $errors->first('tanggal') }}</span>
    @endif
</div>


<div class="form-group {{ $errors->has('jam') ? 'has-error' : '' }}">
    {!! Form::label('jam', 'Jam') !!}
    {!! Form::text('jam', null, ['class'=> 'form-control']) !!}
    @if($errors->has('jam'))
        <span class="help-block"> {{ $errors->first('jam') }}</span>
    @endif
</div>

<div class="form-group {{ $errors->has('tempat') ? 'has-error' : '' }}">
    {!! Form::label('tempat', 'Tempat') !!}
    {!! Form::text('tempat', null, ['class'=> 'form-control']) !!}
    @if($errors->has('tempat'))
        <span class="help-block"> {{ $errors->first('tempat') }}</span>
    @endif
</div>

<div class="form-group {{ $errors->has('narasumber') ? 'has-error' : '' }}">
    {!! Form::label('narasumber', 'Narasumber') !!}
    {!! Form::text('narasumber', null, ['class'=> 'form-control']) !!}
    @if($errors->has('narasumber'))
        <span class="help-block"> {{ $errors->first('narasumber') }}</span>
    @endif
</div>

<div class="form-group {{ $errors->has('tema') ? 'has-error' : '' }}">
    {!! Form::label('tema', 'Tema') !!}
    {!! Form::text('tema', null, ['class'=> 'form-control']) !!}
    @if($errors->has('tema'))
        <span class="help-block"> {{ $errors->first('tema') }}</span>
    @endif
</div>



<hr>
{!! Form::submit('Simpan', ['class'=> 'btn btn-primary']) !!}
