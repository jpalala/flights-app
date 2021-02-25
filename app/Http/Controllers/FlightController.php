<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flight as Flight;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $flights = Flight::all();
	    return $flights;
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
		    'destination' => 'required',
		    'origin' => 'required',
		    'departure_time' => 'required',
		    'arrival_time' => 'required'
        ]);

	    $data = $request->all();

        $this->fill([
			'name' => $data['name'],
			'destination' => $data['destination'],
			'origin' => $data['origin'],
			'departure_time' => $data['departure_time'],
			'arrival_time' => $data['arrival_time']
        ]);

		$this->save();
        
        return response()->json([
            'message' => 'success',
        ]);;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $flight = Flight::findOrFail($id);
        return response()->json($flight);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $flight = Flight::find($id);
        $flight->destination = $request->input('destination');
        $flight->origin = $request->input('origin');
        $flight->departure_time = $request->input('departure_time');
        $flight->arrival_time = $request->input('arrival_time');
        $flight->name = $request->input('name');
        $flight->delayed = $request->input('delayed');
        $flight->cancelled = $request->input('cancelled');

        $flight->save();

        return $flight;
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
