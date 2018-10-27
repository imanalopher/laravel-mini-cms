@extends('layouts.admin')

@section('content')
    <div class="container">
        {{ $schools->links() }}
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach($schools as $school)
                    <tr>
                        <td>{{ $school->id }}</td>
                        <td>{{ $school->name }}</td>
                        <td><a class="btn btn-info" href="{{ route('admin.school.edit', $school) }}">Редактировать</a></td>
                        <td>
                            <form action="{{ route('admin.school.destroy', $school->id) }}" method="POST">

                                @csrf
                                @method('DELETE')


                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $schools->links() }}
    </div>
@endsection