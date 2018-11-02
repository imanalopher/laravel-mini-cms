@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 float-right">
                <div class="pull-left">
                    <h2>Создать новый Школ</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="offset-2 col-8">
                <form action="{{ route('admin.student.store') }}" method="post" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="form-group row">
                        <label for="firstName" class="col-sm-2 col-form-label">Имя</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Имя">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lastName" class="col-sm-2 col-form-label">Фамилия</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Фамилия">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="male" class="col-sm-2 col-form-label">Пол</label>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" id="male" value="1" checked>
                                <label class="form-check-label" for="male">
                                    Муж
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sex" id="female" value="0">
                                <label class="form-check-label" for="female">
                                    Жен
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Адрес</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="address" name="address" placeholder="Адрес">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="birthday" class="col-sm-2 col-form-label">Дата рождение</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Дата рождение">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="class" class="col-sm-2 col-form-label">Класс</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="class" name="class" placeholder="Класс">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nfc" class="col-sm-2 col-form-label">NFC</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nfc" name="nfc" placeholder="NFC">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="photo" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="photo" name="photo" placeholder="Foto">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="school" class="col-sm-2 col-form-label">Schools</label>
                        <div class="col-sm-10">
                            <select id="school" name="school_id" class="custom-select" id="">
                                <option selected>Choose...</option>
                                @foreach($schools as $school)
                                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                                @endforeach
                            </select>
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
