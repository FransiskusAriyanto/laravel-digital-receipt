@extends('layouts.layout')
@section('title','Buat Kuitansi')
@section('content')
<form method="POST" enctype="multipart/form-data" action="/kuitansi/request/store">
@csrf
<div class="mb-3">
    <input type="hidden" class="form-control @error('user_id') is-invalid @enderror border-3 rounded-pill" id="user_id" name="user_id" value="{{Auth::user()->id}}">
    @error('user_id') <div class="invalid-feedback">{{$message}}</div>@enderror

    <label for="nomor" class="form-label">Nomor </label>
    <input type="text" class="form-control @error('nomor') is-invalid @enderror border-3 rounded-pill" id="nomor" name="nomor" value="{{old('nomor')}}">
    @error('nomor') <div class="invalid-feedback">{{$message}}</div>@enderror

    <label for="dari" class="form-label">Telah terima dari </label>
    <input type="text"  class="form-control @error('dari') is-invalid @enderror border-3 rounded-pill" id="dari" name="dari" value="{{old('dari')}}">
    @error('dari') <div class="invalid-feedback">{{$message}}</div>@enderror
                        
    <label for="transaksi" class="form-label">Untuk pembayaran </label>
    <input type="text"  class="form-control @error('transaksi') is-invalid @enderror border-3 rounded-pill" id="transaksi" name="transaksi" value="{{old('transaksi')}}">
    @error('transaksi') <div class="invalid-feedback">{{$message}}</div>@enderror

    <div class="nominal">
    <label for="nominal" class="form-label">Nominal </label>
    <input type="number"  class="form-control @error('nominal') is-invalid @enderror border-3 rounded-pill" id="nominal" name="nominal" value="{{old('nominal')}}">
    </div>

    <label for="lokasi" class="form-label">Lokasi</label>
    <input type="text"  class="form-control @error('lokasi') is-invalid @enderror border-3 rounded-pill" id="lokasi" name="lokasi" value="{{old('lokasi')}}">
    @error('lokasi') <div class="invalid-feedback">{{$message}}</div>@enderror

    <label for="tanggal" class="form-label">Tanggal</label>
    <input type="text"  class="form-control @error('tanggal') is-invalid @enderror border-3 rounded-pill" id="tanggal" name="tanggal" value="{{old('tanggal')}} <?php echo date('d'); ?>">
    @error('tanggal') <div class="invalid-feedback">{{$message}}</div>@enderror

    <label for="bulan" class="form-label">Bulan</label>
    <input type="text"  class="form-control @error('bulan') is-invalid @enderror border-3 rounded-pill" id="bulan" name="bulan" value="{{old('bulan')}} <?php echo date('m'); ?>">
    @error('bulan') <div class="invalid-feedback">{{$message}}</div>@enderror

    <label for="tahun" class="form-label">Tahun</label>
    <input type="text"  class="form-control @error('tahun') is-invalid @enderror border-3 rounded-pill" id="tahun" name="tahun" value="{{old('tahun')}} <?php echo date('Y'); ?>">
    @error('tahun') <div class="invalid-feedback">{{$message}}</div>@enderror

    <label for="nama" class="form-label">Nama Penanggung Jawab </label>
    <input type="text"  class="form-control @error('nama') is-invalid @enderror border-3 rounded-pill" id="nama" name="nama" value="{{Auth::user()->name}}">
    @error('nama') <div class="invalid-feedback">{{$message}}</div>@enderror
</div>
<button type="submit" class="btn btn-primary" onclick="konfirmasi()">Save</button>
</form>
@endsection