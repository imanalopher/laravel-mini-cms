@extends('layouts.admin')

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
                        <th>E-mail</th>
                        <th>School</th>
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
                            <td>{{ $teacher->email }}</td>
                            <td>{{ $teacher->school->name }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('admin.teacher.show', $teacher) }}">
                                    <i class="fas fa-folder-open" aria-hidden="true"></i> Open
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ route('admin.teacher.edit', $teacher) }}">
                                    <i class="fas fa-pencil-alt" aria-hidden="true"></i> Edit
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.student.destroy', $teacher->id) }}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash-alt" aria-hidden="true"></i> Delete
                                    </button>
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