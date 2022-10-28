<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>DurgerKingExampleBot</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, viewport-fit=cover"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="MobileOptimized" content="176"/>
    <meta name="HandheldFriendly" content="True"/>
    <meta name="robots" content="noindex, nofollow"/>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <script src="https://telegram.org/js/telegram-web-app.js"></script>
    <style>
        *{
            color: #111111;
        }
    </style>
</head>
<body >
<h1 style="margin-left: 100px;">Elektron Chek</h1>
<hr style="width: 100%;">
<div class="row" style="display: flex;padding-right:25px;">
    <h3 style="margin-left:20px ;">Zakas nomeri:</h3> <h3 style="margin-left:20px;margin-left: auto;">ord123{{$product->items[0]->order_id}}</h3>
</div>
<div class="row" style="display: flex;padding-right:25px;">
    <h3 style="margin-left: 20px;">Zakazga Mas'ul:</h3> <h3 style="margin-left:20px;margin-left: auto;">{{$product->items[0]->user[0]->first_name}} {{$product->items[0]->user[0]->last_name}}</h3>
</div>
<div class="row" style="display: flex;padding-right:25px;">
    <h3 style="margin-left:20px ;">Zakaz berilgan vaqti:</h3> <h3 style="margin-left:20px;margin-left: auto;">{{$product->items[0]->created_at}}</h3>
</div>
@foreach($product->items as $key=>$item)
    <div class="row" style="display: flex;padding-right:25px;">
        <h2 style="margin-left:20px ;">{{$item->medicine->name}}:</h2> <h3 style="margin-left:20px;margin-left: auto;">{{$item->number}}&nbspx {{$item->medicine->price}}</h3>
    </div>
@endforeach
<div class="row" style="display: flex;padding-right:25px;">
    <h1 style="margin-left:20px ;">Jami:</h1> <h2 style="margin-left:20px;margin-left: auto;">{{$all_sum}} so'm</h2>
</div>
<div class="row" >
    <a href="#" class="footer" style="border-radius:1px;display: inline-block;
              font-family: var(--default-font);
              font-weight: 700;
              font-size: 16px;
              line-height: 18px;
              padding: 6px 16px;
              height: 40px;
              border-radius: 7px;
              box-sizing: border-box;
              background-color: rgb(14, 150, 39);
              text-transform: uppercase;
              color: #fff;
              outline: none;
              border: none;
              padding-top: 10px;">Saqlash</a>
</div>

<!-- <button href="#" class="footer" style="border-radius:1px">Saqlash</button> -->
<script src="https://tg.dev/js/jquery.min.js"></script>
</body>
</html>
