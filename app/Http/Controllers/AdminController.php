<?php

namespace App\Http\Controllers;

use \App\Models\Product;
use \App\Models\Payment;
use \App\Models\User;
use \App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('role:Administrator');
  }

  public function index()
  {
    $totalProducts = Product::count();

    $outOfStock = Product::where('stock', 0)->count();

    $products = Product::all();
    $total_sales = Payment::sum('total_sales');

    return view('admin.dashboard', [
      'totalProducts' => $totalProducts,
      'outOfStock' => $outOfStock,
      'products' => $products,
      'total_sales' => $total_sales,
    ]);
  }

  public function inventory()
  {
    $products = Product::all();

    return view('admin.inventory', compact('products'));
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

    return redirect()->route('admin.inventory');
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

    return redirect()->route('admin.inventory');
  }

  public function addProduct()
  {
    return view('admin.addproduct');
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

    $product = new Product;
    $product->name = $validatedData['product_name'];
    $product->supplier = $validatedData['supplier'];
    $product->date_received = $validatedData['date_received'];
    $product->discount = $validatedData['discount'];
    $product->price = $validatedData['price'];
    $product->cost = $validatedData['cost'];
    $product->stock = $validatedData['stock'];
    $product->save();

    return redirect()->route('admin.inventory');
  }

  public function promotion()
  {
    $products = Product::all();

    return view('admin.promotion', compact('products'));
  }

  public function setDiscount(Request $request, $id)
  {
    // Validate the request data
    $validatedData = $request->validate([
      'discount' => ['required', 'integer'],
    ]);

    $product = Product::findOrFail($id);

    $product->discount = $validatedData['discount'];
    $product->save();

    return redirect()->route('admin.promotion');
  }

  public function report()
  {
    $totalProducts = Product::count();

    $outOfStock = Product::where('stock', 0)->count();

    $products = Product::all();

    $payments = Payment::orderBy('date')->get();
    $totalSales = Payment::sum('total_sales');
    // Fetch all records from the `reports` table

    $cost = $payments->pluck('total_cost')->toArray(); // Get an array of 'cost' column values
    $sales = $payments->pluck('total_sales')->toArray(); // Get an array of 'sales' column values
    $profit = $payments->pluck('total_profit')->toArray(); // Get an array of 'profit' column values
    $datesFormatted = $payments->pluck('date')->map(function ($date) {
      return $date->format('d/m/Y');
    })->toArray(); // Get an array of formatted date values

    return view('admin.report', compact('cost', 'sales', 'profit', 'datesFormatted'), [
      'totalProducts' => $totalProducts,
      'outOfStock' => $outOfStock,
      'products' => $products,
      'total_sales' => $totalSales
    ]);
  }
  public function register(Request $request)
  {
    $roles = Role::all();
    return view('admin.register', compact('roles'));
  }

  public function createuser(Request $request)
  {

    // Validate the user's input
    $validatedData = $request->validate([
      'role' => [],
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255'],
      'password' => ['required', 'string', 'min:8'],
    ]);

    $users = new User;
    $users->name;

    // Create a new Administrator instance and populate it with the user's input
    $users = new User;
    $users->role_id = $validatedData['role'];
    $users->name = $validatedData['name'];
    $users->email = $validatedData['email'];
    $users->password = Hash::make($validatedData['password']);

    // Save the Administrator instance to the database
    $users->save();

    // Redirect the user back to the admin page
    return redirect()->route('admin.viewusers');
  }

  public function viewusers()
  {
    $users = User::all();
    return view('admin.viewusers', compact('users'));
  }

  public function destroy($id)
  {
    // dd($users);
    // Delete the user
    User::findOrFail($id)->delete();
    // Redirect or perform any other actions
    // ...

    return redirect()->route('admin.viewusers');
  }
}
