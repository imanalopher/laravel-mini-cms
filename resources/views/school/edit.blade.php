@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="offset-3 col-6">
            <form action="{{ route('admin.school.update', $school) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Название</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="{{ $school->name }}" placeholder="Название">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Создать</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
