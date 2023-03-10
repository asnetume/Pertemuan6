<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "message" => "success",
            'statusCode' => 200,
            "data" => Event::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        try {
            $isValidateData = $request->validate([
                "id_user" => 'required',
                "id_provinsi" => 'required',
                "deskripsi" => 'required',
                "status" => 'required',
                "exp_date" => 'required',
                "judul" => 'required',
            ]);
            Event::create($isValidateData);
            return response()->json([
                "message" => "success",
                'statusCode' => 200,
                "data" => $isValidateData,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => 'error kesalahan saat insert data',
                'statusCode' => 400,
                "data" => null
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        try {
            return response()->json([
                "message" => "success",
                'statusCode' => 200,
                "data" => Event::find($event)
            ]);;
        } catch (\Throwable $th) {
            return response()->json([
                "message" => 'error data tidak di temukan',
                'statusCode' => 404,
                "data" => null
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        try {
            $isValidateData = $request->validate([
                "id_user" => 'required',
                "id_provinsi" => 'required',
                "deskripsi" => 'required',
                "status" => 'required',
                "exp_date" => 'required',
                "judul" => 'required',
            ]);
            $event->update($isValidateData);
            return response()->json([
                "message" => "success",
                'statusCode' => 200,
                "data" => $isValidateData,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => 'error kesalahan saat update data',
                'statusCode' => 400,
                "data" => null
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        try {
            $event->delete();
            return response()->json([
                "message" => "success",
                'statusCode' => 200,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "error kesalahan saat delete data",
                'statusCode' => 400,
            ]);
        }
    }
}
