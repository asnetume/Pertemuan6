<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use App\Http\Requests\StorePendidikanRequest;
use App\Http\Requests\UpdatePendidikanRequest;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "message" => "success",
            'statusCode' => 200,
            "data" => Pendidikan::all(),
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
    public function store(StorePendidikanRequest $request)
    {
        try {
            $isValidateData = $request->validate([
                "id_pencaker" => 'required',
                "institusi" => 'required',
                "jurusan" => 'required',
                "tahun_lulus" => 'required',
                "ijasah" => 'required',
                "ipk" => 'required',
            ]);
            Pendidikan::create($isValidateData);
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
    public function show(Pendidikan $pendidikan)
    {
        try {
            return response()->json([
                "message" => "success",
                'statusCode' => 200,
                "data" => Pendidikan::find($pendidikan)
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
    public function edit(Pendidikan $pendidikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePendidikanRequest $request, Pendidikan $pendidikan)
    {
        try {
            $isValidateData = $request->validate([
                "id_pencaker" => 'required',
                "institusi" => 'required',
                "jurusan" => 'required',
                "tahun_lulus" => 'required',
                "ijasah" => 'required',
                "ipk" => 'required',
            ]);
            $pendidikan->update($isValidateData);
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
    public function destroy(Pendidikan $pendidikan)
    {
        try {
            $pendidikan->delete();
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
