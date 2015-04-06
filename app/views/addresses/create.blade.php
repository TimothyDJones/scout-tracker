@section('main')
	<h2>{{ $heading or 'Create Address' }}</h2>
        {{ Form::model(new Address, array('route' => array('addresses.store', $customer->id), 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal')) }}
            @include('addresses/partials/_form', array('submit_button_text' => 'Submit'))
	{{ Form::close() }}
        </div>
@stop
