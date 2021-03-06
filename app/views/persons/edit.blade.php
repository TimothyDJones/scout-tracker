@section('main')
	<h2>{{ $page_title or "Edit Scout" }}</h2>

        {{ Form::model($person, array('method' => 'PATCH', 'route' => array('persons.update', $person->id), 'role' => 'form', 'class' => 'form-horizontal')) }}
            {{ Form::hidden('person_class_name', $person->person_class_name) }}
            @include('persons/partials/_form', array('submit_button_label' => 'Update'))
	{{ Form::close() }}

@stop
