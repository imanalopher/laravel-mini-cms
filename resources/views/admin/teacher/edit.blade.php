@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 float-right">
                <div class="pull-left">
                    <h2>Edit новый Школ</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="offset-2 col-8">
                <form action="{{ route('admin.teacher.update', $teacher->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                        <label for="firstName" class="col-sm-2 col-form-label">Имя</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="firstName" value="{{ $teacher->firstName }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lastName" class="col-sm-2 col-form-label">Фамилия</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="lastName" value="{{ $teacher->lastName }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="male" class="col-sm-2 col-form-label">Пол</label>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" id="male" value="1" @if($teacher->sex) checked @endif>
                                <label class="form-check-label" for="male">
                                    Муж
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" id="female" value="0" @if(!$teacher->sex) checked @endif>
                                <label class="form-check-label" for="female">
                                    Жен
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="birthday" class="col-sm-2 col-form-label">Дата рождение</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $teacher->birthday }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nfc" class="col-sm-2 col-form-label">NFC</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nfc" name="nfc" value="{{ $teacher->nfc }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="photo" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="photo" name="photo" placeholder="Foto">
                            <img src="{{ asset('uploads/teachers/' . $teacher->photo) }}" style="width: auto; height: 200px" />
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
    </div>
@endsection
