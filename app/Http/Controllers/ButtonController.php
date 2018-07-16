<?php

namespace App\Http\Controllers;

use App\Button;
use App\ButtonType;
use App\Company;
use App\Http\Requests\ButtonRequest;
use Illuminate\Http\Request;

class ButtonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buttons = Button::with(['company', 'buttonType', 'branch'])->get();
        return view('buttons.index', compact('buttons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companyEmpty = collect(['' => 'All']);
        $companiesQuery = Company::pluck('name', 'id');
//        $companies = $companyEmpty->combine($companiesQuery);
        $buttonTypes = ButtonType::pluck('button_type', 'id');
        $companies = Company::pluck('name', 'id');

        return view('buttons.create', compact('companies', 'buttonTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ButtonRequest $request)
    {

        $buttonSerials = str_replace(' ', '', $request->serial_number);
        $buttonSerials = explode(',', $buttonSerials);

//        $button = new Button();
        $buttons = [];
        foreach ($buttonSerials as $buttonSerial) {

            $buttons [] =
                [
                    'company_id' => $request->company_id,
                    'branch_id' => $request->branch_id,
                    'button_type_id' => $request->button_type_id,
                    'identifier' => str_replace('{serial}', $buttonSerial, $request->identifier),
                    'serial_number' => $buttonSerial,
                ];

        }

        if (Button::insert($buttons)) {
            session()->flash('message.level', 'success');
            session()->flash('message.content', 'Successfully Created Button');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Button $button
     * @return \Illuminate\Http\Response
     */
    public function show(Button $button)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Button $button
     * @return \Illuminate\Http\Response
     */
    public function edit(Button $button)
    {
        $companies = Company::pluck('name', 'id');
        $buttonTypes = ButtonType::pluck('button_type', 'id');
        return view('buttons.edit', compact('companies', 'buttonTypes', 'button'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Button $button
     * @return \Illuminate\Http\Response
     */
    public function update(ButtonRequest $request, Button $button)
    {
        $button->company_id = $request->company_id;
        $button->branch_id = $request->branch_id;
        $button->button_type_id = $request->button_type_id;
        $button->identifier = $request->identifier;
        $button->serial_number = $request->serial_number;

        if ($button->save()) {
            session()->flash('message.level', 'success');
            session()->flash('message.content', 'Successfully Updated Button');
        }

        return redirect()->route('buttons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Button $button
     * @return \Illuminate\Http\Response
     */
    public function destroy(Button $button)
    {

        if ($button->delete()) {
            session()->flash('message.level', 'success');
            session()->flash('message.content', 'Successfully Deleted Button');
        }

        return redirect()->back();
    }
}
