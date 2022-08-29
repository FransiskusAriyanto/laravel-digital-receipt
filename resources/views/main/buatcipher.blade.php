@extends('layouts.layout')
@section('title','Data Kuitansi')
@section('content')
<div class="invoice p-3 mb-3">
  <div class="row">
    <div class="col-12">
      <h4>
        <i class="fas fa-globe"></i> Kuitansi
        <br></br>
        <small class="float-right">{{$kuitansi->lokasi}}, {{$kuitansi->tanggal}} {!!Bulan($kuitansi->bulan)!!} {{$kuitansi->tahun}}</small>
      </h4>
    </div>
  </div>
  
  <div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <tbody>
        <tr>
          <td>Nomor</td>
          <td>: {{$kuitansi->nomor}}</td>
        </tr>
        <tr>
          <td>Telah Terima Dari</td>
          <td>: {{$kuitansi->dari}}</td>
        </tr>
        <tr>
          <td>Uang Sejumlah</td>
          <td>: {!!Convert($kuitansi->nominal)!!} rupiah</td>
        </tr>
        <tr>
          <td>Untuk Pembayaran</td>
          <td>: {{$kuitansi->transaksi}}</td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>


  <div class="row">
    <div class="col-6">
      <br></br>
      <p class="lead"><h3> <b> Rp {{$kuitansi->nominal}}</b> </h3> </p>
    </div>
    <div class="col-6">
      <div class="float-right">
        <p class="float-right"><b> {{$kuitansi->nama}}</b> </p>
        
      </div>
    </div>
  </div>
</div>


<p>
<form method="POST" enctype="multipart/form-data" action="kuitansi/request/cipher/store">
@csrf
<div class="mb-3">
  <input type="hidden" class="form-control @error('kuitansi_id') is-invalid @enderror border-3 rounded-pill" id="kuitansi_id" name="kuitansi_id" value="{{$kuitansi->id}}">
  @error('kuitansi_id') <div class="invalid-feedback">{{$message}}</div>@enderror

  <input type="hidden" class="form-control @error('cipher') is-invalid @enderror border-3 rounded-pill" id="cipher" name="cipher" value="{!!Enkripsi($kuitansi->nomor)!!}{!!Enkripsi($kuitansi->dari)!!}{!!Enkripsi($kuitansi->nama)!!}">
  @error('cipher') <div class="invalid-feedback">{{$message}}</div>@enderror
</div>
<button type="submit" class="btn btn-primary" onclick="konfirmasi()">Buat QR Code</button>
</form>
@endsection