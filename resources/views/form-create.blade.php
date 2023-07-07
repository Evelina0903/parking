@extends('layout')

@section('content')

<script>
    function fieldActivation() {
        var option = document.querySelector('input[name="option"]:checked').value;
        if (option === "option1") {
            document.getElementById("clientField").style.display = "none";
            document.getElementById("carField").style.display = "block";
            document.getElementById("id-client-select").setAttribute('required', '');
            document.getElementById("gender-select").removeAttribute('required');
            document.getElementById("fio-required").removeAttribute('required');
            document.getElementById("fio-required").removeAttribute('min:3');
            document.getElementById("gender-select").removeAttribute('required');
        } else if (option === "option2") {
            document.getElementById("clientField").style.display = "block";
            document.getElementById("carField").style.display = "none";
            document.getElementById("gender-select").setAttribute('required', '');
            document.getElementById("id-client-select").removeAttribute('required');
            document.getElementById("fio-required").setAttribute('required',  '');
            document.getElementById("fio-required").setAttribute('min:3',  '');
            document.getElementById("number-required").setAttribute('required', '');
        }

    }


</script>

<div class="container">



    <p class="fs-2 text-center">Добавить новую запись</p>
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
    <form method="POST" action="{{ route('cars.store') }}">
        @csrf
        <div class="row mt-3">
            <label class="col-sm-2 col-form-label">Марка автомобиля</label>
            <div class="col-sm-10">
                <input name="brand" class="form-control" placeholder="Введите марку автомобиля"  required>
            </div>
        </div>

        <div class="row mt-3">
            <label class="col-sm-2 col-form-label">Модель автомобиля</label>
            <div class="col-sm-10">
                <input name="model" class="form-control" placeholder="Введите модель автомобиля"  required>
            </div>
        </div>

        <div class="row mt-3">
            <label class="col-sm-2 col-form-label">Цвет кузова</label>
            <div class="col-sm-10">
                <input name="color" class="form-control" placeholder="Введите цвет автомобиля" required>
            </div>
        </div>

        <div class="row mt-3">
            <label class="col-sm-2 col-form-label">Гос Номер РФ</label>
            <div class="col-sm-10">
                <input name="rf_number" class="form-control" placeholder="Введите Гос Номер автомобиля" required>
            </div>
        </div>

        <div class="row mt-3">
            <label class="col-sm-2 col-form-label">Статус автомобиля</label>
            <div class="col-sm-10">
                <select name="parking" class="form-select" aria-label="Default select example"  required>
                    <option selected></option>
                    <option value="0">Автомобиль наодится на стоянке</option>
                    <option value="1">Автомобиль отсутствует на стоянке</option>
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="option" value="option1" onclick="fieldActivation()" id="flexRadioDefault1" checked>
                <p class="fs-5">Добавить клиента:</p>
            </div>
        </div>


        <div id="carField" >
            <div class="row mt-3">
                <label class="col-sm-2 col-form-label">Выбрать существуещего</label>

                <div class="col-sm-10">

                    <select name="id_client" class="form-select" aria-label="Default select example" id="id-client-select" required>
                        <option selected></option>
                        @foreach ($clients as $client)
                        <option value="{{$client-> id}}">{{$client->fio}}</option>
                        @endforeach
                    </select>

                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="option" value="option2" onclick="fieldActivation()" id="flexRadioDefault2"  >
                <p class="fs-5">Или создать нового:</p>
            </div>
        </div>

        <div id="clientField" >
            <div class="row mt-3">
                <label class="col-sm-2 col-form-label">ФИО</label>
                <div class="col-sm-10">
                    <input name="fio" class="form-control" placeholder="Введите ФИО клиента" minlength="3" maxlength="255" id="fio-required">
                </div>
            </div>
            <div class="row mt-3">
                <label class="col-sm-2 col-form-label">Пол</label>
                <div class="col-sm-10">
                    <select name="gender" class="form-select" aria-label="Default select example" id="gender-select" >
                        <option selected></option>
                        <option value="0">мужской</option>
                        <option value="1">женский</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <label class="col-sm-2 col-form-label">Номер</label>
                <div class="col-sm-10">
                    <input name="number" class="form-control" placeholder="Введите номер клиента" id="number-required" >
                </div>
            </div>
            <div class="row mt-3">
                <label class="col-sm-2 col-form-label">Адрес</label>
                <div class="col-sm-10">
                    <input name="addres" class="form-control" placeholder="Введите адрес клиента" >
                </div>
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
