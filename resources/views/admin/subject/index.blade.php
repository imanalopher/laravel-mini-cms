@extends('layouts.admin')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-lg-12 float-right">
                <div class="pull-left">
                    <h2>Список Урок</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-success" href="{{ route('admin.student.create') }}"> Create New Student</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                {{ $subjects->links() }}
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Teacher</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subjects as $subject)
                        <tr>
                            <td>{{ $subject->id }}</td>
                            <td>{{ $subject->title }}</td>
                            <td>{{ $subject->description }}</td>
                            <td>{{ $subject->teacher->phone }}</td>
                            <td>
                                <a class="btn btn-primary a-btn-slide-text" href="{{ route('admin.subject.show', $subject) }}">
                                    <i class="fas fa-folder-open" aria-hidden="true"></i> Open
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ route('admin.subject.edit', $subject) }}">
                                    <i class="fas fa-pencil-alt" aria-hidden="true"></i> Edit
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.subject.destroy', $subject->id) }}" method="POST">

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
                {{ $subjects->links() }}
            </div>
        </div>
    </div>
@endsection
