@section('main')

        <div class="row">
            <h3>{{ $address->addr1 }}</h3>
            <h3>{{ $address->addr2 or "***No 'addr2' data.***" }}</h3>
            <h3>{{ $address->city }}, {{ $address->state }} {{ $address->postal_code }}</h3>

            {{ link_to_route('addresses.edit', 'Edit', array('id' => $address->id), array('class' => 'btn btn-info')) }}
        </div>

        <div class="row">
            <h3>This address is currently used for these individuals:</h3>
            @foreach ( $address->persons as $person )
            <p>
                {{ $person->first_name }}&nbsp;{{ $person->last_name }} ({{ $person->class_name }})
            </p>
            @endforeach            
        </div>

@stop


