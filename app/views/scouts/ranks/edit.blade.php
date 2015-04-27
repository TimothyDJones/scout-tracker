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
                                    @if ( !empty( $rank->pivot->id) )
                                    <tr>
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
                                        <td>{{ Form::date('date_sm_conf', $rank->pivot->date_sm_conf) }}</td>
                                        <td>{{ Form::date('date_board_of_review', $rank->pivot->date_board_of_review) }}</td>
                                        <td>{{ Form::date('date_completed', $rank->pivot->date_completed) }}</td>
                                        <td>{{ Form::select('approver_id',
                                                    $adultList,
                                                    $rank->pivot->approver_id) }}</td>
                                    </tr>
                                    @elseif ( $rank->id === $scout->nextRank()->id )
                                    <tr>
                                        {{ Form::model(new Rank, array('route' => array('scout-rank-update', $scout->id, $rank->id),
                                                    'method' => 'POST',
                                                    'class' => 'inline')) }}
                                        <td>{{ $rank->award_name }}</td>
                                        <td>{{ Form::select('award_status', 
                                            array('[NONE]' => '',
                                                'Started' => 'Started',
                                                'Partial' => 'Partial',
                                                'Completed' => 'Completed',
                                                'Presented' => 'Presented'),
                                            '[NONE]') }}</td>
                                        <td>{{ Form::date('date_sm_conf') }}</td>
                                        <td>{{ Form::date('date_board_of_review') }}</td>
                                        <td>{{ Form::date('date_completed') }}</td>
                                        <td>{{ Form::select('approver_id',
                                                    array_merge(array('[NONE]' => ''), $adultList),
                                                    '[NONE]') }}</td>
                                    </tr>
                                    @endif
                                    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
    </div>

@stop
