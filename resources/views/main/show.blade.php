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
      <p class="lead"><h3> <b> <i> Rp {{$kuitansi->nominal}} </i> </b> </h3> </p>
    </div>
    <div class="col-6">
      <div class="float-right">
        <p class="float-right"><b> {{$kuitansi->nama}}</b> </p>
        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
        <div class="visible-print text-center">
            {!! QrCode::size(100)->generate($kuitansi->cipher->cipher) !!}
        </div>
          
        </p>
      </div>
    </div>
  </div>
  <p></p>
  <div class="row no-print">
    <div class="col-12">
      <a href="/kuitansi/print/{{$kuitansi->id}}" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i>Print</a>
      <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
        <i class="fas fa-download"></i> Generate PDF
      </button>
    </div>
  </div>
</div>
@endsection