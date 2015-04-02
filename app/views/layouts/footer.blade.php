@section("footer")
<footer>
    <div class="subnav-wrap">
            <div class="container">
                    <div class="row subnav">
                            <div class="col-xs-12">
                                    <div class="text-center">
                                        {{ link_to_route('login', 'Log In') }}
                                        {{ link_to_route('profile', 'Profile') }}
                                    </div>
                            </div>
                    </div><!-- row -->
            </div><!-- container -->
    </div><!-- subnav-wrap -->
</footer>
@show