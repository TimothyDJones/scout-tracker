@section('main')
    <div class="row">
        <div class="col-md-10">
            <h2>Profile for {{ $person->first_name }}&nbsp;{{ $person->last_name }} ({{ $person->class_name }})</h2>
        </div>
        <div class="col-md-2">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h3>Account Details</h3>
            <p>{{ $person->first_name }} {{ $person->last_name }}</p>
            <p>{{ $person->email_address }}</p>
            <p>{{ $person->primary_phone }}</p>
            @if ( $person->secondary_phone )
            <p>{{ $person->secondary_phone }}</p>
            @endif
            
            @if ( Auth::check() && ( Auth::user()->admin_ind > 0 || Auth::id() == $person->id ) )
            {{ link_to_route('persons.edit', 'Edit', $person->id, array('class' => 'btn btn-info')) }}
            @endif
        </div>
        @if ( !is_null($person->address) )
        <div class="col-md-4">
            <h3>Address Details</h3>
            <p>{{ $person->address->addr1 }}</p>
            @if ( $person->address->addr2 )
            <p>{{ $person->address->addr2 }}</p>
            @endif
            <p>{{ $person->address->city }}, {{ $person->address->state }} {{ $person->address->postal_code }} {{ $person->address->country }}</p>
            
            @if ( Auth::check() && ( Auth::user()->admin_ind > 0 || Auth::id() == $person->id ) )
            {{ link_to_route('addresses.edit',
                        'Edit', array('id' => $person->address->id), array('class' => 'btn btn-info')) }}
            @endif            
        </div>
        @endif
        <div class="col-md-4">
            <h2>Other details (TBD)</h2>
        </div>
    </div>
@stop

