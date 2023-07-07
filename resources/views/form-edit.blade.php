@extends('layout')

@section('content')

    <div class="container">

        <p class="fs-2 text-center">Редактировать запись</p>
        <a href="{{ route('cars.index') }}" class="btn btn-outline-dark">
            Вернуться
        </a>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="/updateCarClient">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="carId" value="{{$car->id}}">
            <input type="hidden" name="clientId" value="{{$client->id}}">
            <div class="row mt-3">
                <label class="col-sm-2 col-form-label">Марка автомобиля</label>
                <div class="col-sm-10">
                    <input name="brand" class="form-control" placeholder="Введите марку автомобиля" value="{{$car->brand}}"  required>
                </div>
            </div>

            <div class="row mt-3">
                <label class="col-sm-2 col-form-label">Модель автомобиля</label>
                <div class="col-sm-10">
                    <input name="model" class="form-control" placeholder="Введите модель автомобиля" value="{{$car->model}}" required>
                </div>
            </div>

            <div class="row mt-3">
                <label class="col-sm-2 col-form-label">Цвет кузова</label>
                <div class="col-sm-10">
                    <input name="color" class="form-control" placeholder="Введите цвет автомобиля" value="{{$car->color}}" required>
                </div>
            </div>

            <div class="row mt-3">
                <label class="col-sm-2 col-form-label">Гос Номер РФ</label>
                <div class="col-sm-10">
                    <input name="rf_number" class="form-control" placeholder="Введите Гос Номер автомобиля" value="{{$car->rf_number}}" required>
                </div>
            </div>

            <div class="row mt-3">
                <label class="col-sm-2 col-form-label">Статус автомобиля</label>
                <div class="col-sm-10">
                    <select name="parking" class="form-select" aria-label="Default select example" required>
                        <option selected></option>
                        <option value="0" @if ($car->parking == 0) selected @endif>Автомобиль наодится на стоянке</option>
                        <option value="1" @if ($car->parking == 1) selected @endif>Автомобиль отсутствует на стоянке</option>
                    </select>
                </div>
            </div>


            <div class="row mt-3">
                <label class="col-sm-2 col-form-label">Редактировать клиента</label>

            </div>


            <div class="row mt-3">
                <label class="col-sm-2 col-form-label">ФИО</label>
                <div class="col-sm-10">
                    <input name="fio" class="form-control" placeholder="Введите ФИО клиента" value="{{$client->fio}}" minlength="3"  maxlength="255" id="fio-required" required>
                </div>
            </div>
            <div class="row mt-3">
                <label class="col-sm-2 col-form-label">Пол</label>
                <div class="col-sm-10">
                    <select name="gender" class="form-select" aria-label="Default select example" id="gender-select" >
                        <option selected></option>
                        <option value="0" @if ($client->gender == 0) selected @endif>мужской</option>
                        <option value="1" @if ($client->gender == 1) selected @endif>женский</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <label class="col-sm-2 col-form-label">Номер</label>
                <div class="col-sm-10">
                    <input name="number" class="form-control" placeholder="Введите номер клиента" id="number-required" value="{{$client->number}}">
                </div>
            </div>
            <div class="row mt-3">
                <label class="col-sm-2 col-form-label">Адрес</label>
                <div class="col-sm-10">
                    <input name="addres" class="form-control" placeholder="Введите адрес клиента" value="{{$client->addres}}">
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

