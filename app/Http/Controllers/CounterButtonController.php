<?php

namespace App\Http\Controllers;

use App\Button;
use App\Counter;
use App\CounterButton;
use Illuminate\Http\Request;

class CounterButtonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counter = Counter::with('buttonCounters')->get();
        return view('counterButtons.index', compact('counter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $counter = Counter::pluck('id', 'title');
        $buttons = Button::whereHas('button_type', function ($q) {
            $q->where('button_type', 'Counter');
        })->pluck('id', 'serial_number');

        return view('counterButtons.create', compact('counter','buttons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $counter = Counter::find($request->counter_id);
        $button = Button::find($request->button_id);
        $counter->counterButtons()->sync($button);

        return redirect()->back();
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
        //
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
        //
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
}
