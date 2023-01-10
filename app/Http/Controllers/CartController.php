<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Notifications\Notifiable;
class CartController extends Controller
{
    function addcart(Request $request){
        
        $product = DB::table('product')
        ->join('prd_detail', 'product.prd_id', '=', 'prd_detail.prd_id')
        ->where('prd_detail.prd_id',$request->prd_id)
        ->where('prd_detail.prd_size',$request->prd_size)
        ->where('prd_detail.prd_color',$request->prd_color)
        ->first() ;
        
        Cart::add($product->prd_detail_id,$product->prd_name,'1',$product->prd_price,'0',['size'=>$product->prd_size,'color'=>$product->prd_color,'img'=>$product->prd_image]);
        $data = Cart::content();
        

       return redirect()-> route('users.cartshop');
    }

    function deletecart($id)
    {
        if($id == 'all'){
        Cart::destroy();
        }else{
        Cart::remove($id);
        }
        return back();
    }

    function pluscart($id)
    {

        $data = Cart::get($id);
        $product = DB::table('prd_detail')->where('prd_detail_id', $data->id)->first();
        if($product->prd_amount > $data->qty){
        Cart::update($id,['qty' => $data->qty + 1]);
        
        }
        return back();
    }
    function minuscart($id)
    {
        $data = Cart::get($id);
        Cart::update($id,['qty' => $data->qty - 1]);
        return back();
    }
    
    function pay(Request $request){
        
    }
}


