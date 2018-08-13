<?php

namespace App\Http\Controllers;

use App\Button;
use App\ButtonType;
use App\Company;
use App\Http\Requests\ButtonRequest;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $companies = Company::wherehas('users', function ($q) {
            if (!Auth::user()->hasRole('super_admin')) {
                $q->where('id', Auth::id());
            }
        })->pluck('name', 'id');

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
     * @param Button $button
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Button $button)
    {
        try {
            $button->delete();
            session()->flash('message.level', 'success');
            session()->flash('message.content', 'Successfully Deleted Button');
        } catch (QueryException $exception) {
            session()->flash('message.level', 'danger');
            session()->flash('message.content', 'There was a problem deleting the Record ' . $exception);
        } catch (ModelNotFoundException $exception) {
            session()->flash('message.level', 'danger');
            session()->flash('message.content', 'There was a problem deleting the Record ' . $exception);
        }

        return redirect()->back();
    }

    public function getList()
    {
        $user = User::find(Auth::id());

        if ($user->hasRole('super_admin')) {
            return Button::all();
        } else {
            return Button::where('company_id', $user->company_id)->get();
        }

    }
}
