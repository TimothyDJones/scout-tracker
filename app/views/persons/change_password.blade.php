@section('main')
        <h2>Change Password for {{ $person->first_name }}&nbsp;{{ $person->last_name }} ({{ $person->email_address }})</h2>

        {{ Form::model($person, array('method' => 'PATCH', 'route' => array('persons.updatePassword', $person->id), 'role' => 'form', 'class' => 'form-horizontal')) }}
            {{ Form::hidden('class_name', $person->class_name) }}
            {{ Form::hidden('email_address', $person->email_address) }}
            <div class="col-md-9 col-xs-9">
                <div class="form-group floating-label-form-group">
                    {{ Form::label('old_password', 'Old (Current) Password', array('class' => 'control-label control-label-reqd col-xs-5')) }}
                    <div class="input-group col-xs-6">
                        <!--<span class="hovertext">Enter a password.  Choose something easy for you to remember, but difficult for others to guess.  Your password is encrypted before it is stored.<div class="triangle"></div></span> -->
                        <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                        {{ Form::password('old_password', array('class' => 'form-control input-sm input-sm-reqd floatlabel', 'placeholder' => 'Old (Current) Password')) }}
                    </div>
                </div>
            
                <div class="form-group floating-label-form-group">
                    {{ Form::label('password', 'New Password', array('class' => 'control-label control-label-reqd col-xs-5')) }}
                    <div class="input-group col-xs-6">
                        <!--<span class="hovertext">Enter a password.  Choose something easy for you to remember, but difficult for others to guess.  Your password is encrypted before it is stored.<div class="triangle"></div></span> -->
                        <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                        {{ Form::password('password', array('class' => 'form-control input-sm input-sm-reqd floatlabel', 'placeholder' => 'New Password')) }}
                    </div>
                </div>
                
                <div class="form-group floating-label-form-group">
                    {{ Form::label('password_confirmation', 'Confirm New Password', array('class' => 'control-label control-label-reqd col-xs-5')) }}
                    <div class="input-group col-xs-6">
                        <!--<span class="hovertext">Re-enter the password from the 'Password' field.<div class="triangle"></div></span> -->
                        <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                        {{ Form::password('password_confirmation', array('class' => 'form-control input-sm input-sm-reqd floatlabel', 'placeholder' => 'Confirm New Password')) }}
                    </div>
                </div>
                {{ Form::submit($submit_button_label, array('class' => 'btn btn-primary pull-right')) }}
            </div>
	{{ Form::close() }}

@stop
