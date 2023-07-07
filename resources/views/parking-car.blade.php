@extends('layout')

@section('content')

    <div class="container">
        <p class="fs-2 text-center">Стоянка</p>
        <a href="{{ route('cars.index') }}" class="btn btn-outline-dark">
            Вернуться
        </a>

        <form>
            @csrf

            <div class="row mt-3">
                <label class="col-sm-2 col-form-label">Выбрать клиента</label>
                <div class="col-sm-10">
                    <select name="id_client" class="form-select" aria-label="Default select example" id="id-client-select" value="{{ old('id_client') }}" required>
                        <option selected></option>
                        @foreach ($clients as $client)
                            <option value="{{$client-> id}}">{{$client->fio}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <label class="col-sm-2 col-form-label">Машина</label>
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

            <div class="row mt-3 mb-3">
                <div class="d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-outline-dark">Сохранить</button>
                </div>
            </div>

        </form>
    </div>


@endsection
