<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Http\Requests\StorePerusahaanRequest;
use App\Http\Requests\UpdatePerusahaanRequest;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "message" => "success",
            'statusCode' => 200,
            "data" => Perusahaan::all(),
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
    public function store(StorePerusahaanRequest $request)
    {
        try {
            $isValidateData = $request->validate([
                "id_user" => 'required',
                "id_bidang" => 'required',
                "nama" => 'required',
                "alamat" => 'required',
                "provinsi" => 'required',
                "website" => 'required',
            ]);
            Perusahaan::create($isValidateData);
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
    public function show(Perusahaan $perusahaan)
    {
        try {
            return response()->json([
                "message" => "success",
                'statusCode' => 200,
                "data" => Perusahaan::find($perusahaan)
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
    public function edit(Perusahaan $perusahaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerusahaanRequest $request, Perusahaan $perusahaan)
    {
        try {
            $isValidateData = $request->validate([
                "id_user" => 'required',
                "id_bidang" => 'required',
                "nama" => 'required',
                "alamat" => 'required',
                "provinsi" => 'required',
                "website" => 'required',
            ]);
            $perusahaan->update($isValidateData);
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
    public function destroy(Perusahaan $perusahaan)
    {
        try {
            $perusahaan->delete();
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
