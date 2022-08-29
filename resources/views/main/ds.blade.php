@extends('layouts.app')
@section('title','Digital Signature')
@section('content')
<div class="col-12 pb-2 p-3">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th></th>
                <th>Nomor Kuitansi</th>
                <th>Telah terima dari</th>
                <th>Penanggung jawab</th>
            </tr>
        </thead>
        <tbody>
        @foreach($collection as $kuitansi)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{($kuitansi->nomor)}}</td>
                <td>{{$kuitansi->dari}}</td>
                <td>{{$kuitansi->nama}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th></th>
                <th>Digital Signature</th>
            </tr>
        </thead>
        <tbody>
        @foreach($collection as $kuitansi)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$kuitansi->cipher->cipher}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection