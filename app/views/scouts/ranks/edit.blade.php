@section('main')

    @include('scouts/partials/_award_heading')
       
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
                                    @if ( !empty( $rank->pivot->id) )
                                        // We have an existing pivot table row...
                                        // Use Form::model(...)
                                        {{ Form::model($rank, array('route' => array('scout-rank-update', $scout->id, $rank->id),
                                                    'method' => 'POST',
                                                    'class' => 'inline')) }}
                                        {{ Form::hidden('pivot_id', $rank->pivot->id) }}
                                        <td>{{ $rank->award_name }}</td>
                                        <td>{{ Form::select('award_status', 
                                            array('Started' => 'Started',
                                                'Partial' => 'Partial',
                                                'Completed' => 'Completed',
                                                'Presented' => 'Presented'),
                                            $rank->pivot->award_status) }}</td>
                                        <td>{{ Form::text('date_sm_conf', $rank->pivot->date_sm_conf) }}</td>
                                        <td>{{ Form::text('date_board_of_review', $rank->pivot->date_board_of_review) }}</td>
                                        <td>{{ Form::text('date_completed', $rank->pivot->date_completed) }}</td>
                                        <td>{{ Form::select('approver_id',
                                                    $adultList,
                                                    $rank->pivot->approver_id) }}</td>
                                    
                                    @else
                                        // We need to create a new pivot table row...
                                        // Use Form::open(...)
                                        {{ Form::model(new Rank, array('route' => array('scout-rank-update', $scout->id, $rank->id),
                                                    'method' => 'POST',
                                                    'class' => 'inline')) }}
                                        <td>{{ $rank->award_name }}</td>
                                        <td>{{ Form::select('award_status', 
                                            array('Started' => 'Started',
                                                'Partial' => 'Partial',
                                                'Completed' => 'Completed',
                                                'Presented' => 'Presented'),
                                            NULL) }}</td>
                                        <td>{{ Form::text('date_sm_conf') }}</td>
                                        <td>{{ Form::text('date_board_of_review') }}</td>
                                        <td>{{ Form::text('date_completed') }}</td>
                                        <td>{{ Form::select('approver_id',
                                                    $adultList,
                                                    NULL) }}</td>                                        
                                    @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
    </div>

@stop
