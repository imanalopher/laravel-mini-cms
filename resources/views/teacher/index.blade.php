@extends('layouts.teacher')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12 float-right">
                <div class="pull-left">
                    <h2>Teachers List</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-success" href="{{ route('admin.teacher.create') }}">Create New Teacher</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                {{ $teachers->links() }}
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->id }}</td>
                            <td>{{ $teacher->firstName }}</td>
                            <td>{{ $teacher->lastName }}</td>
                            <td><a class="btn btn-info" href="{{ route('admin.student.show', $teacher) }}">Show</a></td>
                            <td><a class="btn btn-info" href="{{ route('admin.student.edit', $teacher) }}">Edit</a></td>
                            <td>
                                <form action="{{ route('admin.student.destroy', $teacher->id) }}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $teachers->links() }}
            </div>
        </div>
    </div>
@endsection