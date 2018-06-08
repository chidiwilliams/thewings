<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Nomination;

class ExportController extends Controller
{
    public function users()
    {
        return User::all();

    }
    public function nominations()
    {
        return Nomination::all();
    }
}
