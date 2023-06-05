<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkerController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:Worker');
  }

  public function index()
  {
      return view('worker.dashboard');
  }
}
