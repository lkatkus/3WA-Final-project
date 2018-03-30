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


        <div class="row no-gutters bg-info">
            <h2 class="col-12 text-center bg-danger text-uppercase sectionHeader">Levels</h2>

            <div class="col-12 p-4">


                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Title</th>
                        <th>Created</th>
                        <th>Description</th>
                        <!-- ADMIN CONTROLS -->
                            @if(Auth::check() && Auth::user()->role == 'admin')
                                <th>Featured</th>
                                <th colspan="2">Admin controls</th>
                            @endif
                        <!-- END ADMIN CONTROLS -->
                    </tr>

                @foreach($levels as $level)
                    <tr>
                        <td>{{ $level -> id }}</td>
                        <td>{{ $level -> user -> name }}</td>
                        <td>
                            <a href="{{ route('level.show', $level->id )}}">{{ $level -> title }}</a>
                        </td>
                        <td>{{ $level -> created_at }}</td>
                        <td>{{ $level -> description }}</td>

                        <!-- ADMIN CONTROLS -->
                            @if(Auth::check() && Auth::user()->role == 'admin')
                                <td>@if($level->featured == 1) Featured @else Not Featured @endif</td>
                                <td>
                                    <form action="{{ route('level.update', $level-> id ) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <button class="btn btn-primary" type="submit" name="button">Featured</button>
                                    </form>
                                <td>
                                    <form action="{{ route('level.destroy', $level-> id ) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit" name="button">Delete</button>
                                    </form>
                                </td>
                            @endif
                        <!-- END ADMIN CONTROLS -->

                    </tr>
                @endforeach

            </table>

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
