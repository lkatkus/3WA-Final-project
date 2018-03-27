@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">

                INDEX BLADE

                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Title</th>
                        <th>Description</th>
                    </tr>

                @foreach($levels as $level)
                    <tr>
                        <td>{{ $level -> id }}</td>
                        <td>{{ $level -> user -> name }}</td>
                        <td>
                            <a href="{{ route('level.show', $level->id )}}">{{ $level -> title }}</a>
                        </td>
                        <td>{{ $level -> description }}</td>
                    </tr>
                @endforeach

            </table>

            </div>
        </div>
    </div>

@endsection
