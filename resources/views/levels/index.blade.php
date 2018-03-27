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
                        <th>Featured</th>
                        <th colspan="2"></th>
                    </tr>

                @foreach($levels as $level)
                    <tr>
                        <td>{{ $level -> id }}</td>
                        <td>{{ $level -> user -> name }}</td>
                        <td>
                            <a href="{{ route('level.show', $level->id )}}">{{ $level -> title }}</a>
                        </td>
                        <td>{{ $level -> description }}</td>
                        <td>{{ $level -> featured }}</td>

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
                    </tr>
                @endforeach

            </table>

            </div>
        </div>
    </div>

@endsection
