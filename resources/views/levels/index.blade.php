@extends('layouts.app')
@section('content')

    <div class="container">

        <!-- TOP BANNER -->
        <div class="row d-none d-sm-block">
            <div class="col-12">
                <img class="w-100" src="/images/www/banners/banner-top.png" alt="Phat The Cat Banner">
            </div>
        </div>
        <!-- END TOP BANNER -->

        <!-- TOP BANNER FOR XS -->
        <div class="row d-block d-sm-none">
            <div class="col-12">
                <img class="w-100" src="/images/www/banners/banner-top-small.png" alt="Phat The Cat Banner">
            </div>
        </div>
        <!-- END TOP BANNER FOR XS -->

        <!-- SECTION CONTENT -->
        <div class="row no-gutters bg-info">
            @if(isset($totalLevels) && $totalLevels == 0)
                <h2 class="col-12 text-center bg-danger text-uppercase sectionHeader">You do not have any posted levels</h2>
            @else
                <h2 class="col-12 text-center bg-danger text-uppercase sectionHeader">Levels</h2>
                <div class="col-12">
                    <table class="table table-bordered">
                        <tr class="table-secondary">
                            <th>ID</th>
                            <th>User</th>
                            <th>Title</th>
                            <th>Created</th>
                            <th>Description</th>
                            <th>Status</th>
                            @if(Auth::check())
                                <th colspan="3">Controls</th>
                            @endif
                        </tr>

                        @foreach($levels as $level)
                            <tr>
                                <td>{{ $level -> id }}</td>
                                <td>{{ $level -> user -> name }}</td>
                                <td><a href="{{ route('level.show', $level->id )}}">{{ $level -> title }}</a></td>
                                <td>{{ $level -> created_at }}</td>
                                <td>{{ $level -> description }}</td>
                                <td>@if($level->featured == 1) Featured @else Not Featured @endif</td>

                                <!-- USER CONTROLS -->
                                    @if(Auth::check() && (Auth::user() -> id == $level -> user -> id || Auth::user()->role == 'admin'))
                                        <td>
                                            <form action="{{ route('level.destroy', $level-> id ) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" type="submit" name="button">Delete</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('level.edit', $level-> id ) }}" method="get">
                                                <button class="btn btn-warning" type="submit">Edit</button>
                                            </form>
                                        </td>
                                    @elseif(Auth::check())
                                        <td></td>
                                    @endif
                                <!-- END USER CONTROLS -->

                                <!-- ADMIN CONTROLS -->
                                    @if(Auth::check() && Auth::user()->role == 'admin')
                                        <td>
                                            <form action="{{ route('featureLevel', $level-> id ) }}" method="post">
                                                @csrf
                                                @method('put')
                                                <button class="btn btn-primary" type="submit" name="button">Featured</button>
                                            </form>
                                        </td>
                                    @endif
                                <!-- END ADMIN CONTROLS -->
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endif
        </div>
        <!-- END SECTION CONTENT -->

        <!-- BOTTOM BANNER -->
        <div class="row d-none d-sm-block">
            <div class="col-12">
                <img class="w-100" src="/images/www/banners/banner-bottom.png" alt="Phat The Cat Banner">
            </div>
        </div>
        <!-- END BOTTOM BANNER -->

        <!-- BOTTOM BANNER FOR XS -->
        <div class="row d-block d-sm-none">
            <div class="col-12">
                <img class="w-100" src="/images/www/banners/banner-bottom-small.png" alt="Phat The Cat Banner">
            </div>
        </div>
        <!-- END BOTTOM BANNER FOR XS -->

    </div>

@endsection
