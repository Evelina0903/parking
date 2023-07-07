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
    public function index()
    {


        //    $clients = Client::with('cars')->get();
        $clients = Client::getAll();
        $cars = Car::getAllWithClients();

       // dd($clients);
        return view('all-clients', compact('cars', 'clients'));
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
        //dd($request->all());
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'color' => 'required',
            'rf_number' => 'required',

        ]);


        // dd($request->all());
        $validatedData = $request->validate([
            'option' => 'required|string|in:option1,option2',
            // Add validation rules for other fields if needed
        ]);

        if ($validatedData['option'] === 'option1') {
            Car::create($request->only(['brand', 'model', 'color', 'rf_number', 'parking', 'id_client']));
            return redirect()->route('cars.index');
        } else if ($validatedData['option'] === 'option2') {
            $client_id = Client::create($request->only(['fio', 'gender', 'number', 'addres']));
            Car::createByParametrAndClientId($request->only(['brand', 'model', 'color', 'rf_number', 'parking']), $client_id);
            return redirect()->route('cars.index');
        }

        //dd($request->all());
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

    public function editCarClient(Request $request)
    {

        $clients = Client::getAll();
        $cars = Car::getAllWithClients();;
       // dd($client);
        return view('form-edit', compact('car', 'client'));
    }

    public function updateCarClient(Request $request, )
    {
        //dd($request);
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

        Car::updateById($validatedData);
        Client::updateById($validatedData);
        return redirect()->route('cars.index');
    }

    public function deleteCarClient(Request $request, $idCar, $idClient)
    {
//        var_dump($idCar);
//        var_dump($idClient);
//        die();
        //dd(Client::getCountCars($idClient));
        $car=Car::getById($idCar);
        $client=Car::getById($idClient);
        $carCount = Client::getCountCars($idClient) -> carCount;

        if($car != null)
        {
            Car::deleteById($idCar);
        }
        if($carCount == 1 )
        {
            Client::deleteById($idClient);
        }



        return redirect()->route('cars.index');
    }


    public function parkingCarClient(Request $request)
    {
        //var_dump($idCar);
        //var_dump($idClient);
        //die();
        $clients = Client::getAll();
        $cars = Car::getAllWithClients();
        // dd($client);
        return view('parking-car', compact('cars', 'clients'));
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
