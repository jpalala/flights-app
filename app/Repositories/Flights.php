<?php

namespace App\Repositories;

use App\Flight;
use App\Http\Resources\Flight as FlightResource;
use Illuminate\Support\Facades\Log;

class Flights extends Repository
{
    public function all(): Repository
    {
        try {
            $Flights = Flight::all();
            $FlightsList = FlightResource::collection($Flights);
        } catch (\Exception $e) {
            Log::error(
                'Something went wrong while getting the Flights from the database',
                [
                    'message' => $e->getMessage()
                ]
            );
            $error = true;
        }

        return (new Repository())
            ->setError($error ?? false)
            ->setItems($FlightsList ?? []);
    }

    public function store($data): Repository
    {
        try {
            $Flight = Flight::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'date' => $data['date'],
                'user_id' => $data['user_id']
            ]);
            $singleItem = new FlightResource($Flight);
        } catch (\Exception $e) {
            Log::error(
                'Something went wrong while storing the Flight into the database',
                [
                    'message' => $e->getMessage()
                ]
            );
            $error = true;
        }

        return (new Repository())
            ->setError($error ?? false)
            ->setItems($singleItem ?? []);
    }

    public function show($id): Repository
    {
        try {
            $Flight = Flight::find($id);
            $singleItem = new FlightResource($Flight);
        } catch (\Exception $e) {
            Log::error(
                'Something went wrong while getting the Flight into the database',
                [
                    'message' => $e->getMessage()
                ]
            );
            $error = true;
        }

        return (new Repository())
            ->setError($error ?? false)
            ->setItems($singleItem ?? []);
    }

    public function update($id, $data): Repository
    {
        try {
            $Flight =
                $this
                    ->show($id)
                    ->getItems();
            $Flight->title = $data['title'];
            $Flight->description = $data['description'];
            $Flight->date = $data['date'];
            $Flight->user_id = $data['user_id'];
            $Flight->save();

            $singleItem = new FlightResource($Flight);
        } catch (\Exception $e) {
            Log::error(
                'Something went wrong while updating the Flight into the database',
                [
                    'message' => $e->getMessage()
                ]
            );
            $error = true;
        }

        return (new Repository())
            ->setError($error ?? false)
            ->setItems($singleItem ?? []);
    }

    public function delete($id): Repository
    {
        try {
            $Flight =
                $this
                    ->show($id)
                    ->getItems();
            $Flight->delete();
        } catch (\Exception $e) {
            Log::error(
                'Something went wrong while getting the Flight into the database',
                [
                    'message' => $e->getMessage()
                ]
            );
            $error = true;
        }

        return (new Repository())
            ->setError($error ?? false);
    }
}
