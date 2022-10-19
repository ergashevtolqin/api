@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 style="text-align: center;">Elektron Chek</h1>
        <hr style="width: 100%;">
        <div class="row" style="display: flex;padding-right:25px;">
            <h5 style="margin-left:20px ;">Zakas nomeri:</h5> <h5 style="margin-left:20px;margin-left: auto;">ord{{$product->items[0]->order_id}}</h5>
        </div>
        <div class="row" style="display: flex;padding-right:25px;">
            <h5 style="margin-left: 20px;">Zakazga Mas'ul:</h5> <h5 style="margin-left:20px;margin-left: auto;">{{$product->items[0]->user[0]->first_name}} {{$product->items[0]->user[0]->last_name}}</h5>
        </div>
        <div class="row" style="display: flex;padding-right:25px;">
            <h5 style="margin-left:20px ;">Zakaz berilgan vaqti:</h5> <h5 style="margin-left:20px;margin-left: auto;">{{$product->items[0]->created_at}}</h5>
        </div>
        {{--    {% for key, value in product_dict.items %}--}}
        @foreach($product->items as $key=>$item)

            <div class="row" style="display: flex;padding-right:25px;">
                <h5 style="margin-left:20px ;">{{$item->medicine->name}}:</h5> <h5 style="margin-left:20px;margin-left: auto;">{{$item->medicine->price}}X{{$item->number}}</h5>
            </div>
            {{--    {% endfor %}--}}
        @endforeach
        <div class="row" style="display: flex;padding-right:25px;">
            <h2 style="margin-left:20px ;">Jami:</h2> <h2 style="margin-left:20px;margin-left: auto;">{{$all_sum}} so'm</h2>
        </div>
        <hr>
        <div class="row " style="position: absolute;bottom: 5px; width: 100%">
            <a href="{{route('product',['id'=>$product->items[0]->user[0]->id])}}" class="btn btn-danger w-100">Orqaga</a>
        </div>

    </div>
    <script src="https://tg.dev/js/jquery.min.js"></script>
    <script>
        function clicked(id)
        {
            $(`#add${id}`).css('display','none');
            $(`#pm${id}`).css('display','');
            $(`#counter${id}`).css('display','');
        }
        function minus(id)
        {
            var counter = $(`#counter${id}`).text();
            if(counter != 1)
            {
                counter--;
                $(`#counter${id}`).text(counter);

                $(`#input${id}`).val(counter);

            }else{
                $(`#add${id}`).css('display','');
                $(`#pm${id}`).css('display','none');
                $(`#counter${id}`).css('display','none');
            }
        }
        function pilus(id)
        {
            var counter = $(`#counter${id}`).text();
            counter++;
            $(`#counter${id}`).text(counter);
            $(`#input${id}`).val(counter);

        }
    </script>
@endsection
