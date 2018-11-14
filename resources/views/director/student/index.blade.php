@extends('layouts.director')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 float-right">
                <div class="pull-left">
                    <h2>Список Students</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-success" href="{{ route('director.klass.student.create', ['id' => $klassId]) }}"> Create New Student</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                {{ $students->links() }}
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
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->firstName }}</td>
                            <td>{{ $student->lastName }}</td>
                            <td><a class="btn btn-info" href="{{ route('director.student.show', $student) }}">Show</a></td>
                            <td><a class="btn btn-info" href="{{ route('admin.student.edit', $student) }}">Edit</a></td>
                            <td>
                                <form action="{{ route('admin.student.destroy', $student->id) }}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $students->links() }}
            </div>
        </div>
    </div>
@endsection