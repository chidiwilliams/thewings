<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoneController extends Controller
{
    public function done(Request $request) {
        return view('done');
    }
}
