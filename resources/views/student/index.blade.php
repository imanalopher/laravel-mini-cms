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
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->firstName }}</td>
                            <td>{{ $student->lastName }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $students->links() }}
            </div>
        </div>
    </div>
@endsection