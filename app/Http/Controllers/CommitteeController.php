<?php

namespace App\Http\Controllers;

use \App\Models\Product;
use \App\Models\Payment;
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
      $total_sales = Payment::sum('total_sales');

      return view('committee.dashboard', [
        'totalProducts' => $totalProducts,
        'outOfStock' => $outOfStock,
        'products' => $products,
        'total_sales' => $total_sales,
      ]);
  }

  public function inventory()
  {
      $products = Product::all();

      return view('committee.inventory', compact('products'));
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

    return view('committee.report', compact('cost', 'sales', 'profit', 'datesFormatted'), [
      'totalProducts' => $totalProducts,
      'outOfStock' => $outOfStock,
      'products' => $products,
      'total_sales' => $totalSales
    ]);
  }
}
