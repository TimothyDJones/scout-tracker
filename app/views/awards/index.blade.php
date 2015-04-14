@section('main')

        <div class="row">
            <h3>{{ $page_title }}</h3>
        </div>

        <div class="row">
            @foreach ( $awards as $award )
            <p>
                {{ $award->award_name }}&nbsp;
                {{ link_to_route('awards.show', 'Show', $award->id, 
                            array('class' => 'btn btn-info')) }}
            </p>
            @endforeach            
        </div>

@stop


