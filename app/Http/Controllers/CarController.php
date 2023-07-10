<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Car;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = !array_key_exists('page', $request->all()) ? 1 : $request->all()['page'];
        $clients = Client::getAll();
        $cars = Car::getAllWithClientsLimit($page);
        $countPage = Car::getCountPage(5);
        return view('all-clients', compact('cars', 'clients', 'countPage', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::getAll();
        return view('form-create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'color' => 'required',
            'rf_number' => 'required',
            'parking' => 'required',
            'fio' => '',
            'number' => '',
            'gender' => '',
            'addres' => '',

        ]);

        $validatedData = $request->validate([
            'option' => 'required|string|in:option1,option2',
        ]);

        $car = Car::getByRfNumber($request['rf_number']);

        $client = Client::getByNumber($request['number']);

        if ($validatedData['option'] === 'option1') {
            if ($car != null) {
                session()->flash('errorRfNumber');

                return back()->withInput();
            }
            else {
                Car::create($request->only(['brand', 'model', 'color', 'rf_number', 'parking', 'id_client']));
                return redirect()->route('cars.index');
            }

        } else if ($validatedData['option'] === 'option2') {

            if ($car != null) {
                session()->flash('errorRfNumber');

                return back()->withInput();
            }
            if ($client != null) {
                session()->flash('errorNumber');

                return back()->withInput();
            }
            else {
                $client_id = Client::create($request->only(['fio', 'gender', 'number', 'addres']));
                Car::createByParametrAndClientId($request->only(['brand', 'model', 'color', 'rf_number', 'parking']), $client_id);
                return redirect()->route('cars.index');
            }

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
//        return view("show");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
//
    }
    public function editCarClient(Request $request, $idCar, $idClient)
    {

        $client = Client::getById($idClient);
        $car = Car::getById($idCar);;
        //dd($car);
        // dd($client);
        return view('form-edit', compact('car', 'client'));
    }

    public function updateCarClient(Request $request,)
    {
        $validatedData = $request->validate([
            'carId' => 'required',
            'clientId' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'color' => 'required',
            'rf_number' => 'required',
            'parking' => 'required',
            'fio' => 'required',
            'number' => 'required',
            'gender' => 'required',
            'addres' => '',
        ]);

        $car = Car::getByRfNumber($validatedData['rf_number']);

        $client = Client::getByNumber($validatedData['number']);
        $idCar = $car ?? null;
        $idClient = $client ?? null;
        if (($car != null) && ($client != null)) {
            if ($validatedData['carId'] != $car->id) {
                session()->flash('errorRfNumber');

                return back()->withInput();
            }
            if ($validatedData['clientId'] != $client->id) {
                session()->flash('errorNumber');

                return back()->withInput();
            }else {
                Car::updateById($validatedData);
                Client::updateById($validatedData);
                return redirect()->route('cars.index');
            }
        }
        else {
            Car::updateById($validatedData);
            Client::updateById($validatedData);
            return redirect()->route('cars.index');
        }

    }

    public function deleteCarClient(Request $request, $idCar, $idClient)
    {
        $car = Car::getById($idCar);
        $client = Car::getById($idClient);
        $carCount = Client::getCountCars($idClient)->carCount;

        if ($car != null) {
            Car::deleteById($idCar);
        }
        if ($carCount == 1) {
            Client::deleteById($idClient);
        }
        return redirect()->route('cars.index');
    }


    public function parkingCarClient(Request $request)
    {
        $page = !array_key_exists('page', $request->all()) ? 1 : $request->all()['page'];
        $clients = Client::getAllParking($page);
        $countPage = CLient::getCountPage(3);

        foreach ($clients as $client) {
            $client->cars = (Car::allCarById($client->id));
        }
        return view('parking-car', compact('clients', 'countPage', 'page'));
    }

    public function updateCarParking(Request $request)
    {

        $validatedData = $request->validate([
            'parking' => 'required',
            'carId' => 'required',
        ]);

        Car::updateParkingById($validatedData);

        return redirect()->route('parkingCarClient');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $idCar)
    {
        //
    }
}
