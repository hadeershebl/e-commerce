<?php

namespace App\Http\Controllers;

use App\Product;
use App\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function add()
    {
        $product_record = new Product();

        if(request()->has('productPhoto')){
             
            $avatar_uploaded = request()->file('productPhoto');
            $avatar_name = time() . '.' . $avatar_uploaded->getClientOriginalExtension();
            $avatar_path = public_path('/img/');
            $avatar_uploaded->move($avatar_path, $avatar_name);

            $product_record->name =request('productName');
            $product_record->description = request('productDescrip');
            $product_record->type = request('type');
            $product_record->photo = '/img/' . $avatar_name;
            $product_record->price =request('productPrice');
            $product_record->seller_id = Auth::guard('seller')->user()->id;
            $product_record->save();
        }
        else{
            $product_record->name =request('productName');
            $product_record->description = request('productDescrip');
            $product_record->type = request('type');
            $product_record->price =request('productPrice');
            $product_record->seller_id = Auth::guard('seller')->user()->id;
    
            $product_record->save();
        }

       
        return redirect('/seller/')->with('add_prod' , 'Your product added successfully');
    }

    public function show_manage_page()
    {
        $id =Auth::guard('seller')->user()->id;
        $seller_products  = Seller::findOrFail($id)->products()->orderBy('created_at', 'desc')->get(); 
        
        return view('seller.manage-products' , ['products' => $seller_products]);
    }

    public function destroy($id)
    {
        $product_record = Product::findOrFail($id)->delete();
        
        return response()->json(
            [
                'message' => 'Product deleted successfully!',
                'status' => true
                ]
        );
    }

    
    
}
