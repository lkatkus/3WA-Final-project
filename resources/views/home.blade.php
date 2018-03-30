@extends('layouts.app')

@section('content')
<div class="container">

    <!-- TOP BANNER -->
    <div class="row d-none d-sm-block">
        <div class="col-12">
            <img class="w-100" src="../images/www/banners/banner-main-top.png" alt="Phat The Cat Banner">
        </div>
    </div>
    <!-- END TOP BANNER -->

    <!-- TOP BANNER FOR XS -->
    <div class="row d-block d-sm-none">
        <div class="col-12">
            <img class="w-100" src="../images/www/banners/banner-main-top-small.png" alt="Phat The Cat Banner">
        </div>
    </div>
    <!-- END TOP BANNER FOR XS -->

    <!-- DISPLAY FEATURED LEVELS -->
    <section>
        <div class="row">
            <div class="col-12">
                <h2 class="text-center bg-warning text-uppercase sectionHeader">Featured levels</h2>
                <div class="row no-gutters">
                        @foreach($levels as $level)
                            @if($level->featured)
                                @component('components.card',['level' => $level, 'type' => 'featured'])
                                @endcomponent
                            @endif
                        @endforeach
                    <div class="col-sm-6 col-md-4 bg-warning">
                        <div class="buttonMore">
                            <a class="buttonMoreTag" href="/level">All levels</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END DISPLAY FEATURED LEVELS -->

    <!-- CURRENT STATUS BIGGER THAN XS -->
    <section>
        <div class="row no-gutters d-none d-sm-block bg-primary text-center py-3">
            <h2 class="col-12 text-uppercase sectionHeader">Current total</h2>
            <div class="col-12">
                <br>
                <div class="row no-gutters sectionHeader">
                    <div class="col-4 vr">
                        <h3 class="">Users</h3>
                        <h3>{{ $totalUsers }}</h3>
                    </div>
                    <div class="col-4 vl vr">
                        <h3>Levels</h3>
                        <h3>{{ $totalLevels }}</h3>
                    </div>
                    <div class="col-4 vl">
                        <h3>Games</h3>
                        <h3>245</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END CURRENT STATUS FOR BIGGER THAN XS -->

    <!-- CURRENT STATUS FOR XS -->
    <section>
        <div class="row no-gutters d-block d-sm-none">
            <div class="col-12  bg-primary py-4 text-center">
                <h2 class="text-uppercase sectionHeader">Current total</h2>
                <div class="row no-gutters sectionHeader">
                    <div class="col-6"><h4>Users</h4></div>
                    <div class="col-6"><h4>{{ $totalUsers }}</h4></div>

                    <div class="col-6"><h4>Levels</h4></div>
                    <div class="col-6"><h4>{{ $totalLevels }}</h4></div>

                    <div class="col-6"><h4>Games</h4></div>
                    <div class="col-6"><h4>245</h4></div>
                </div>
            </div>
        </div>
    </section>
    <!-- END CURRENT STATUS FOR XS -->

    <!-- DISPLAY LEVELS ORDERED BY DATE -->
    <section>
        <div class="row">
            <div class="col-12">
                <h2 class="text-center bg-danger text-uppercase sectionHeader">Newest levels</h2>
                <div class="row no-gutters">
                    @foreach($sortedLevels as $level)
                        @if($loop->iteration < 6)
                            @component('components.card',['level' => $level, 'type' => 'newest'])
                            @endcomponent
                        @endif
                    @endforeach

                    <div class="col-sm-6 col-md-4 bg-danger">
                        <div class="buttonMore">
                            <a class="buttonMoreTag" href="/level">Load more</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- END DISPLAY LEVELS ORDERED BY DATE -->

    <!-- QUOTE SECTION -->
    <section>
        <div class="row no-gutters">
            <div class="col-12  bg-info  py-5">
                <blockquote class="blockquote text-center">
                    <p class="mb-0">Stop calling me fat! I have big bones.</p>
                    <footer class="blockquote-footer">Phat The Cat</footer>
                </blockquote>
            </div>
        </div>
    </section>
    <!-- END QUOTE SECTION -->

    <!-- BOTTOM BANNER -->
    <div class="row d-none d-sm-block">
        <div class="col-12">
            <img class="w-100" src="../images/www/banners/banner-bottom.png" alt="Phat The Cat Banner">
        </div>
    </div>
    <!-- END BOTTOM BANNER -->

    <!-- BOTTOM BANNER FOR XS -->
    <div class="row d-block d-sm-none">
        <div class="col-12">
            <img class="w-100" src="../images/www/banners/banner-bottom-small.png" alt="Phat The Cat Banner">
        </div>
    </div>
    <!-- END BOTTOM BANNER FOR XS -->

</div>
@endsection
