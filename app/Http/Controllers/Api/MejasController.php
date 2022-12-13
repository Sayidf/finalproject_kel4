<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meja;
use App\Http\Resources\MejasResource;
use DB;
use Illuminate\Support\Facades\Validator;

class MejasController extends Controller
{
    public function index()
    {  
        $meja = Meja::all();
        return new MejasResource(true, 'Data meja', $meja);
    }

    public function show($id)
    {
        $meja = Meja::find($id);
        return new MejasResource(true, 'Data meja', $meja);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'no_meja' => 'required|unique:meja|max:45',
            'kapasitas' => 'required|max:45',
            'created_at' => now(),
        ], [
            'no_meja.required' => 'Nomor Meja Wajib di isi',
            'kapasitas.required' => 'Kapasitas Wajib di isi',
        ]);

        //cek error
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        $meja = Meja::create([
          'no_meja'=>$request->no_meja,
          'kapasitas'=>$request->kapasitas,
          'created_at' => now(),
        ]);

        return new MejasResource(true, 'Data meja berhasil di input', $meja);
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),[
            'no_meja' => 'required|unique:meja|max:45',
            'kapasitas' => 'required|max:45',
            'created_at' => now(),
        ], [
            'no_meja.required' => 'Nomor Meja Wajib di isi',
            'kapasitas.required' => 'Kapasitas Wajib di isi',
        ]);

        //cek error
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        $meja = Meja::whereId($id)->update([
          'no_meja'=>$request->no_meja,
          'kapasitas'=>$request->kapasitas,
          'created_at' => now(),
        ]);

        return new MejasResource(true, 'Data meja berhasil di di update', $meja);
    }

    public function destroy($id)
    {
        $meja = Meja::whereId($id)->first();
        $meja->delete();

        return new MejaResource(true, 'Data meja berhasil di hapus',$meja);

    }
}
