@section('main')

    <div class="row">
        <h2>{{ $award_type . " Advancement History for " . $scout->first_name . ' ' . $scout->last_name }}</h2>
        <h3>Current Rank: <strong>{{ $scout->currentRank()->award_name }}</strong></h3>
        {{ Kint::dump($rankList) }}
    </div>

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
                                        <td>{{ $rank->award_name }}</td>
                                        <td>{{ $rank->pivot->award_status or 'N/A' }}</td>
                                        <td>{{ $rank->pivot->date_sm_conf or 'N/A' }}</td>
                                        <td>{{ $rank->pivot->date_board_of_review or 'N/A' }}</td>
                                        <td>{{ $rank->pivot->date_completed or 'N/A' }}</td>
                                        <td>{{ $rank->pivot->approver_last_name or 'N/A' }}&nbsp;{{ $rank->pivot->approver_first_name or '' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
    </div>

@stop
