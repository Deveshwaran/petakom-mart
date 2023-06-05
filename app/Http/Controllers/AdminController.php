<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:Administrator');
  }

  public function index()
  {
      return view('admin.dashboard');
  }

  public function inventory()
  {
      return view('admin.inventory');
  }

  public function addProduct()
  {
      return view('admin.addproduct');
  }

  public function promotion()
  {
      return view('admin.promotion');
  }

  public function report()
  {
      return view('admin.report');
  }

  public function register()
  {
      return view('admin.register');
  }
}
