<?php

namespace App\Http\Controllers;

use App\Models\Cipher;
use App\Models\Kuitansi;
use COM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = auth()->user()->kuitansi()->pluck('kuitansis.user_id');
        $collection = Kuitansi::whereIn('user_id', $user)->latest()->get();
        return view('main.index')->with('collection', $collection);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('main.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = Request::create('/api/kuitansi/store','POST');
        Route::dispatch($request);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cek = Cipher::find($id);
        if (is_null($cek)) {
            $kuitansi = Kuitansi::find($id);
            return view('main.buatcipher', compact('kuitansi'));
        }
        $cipher = Cipher::where('kuitansi_id', $id)->get();
        $kuitansi = Kuitansi::find($id);
        return view('main.show', compact('cipher','kuitansi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function cipher()
    {
        $request = Request::create('/api/cipher/store','POST');
        Route::dispatch($request);
        return redirect('/');
    }
    public function print($id)
    {
        $cipher = Cipher::where('kuitansi_id', $id)->get();
        $kuitansi = Kuitansi::find($id);
        return view('main.print', compact('cipher','kuitansi'));
    }
    public function validasiscan()
    {
        return view('main.validasi');
    }

    public function validasi(Request $request)
    {
        $data = Cipher::where('cipher', $request->hasil)->first();
        if ($data != null) {
            return back()->with('status','Kuitansi berasal dari sini');
        } else {
            return back()->with('fake','Kuitansi TIDAK berasal dari sini');
        }
    }
    public function ds()
    {
        $user = 1;
        $collection = Kuitansi::where('id', $user)->latest()->get();
        return view('main.ds')->with('collection', $collection);
    }
}
