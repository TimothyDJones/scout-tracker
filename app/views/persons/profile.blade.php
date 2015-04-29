@section('main')
    <div class="row">
        <div class="col-md-10">
            <h2>Profile for {{ $person->full_name }} ({{ $person->person_class_name }})</h2>
        </div>
        <div class="col-md-2">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h3>Account Details</h3>
            <p>{{ $person->full_name }}</p>
            <p>{{ $person->email_address }}</p>
            <p>{{ $person->primary_phone }}</p>
            @if ( $person->secondary_phone )
            <p>{{ $person->secondary_phone }}</p>
            @endif
            
            @if ( Auth::check() && ( Auth::user()->admin_ind > 0 || Auth::id() == $person->id ) )
            {{ link_to_route('persons.edit', 'Edit', $person->id, array('class' => 'btn btn-info')) }}&nbsp;
            {{ link_to_route('changePassword', 'Change Password', array('person' => $person->id), array('class' => 'btn btn-primary')) }}
            @endif
        </div>
        
        <div class="col-md-4">
            <h3>Address Details</h3>
            @if ( !empty($person->address) )
            <p>{{ $person->address->addr1 }}</p>
            @if ( $person->address->addr2 )
            <p>{{ $person->address->addr2 }}</p>
            @endif
            <p>{{ $person->address->city }}, {{ $person->address->state }} {{ $person->address->postal_code }} {{ $person->address->country }}</p>
            
                @if ( Auth::check() && ( Auth::user()->admin_ind > 0 || Auth::id() == $person->id ) )
                {{ link_to_route('addresses.edit',
                            'Edit', array('id' => $person->address->id), array('class' => 'btn btn-info')) }}
                @endif
            @endif
        </div>
        
        <div class="col-md-4">
            <h3>Other details (TBD)</h3>
            @if ( !empty($scout->id) )
            {{ Kint::dump($scout) }}
            <p>Current Rank:  <strong>{{ $scout->currentRank()->award_id or 'N/A' }}</strong></p>
            <p>Next Rank:  <strong>{{ $scout->nextRank()->award_name or 'N/A' }}</strong></p>
            @endif
        </div>
    </div>
@stop

