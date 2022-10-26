<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index($id)
    {
        $response = Http::post('http://128.199.2.165:8100/api/v1/user/tracking/', [
            'user_id' => $id,
        ]);
        $response1=Http::get('http://128.199.2.165:8100/api/v1/user/info/'.$id.'/');
        $r1=json_decode($response1);
        if ($r1->status==3){
            $response = Http::get('http://128.199.2.165:8100/api/v1/product/list/');
        }else{
            $message=$r1->message;
            return view('product.failed', compact('message'));
        }
        $products=json_decode($response);
        return view('product.index', compact('id','products'));
    }

    public function create(Request $request,$user_id)
    {
        $inputs = $request->all();
        unset($inputs['_token']);
//        dd($inputs);
        $data=[];
        foreach ($inputs as $key => $re)
        {
            if($re != 0)
            {
                $data[$key] = $re;
            }
        }
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

    public function smena($id)
    {
        $response=Http::get('http://128.199.2.165:8100/api/v1/pharm/list/'.$id.'/');
//        return $response['items'];
//        dd($response['items'][1]['id']);
        return view('smena.index',compact('response','id'));
    }

    public function smenaCreate($id, Request $request)
    {
        $request->validate([
            'pharm_id'=>'required',
            'smena'=>'required',
            'image'=>'required'
        ]);
        $req = $request->all();
        unset($req['_token']);
//        dd($req);
        $pharm_id=$req['pharm_id'];
        $smena=$req['smena'];
        $response=Http::post('http://128.199.2.165:8100/api/v1/smena/check/',[
            'user_id'=>$id,
            'pharm_id'=>$pharm_id,
            'smena'=>$smena
        ]);
//        return $response;
//        dd($response);
        return view('smena.smena',compact('id','response','pharm_id','smena'));
    }

    public function smenaStore($id,Request $request)
    {
        $request->validate([
            'pharm_id'=>'required',
            'smena'=>'required',
            'image'=>'required'
        ]);
        $req = $request->all();
        unset($req['_token']);
//        dd($request->file('image'));
//        dd($request->file('image'));
        $pharm_id=$req['pharm_id'];
        $smena=$req['smena'];
//        $dir='/images/project';
//        $image=$this->uploadImage($req['image'],$dir);
//        dd($image);
        $image=

        $response=Http::attach('image',file_get_contents($request->file('image')),'image.jpg')->post('http://128.199.2.165:8100/api/v1/smena/create/',[
            'user_id'=>$id,
            'pharm_id'=>$pharm_id,
            'smena'=>$smena

        ]);
        return view('smena.smena1',compact('id'));
    }



//    function uploadImage($image, $directory)
//    {
//        if (!\File::isDirectory($directory)){
//            mkdir($directory);
//        }
////    if ( ! file_exists($directory) ) {
////        mkdir($directory, 0777, true);
////    }
//        $file = null;
//        $imageName = Str::random(20) . '.'.$image->getClientOriginalExtension();
//        $image->move(public_path($directory), $imageName);
//        $file = $directory .'/'. $imageName;
//
//        return $file;
//    }
}
