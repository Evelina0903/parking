@extends('layout')

@section('content')

    <div class="container background">
        <div class="mx-auto" style="width: 75%;">
            <p class="fs-2 text-center">Стоянка</p>
            <a href="{{ route('cars.index') }}" class="btn btn-outline-dark">
                Вернуться
            </a>
            <form method="POST" action="/updateCarParking">
                @csrf
                @foreach ($clients as $client)
                    <div class="row mt-3">
                        <div class="col">
                            <label class="col-form-label">Машины клиента {{ $client->fio}}</label>
                        </div>
                        <div class="col">
                            @foreach($client->cars as $car)
                                <form method="POST" action="/updateCarParking">
                                    @csrf
                                    <div class="row mt-3 mb-3">
                                        <div class="d-md-flex justify-content-md-end">
                                            <button type="submit" class="btn btn-outline-dark">Сохранить</button>
                                        </div>
                                    </div>

                                    <label class="col-form-label">Машина {{ $car->model}}</label>
                                    <input type="hidden" name="carId" value="{{$car->id}}">
                                    <select name="parking" class="form-select" aria-label="Default select example">
                                        <option selected></option>
                                        <option value="0" @if ($car->parking == 0) selected @endif>Автомобиль находится
                                            на
                                            стоянке
                                        </option>
                                        <option value="1" @if ($car->parking == 1) selected @endif>Автомобиль
                                            отсутствует на
                                            стоянке
                                        </option>
                                    </select>
                                </form>
                            @endforeach
                        </div>


                    </div>
                @endforeach


            </form>
            <nav aria-label="Page navigation example">
                <ul class="pagination">

                    @if($page!=1)
                        <li class="page-item"><a class="page-link link-dark" href="/parkingCarClient?page={{$page-1}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                                    <path
                                        d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                                </svg>
                            </a>
                        </li>
                    @endif

                    @for($i=1; $i<=$countPage; $i++)
                        <li class="page-item"><a class="page-link link-dark @if($i==$page) active @endif "
                                                 href="/parkingCarClient?page={{$i}}">{{$i}}</a></li>
                    @endfor
                    @if($page!=$countPage)
                        <li class="page-item"><a class="page-link link-dark" href="/parkingCarClient?page={{$page+1}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                    <path
                                        d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                                </svg>
                            </a>
                        </li>
                    @endif

                </ul>
            </nav>

        </div>
    </div>

@endsection
