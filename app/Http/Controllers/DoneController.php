<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Jenssegers\Optimus\Optimus;
use Validator;
use App\Invitation;

class DoneController extends Controller
{
    public function done(Request $request) {
        return view('done');
    }

    public function ceremony(Request $request) {
        return view('ceremony');
    }

    public function attend(Request $request) {
        return view('attend');
    }

    public function getIV(Request $request) {
        $request->validate([
            'first-name' => 'required',
            'last-name' => 'required',
            'type' => [
                'required',
                Rule::in(['graduate', 'staff', 'alumnus', 'other', 'nominee'])
            ],
            'email' => ['required', 'email', 'unique:invitations']
        ]);

        $iv = new Invitation;
        $iv->first_name = $request["first-name"];
        $iv->last_name = $request["last-name"];
        $iv->email = $request["email"];
        $iv->type = $request["type"];
        $iv->save();

        $optim = new Optimus(1580030173, 59260789, 1163945558);
        $iv->ivid = $optim->encode($iv->id);
        $iv->save();

        return view('iv', [
            "iv" => $iv
        ]);
    }

    public function ivs(Request $request) {
        return Invitation::all();
    }
}
