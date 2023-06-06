<?php

namespace App\Http\Controllers;

use \App\Models\Product;

use Illuminate\Http\Request;

class CommitteeController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:Committee');
  }

  public function index()
  {
      $totalProducts = Product::count();

      $outOfStock = Product::where('stock', 0)->count();

      $products = Product::all();

      return view('committee.dashboard', [
        'totalProducts' => $totalProducts,
        'outOfStock' => $outOfStock,
        'products' => $products
      ]);
  }

  public function inventory()
  {
      $products = Product::all();

      return view('committee.inventory', compact('products'));
  }
}
