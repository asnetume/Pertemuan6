<?php

namespace App\Http\Controllers;

use App\Models\Pengalaman;
use App\Http\Requests\StorePengalamanRequest;
use App\Http\Requests\UpdatePengalamanRequest;

class PengalamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "message" => "success",
            'statusCode' => 200,
            "data" => Pengalaman::all(),
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
    public function store(StorePengalamanRequest $request)
    {
        try {
            $isValidateData = $request->validate([
                "id_pencaker" => 'required',
                "nama_perusahaan" => 'required',
                "jabatan" => 'required',
                "tahun_masuk" => 'required',
                "tahun_keluar" => 'required',
            ]);
            Pengalaman::create($isValidateData);
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
    public function show(Pengalaman $pengalaman)
    {
        try {
            return response()->json([
                "message" => "success",
                'statusCode' => 200,
                "data" => Pengalaman::find($pengalaman)
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
    public function edit(Pengalaman $pengalaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengalamanRequest $request, Pengalaman $pengalaman)
    {
        try {
            $isValidateData = $request->validate([
                "id_pencaker" => 'required',
                "nama_perusahaan" => 'required',
                "jabatan" => 'required',
                "tahun_masuk" => 'required',
                "tahun_keluar" => 'required',
            ]);
            $pengalaman->update($isValidateData);
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
    public function destroy(Pengalaman $pengalaman)
    {
        try {
            $pengalaman->delete();
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
