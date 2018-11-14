@extends('layouts.director')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12 float-right">
                <div class="pull-left">
                    <h2>Klasses List</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-success" href="{{ route('director.klass.create') }}">Create New Klasses</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                {{ $klasses->links() }}
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>School</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($klasses as $klass)
                        <tr>
                            <td>{{ $klass->id }}</td>
                            <td>{{ $klass->name }}</td>
                            <td>{{ $klass->school->name }}</td>
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
                {{ $klasses->links() }}
            </div>
        </div>
    </div>
@endsection