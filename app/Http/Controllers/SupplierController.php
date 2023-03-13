<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use Exception;
use GuzzleHttp\Psr7\Request;
use Nette\Schema\Expect;

class SupplierController extends Controller
{

    public function index()
    {
       $data = Supplier::all();
       return response()->json($data);
    }

    public function findByID($id)
    {
        $data = Supplier::find($id);
        return response()->json($data);
    }

    public function save(StoreSupplierRequest $request)
    {
        try{
            $request->validate([
                "Nama_Supplier" => 'required',
                "Alamat" => 'required',
                "Telpon" => 'required',
                "Email" => 'required',
            ]);
            $data = new Supplier();
            $data->Nama_Supplier = $request->Nama_Supplier;
            $data->Alamat = $request->Alamat;
            $data->Telpon = $request->Telpon;
            $data->Email = $request->Email;
            $data->save();
            return response()->json($data);

        }catch(Exception $e){
            return response()->json(['message'=>'Failed'.$e->getMessage()],400);
        };
    }

    public function updateSupplier($id,UpdateSupplierRequest $supplier)
    {
        $data = Supplier::find($id);
        $data->Nama_Supplier=$supplier->Nama_Supplier;
        $data->Alamat=$supplier->Alamat;
        $data->Telpon=$supplier->Telpon;
        $data->Email=$supplier->Email;
        $data->save();
        return response()->json($data);
    }

    public function deleteSupplier($id)
    {
        $data = Supplier::find($id);

        $data->delete();

        return response()->json(['deleted'=>true]);
    }
}
