<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
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


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://178.128.19.124/api/user-info",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImU1OGRhMWJhODk5NjkwNmE5ZTUxMWRiNzZlYWNmNjcyNWU4OGU1ZTgzM2NmMWZjYTZmZjI3MThlNTg2MTNhOGIwNjJmMTk5MWYyYjllZmZlIn0.eyJhdWQiOiIxIiwianRpIjoiZTU4ZGExYmE4OTk2OTA2YTllNTExZGI3NmVhY2Y2NzI1ZTg4ZTVlODMzY2YxZmNhNmZmMjcxOGU1ODYxM2E4YjA2MmYxOTkxZjJiOWVmZmUiLCJpYXQiOjE1MzQ4MTg3NDIsIm5iZiI6MTUzNDgxODc0MiwiZXhwIjoxNTY2MzU0NzQyLCJzdWIiOiI0MDMiLCJzY29wZXMiOltdfQ.wfuvID7XZ3ShX6ShPmqMnQH9VDgslAiGY43LodEVqZxyK8B4yYAIfvo2i0C8tIy2BXIK-1CByqItvOpIqDy6Z59yL13NuZB_PjQ5oJ0cn04LoeSy1tM8mgajLrs29OVDNfyjVy9ZOqGdGKrVZ_HsSvGlmjp_2o6cj0TNJx8qpoTGhv5PZpnB61TKYTTEBoJoApABgP-ZBT-0dnMYn63CdnngySJT-7ZjjhC4J8edOCk4kmi2DA7SSgGn5JYUMEqjvIsOTDDuWMJraMtIshZvXQRMCn3KrZNoMxv7SDeaQftUPwXlrU5bemWyHp2mGp3XpVydfinJed-s7JVXqPWXCQymTEGUd6AdyRBpL6qmzfTbFda7GKtGaTebS2jyYcrGL4IM6hEmMq_pDgZ7GadycJhhb4rotzVSVMQN2X4A4XOHWUibi3FkeCJJ1v_oOOYuKx59bBsi-LuqeyI8XsnpWDiZqW8sKzV5bSoKqAKpbix5Swiyu_uGBoJJACHFXTZ1sPQ3eALqPKwGsQ2nIMiQpJKTo0gM0OVKWnidLfY66cDHQWaPszVdlE9YV9385aO9u4YQ3ygr_SrIhRHb83bNtpzLZeBBURHDS5XU3mlJ8SE20rwWvgMqMBmaogIruFei8KIGOQ5D_f0Ly-LqmN2oVtRyEM--8L-01G_sfEdyqiA",
                "Cache-Control: no-cache",
                "Content-Type: application/json",
                "Postman-Token: bf3ff30e-eb1d-45df-907c-50e359c4b029"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }

//        if (Auth::user()->hasRole('super_admin')) {
//            $companies = Company::all();
//        } else {
//            $companies = Company::whereHas('users', function ($q) {
//                $q->where('id', Auth::id());
//            })->get();
//        }
//
//        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->hasRole('super_admin')) {
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
     * @param  \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        if (Auth::user()->hasRole('super_admin')) {
            return view('companies.edit', compact('company'));


        } else {
            session()->flash('message.level', 'danger');
            session()->flash('message.content', 'Sorry! you don\'t have permission to create a company. Please contact Super Admin');
            return redirect()->route('companies.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CompanyRequest $request
     * @param  \App\Company $company
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
     * @param Company $company
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try {

            $company = Company::find($id);
            $company->delete();
            session()->flash('message.level', 'success');
            session()->flash('message.content', 'Successfully Deleted');

        } catch (QueryException $exception) {


            session()->flash('message.level', 'danger');
            session()->flash('message.content', $exception);

        } catch (ModelNotFoundException $exception) {

            session()->flash('message.level', 'danger');
            session()->flash('message.content', $exception);
        }

        return redirect()->route('companies.index');

    }
}
