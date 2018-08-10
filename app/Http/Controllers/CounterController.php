<?php

namespace App\Http\Controllers;

use App\Counter;
use App\CounterCategory;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counters = Counter::with('counterCategory')->get();
        return view('counters.index', compact('counters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $counterCategories = CounterCategory::pluck('counter_category', 'id');
        return view('counters.create', compact('counterCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $counter = new Counter();
        $counter->counter_category_id = $request->counter_category_id;
        $counter->title = $request->title;
        $counter->count = $request->count;
        $counter->max = $request->max;
        $counter->min = $request->min;

        $counter->save();

        session()->flash('global.class', 'success');
        session()->flash('global.message', 'Successfully created counter');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Counter $counter
     * @return \Illuminate\Http\Response
     */
    public function show(Counter $counter)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Counter $counter
     * @return \Illuminate\Http\Response
     */
    public function edit(Counter $counter)
    {
        $counterCategories = CounterCategory::pluck('counter_category', 'id');
        return view('counters.edit', compact('counterCategories', 'counter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Counter $counter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Counter $counter)
    {
        $counter->counter_category_id = $request->counter_category_id;
        $counter->title = $request->title;
        $counter->count = $request->count;
        $counter->max = $request->max;
        $counter->min = $request->min;

        $counter->save();

        session()->flash('global.class', 'success');
        session()->flash('global.message', 'Successfully created counter');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Counter $counter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Counter $counter)
    {

    }
}
