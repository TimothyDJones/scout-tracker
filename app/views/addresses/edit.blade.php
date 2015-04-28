@section('main')
	<h2>{{ $heading or 'Edit Address' }}</h2>
        
        <div class="row">
            <h3>This address is currently used for these individuals:</h3>
            @foreach ( $address->persons as $person )
            <p>
                {{ $person->full_name }} ({{ $person->person_class_name }})
            </p>
            @endforeach            
        </div>



        {{ Form::model($address, array('method' => 'PATCH', 'route' => array('addresses.update', $address->id), 'role' => 'form', 'class' => 'form-horizontal')) }}
            @include('addresses/partials/_form', array('submit_button_text' => 'Update'))
	{{ Form::close() }}
@stop
