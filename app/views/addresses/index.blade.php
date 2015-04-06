@section('main')
	@if ( !$addresses->count() )
		No addresses!
                <p>{{ link_to_route('addresses.create', 'Create Address', NULL, array('class' => 'btn btn-primary')) }}</p>
	@else
            {{ Kint::dump($addresses) }}
        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Postal Code</th>
                                        <th>Uses</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach ( $addresses as $address )
                                <tr>
                                    <td><a href="{{ route('addresses.show', array('address' => $address->id)) }}">{{ $address->id }}</a></td>
                                    <td>{{ $address->addr1 }}
                                        @if ( !empty($address->addr2) )
                                        <br />{{ $address->addr2 }}
                                        @endif
                                    </td>
                                    <td>{{ $address->city }}</td>
                                    <td>{{ $address->state }}</td>
                                    <td>{{ $address->postal_code }}</td>
                                    <td>
                                        @if ( $address->persons )
                                        {{ $address->persons->count() }}
                                        @endif
                                    </td>
                                    <td>
						{{ Form::open(array('class' => 'inline', 'method' => 'DELETE', 'route' => array('addresses.destroy', $address->id ))) }}
							{{ link_to_route('addresses.edit', 'Edit', array('address' => $address->id), array('class' => 'btn btn-info btn-sm')) }}&nbsp;
                                                        @if ( $address->persons->count() == 0 )
							{{ Form::submit('Delete', array('class' => 'btn btn-danger btn-sm')) }}
                                                        @endif
						{{ Form::close() }}
                                    </td>
				</tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
	@endif
	
	<p>{{ link_to_route('addresses.create', 'Create Address', NULL, array('class' => 'btn btn-primary')) }}</p>
@stop