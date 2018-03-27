@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-12">
            <img class="w-100" src="../images/www/placeholder-banner.svg" alt="Phat cat banner">
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h2 class="text-center bg-warning text-uppercase">Featured</h2>
            <div class="row no-gutters">
                <div class="col-4">
                    <a href="#"><img class="w-100" src="../images/www/placeholder-thumbnail.svg"></a>
                </div>
                <div class="col-4">
                    <img class="w-100" src="../images/www/placeholder-thumbnail.svg">
                </div>
                <div class="col-4">
                    <img class="w-100" src="../images/www/placeholder-thumbnail.svg">
                </div>
                <div class="col-4">
                    <img class="w-100" src="../images/www/placeholder-thumbnail.svg">
                </div>
                <div class="col-4">
                    <img class="w-100" src="../images/www/placeholder-thumbnail.svg">
                </div>
                <div class="col-4 d-flex justify-content-center align-items-center bg-warning">
                    <div class="">
                        Read more
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h2 class="text-center bg-danger text-uppercase">Newest</h2>
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img class="w-100" src="../images/www/placeholder-thumbnail.svg">
                </div>
                <div class="col-md-4">
                    <img class="w-100" src="../images/www/placeholder-thumbnail.svg">
                </div>
                <div class="col-md-4">
                    <img class="w-100" src="../images/www/placeholder-thumbnail.svg">
                </div>
                <div class="col-md-4">
                    <img class="w-100" src="../images/www/placeholder-thumbnail.svg">
                </div>
                <div class="col-md-4">
                    <img class="w-100" src="../images/www/placeholder-thumbnail.svg">
                </div>
                <div class="col-4 d-flex justify-content-center align-items-center bg-danger">
                    <div class="">
                        Read more
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
