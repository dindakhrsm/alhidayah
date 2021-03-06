<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
    {!!Form::label('username', 'Username')  !!}
    {!! Form::text('username', null, ['class'=> 'form-control']) !!}
    @if($errors->has('username'))
        <span class="help-block"> {{ $errors->first('username') }}</span>
    @endif
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {!!Form::label('name', 'Nama')  !!}
    {!! Form::text('name', null, ['class'=> 'form-control']) !!}
    @if($errors->has('name'))
        <span class="help-block"> {{ $errors->first('name') }}</span>
    @endif
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    {!! Form::label('email') !!}
    {!! Form::text('email', null, ['class'=> 'form-control']) !!}
    @if($errors->has('email'))
        <span class="help-block"> {{ $errors->first('email') }}</span>
    @endif
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    {!! Form::label('password') !!}
    {!! Form::password('password', ['class'=> 'form-control']) !!}
    @if($errors->has('password'))
        <span class="help-block"> {{ $errors->first('password') }}</span>
    @endif
</div>

<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
    {!! Form::label('password_confirmation') !!}
    {!! Form::password('password_confirmation', ['class'=> 'form-control']) !!}
    @if($errors->has('password_confirmation'))
        <span class="help-block"> {{ $errors->first('password_confirmation') }}</span>
    @endif
</div>

<div class="form-group">
    <strong>Peran</strong>
    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
    </div>
</div>
{{--
{!! Form::submit('Simpan', ['class'=> 'btn btn-primary']) !!}--}}
<div class="box-footer">
    <button type="submit" class="btn btn-primary">{{ $user->exists ? 'Update' : 'Save' }}</button>
    <a href="{{route('backend.users.index')}}" class="btn btn-default">Cancel</a>
</div>