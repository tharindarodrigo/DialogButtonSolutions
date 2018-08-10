<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('role:admin', ['only'=>['index']]);
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('super_admin')){
            $companies = Company::all();
        } else {
            $companies = Company::whereHas('users', function ($q){
                $q->where('id', Auth::id());
            })->get();
        }

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->hasRole('super_admin')){
            return view('companies.create');

        } else {
            session()->flash('message.level', 'danger');
            session()->flash('message.content', 'Sorry! you don\'t have permission to create a company');
                return redirect()->route('companies.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CompanyRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $company = new Company();
        $company->name = $request->name;

        if ($company->save()) {
            session()->flash('message.level', 'success');
            session()->flash('message.content', 'Successfully created Company');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        if(Auth::user()->hasRole('super_admin')){
            return view('companies.edit', compact('company'));


        } else {
            session()->flash('message.level', 'danger');
            session()->flash('message.content', 'Sorry! you don\'t have permission to create a company');
            return redirect()->route('companies.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CompanyRequest  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $company->name = $request->name;

        if ($company->save()) {
            session()->flash('message.level', 'success');
            session()->flash('message.content', 'Successfully Updated');
        }

        return redirect()->route('companies.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        if ($company->delete()) {
            session()->flash('message.level', 'success');
            session()->flash('message.content', 'Successfully Deleted');
        }

        return redirect()->route('companies.index');

    }
}
