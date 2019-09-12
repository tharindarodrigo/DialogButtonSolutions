<?php

namespace App\Nova\Lenses;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Lenses\Lens;
use Laravel\Nova\Http\Requests\LensRequest;

class LowBatteries extends Lens
{
    /**
     * Get the query builder / paginator for the lens.
     *
     * @param \Laravel\Nova\Http\Requests\LensRequest $request
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public static function query(LensRequest $request, $query)
    {
        return $request->withOrdering($request->withFilters(
            $query->select(['buttons.serial_number', 'companies.name', 'branches.branch', 'button_clicks.battery_level', 'buttons.identifier'])
                ->join('companies', 'button_clicks.company_id', '=', 'companies.id')
                ->join('branches', 'button_clicks.branch_id', '=', 'branches.id')
                ->join('buttons', 'button_clicks.button_id', '=', 'buttons.id')
                ->where('button_clicks.battery_level', '<=', env('BATTERY_LEVEL', 2))
                ->orderBy('button_clicks.battery_level')
                ->distinct()
        ));
    }

    /**
     * Get the fields available to the lens.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make('ID', 'id')->sortable(),
            Text::make('Serial Number')->sortable(),
            Text::make('Company', 'name')->sortable(),
            Text::make('Branch')->sortable(),
            Text::make('Battery Level')->sortable(),
            Text::make('Identifier')->sortable(),
        ];
    }

    /**
     * Get the filters available for the lens.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available on the lens.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return parent::actions($request);
    }

    /**
     * Get the URI key for the lens.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'low-batteries';
    }
}
