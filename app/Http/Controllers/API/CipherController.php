<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CipherResource;
use App\Models\Cipher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CipherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cipher = Cipher::all();
        return response(['ciphers' => CipherResource::collection($cipher)]);
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
            'kuitansi_id' => 'required',
            'cipher' => 'required'
        ]);
        if ($validasi->fails()) {
            return response(['error' => $validasi->errors(), 'Validasi Error']);
        }
        $cipher = Cipher::create($data);
        return response(['cipher' => new CipherResource($cipher)]);
    }
}
