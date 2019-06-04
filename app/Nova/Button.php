<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;

class Button extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Button';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'button';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'serial', 'identifier'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Serial Number'),
            Text::make('Identifier')->rules('required'),
            Text::make('Message')->nullable(),
//            BelongsTo::make('Company'),
//            BelongsTo::make('Branch'),

            NovaBelongsToDepend::make('Company')
                ->options(\App\Company::all()),
            NovaBelongsToDepend::make('Branch')
                ->optionsResolve(function ($company) {
                    // Reduce the amount of unnecessary data sent
                    return $company->branches()->get(['id','branch']);
                })
                ->dependsOn('Company'),

            BelongsTo::make('Button Type', 'buttonType'),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function carWds(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
