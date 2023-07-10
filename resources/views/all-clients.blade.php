@extends('layout')

@section('content')

    <div class="container background">
        <div class="mx-auto" style="width: 75%;">
            <div class="row all-clients">
                <div class="col">
                    <p class="fs-2">Все клиенты</p>
                </div>
                <div class="col d-flex justify-content-md-end">
                    <div class="d-grid gap-2 d-md-block">
                        <a href="{{ route('cars.create') }}" class="btn btn-outline-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                            </svg>
                            Добавить
                        </a>
                        <a href="/parkingCarClient" class="btn btn-outline-dark">
                            Стоянка
                        </a>
                    </div>

                </div>


            </div>
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                <tr>
                    <th scope="col">Клиент</th>
                    <th scope="col">Автомобиль</th>
                    <th scope="col">Номер</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <td>{{ $car->fio}}</td>
                        <td>{{ $car->brand }}</td>
                        <td>{{ $car->rf_number }}</td>
                        <td>
                            <a href="edit/{{ $car->car_id}}/{{ $car->id_client}}/editCarClient" type="button"
                               class="btn btn-outline-dark d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                </svg>
                            </a>
                        </td>
                        <td>
                            <a href="cars/{{ $car->car_id}}/{{ $car->id_client}}/deleteCarClient" type="button"
                               class="btn btn-outline-danger d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path
                                        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">

                    @if($page!=1)
                        <li class="page-item"><a class="page-link link-dark" href="/cars?page={{$page-1}}">
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
                                                 href="/cars?page={{$i}}">{{$i}}</a></li>
                    @endfor
                    @if($page!=$countPage)
                        <li class="page-item"><a class="page-link link-dark" href="/cars?page={{$page+1}}">
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
