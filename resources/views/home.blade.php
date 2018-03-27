@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-12">
            <img class="w-100" src="../images/www/banner-20180327.png" alt="Phat cat banner">
        </div>
    </div>

    <div class="row no-gutters">
        <div class="col-12  bg-warning  py-5">
            <blockquote class="blockquote text-center">
                <p class="mb-0">Stop calling me fat! I have big bones.</p>
                <footer class="blockquote-footer">Phat The Cat</footer>
            </blockquote>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h2 class="text-center bg-warning text-uppercase">Featured</h2>
            <div class="row no-gutters">
                    @foreach($levels as $level)
                        @if($level->featured)
                            @component('components.card',['level' => $level, 'type' => 'featured'])
                            @endcomponent
                        @endif
                    @endforeach
                <div class="col-4 d-flex justify-content-center align-items-center bg-warning">
                    <div class="">
                        Load more
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row no-gutters">
        <div class="col-12  bg-primary py-4 text-center">
            <h2 class="text-uppercase">Currently</h2>
            <br>
            <div class="row no-gutters">
                <div class="col-4 vr">
                    <h3>Users</h3>
                    <p>38</p>
                </div>
                <div class="col-4 vl vr">
                    <h3>Levels</h3>
                    <p>53</p>
                </div>
                <div class="col-4 vl">
                    <h3>Play sessions</h3>
                    <p>245</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h2 class="text-center bg-danger text-uppercase">Newest</h2>
            <div class="row no-gutters">
                @foreach($derp as $level)
                    @component('components.card',['level' => $level, 'type' => 'newest'])
                    @endcomponent
                @endforeach
            <div class="col-4 d-flex justify-content-center align-items-center bg-danger">
                <div class="">
                    Load more
                </div>
            </div>
            </div>
        </div>
    </div>


</div>
@endsection
