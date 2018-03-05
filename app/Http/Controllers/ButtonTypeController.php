<?php

namespace App\Http\Controllers;

use App\ButtonType;
use App\Http\Requests\ButtonTypeRequest;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\SameSizeTest;

class ButtonTypeController extends Controller
{
    public static $notificationColors = [
        'success' => 'Green',
        'info'=> 'Blue',
        'danger'=> 'Red',
        'warning'=> 'Amber',
        'primary'=> 'Blue',
        'default' => 'Gray'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buttonTypes = ButtonType::all();
        return view('buttonTypes.index', compact('buttonTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('buttonTypes.create')->with([
            'notificationColors'=> self::$notificationColors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ButtonTypeRequest $request)
    {
        $buttonType = new ButtonType();
        $buttonType->button_type = $request->button_type;
        $buttonType->message = $request->message;
        $buttonType->notification_color = $request->notification_color;

        if ($buttonType->save()) {
            session()->flash('message.level', 'success');
            session()->flash('message.content', 'Successfully Created');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ButtonType  $buttonType
     * @return \Illuminate\Http\Response
     */
    public function show(ButtonType $buttonType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ButtonType  $buttonType
     * @return \Illuminate\Http\Response
     */
    public function edit(ButtonType $buttonType)
    {
        $notificationColors = self::$notificationColors;
        return view('buttonTypes.edit', compact('buttonType', 'notificationColors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ButtonType  $buttonType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ButtonType $buttonType)
    {
        $buttonType->button_type = $request->button_type;
        $buttonType->message = $request->message;
        $buttonType->notification_color = $request->notification_color;

        if ($buttonType->save()) {
            session()->flash('message.level', 'success');
            session()->flash('message.content', 'Successfully Updated Button Type');
        }

        return redirect()->route('button-types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ButtonType  $buttonType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ButtonType $buttonType)
    {
        if ($buttonType->delete()) {
            session()->flash('message.level', 'success');
            session()->flash('message.content', 'Successfully Deleted Button Type');
        }

        return redirect()->route('button-types.index');
    }
}
