@extends('layouts.admin')

@section('content')
<div class="container">
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
@endsection