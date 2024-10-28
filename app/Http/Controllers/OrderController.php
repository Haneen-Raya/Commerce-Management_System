<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
// dd($orders);where('user_id', Auth::id())->

        $orders = Order::with('product','user')->get();
        return view('order.list', compact('orders'));
    }

    public function create()
    {

        $products = Product::all();
        return view('order.create', compact('products'));
    }

    public function store(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
    ]);

    $product = Product::find($request->product_id);
    if ($product->quantity <= 0) {
        return back()->withErrors(['quantity' => 'المنتج غير متوفر.']);
    }

    $order = new Order();
    $order->product_id = $product->id;
    $order->user_id = auth()->id();
    $order->save();


    $product->quantity -= 1;
    $product->save();

    return redirect()->route('orders.index')->with('success', 'تم إنشاء الطلب بنجاح.');
}


    public function show($id)
    {

        $order = Order::with('product')->findOrFail($id);
        return view('order.show', compact('order'));
    }

    public function destroy($id)
    {

        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
