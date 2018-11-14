@extends('layouts.director')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 float-right">
                <div class="pull-left">
                    <h2>Создать новый Klass</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="offset-3 col-6">
                <form action="{{ route('director.klass.store') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                    </div>
                    <input type="hidden" name="school_id" value="{{ $school->id }}" />
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Создать</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
