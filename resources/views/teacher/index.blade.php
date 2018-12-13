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
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($klasses as $klass)
                        <tr>
                            <td>{{ $klass->id }}</td>
                            <td>{{ $klass->name }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('teacher.klass.show', $klass) }}">
                                    <i class="fa fa-folder-open"></i> Show
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection