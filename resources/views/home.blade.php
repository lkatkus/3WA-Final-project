@extends('layouts.app')

@section('content')
<div class="container">

    <!-- TOP BANNER -->
    <div class="row d-none d-sm-block">
        <div class="col-12">
            <img class="w-100" src="../images/www/banner-top-20180329.png" alt="Phat The Cat Banner">
        </div>
    </div>
    <!-- END TOP BANNER -->

    <!-- TOP BANNER FOR XS -->
    <div class="row d-block d-sm-none">
        <div class="col-12">
            <img class="w-100" src="../images/www/banner-top-small-20180329.png" alt="Phat The Cat Banner">
        </div>
    </div>
    <!-- END TOP BANNER FOR XS -->

    <!-- QUOTE SECTION -->
    <section>
        <div class="row no-gutters">
            <div class="col-12  bg-danger  py-5">
                <blockquote class="blockquote text-center">
                    <p class="mb-0">Stop calling me fat! I have big bones.</p>
                    <footer class="blockquote-footer">Phat The Cat</footer>
                </blockquote>
            </div>
        </div>
    </section>
    <!-- END QUOTE SECTION -->

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
        <div class="row no-gutters d-none d-sm-block">
            <div class="col-12  bg-primary py-4 text-center">
                <h2 class="text-uppercase sectionHeader">Current total</h2>
                <br>
                <div class="row no-gutters">
                    <div class="col-4 vr">
                        <h3>Users</h3>
                        <p>{{ $totalUsers }}</p>
                    </div>
                    <div class="col-4 vl vr">
                        <h3>Levels</h3>
                        <p>{{ $totalLevels }}</p>
                    </div>
                    <div class="col-4 vl">
                        <h3>Games</h3>
                        <p>245</p>
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
                <div class="row no-gutters">
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

    <!-- BOTTOM BANNER -->
    <div class="row d-none d-sm-block">
        <div class="col-12">
            <img class="w-100" src="../images/www/banner-bottom-20180329.png" alt="Phat The Cat Banner">
        </div>
    </div>
    <!-- END BOTTOM BANNER -->

    <!-- BOTTOM BANNER FOR XS -->
    <div class="row d-block d-sm-none">
        <div class="col-12">
            <img class="w-100" src="../images/www/banner-bottom-small-20180329.png" alt="Phat The Cat Banner">
        </div>
    </div>
    <!-- END BOTTOM BANNER FOR XS -->

</div>
@endsection
