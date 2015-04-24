@section('main')

    @include('scouts/partials/_award_heading')

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
                                        {{ Form::model($rank, array('route' => array('scout-rank-update', $scout->id, $rank->id)),
                                                    'method' => 'POST',
                                                    'class' => 'inline') }}
                                        {{ Form::hidden('pivot_id', $rank->pivot->id) }}
                                        <td>{{ $rank->award_name }}</td>
                                        <td>{{ Form::select('award_status', 
                                            array('Started' => 'Started',
                                                'Partial' => 'Partial',
                                                'Completed' => 'Completed',
                                                'Presented' => 'Presented'),
                                            $$rank->pivot->award_status) }}</td>
                                        <td>{{ Form::text('date_sm_conf', $rank->pivot->date_sm_conf) }}</td>
                                        <td>{{ Form::text('date_board_of_review', $rank->pivot->date_board_of_review) }}</td>
                                        <td>{{ Form::text('date_completed', $rank->pivot->date_completed) }}</td>
                                        <td>{{ Form::select('approver_id',
                                                    $adultList,
                                                    $rank->pivot->approver_id) }}</td>
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
