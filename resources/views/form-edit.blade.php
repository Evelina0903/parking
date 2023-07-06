@extends('layout')

@section('content')

    <div class="container">
        <p class="fs-2 text-center">Редактировать запись</p>
        <a href="{{ route('cars.index') }}" class="btn btn-outline-dark">
            Вернуться
        </a>

        <form>
            @csrf
            <div class="row mt-3">
                <label class="col-sm-2 col-form-label">Марка автомобиля</label>
                <div class="col-sm-10">
                    <input name="brand" class="form-control" placeholder="Введите марку автомобиля" value="{{ old('brand') }}" required>
                </div>
            </div>

            <div class="row mt-3">
                <label class="col-sm-2 col-form-label">Модель автомобиля</label>
                <div class="col-sm-10">
                    <input name="model" class="form-control" placeholder="Введите модель автомобиля" value="{{ old('model') }}" required>
                </div>
            </div>

            <div class="row mt-3">
                <label class="col-sm-2 col-form-label">Цвет кузова</label>
                <div class="col-sm-10">
                    <input name="color" class="form-control" placeholder="Введите цвет автомобиля" value="{{ old('color') }}" required>
                </div>
            </div>

            <div class="row mt-3">
                <label class="col-sm-2 col-form-label">Гос Номер РФ</label>
                <div class="col-sm-10">
                    <input name="rf_number" class="form-control" placeholder="Введите Гос Номер автомобиля" value="{{ old('rf_number') }}" required>
                </div>
            </div>

            <div class="row mt-3">
                <label class="col-sm-2 col-form-label">Статус автомобиля</label>
                <div class="col-sm-10">
                    <select name="parking" class="form-select" aria-label="Default select example" value="{{ old('parking') }}" required>
                        <option selected></option>
                        <option value="0">Автомобиль наодится на стоянке</option>
                        <option value="1">Автомобиль отсутствует на стоянке</option>
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                    <p class="fs-5">Редактировать клиента:</p>
            </div>



                <div class="row mt-3">
                    <label class="col-sm-2 col-form-label">ФИО</label>
                    <div class="col-sm-10">
                        <input name="fio" class="form-control" placeholder="Введите ФИО клиента" minlength="3" maxlength="255" value="{{ old('fio') }}" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <label class="col-sm-2 col-form-label">Пол</label>
                    <div class="col-sm-10">
                        <select name="gender" class="form-select" aria-label="Default select example" id="gender-select" value="{{ old('gender') }}" required>
                            <option selected></option>
                            <option value="0">мужской</option>
                            <option value="1">женский</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <label class="col-sm-2 col-form-label">Номер</label>
                    <div class="col-sm-10">
                        <input name="number" class="form-control" placeholder="Введите номер клиента" value="{{ old('number') }}" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <label class="col-sm-2 col-form-label">Адрес</label>
                    <div class="col-sm-10">
                        <input name="addres" class="form-control" placeholder="Введите адрес клиента" value="{{ old('addres') }}">
                    </div>
                </div>

            <div class="row mt-3 mb-3">
                <div class="d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-outline-dark">Сохранить</button>
                </div>
            </div>
        </form>


    </div>

@endsection
