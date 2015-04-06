@section('main')
    <h2>Log In To Your Account</h2>
    <p>&nbsp;</p>
    {{ Form::open(array('action' => 'PersonsController@authenticate')) }}
        {{ Form::label('email_address', 'E-mail Address:') }}
        {{ Form::text('email_address', null, array('placeholder' => 'E-mail Address')) }}
        {{ Form::label('password', 'Password:') }}
        {{ Form::password('password', null, array('placeholder' => 'Password')) }}
        {{ Form::submit('Log In', array('class' => 'btn btn-primary btn-sm')) }}
    {{ Form::close() }}
@stop