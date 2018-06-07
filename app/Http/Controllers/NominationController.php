<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Resources\Nomination as NominationResource;
use App\Nomination;
use Jenssegers\Optimus\Optimus;
use App\User;
use Validator;

class NominationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nominations = Auth::user()->nominations;

        $params = [
            "nominations" => $nominations
        ];

        return view('nominations', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nominate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->nominations->count() < User::MAX_NOMINATIONS) {
            $validator = Validator::make($request->all(), [
                'nominee-first-name' => 'required',
                'nominee-last-name' => 'required',
                'nominee-status' => [
                    'required',
                    Rule::in(['student', 'staff', 'alumnus'])
                ],
                'nominee-work' => 'required',
            ]);

            // TODO: can't send this bro.
            // Send back the error message and pre-fill the input
            // values.
            if($validator->fails()) {
                return response()->json([
                    'success'=> false,
                    'error'=> $validator->messages()
                ]);
            }

            $nomination = new Nomination;
            $nomination->user_id = Auth::user()->id;
            $nomination->nominee_first_name = $request["nominee-first-name"];
            $nomination->nominee_last_name = $request["nominee-last-name"];
            $nomination->nominee_status = $request["nominee-status"];
            $nomination->nominee_work = $request["nominee-work"];
            $nomination->nominee_impact = $request["nominee-impact"];
            $nomination->nominee_links = $request["nominee-links"];
            $nomination->save();

            $optim = new Optimus(1580030173, 59260789, 1163945558);
            $nomination->slug = $optim->encode($nomination->id);
            $nomination->save();

            return redirect()->to('/nominations?s=1');
        } else {
            return $this->respondMaximum();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $nomination = Nomination::where('slug', $slug)
            ->where('user_id', Auth::user()->id)
            ->first();

        if (!$nomination) {
            abort(403);
        }

        $params = [
            "nomination" => $nomination
        ];

        return view('edit', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $nomination = Nomination::where('slug', $slug)
            ->where('user_id', Auth::user()->id)
            ->first();

        if (!$nomination) {
            abort(404);
        }

        $nomination->user_id = Auth::user()->id;
        $nomination->nominee_first_name = $request["nominee-first-name"];
        $nomination->nominee_last_name = $request["nominee-last-name"];
        $nomination->nominee_status = $request["nominee-status"];
        $nomination->nominee_work = $request["nominee-work"];
        $nomination->nominee_impact = $request["nominee-impact"];
        $nomination->nominee_links = $request["nominee-links"];

        if ($nomination->save()) {
            return redirect()->to('/nominations?e=1');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $nomination = Nomination::where('slug', $slug)
            ->where('user_id', Auth::user()->id)
            ->first();

        if (!$nomination) {
            abort(403);
        }

        if ($nomination->delete()) {
            return redirect()->to('/nominations?d=1');
        }
    }
}
