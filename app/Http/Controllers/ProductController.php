<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

        //{
            public function index(Request $request)
            {
                $query = Product::withTrashed();

                $query->when($request->filled('name'), function ($q) use ($request) {
                    return $q->where('name', 'like', '%' . $request->name . '%');
                });

                $query->when($request->filled('price_min'), function ($q) use ($request) {
                    return $q->where('price', '>=', $request->price_min);
                });

                $query->when($request->filled('price_max'), function ($q) use ($request) {
                    return $q->where('price', '<=', $request->price_max);
                });

                $query->when($request->filled('category_id'), function ($q) use ($request) {
                    return $q->whereHas('categories', function ($q2) use ($request) {
                        $q2->where('categories.id', $request->category_id); // تحديد الجدول بشكل صريح
                    });
                });

                $products = $query->orderBy('created_at', 'DESC')->get();
                $categories = Category::withTrashed()->orderBy('created_at', 'DESC')->get();
                $hasFilter = $request->filled('name') || $request->filled('price_min') || $request->filled('price_max') || $request->filled('category_id');

                return view('product.list', compact('products', 'categories', 'hasFilter'));
            }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $products   =Product::all();
        $categories = Category::all();
        return view('product.create', compact('categories','products'));

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $path = 'uploads/product/';
                $file->move($path, $filename);
            }
        } else {
            return redirect()->back()->withErrors(['image' => 'The image field is required.']);
        }
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->cover = $path.$filename;
        $product->save();

        $product->categories()->sync($request->categories_ids);
        return redirect()->route('products.index');
    }




    /**
     * Display the specified resource.
     */


public function show($id)
{
    $products = Product::with('categories')->findOrFail($id);
    return view('product.show', compact('products'));
}


    /**
     * Show the form for editing the specified resource.
     */


         //to search by name
    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Product::where('name', 'LIKE', '%' . $search . '%')->get();
        $categories = Category::all();

        return view('product.list', compact('products', 'categories'))->with('search', true);
    }

        public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('product.edit', compact('product', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $path = 'uploads/product/';
                $file->move($path, $filename);

                if ($product->cover && file_exists(public_path($product->cover))) {
                    unlink(public_path($product->cover));
                }
                $product->cover = $path . $filename;
            }
        }
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->quantity = $request->quantity;

        $product->save();
        $product->categories()->sync($request->categories_ids);

        return redirect()->route('products.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index');
    }
    public function restore(string $id){
        $product =Product::withTrashed()->where('id', $id)->first();
        $product->restore();
        return redirect()->route('products.index');
    }

    public function forceDelete(string $id)
    {
    $product = Product::withTrashed()->where('id', $id)->first();
    $product->forceDelete();
    return redirect()->route('products.index');
    }
}
