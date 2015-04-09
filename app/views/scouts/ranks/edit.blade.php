@section('main')

    <div class="row">
        <h2>{{ $page_title or "Rank Advancement History for " . $person->first_name . ' ' . $person->last_name }}</h2>
    </div>

        {{ Form::model(new Person, array('route' => ['persons.store'], 'role' => 'form', 'class' => 'form-horizontal')) }}
            {{ Form::hidden('class_name', $class_name) }}
            @include('persons/partials/_form', array('submit_button_label' => 'Create'))
	{{ Form::close() }}

@stop
