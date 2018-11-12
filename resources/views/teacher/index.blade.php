@extends('layouts.teacher')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12 float-right">
                <div class="pull-left">
                    <h2>Klasses List</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Имя</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($klasses as $klass)
                        <tr>
                            <td>{{ $klass->id }}</td>
                            <td>{{ $klass->name }}</td>
                            <td><a class="btn btn-info" href="{{ route('admin.student.show', $klass) }}">Show</a></td>
                            <td><a class="btn btn-info" href="{{ route('admin.student.edit', $klass) }}">Edit</a></td>
                            <td>
                                <form action="{{ route('admin.student.destroy', $klass->id) }}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection