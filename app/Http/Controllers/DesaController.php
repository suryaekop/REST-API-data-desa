<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\Village;
use App\Models\Desa;
use Illuminate\Validation\Rule;

class DesaController extends Controller
{
    public function index()
    {
        $desa = Desa::all();
        return response()->json($desa);
    }
    public function tampil($id)
    {
        $desa = Desa::find($id);
        if(!$desa){
            return response()->json(['error' => 'Desa Tidak ditemukan'],404);
        }
        return response()->json($desa);
    }
    public function tambah(Request $request)
    {
        $request->validate([
            'nama'=> 'required|string|max:255',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
        ]);
        $desa = Desa::create($request->all());
        return response()->json($desa,201);
    }
    public function edit(Request $request,$id)
    {
        $desa = Desa::find($id);
        if(!$desa){
            return response()->json(['message' => 'Desa Not Found'],404);
        }
        $request->validate([
            'nama'=> 'required|string|max:255',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
        ]);
        $desa->update($request->all());
        return response()->json($desa,200);

    }
    public function hapus($id)
    {
        $desa = Desa::find($id);
        if(!$desa){
            return response()->json(['message' => 'Desa Not Found'],404);
        }
        $desa->delete();
        return response()->json(['message'=>'Desa Deleted'],200);

    }
}
