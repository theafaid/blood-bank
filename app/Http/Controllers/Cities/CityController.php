<?php

namespace App\Http\Controllers\Cities;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cities\CityStoreRequest;
use App\Models\City;
use App\Repositories\Contracts\GovernorateRepositoryInterface;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cities.index', [
            'governorates' => resolve(GovernorateRepositoryInterface::class)->all(),
            'cities' => City::with('governorate')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityStoreRequest $request)
    {
        return City::create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function update(City $city, CityStoreRequest $request)
    {
         $city->update($request->validated());

        return $city;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
