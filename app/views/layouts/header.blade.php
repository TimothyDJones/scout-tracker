@section("header")
<header>
    <nav role="navigation" class="navbar navbar-default">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{ link_to('http://localhost/', 'Troop 99 - Owasso, OK', array('class' => 'navbar-brand')) }}
        </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                @if ( strpos(Route::currentRouteName(), 'home') !== FALSE )
                <li class="active">
                @else
                <li>
                @endif                    
                    {{ link_to('/', 'Home') }}</li>
                @if ( strpos(Route::currentRouteName(), 'scouts') !== FALSE )
                <li class="active">
                @else
                <li>
                @endif                 
                    {{ link_to_route('scouts.index', 'Scouts') }}</li>
                @if ( strpos(Route::currentRouteName(), 'adults') !== FALSE )
                <li class="active">
                @else
                <li>
                @endif                 
                    {{ link_to_route('adults.index', 'Adults') }}</li>
                
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Reports <b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li>{{ link_to_route('court-of-honor', 'Court of Honor') }}</li>
                    </ul>
                </li>
            </ul>
            {{ Form::open(array('action' => 'ScoutsController@search', 'method' => 'get', 'role' => 'search', 'class' => 'navbar-form navbar-left')) }}
                <div class="form-group">
                    {{ Form::text('search', null, array('placeholder' => 'Search', 'class' => 'form-control')) }}
                </div>
            {{ Form::close() }}
            <ul class="nav navbar-nav navbar-right">
                @include('layouts.partials._loginout_menu')
            </ul>
        </div>
    </nav>

    @if ( Config::get('app.debug') )
        {{ Kint::dump(Route::currentRouteName()) }}
    @endif
</header>
@show