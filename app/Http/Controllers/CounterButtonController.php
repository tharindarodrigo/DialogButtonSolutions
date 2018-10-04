<?php

namespace App\Http\Controllers;

use App\Button;
use App\Company;
use App\Counter;
use App\CounterButton;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class CounterButtonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counterButtons = CounterButton::all();

//        $counter = Counter::with('button')->get();
        return view('counterButtons.index', compact('counterButtons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::pluck('name', 'id');
        $counters = Counter::pluck('title', 'id');

        return view('counterButtons.create', compact('companies', 'counters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $counterButton = new CounterButton();
        $counterButton->counter_id = $request->counter_id;
        $counterButton->serial = $request->serial;
        $counterButton->increment_value = $request->increment_value;

        $counterButton->save();

        session()->flash('global.class', 'success');
        session()->flash('global.message', 'Successfully created counter button');
        return redirect()->route('counter-buttons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CounterButton $counterButton
     * @return \Illuminate\Http\Response
     */
    public function show(CounterButton $counterButton)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CounterButton $counterButton
     * @return \Illuminate\Http\Response
     */
    public function edit(CounterButton $counterButton)
    {
        $companies = Company::pluck('name', 'id');
        $counters = Counter::pluck('title', 'id');
        return view('counterButtons.edit', compact('counterButton', 'companies', 'counters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\CounterButton $counterButton
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CounterButton $counterButton)
    {
//        dd($request->all());
//        $counterButton =  new CounterButton();
        $counterButton->counter_id = $request->counter_id;
        $counterButton->serial = $request->serial;
        $counterButton->increment_value = $request->increment_value;

        $counterButton->save();

        return redirect()->route('counter-buttons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CounterButton $counterButton
     * @return \Illuminate\Http\Response
     */
    public function destroy(Counter $counter)
    {
//        $counter->detach();
    }


    public function count($serial)
    {
        $counterButton = CounterButton::where('serial', $serial)->first();
        $counter = Counter::find($counterButton->counter_id);
        if (($counter->count+ $counterButton->increment_value) <= $counter->max && ($counter->count + $counterButton->increment_value) >= $counter->min) {
            $counter->count = $counter->count + $counterButton->increment_value;
            $counter->save();
        }


    }
}
