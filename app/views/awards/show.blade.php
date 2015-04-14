@section('main')

        <div class="row">
            <h3>{{ $page_title or 'Requirements for ' . $award->award_name . ' ' . $award->class_name }}</h3>
        </div>

        <div class="row">
            @foreach ( $award->requirements as $reqt )
            <p style="margin-left: 20px; text-indent: -20px;">
                {{ $reqt->award_identifier }}.&nbsp;{{ $reqt->award_details }}
            </p>
            @endforeach            
        </div>

@stop


