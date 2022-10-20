<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index($id)
    {
        $response1=Http::get('http://128.199.2.165:8100/api/v1/user/info/'.$id.'/');
        $r1=json_decode($response1);
        if ($r1->status==3){

        }
        $response = Http::get('http://128.199.2.165:8100/api/v1/product/list/');
        $products=json_decode($response);
        return view('product.index', compact('id','products'));
    }

    public function create(Request $request,$user_id)
    {
        $inputs = $request->all();
        unset($inputs['_token']);
        $data=[];
        foreach ($inputs as $key => $re)
        {
            if($re != 0)
            {
                $data[$key] = $re;
            }
        }
//        return $data;
        $response = Http::post('http://128.199.2.165:8100/api/v1/product/create/', [
                'user_id' => $user_id,
                'data' => $data
            ]);

//        dd($response);
        $product=json_decode($response);
//        dd($product->items[0]->order_id);
        $all_sum=0;
        foreach ($product->items as $item){
            $all_sum+=$item->medicine->price*$item->number;
        }
//        dd($product->items);
        return view('product.create',compact('product','all_sum'));
    }
}
