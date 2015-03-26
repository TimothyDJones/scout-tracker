@section('main')
	<h2>{{ $page_title or "Edit Scout" }}</h2>

        {{ Form::model($scout, array('method' => 'PATCH', 'route' => array('scouts.update', $customer->id), 'role' => 'form', 'class' => 'form-horizontal')) }}
            @include('scouts/partials/_form', array('submit_button_label' => 'Update'))
	{{ Form::close() }}

@stop
