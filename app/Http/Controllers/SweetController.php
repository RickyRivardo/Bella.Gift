<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SweetController extends Controller
{
    public function index()
    {
      Alert::success('Success Title', 'Success Message');
        return view('welcome');

    }
}