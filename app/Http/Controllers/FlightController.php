<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Repositories\Flights;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    protected $flightsRepository;

    public function __construct()
    {
        $this->flightsRepository = new Flights();
    }

    public function index()
    {
        $flightsFetch =
            $this
                ->flightsRepository
                ->all();

        if ($flightsFetch->hasError()) {
            return response()->json($flightsFetch->getItems(), 500);
        }

        return response()->json($flightsFetch->getItems(), 200);
    }

    public function store(Request $request)
    {
        $flightsStore =
            $this
                ->flightsRepository
                ->store($request->all());

        if ($flightsStore->hasError()) {
            return response()->json($flightsStore->getItems(), 500);
        }

        return response()->json($flightsStore->getItems(), 201);
    }

    public function show($id)
    {
        $flightFetch =
            $this
                ->flightsRepository
                ->show($id);

        if ($flightFetch->hasError()) {
            return response()->json($flightFetch->getItems(), 500);
        }

        return response()->json($flightFetch->getItems(), 200);
    }

    public function update($id, Request $request)
    {
        $flightUpdate =
            $this
                ->flightsRepository
                ->update($id, $request->all());

        if ($flightUpdate->hasError()) {
            return response()->json($flightUpdate->getItems(), 500);
        }

        return response()->json($flightUpdate->getItems(), 200);
    }

    public function delete($id)
    {
        $flightDelete =
            $this
                ->flightsRepository
                ->delete($id);

        if ($flightDelete->hasError()) {
            return response()->json($flightDelete->getItems(), 500);
        }

        return response()->json($flightDelete->getItems(), 200);
    }
}
