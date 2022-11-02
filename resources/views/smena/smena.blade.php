@extends('layouts.app')
@section('content')
    @if($response['status']==3)
    <form method="post" action="{{route('smena.store',['id'=>$id])}}"  enctype="multipart/form-data" >
        @csrf
    <div class="container-md">
        <h1  style="text-align: center;color: #111111;">@if($smena==1)Ochish @else Yopish @endif Kodi: <b>{{$response['message']}}</b></h1>
        <input style="display: none" name="pharm_id" value="{{$pharm_id}}">
        <input style="display: none" name="smena" value="{{$smena}}">
        <p style="color: #111111">Bugungi kun ochish soni bilan SELFIE tushing va yuboring</p>
    </div>
    <div class="mb-3">
        <label style="color: #111111" for="formFileSm" class="form-label">Rasm yuklang</label>
        <input required class="form-control form-control-sm" id="formFileSm" type="file" accept="image/png, image/jpeg" name="image">
    </div>
    <div>
        <button type="submit" class="btn-primary">Saqlash</button>
    </div>
    </form>
    @else
        <h1  style="text-align: center; color: #111111"><b>{{$response['message']}}</b></h1>
        <div class="container">
            <a href="{{route('smena',['id'=>$id])}}" class=" btn btn-success"> << Orqaga</a>
        </div>
    @endif

@endsection
