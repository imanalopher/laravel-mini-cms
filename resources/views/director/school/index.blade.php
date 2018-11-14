@extends('layouts.director')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12 float-right">
                <div class="pull-left">
                    @if (is_null($school))
                        <h2>Create new School</h2>
                    @else
                        <h2>School name</h2>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if (is_null($school))
                    <form action="{{ route('director.school.store') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-6">
                                <input type="text" class="form-control" id="name" name="name" placeholder="School name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-3 offset-6">
                                <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $school->name }}">
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection