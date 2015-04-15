@section('main')

    <div class="row">
        <h2>{{ $page_title or "Rank Advancement History for " . $person->first_name . ' ' . $person->last_name }}</h2>
    </div>

        {{ Form::model(new Person, array('route' => ['persons.store'], 'role' => 'form', 'class' => 'form-horizontal')) }}
            {{ Form::hidden('class_name', $class_name) }}
            @include('persons/partials/_form', array('submit_button_label' => 'Create'))
	{{ Form::close() }}
        
    <div class="row">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{ $award_type }}</th>
                                        <th>Status</th>
                                        <th>SM Conf. Date</th>
                                        <th>BOR Date</th>
                                        <th>Date Completed</th>
                                        <th>Approved By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $rankList as $rank )
                                    <tr>
                                    @if ( !is_null( $rank->pivot->id) )
                                        // We have an existing pivot table row...
                                        // Use Form::model(...)
                                        <td>{{ $rank->award_name }}</td>
                                        <td>{{ $rank->pivot->award_status or 'N/A' }}</td>
                                        <td>{{ $rank->pivot->date_sm_conf or 'N/A' }}</td>
                                        <td>{{ $rank->pivot->date_board_of_review or 'N/A' }}</td>
                                        <td>{{ $rank->pivot->date_completed or 'N/A' }}</td>
                                        <td>{{ $rank->pivot->approver_last_name or 'N/A' }}&nbsp;{{ $rank->pivot->approver_first_name or '' }}</td>
                                    
                                    @else
                                        // We need to create a new pivot table row...
                                        // Use Form::open(...)
                                    @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
    </div>        

@stop
