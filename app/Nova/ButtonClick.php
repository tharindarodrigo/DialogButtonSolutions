<?php

namespace App\Nova;

use App\Nova\Filters\From;
use App\Nova\Filters\To;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

class ButtonClick extends Resource
{

    public static $searchRelations = [
        'button' => ['serial_number'],
        'buttonType' => ['button_type'],
        'company' => ['name'],
        'branch' => ['branch'],
    ];
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\ButtonClick';

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
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('Button'),
            BelongsTo::make('Button Type', 'buttonType'),
            BelongsTo::make('Company', 'company'),
            BelongsTo::make('Branch', 'branch'),
            Text::make('Battery Level'),
            DateTime::make('Created At')
                ->hideWhenCreating()
                ->hideWhenUpdating()

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
            new From(),
            new To()

        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            new DownloadExcel(),
        ];
    }
}
