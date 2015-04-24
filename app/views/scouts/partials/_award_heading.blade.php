    <div class="row">
        <h2>{{ $award_type . " Advancement History for " }}
            {{ link_to_route('persons.show', $scout->first_name . ' ' . $scout->last_name, array('id' => $scout->id)) }}</h2>
        <h3>Current Rank: <strong>{{ $scout->currentRank()->award_name }}</strong></h3>
        {{ Kint::dump($rankList) }}
    </div>

