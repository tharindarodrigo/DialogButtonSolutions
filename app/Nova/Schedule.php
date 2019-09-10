<?php

namespace App\Nova;

use Laraning\NovaTimeField\TimeField;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;

class Schedule extends Resource
{
    public static $group = 'Scheduler';
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Schedule';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id'
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
            NovaBelongsToDepend::make('Company')
                ->options(\App\Company::all()),
            NovaBelongsToDepend::make('Branch')
                ->optionsResolve(function ($company) {
                    // Reduce the amount of unnecessary data sent
                    return $company->branches()->get(['id','branch']);
                })
                ->dependsOn('Company'),
            NovaBelongsToDepend::make('Session')
                ->optionsResolve(function ($company) {
                    // Reduce the amount of unnecessary data sent
                    return $company->sessions()->get(['id','session']);
                })
                ->dependsOn('Company'),
            TimeField::make('Period'),
            TimeField::make('Tolerance'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
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
