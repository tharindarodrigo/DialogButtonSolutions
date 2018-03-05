<?php

namespace App\Http\Controllers;

use App\Button;
use App\ButtonClick;
use App\Company;
use App\Events\ButtonTriggerEvent;
use Illuminate\Http\Request;

class ButtonClickController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::pluck('name', 'id');
        return view('reports.clicks')->with([
            'companies'=>$companies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($serial)
    {
        $button = Button::where('serial_number', $serial)->first();
        $buttonClick = new ButtonClick();
        $buttonClick->button_id = $button->id;
        $buttonClick->button_type_id = $button->buttonType->id;
        $buttonClick->company_id = $button->company->id;
        $buttonClick->branch_id = $button->branch->id;

//        event(new ButtonTriggerEvent(collect($buttonClick)));

        if ($buttonClick->save()) {

            $x = ButtonClick::with(['buttonType', 'company', 'branch', 'button'])->find($buttonClick->id);

//            $buttonClick = ButtonClick::with('button')->whereHas('button', function($q){
//                $q->with('buttonType')->get();
//            })->first();
//                ->whereHas('button', function ($query){
//                $query->with(['buttonType', 'company', 'branch'])->get();
//            })->find($buttonClick->id);
//
//            $button->buttonClickedAt = $buttonClick->create_at;
//            $x = $buttonClick->with('button')->whereHas('button', function ($query){
//                $query->with(['buttonType', 'company', 'branch'])->get();
//            })->find($buttonClick->id);
            event(new ButtonTriggerEvent($x));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ButtonClick  $buttonClick
     * @return \Illuminate\Http\Response
     */
    public function show(ButtonClick $buttonClick)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ButtonClick  $buttonClick
     * @return \Illuminate\Http\Response
     */
    public function edit(ButtonClick $buttonClick)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ButtonClick  $buttonClick
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ButtonClick $buttonClick)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ButtonClick  $buttonClick
     * @return \Illuminate\Http\Response
     */
    public function destroy(ButtonClick $buttonClick)
    {
        //
    }
}
