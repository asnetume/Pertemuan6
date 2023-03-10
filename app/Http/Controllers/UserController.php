<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "message" => "success",
            'statusCode' => 200,
            "data" => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $isValidateData = $request->validate([
                "provinsi" => 'required',
            ]);
            User::create($isValidateData);
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
    public function show(string $id)
    {
        try {
            return response()->json([
                "message" => "success",
                'statusCode' => 200,
                "data" => User::find($id)
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try {
            $isValidateData = $request->validate([
                "provinsi" => 'required',
            ]);
            $user->update($isValidateData);
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
    public function destroy(User $user)
    {
        try {
            $user->delete();
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
