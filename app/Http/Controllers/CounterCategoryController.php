<?php

namespace App\Http\Controllers;

use App\Company;
use App\CounterCategory;
use Illuminate\Http\Request;

class CounterCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counterCategories = CounterCategory::with('company')->get();
        return view('counterCategories.index', compact('counterCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::pluck('name', 'id');
        return view('counterCategories.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $counterCategory = new CounterCategory();
        $counterCategory->counter_category = $request->counter_category;
        $counterCategory->company_id = $request->company_id;
        $counterCategory->save();

        session()->flash('global.class', 'success');
        session()->flash('global.message', 'Successfully created Counter Category');

        return redirect()->back();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\CounterCategory  $counterCategory
     * @return \Illuminate\Http\Response
     */
    public function show(CounterCategory $counterCategory)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CounterCategory  $counterCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(CounterCategory $counterCategory)
    {
        $companies = Company::pluck('name', 'id');
        return view('counterCategories.edit', compact('companies', 'counterCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CounterCategory  $counterCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CounterCategory $counterCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CounterCategory  $counterCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(CounterCategory $counterCategory)
    {
        //
    }
}
