@extends('layouts.app')
@section('content')
    <form method="post" action="{{route('product.create',['id'=>$id])}}">
        @csrf
    <section class="cafe-page cafe-items" style="margin-bottom:60px">
        @foreach($products as $product)
        <div class="cafe-item js-item" data-item-id="1" data-item-price="4990">
            <div id="counter{{$product->id}}" style="display: none;" class="cafe-item-counter js-item-counter">1</div>
            <div class="cafe-item-photo">
{{--               --}}
                <picture class="cafe-item-lottie js-item-lottie">
                    <source type="application/x-tgsticker" srcset="./assets/img/Burger.png" >
                    <img src="{{asset('./assets/img/Burger_148.png')}}"
                         style="background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2aWV3Qm94PSIwIDAgNTEyIDUxMiI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJnIiB4MT0iLTMwMCUiIHgyPSItMjAwJSIgeTE9IjAiIHkyPSIwIj48c3RvcCBvZmZzZXQ9Ii0xMCUiIHN0b3Atb3BhY2l0eT0iLjEiLz48c3RvcCBvZmZzZXQ9IjMwJSIgc3RvcC1vcGFjaXR5PSIuMDciLz48c3RvcCBvZmZzZXQ9IjcwJSIgc3RvcC1vcGFjaXR5PSIuMDciLz48c3RvcCBvZmZzZXQ9IjExMCUiIHN0b3Atb3BhY2l0eT0iLjEiLz48YW5pbWF0ZSBhdHRyaWJ1dGVOYW1lPSJ4MSIgZnJvbT0iLTMwMCUiIHRvPSIxMjAwJSIgZHVyPSIzcyIgcmVwZWF0Q291bnQ9ImluZGVmaW5pdGUiLz48YW5pbWF0ZSBhdHRyaWJ1dGVOYW1lPSJ4MiIgZnJvbT0iLTIwMCUiIHRvPSIxMzAwJSIgZHVyPSIzcyIgcmVwZWF0Q291bnQ9ImluZGVmaW5pdGUiLz48L2xpbmVhckdyYWRpZW50PjwvZGVmcz48cGF0aCBmaWxsPSJ1cmwoI2cpIiBkPSJNMjY4LDQ5OWMtNTEtMi0xMDYtMS0xNTMtMjItMjgtMTItMzktNDAtNDItNjgsMC00LDMtNywxLTEwLTUtNi0xNiwzLTEzLTE0LDItMTEsMTItMTQsMTEtMjcsMC0yLTUtMTItNS0xNiwwLTYsNS0xNyw0LTIyLTItNy05LTUtNi0xNSwzLTEwLDE0LTcsMTktMTMsNy0xMi0xNC0yNC0xNy0zMy0zLTEyLTEtMjgsMi0zOSwyOC0xMDEsMTQ4LTEzMywyMzktMTE1LDY0LDEzLDEzMCw1OSwxNDIsMTI3LDMsMTgsMCwzMi0xNSw0Mi0xLDEtMTEsMTMtNywxNiw0LDIsMjAsNCwyMiw5LDYsMTAtNywxNS05LDIyLTEsMywzLDExLDMsMTYsMCwyLTMsMTctMiwxOSwyLDIsOCwxLDEwLDQsMyw1LDQsMTYsNiwyMiw0LDEzLTE1LDIwLTE5LDI3LTksMjAsNSw0MC0yMyw2MC00MCwyOC0xMDEsMjktMTQ4LDMweiIvPjwvc3ZnPg==');"
                         alt="Burger">
                </picture>
            </div>
            <div class="cafe-item-label">
                <span class="cafe-item-title">{{$product->name}}</span><br>
            </div>

            <span class="cafe-item-title">{{$product->price}}</span>
            <input style="display: none;" type="number" value="0" name="{{$product->id}}" id="input{{$product->id}}">
            <div class="cafe-item-buttons" id="add{{$product->id}}" onclick="clicked({{$product->id}})">
                <button type="button" class="cafe-item-decr-button js-item-decr-btn button-item ripple-handler">
                    <span class="ripple-mask"><span class="ripple"></span></span>
                </button>
                <button type="button" class="cafe-item-incr-button js-item-incr-btn button-item ripple-handler">
                    <span class="button-item-label">Add</span>
                    <span class="ripple-mask"><span class="ripple"></span></span>
                </button>
            </div>
            <div class="cafe-item-buttons" id="pm{{$product->id}}" style="display:none">
                <button type="button" onclick="minus({{$product->id}})" style="background: red;margin-right:10px">-</button>
                <button type="button" onclick="pilus({{$product->id}})"style="background: rgb(2, 67, 107)">+</button>
            </div>
        </div>
        @endforeach

    </section>
        <button type="submit" class="footer" style="border-radius:1px">Saqlash</button>
    </form>
    <script src="https://telegram.org/js/telegram-web-app.js"></script>
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
