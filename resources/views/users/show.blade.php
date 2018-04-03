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

        <!-- SECTION CONTENT -->
            <div class="row no-gutters bg-info">
                <div class="col-12">
                    <h2 class="col-12 text-center bg-danger text-uppercase sectionHeader">User profile</h2>
                        @if($user->role == 'admin')
                            <p>This user has admin rights!</p>
                        @endif
                    <form>

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label offset-1">Name</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" id="name" value="{{ $user->name }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label offset-1">Email</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" id="email" value="{{ $user->email }}">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        <!-- END SECTION CONTENT -->

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
