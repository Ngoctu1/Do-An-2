<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\JoinClause;
use Cart;
use Illuminate\Http\Request;

class userController extends Controller
{
    function index(){
        
        $user = DB::table('users')->get();
        dd($user);

    }
    function detail($id){
        $user = DB::table('users')->where('id',$id)->first();
        return view ('users.detail', compact('user'));
    }
    
    function prd_detail($id){
        $product = DB::table('prd_detail')
        ->join('product', 'prd_detail.prd_id', '=', 'product.prd_id')
        ->where('prd_detail.prd_id',$id)
        ->groupBy('prd_detail.prd_color') 
        ->get();

        $prdsize = DB::table('prd_detail')
        ->join('product', 'prd_detail.prd_id', '=', 'product.prd_id')
        ->where('prd_detail.prd_id',$id)
        ->groupBy('prd_detail.prd_size')
        ->get();
        
        $prdcolor = DB::table('prd_detail')
        ->join('product', 'prd_detail.prd_id', '=', 'product.prd_id')
        ->where('prd_detail.prd_id',$id)
        ->groupBy('prd_detail.prd_color')
        ->get();

        $prdimg = DB::table('prd_detail')
        ->join('product', 'prd_detail.prd_id', '=', 'product.prd_id')
        ->where('prd_detail.prd_id',$id)
        ->groupBy('prd_detail.prd_image')
        ->get();

        return view ('users.modun-user.productdetail',compact('product','prdsize','prdcolor','prdimg'));
    }
    
    
    function product(){

        $product = DB::table('product')
            ->join('prd_detail', 'product.prd_id', '=', 'prd_detail.prd_id')
            
            ->groupByRaw('product.prd_id')
            ->paginate(9);
            
        return view('users.modun-user.product',['prds'=>$product]);
    }

}
