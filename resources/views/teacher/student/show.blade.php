@extends('layouts.teacher')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 float-right">
                <div class="pull-left">
                    <h2>Student Info</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="offset-2 col-8">
                <div class="form-group row">
                    <label for="firstName" class="col-sm-2 col-form-label">Имя</label>
                    <div class="col-sm-10">
                        <input readonly class="form-control" name="firstName" value="{{ $student->firstName }}"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lastName" class="col-sm-2 col-form-label">Фамилия</label>
                    <div class="col-sm-10">
                        <input readonly class="form-control" name="lastName" value="{{ $student->lastName }}"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="male" class="col-sm-2 col-form-label">Пол</label>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="male" value="1" @if($student->sex) checked @endif>
                            <label class="form-check-label" for="male">
                                Муж
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="female" value="0" @if(!$student->sex) checked @endif>
                            <label class="form-check-label" for="female">
                                Жен
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-sm-2 col-form-label">Адрес</label>
                    <div class="col-sm-10">
                        <input readonly class="form-control" id="address" name="address" value="{{ $student->address }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="birthday" class="col-sm-2 col-form-label">Дата рождение</label>
                    <div class="col-sm-10">
                        <input readonly type="date" class="form-control" id="birthday" name="birthday" value="{{ $student->birthday }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nfc" class="col-sm-2 col-form-label">NFC</label>
                    <div class="col-sm-10">
                        <input readonly type="text" class="form-control" id="nfc" name="nfc" value="{{ $student->nfc }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="photo" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        <img src="{{ asset('uploads/students/' . $student->photo) }}" alt="" style="width: auto; height: 200px" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
