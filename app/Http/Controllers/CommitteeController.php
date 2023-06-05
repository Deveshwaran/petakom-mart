<?php

namespace App\Http\Controllers;

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
      return view('committee.dashboard');
  }
}
