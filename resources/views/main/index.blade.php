@extends('layouts.layout')
@section('title','Data Kuitansi')
@section('content')
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th></th>
            <th>Nomor Kuitansi</th>
            <th>Telah terima dari</th>
            <th>Terbilang</th>
            <th>Untuk transaksi</th>
            <th>Uang sejumlah</th>
            <th>Tempat dan waktu</th>
            <th>Penanggung jawab</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($collection as $kuitansi)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{($kuitansi->nomor)}}</td>
            <td>{{$kuitansi->dari}}</td>
            <td>{!!Convert($kuitansi->nominal)!!} rupiah</td>
            <td>{{$kuitansi->transaksi}}</td>
            <td>{{$kuitansi->nominal}}</td>
            <td> {{$kuitansi->lokasi}}, {{$kuitansi->tanggal}} {!!Bulan($kuitansi->bulan)!!} {{$kuitansi->tahun}}</td>
            <td>{{$kuitansi->nama}}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="/kuitansi/{{$kuitansi->id}}">
                    <i class="fas fa-folder">
                    </i>
                    Lihat Data
                </a>
                <form action="/kuitansi/{{$kuitansi->id}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Hapus Data?')">
                        <i class="fas fa-trash">
                        </i>
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection

