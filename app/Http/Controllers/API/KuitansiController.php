<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\KuitansiResource;
use App\Models\Kuitansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KuitansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $kuitansi = Kuitansi::all();
        // return response(['kuitansis' => KuitansiResource::collection($kuitansi)]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validasi = Validator::make($data,[
            'nomor' => 'required',
            'dari' => 'required',
            'transaksi' => 'required',
            'nominal' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'nama' => 'required'
        ]);
        if ($validasi->fails()) {
            return response(['error' => $validasi->errors(),'Validasi Error']);
        }
        $kuitansi = Kuitansi::create($data);
        return response(['kuitansi' => new KuitansiResource($kuitansi), 'message' => 'Kuitansi baru berhasil dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kuitansi $kuitansi)
    {
        return response(['Kuitansi' => new KuitansiResource($kuitansi)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kuitansi $kuitansi)
    {
        $data = $request->all();
        $validasi = Validator::make($data,[
            'nomor' => 'required',
            'dari' => 'required',
            'transaksi' => 'required',
            'nominal' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'nama' => 'required'
        ]);
        if ($validasi->fails()) {
            return response(['error' => $validasi->errors(), 'Validasi Error']);
        }
        $kuitansi->update($data);
        return response(['kuitansi' => new KuitansiResource($kuitansi), 'message' => 'Kuitansi Berhasil diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kuitansi $kuitansi)
    {
        $kuitansi->delete();
        return response(['message' => 'Kuitansi Berhasil dihapus']);
    }
}
