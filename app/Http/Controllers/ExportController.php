<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function users()
    {
        return App\User::all();
    }

    public function nominations()
    {
        return App\Nomination::all();
    }
}
