@section('main')
    @if ( Auth::guest() )
    <div class="row">
        <div class="col-md-6">&nbsp;
        </div>
        <div class="col-md-4 div-grey">
             <h4>If you already have an account, please
             {{ link_to_route('login', 'click here') }}
             to log in.
             </h4>
        </div>
    </div>
    @endif
    <div class="row">
        <h2>{{ $page_title or "Create " . $class_name }}</h2>
    </div>

        {{ Form::model(new Person, array('route' => ['persons.store'], 'role' => 'form', 'class' => 'form-horizontal')) }}
            {{ Form::hidden('person_class_name', $class_name) }}
            @include('persons/partials/_form', array('submit_button_label' => 'Create'))
	{{ Form::close() }}

@stop
