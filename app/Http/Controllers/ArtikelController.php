<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Http\Requests\StoreArtikelRequest;
use App\Http\Requests\UpdateArtikelRequest;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return response()->json([
            "message" => "success",
            'statusCode' => 200,
            "data" => Artikel::all(),
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
    public function store(StoreArtikelRequest $request)
    {
        try {
            $isValidateData = $request->validate([
                "id_user" => 'required',
                "judul" => 'required',
                "isi" => 'required',
            ]);
            Artikel::create($isValidateData);
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
    public function show(Artikel $artikel)
    {
        try {
            return response()->json([
                "message" => "success",
                'statusCode' => 200,
                "data" => Artikel::find($artikel)
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
    public function edit(Artikel $artikel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArtikelRequest $request, Artikel $artikel)
    {
        try {
            $isValidateData = $request->validate([
                "id_user" => 'required',
                "judul" => 'required',
                "isi" => 'required',
            ]);
            $artikel->update($isValidateData);
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
    public function destroy(Artikel $artikel)
    {
        try {
            $artikel->delete();
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
