<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Employee\Ask;


class AskController extends Controller
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
        // data
        // $allAsk = Ask::where('user_id', auth()->user()->id)->get();

        $allAsk = Ask::all();
         // $orgs = Organization::all();
        // return $allAsk;

        // return view('employee.ask.index');
        return view('employee.ask.index')->with('asks', $allAsk);
    }

    public function create()
    {
        return view('employee.ask.create');
    }

    public function store(Request $request)
    {
        $ask = new Ask;
        $ask->user_id = auth()->user()->id;
        $ask->question = $request->input('question');
        $ask->save();

        return redirect()->route('ask.index');
    }
}
