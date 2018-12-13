@extends('layouts.teacher')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 float-right">
                <div class="pull-left">
                    <h2>Список Students</h2>
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
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->firstName }}</td>
                            <td>{{ $student->lastName }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('teacher.student.show', $student) }}">
                                    <i class="fa fa-folder-open"></i> Show
                                </a>
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