@extends('layout')

@section('content')
<div class="container">

    <p class="fs-2 text-center">Добавить новую запись</p>

    <form method="POST" action="{{ route('cars.store') }}">
        @csrf
        <div class="row mt-3">
            <label class="col-sm-2 col-form-label">Марка автомобиля</label>
            <div class="col-sm-10">
                <input name="brand" class="form-control" placeholder="Введите марку автомобиля">
            </div>
        </div>

        <div class="row mt-3">
            <label class="col-sm-2 col-form-label">Модель автомобиля</label>
            <div class="col-sm-10">
                <input name="model" class="form-control" placeholder="Введите модель автомобиля">
            </div>
        </div>

        <div class="row mt-3">
            <label class="col-sm-2 col-form-label">Цвет кузова</label>
            <div class="col-sm-10">
                <input name="color" class="form-control" placeholder="Введите цвет автомобиля">
            </div>
        </div>

        <div class="row mt-3">
            <label class="col-sm-2 col-form-label">Гос Номер РФ</label>
            <div class="col-sm-10">
                <input name="rf_number" class="form-control" placeholder="Введите Гос Номер автомобиля">
            </div>
        </div>

        <div class="row mt-3">
            <label class="col-sm-2 col-form-label">Статус автомобиля</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example">
                    <option selected></option>
                    <option value="1">Автомобиль наодится на стоянке</option>
                    <option value="2">Автомобиль отсутствует на стоянке</option>
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <p class="fs-5">Добавить клиента:</p>
            </div>
        </div>

        <div class="row mt-3">
            <label class="col-sm-2 col-form-label">Выбрать существуещего</label>
            <div class="col-sm-10">
               
                <select class="form-select" aria-label="Default select example">
                    <option selected></option>
                    <option value="1">к</option>
                </select>
              
            </div>
        </div>

        <!-- <div class="row mt-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                <p class="fs-5">Или создать нового:</p>
            </div>
        </div>

        <div class="row mt-3">
            <label class="col-sm-2 col-form-label">ФИО</label>
            <div class="col-sm-10">
                <input name="fio" class="form-control" placeholder="Введите ФИО клиента">
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-sm-2 col-form-label">Пол</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example">
                    <option selected></option>
                    <option value="1">мужской</option>
                    <option value="2">женский</option>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-sm-2 col-form-label">Номер</label>
            <div class="col-sm-10">
                <input name="number" class="form-control" placeholder="Введите номер клиента">
            </div>
        </div>
        <div class="row mt-3">
            <label class="col-sm-2 col-form-label">Адрес</label>
            <div class="col-sm-10">
                <input name="addres" class="form-control" placeholder="Введите адрес клиента">
            </div>
        </div> -->
        <div class="row mt-3 mb-3">
            <div class="d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-outline-dark">Сохранить</button>
            </div>
        </div>
    </form>


</div>

@endsection