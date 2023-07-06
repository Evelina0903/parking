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
        $cars = Car::getAll();
        //    $clients = Client::with('cars')->get();
        $clients = Client::getAll();
        $cars = Car::getAllWithClients();
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
            'fio' => 'required|min:3',
            'number' => 'required',

        ]);



        // dd($request->all());
        $validatedData = $request->validate([
            'option' => 'required|string|in:option1,option2',
            // Add validation rules for other fields if needed
        ]);

        if ($validatedData['option']  === 'option1') {
            Car::create($request->only(['brand', 'model', 'color', 'rf_number', 'parking', 'id_client']));
            return redirect()->route('cars.index');
        }
        else if ($validatedData['option'] === 'option2'){
            $client_id = Client::create($request->only(['fio', 'gender', 'number','addres']));
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

        $clients = Client::getAll();
        return view('form-edit', compact('clients'));
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
    public function destroy(string $id)
    {
        //
    }
}
