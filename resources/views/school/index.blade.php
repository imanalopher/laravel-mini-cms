@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 float-right">
                <div class="pull-left">
                    <h2>Список Школ</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-success" href="{{ route('admin.school.create') }}"> Create New Product</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                {{ $schools->links() }}
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th></th>
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
        </div>
    </div>
@endsection