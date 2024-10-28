<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiResponsetTrait;

class ProductController extends Controller
{
    use ApiResponsetTrait;

    //show all products

    public function index(Request $request) {

        if ($request->filled('name')) {
            
            $products = Product::with('categories')->where('name', 'like', '%' . $request->name . '%')->get();
            return $this->ApiResponse($products, "Products retrieved successfully based on search criteria.", 200);
        }
        $products = Product::with('categories')->get();
        return $this->ApiResponse($products, "All products retrieved successfully.", 200);
    }


    //show one product

    public function show($id){

        $product = Product::with('categories')->findOrFail($id);
        if($product){
            return $this->ApiResponse($product,'',200);
        }
            return $this->ApiResponse('no thing' , 'this product not found' , 401);
    }

    //search for products by name product

    // public function search($name){
    //     return Product::where('name','like','%'.$name.'%')->get();
    // }



}
?>
