<?php

namespace App\Http\Controllers;

use App\Models\Pencaker;
use App\Http\Requests\StorePencakerRequest;
use App\Http\Requests\UpdatePencakerRequest;

class PencakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "message" => "success",
            'statusCode' => 200,
            "data" => Pencaker::all(),
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
    public function store(StorePencakerRequest $request)
    {
        try {
            $isValidateData = $request->validate([
                "id_user" => 'required',
                "id_provinsi" => 'required',
                "nama" => 'required',
                "tangal_lahir" => 'required',
                "jenis_kelamin" => 'required',
                "telpon" => 'required',
                "ktp" => 'required',
                "disabilitas" => 'required',
            ]);
            Pencaker::create($isValidateData);
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
    public function show(Pencaker $pencaker)
    {
        try {
            return response()->json([
                "message" => "success",
                'statusCode' => 200,
                "data" => Pencaker::find($pencaker)
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
    public function edit(Pencaker $pencaker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePencakerRequest $request, Pencaker $pencaker)
    {

        try {
            $isValidateData = $request->validate([
                "id_user" => 'required',
                "id_provinsi" => 'required',
                "nama" => 'required',
                "tangal_lahir" => 'required',
                "jenis_kelamin" => 'required',
                "telpon" => 'required',
                "ktp" => 'required',
                "disabilitas" => 'required',
            ]);
            $pencaker->update($isValidateData);
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
    public function destroy(Pencaker $pencaker)
    {
        try {
            $pencaker->delete();
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
