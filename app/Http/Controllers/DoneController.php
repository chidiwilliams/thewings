<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoneController extends Controller
{
    public function done(Request $request) {
        return view('done');
    }

    public function ceremony(Request $request) {
        return view('ceremony');
    }
}
