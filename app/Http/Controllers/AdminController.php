<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use PhpParser\Node\Stmt\Function_;

class AdminController extends Controller
{
    //---cac trang---
    function account(){
        $users = DB::table('users')->get();
        return view('Admin.modun.account',['user1'=>$users]);
    }
    function product(){
        $products = DB::table('product')
        
        ->join('prd_detail', 'product.prd_id', '=', 'prd_detail.prd_id')
        ->join('category', 'product.cat_id', '=', 'category.id')
        ->paginate(8)
        ;
        return view('Admin.modun.product',['products'=>$products]);
    }

    //---sua account---
    function modify($id){
        $user = DB::table('users')->where('id',$id)->first();
        return view ('Admin.modun.detail', compact('user'));
    }

    function delete(Request $request, $id){
        $data = [
            'status' => 1
        ];
        DB::table('users')->where('id', $request->id)
            ->update($data);
        return redirect()-> route('admin.account');
    }

    function edit(Request $request, $id){
        $data = [
            
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'address' => $request->address,
            'phone' => $request->phone,
            'level' => $request->level
        ];
        DB::table('users')->where('id', $request->id)
            ->update($data);
        return redirect()-> route('admin.account');
    }
    //---
    //---Sua product---
    function prd_modify($id){
        $product = DB::table('product')
        ->join('prd_detail', 'product.prd_id', '=', 'prd_detail.prd_id')
        ->join('category', 'product.cat_id', '=', 'category.id')
        ->where('prd_detail_id', $id)->first();
        return view ('Admin.modun.prd_detail', compact('product'));
    }

    function prd_edit(Request $request, $id){
        if($request->prd_image == null){

            $data = [
            
            'prd_name' => $request->prd_name,
            'cat_id' => $request->cat_id,
            'prd_color' => $request->prd_color,
            'prd_price' => $request->prd_price,
            'prd_amount' => $request->prd_amount,
            'prd_size' => $request->prd_size,
            'prd_details' => $request->prd_details,
            
            'prd_sale' => $request->prd_sale
        ];
        }else{
        $data = [
            
            'prd_name' => $request->prd_name,
            'cat_id' => $request->cat_id,
            'prd_color' => $request->prd_color,
            'prd_price' => $request->prd_price,
            'prd_amount' => $request->prd_amount,
            'prd_size' => $request->prd_size,
            'prd_details' => $request->prd_details,
            'prd_image' => $request->prd_image,
            'prd_sale' => $request->prd_sale
        ];
}
        DB::table('product')
        ->join('prd_detail', 'product.prd_id', '=', 'prd_detail.prd_id')
        ->where('prd_detail_id', $request->id)
        ->update($data);
        

        return redirect()-> route('admin.product');
    }


    //---------------add prd---------------
    function prd_add(Request $request){
        if($request->prd_image == null){}

        $data = [
            
            'prd_name' => $request->prd_name,
            'cat_id' => $request->cat_id,
            'prd_color' => $request->prd_color,
            'prd_price' => $request->prd_price,
            'prd_amount' => $request->prd_amount,
            'prd_size' => $request->prd_size,
            'prd_details' => $request->prd_details,
            'prd_image' => $request->prd_image,
            'prd_sale' => $request->prd_sale
        ];

        DB::table('product')
        ->join('prd_detail', 'product.prd_id', '=', 'prd_detail.prd_id')
        ->insert($data);
        return redirect()-> route('admin.product');
    }
}
