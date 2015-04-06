@section('main')
    <h2>{{ $page_title }} Index View</h2>
    
    <div class="row">
        <div class="col-md-6 col-xs-6">
            <h3>Scouts</h3>
            <div class="pull-right">
                {{ link_to_route('persons.create', 'New', array('class_name' => 'Scout'), array('class' => 'btn btn-primary btn-small')) }}
            </div>
        </div>
        <div class="col-md-6 col-xs-6">
            <h3>Adults</h3>
            <div class="pull-right">
                {{ link_to_route('persons.create', 'New', array('class_name' => 'Adult'), array('class' => 'btn btn-primary btn-small')) }}
            </div>            
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 col-xs-6">
            @foreach ( $persons as $person )
                @if ( $person->class_name == 'Scout' )
                <p>
                {{ $person->first_name }}&nbsp;{{ $person->last_name}}
                {{ link_to_route('profile', 'Details', array('id' => $person->id), array('class' => 'btn btn-info btn-sm')) }}
                {{ link_to_route('persons.edit', 'Edit', array('id' => $person->id), array('class' => 'btn btn-primary btn-sm')) }}
                </p>
                @endif
            @endforeach
        </div>
        <div class="col-md-6 col-xs-6">
            @foreach ( $persons as $person )
                @if ( $person->class_name == 'Adult' )
                <p>
                {{ $person->first_name }}&nbsp;{{ $person->last_name}}
                @if ( $person->admin_ind == TRUE )
                *
                @endif
                {{ link_to_route('profile', 'Details', array('id' => $person->id), array('class' => 'btn btn-info btn-sm')) }}
                {{ link_to_route('persons.edit', 'Edit', array('id' => $person->id), array('class' => 'btn btn-primary btn-sm')) }}
                </p>
                @endif
            @endforeach            
        </div>
    </div>
@stop

