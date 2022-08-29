@extends('layouts.layout')
@section('title','Validasi Data')
@section('content')
@if (\Session::has('status'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('status') !!}</li>
        </ul>
    </div>
@endif

@if (\Session::has('fake'))
    <div class="alert alert-warning">
        <ul>
            <li>{!! \Session::get('fake') !!}</li>
        </ul>
    </div>
@endif
<div class="row">
    <div class="col-4">
        <div id="reader" width="400px"></div>
    </div>
    <form method="POST" enctype="multipart/form-data" action="/validasi/scancam">
    @csrf
        <div class="col-12">
          <input type="hidden" class="form-control @error('hasil') is-invalid @enderror border-3 rounded-pill" id="hasil" name="hasil" value="{{old('hasil')}}">
          <p></p>
        </div>
        <button type="submit" class="btn btn-primary" onclick="konfirmasi()">Validasi</button>
    </form>
</div>

<script src="https://unpkg.com/html5-qrcode" type="text/javascript"> </script>

<script>
function onScanSuccess(decodedText, decodedResult) {
  // handle the scanned code as you like, for example:
    console.log(`Code matched = ${decodedText}`, decodedResult);
    $("#hasil").val(decodedText)
}

function onScanFailure(error) {
  // handle scan failure, usually better to ignore and keep scanning.
  // for example:
  console.warn(`Code scan error = ${error}`);
}

let html5QrcodeScanner = new Html5QrcodeScanner(
  "reader",
  { fps: 10, qrbox: {width: 250, height: 250} },
  /* verbose= */ false);
html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
@endsection