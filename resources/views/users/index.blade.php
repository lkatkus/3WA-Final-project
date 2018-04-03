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

                <h2 class="col-12 text-center bg-danger text-uppercase sectionHeader">All registered users</h2>

                @if(Request::session()->get('status'))
                    <div class="col-12">
                        <h3>{{ Request::session()->get('status') }}</h3>
                    </div>
                @endif

                <div class="col-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-secondary">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user -> id }}</td>
                                    <td>{{ $user -> name }}</td>
                                    <td>{{ $user -> email }}</td>
                                    <td>@if($user -> confirmed) Confirmed @else Not Confirmed @endif</td>
                                    <td>
                                        <form class="d-inline-block" action="{{ route('user.destroy', $user->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" type="submit" name="button">Delete</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('userConfirm', $user -> id ) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <button class="btn btn-primary" type="submit" name="button">Confirm</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
