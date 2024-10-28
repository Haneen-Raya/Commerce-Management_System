<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    use ApiResponsetTrait;

    // Retrieve all orders for the authenticated user
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->with('product', 'user')->get();
        return $this->ApiResponse($orders, 'Orders retrieved successfully.');
    }

    // Retrieve all products
    public function create()
    {
        $products = Product::all();
        return $this->ApiResponse($products, 'Products retrieved successfully.');
    }

    // Create a new order
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $product = Product::find($request->product_id);

        if ($product->quantity <= 0) {
            return $this->ApiResponse(null, 'Product is out of stock.', 400);
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
        ]);

        $product->quantity -= 1;
        $product->save();

        return $this->ApiResponse($order, 'Order created successfully.', 201);
    }

    // Update an existing order
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $order = Order::find($id);

        if (!$order) {
            return $this->ApiResponse(null, 'Order not found.', 404);
        }

        $order->update([
            'product_id' => $request->product_id,
        ]);

        return $this->ApiResponse($order, 'Order updated successfully.', 200);
    }

   

    // Delete an existing order
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return $this->ApiResponse(null, 'Order deleted successfully.', 200);
    }
}
