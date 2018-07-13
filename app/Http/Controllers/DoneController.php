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

    public function attend(Request $request) {
        // Find logged in user
        // Create new invitation
        // Send iv to view
        return view('attend');
    }
}
