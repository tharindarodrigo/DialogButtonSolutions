<?php

namespace App\Nova\Lenses;

use App\Nova\Filters\ButtonClicksFrom;
use App\Nova\Filters\ButtonClickTo;
use App\Nova\Filters\From;
use App\Nova\Filters\To;
use Illuminate\Support\Facades\DB;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Lenses\Lens;
use Laravel\Nova\Http\Requests\LensRequest;

class ClickCount extends Lens
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
            $query->select(self::columns())
                ->join('button_types', 'button_clicks.button_type_id', '=', 'button_types.id')
                ->join('companies', 'button_clicks.company_id', '=', 'companies.id')
                ->join('branches', 'button_clicks.branch_id', '=', 'branches.id')
                ->groupBy('companies.name', 'branches.branch', 'button_types.button_type')

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
            Text::make('Button Type')->sortable(),
            Text::make('Name')->sortable(),
            Text::make('Branch')->sortable(),
            Text::make('Created At')->hideFromIndex(),
            Text::make('Count')->sortable(),
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
        return [
            new ButtonClicksFrom(),
            new ButtonClickTo()
        ];
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
        return 'click-count';
    }

    public static function columns()
    {
        return [
            'button_types.button_type',
            'companies.name',
            'branches.branch',
//            'button_clicks.created_at',
            DB::raw('count(*) as count')
        ];
    }
}
