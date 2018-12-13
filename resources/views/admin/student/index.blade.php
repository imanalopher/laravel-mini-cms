@extends('layouts.admin')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-lg-12 float-right">
                <div class="pull-left">
                    <h2>Список Школ</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-success" href="{{ route('admin.student.create') }}"> Create New Student</a>
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
                            <td>
                                <a class="btn btn-primary a-btn-slide-text" href="{{ route('admin.student.show', $student) }}">
                                    <i class="fas fa-folder-open" aria-hidden="true"></i> Open
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ route('admin.student.edit', $student) }}">
                                    <i class="fas fa-pencil-alt" aria-hidden="true"></i> Edit
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.student.destroy', $student->id) }}" method="POST">

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
                {{ $students->links() }}
            </div>
        </div>
    </div>
@endsection