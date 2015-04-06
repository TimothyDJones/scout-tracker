@section('main')
    <h2>{{ $page_title }} Index View</h2>
    
    <div class="row">
        <div class="col-md-6 col-xs-6">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><h3>Scouts</h3></th>
                                        <th>
                                            <div class="pull-right">
                                                {{ link_to_route('persons.create', 'New', array('class_name' => 'Scout'), array('class' => 'btn btn-primary btn-small')) }}
                                            </div>                                        
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ( $persons as $person )
                                    <tr>
                                        @if ( $person->class_name == 'Scout' )
                                            <td>
                                                {{ $person->first_name }}&nbsp;{{ $person->last_name}}
                                            </td>
                                            <td>
                                                {{ link_to_route('profile', 'Details', array('id' => $person->id), array('class' => 'btn btn-info btn-sm')) }}&nbsp;
                                                {{ link_to_route('persons.edit', 'Edit', array('id' => $person->id), array('class' => 'btn btn-primary btn-sm')) }}
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach                                    
                                </tbody>
                            </table>
                        </div>
            

        </div>
        <div class="col-md-6 col-xs-6">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><h3>Adults</h3></th>
                                        <th>
                                            <div class="pull-right">
                                                {{ link_to_route('persons.create', 'New', array('class_name' => 'Adult'), array('class' => 'btn btn-primary btn-small')) }}
                                            </div>                                        
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ( $persons as $person )
                                    <tr>
                                        @if ( $person->class_name == 'Adult' )
                                            <td>
                                                {{ $person->first_name }}&nbsp;{{ $person->last_name}}
                                                @if ( $person->admin_ind == TRUE )
                                                <strong>*</strong>
                                                @endif                                            
                                            </td>
                                            <td>
                                                {{ link_to_route('profile', 'Details', array('id' => $person->id), array('class' => 'btn btn-info btn-sm')) }}&nbsp;
                                                {{ link_to_route('persons.edit', 'Edit', array('id' => $person->id), array('class' => 'btn btn-primary btn-sm')) }}
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach                                    
                                </tbody>
                            </table>
                        </div>
        </div>
    </div>
@stop

