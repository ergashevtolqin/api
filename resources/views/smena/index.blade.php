@extends('layouts.app')
@section('content')

    <form method="post" action="{{route('smena.create',['id'=>$id])}}">
        @csrf
    <div class="container-md" style=" display: flex;
									flex-direction: column;
									align-items: center;
									justify-content: center;
									height: 100vh;">

        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="smena">
            <option selected disabled hidden>Smenani tanglang</option>
            <option value="1">Smena Ochish</option>
            <option value="2">Smena Yopish</option>
        </select>

        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="pharm" name="pharm_id">
            <option selected disabled hidden>Aptekani tanglang</option>
{{--            @php dd(1); @endphp--}}
        @foreach($response['items'] as $item)
             <option  value="{{$item['id']}}">{{$item['name']}}</option>
        @endforeach
        </select>
        <button type="submit" class="btn-primary">Keyingisi</button>

    </div>
    </form>

@endsection

