@extends('layouts.app')

@section('content')
<div class="container">

    <!-- TOP BANNER -->
    <div class="row d-none d-sm-block">
        <div class="col-12">
            <img class="w-100" src="../images/www/banners/banner-top.png" alt="Phat The Cat Banner">
        </div>
    </div>
    <!-- END TOP BANNER -->

    <!-- TOP BANNER FOR XS -->
    <div class="row d-block d-sm-none">
        <div class="col-12">
            <img class="w-100" src="../images/www/banners/banner-top-small.png" alt="Phat The Cat Banner">
        </div>
    </div>
    <!-- END TOP BANNER FOR XS -->

    <div class="row bg-info no-gutters">
        <h2 class="col-12 text-center bg-danger text-uppercase sectionHeader">About</h2>

        <div class="col-12 p-4">

            <h2>Phat The Cat (By <a href="http://www.katkus.eu" target="_blank">Laimonas Katkus</a>)</h2>

            <p>This page was made as a final project for 3W Academy Lithuania web developer course. Goals while making this project were:</p>
            <ul>
                <li>Apply and update previously created basic <a href="https://github.com/lkatkus/Personal-JS-7-Platformer" target="_blank">engine</a> for 2D plaformer;</li>
                <li>Create a simple GUI for creating levels;</li>
                <li>Further study HTML canvas and JavaScript possibilities;</li>
                <li>Learn to apply and integrate more complex JavaScript to Laravel project;</li>
                <li>Have fun while doing things mentioned above.</li>
            </ul>

            <p>Roadmap for the project:</p>
            <ul>
                <li><del>Update the game engine for applying to Laravel;</del></li>
                <li>Create basic CRUD with Laravel;</li>
                <li>Finalize game engine - movement, collision detection;</li>
                <li>Add more tile types;</li>
                <li>Add automated validation for submited layout (is player object placed and etc);</li>
                <li>Add thumbnail generation for submited layouts;</li>
                <li>Add admin review before posting layout (for preventing offensive images);</li>
                <li>Add better styling for the website</li>
                <li>Add "full screen" mode while playing;</li>
                <li>Finalize game engine;</li>
                <li>Add sound effects;</li>
                <li>Add mobile controls;</li>
                <li>Add hotseat two player mode;</li>
                <li>Add websocket capabilities for online play.</li>
            </ul>

        </div>
    </div>

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
