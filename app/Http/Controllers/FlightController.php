<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flight;

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
		    'destination' => 'required',
		    'origin' => 'required',
		    'departime' => 'required',
		    'artival time' => 'required'
		    'name' => required
	    ]);
	    $data-> $request->all();

			$this->fill([
					'destination' => $data['destination'],
				'origin' => $data['origin'],
				'departure_time' => $data['departure_time'],
				'arrival_time' => $data['arrival_time'],
				'name' => $data['name']]
			);
		$this->save();
		return success;

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
	$flight->departure_time = $request->input('departure_time');;
	$flight->arrival_time = $request->input('arrival_time');;
	$flight->name = $request->input('name');;
	$photo->delayed = $request->input('delayed');;
	$photo->cancelled = $request->input('cancelled');;
	    $photo->save();
    return $photo;
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
