<?php

namespace App\Http\Controllers;

use \App\Models\Product;
use \App\Models\Payment;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:Mart Worker');
  }

  public function index()
  {
      $totalProducts = Product::count();

      $outOfStock = Product::where('stock', 0)->count();

      $products = Product::all();
      $total_sales = Payment::sum('total_sales');

      return view('worker.dashboard', [
        'totalProducts' => $totalProducts,
        'outOfStock' => $outOfStock,
        'products' => $products,
        'total_sales' => $total_sales,
      ]);
  }

  public function inventory()
  {
      $products = Product::all();

      return view('worker.inventory', compact('products'));
  }

  public function addStock(Request $request, $id)
  {
      // Validate the request data
      $validatedData = $request->validate([
        'stock' => ['required', 'integer'],
      ]);

      $product = Product::findOrFail($id);

      $product->stock = $product->stock + $validatedData['stock'];
      $product->save();

      return redirect()->route('worker.inventory');
  }

  public function minusStock(Request $request, $id)
  {
      // Validate the request data
      $validatedData = $request->validate([
        'stock' => ['required', 'integer'],
      ]);

      $product = Product::findOrFail($id);

      $product->stock = $product->stock - $validatedData['stock'];
      $product->save();

      return redirect()->route('worker.inventory');
  }

  public function addProduct()
  {
      return view('worker.addproduct');
  }

  public function createProduct(Request $request)
  {
      // Validate the request data
      $validatedData = $request->validate([
        'product_name' => ['required', 'string', 'max:255'],
        'supplier' => ['required', 'string', 'max:255'],
        'date_received' => ['required'],
        'discount' => ['required', 'integer'],
        'price' => ['required', 'integer'],
        'cost' => ['required', 'integer'],
        'stock' => ['required', 'integer'],
      ]);

      $product = New Product;
      $product->name = $validatedData['product_name'];
      $product->supplier = $validatedData['supplier'];
      $product->date_received = $validatedData['date_received'];
      $product->discount = $validatedData['discount'];
      $product->price = $validatedData['price'];
      $product->cost = $validatedData['cost'];
      $product->stock = $validatedData['stock'];
      $product->save();

      return redirect()->route('worker.inventory');
  }
  public function payment()
  {
    $payments = Payment::all();
    return view('worker.payment', compact('payments'));
  }

  public function addpayment(Request $request)
  {

    // Validate the request data
    $validatedData = $request->validate([
      'total_cost' => ['required', 'numeric'],
      'total_sales' => ['required', 'numeric'],
      'date' => ['required'],
    ]);

    $payment = new Payment();
    $payment->total_cost = $validatedData['total_cost'];
    $payment->total_sales = $validatedData['total_sales'];
    $payment->date = $validatedData['date'];
    $payment->total_profit = $validatedData['total_sales'] - $validatedData['total_cost'];
    $payment->save();

    return redirect()->route('worker.payment');
  }
}
