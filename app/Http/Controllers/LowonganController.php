<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Http\Requests\StoreLowonganRequest;
use App\Http\Requests\UpdateLowonganRequest;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return response()->json([
            "message" => "success",
            'statusCode' => 200,
            "data" => Lowongan::all(),
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
    public function store(StoreLowonganRequest $request)
    {
        try {
            $isValidateData = $request->validate([
                "id_perusahaan" => 'required',
                "id_user" => 'required',
                "id_event" => 'required',
                "posisi" => 'required',
                "kuota" => 'required',
                "tugas" => 'required',
                "gaji" => 'required',
                "fasilitas" => 'required',
                "deskripsi" => 'required',
                "jenis_kelamin" => 'required',
                "usia_minimal" => 'required',
                "usai_maximal" => 'required',
                "kualifikasi" => 'required',
            ]);
            Lowongan::create($isValidateData);
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
    public function show(Lowongan $lowongan)
    {
        try {
            return response()->json([
                "message" => "success",
                'statusCode' => 200,
                "data" => Lowongan::find($lowongan)
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
    public function edit(Lowongan $lowongan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLowonganRequest $request, Lowongan $lowongan)
    {
        try {
            $isValidateData = $request->validate([
                "id_perusahaan" => 'required',
                "id_user" => 'required',
                "id_event" => 'required',
                "posisi" => 'required',
                "kuota" => 'required',
                "tugas" => 'required',
                "gaji" => 'required',
                "fasilitas" => 'required',
                "deskripsi" => 'required',
                "jenis_kelamin" => 'required',
                "usia_minimal" => 'required',
                "usai_maximal" => 'required',
                "kualifikasi" => 'required',
            ]);
            $lowongan->update($isValidateData);
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
    public function destroy(Lowongan $lowongan)
    {
        try {
            $lowongan->delete();
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
