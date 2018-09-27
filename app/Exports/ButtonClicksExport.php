<?php

namespace App\Exports;

use App\ButtonClick;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class ButtonClicksExport implements FromCollection
{

    public $from;
    public $to;

    public function __construct($request)
    {
        $this->from = $request->get('from') ?? null;
        $this->to = $request->get('to') ?? null;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $x = DB::table('button_clicks')
            ->join('buttons', 'button_clicks.button_type_id', '=', 'buttons.id')
            ->join('button_types', 'button_clicks.button_type_id', '=', 'button_types.id')
            ->join('companies', 'button_clicks.company_id', '=', 'companies.id')
            ->join('branches', 'button_clicks.branch_id', '=', 'branches.id')
            ->select('button_clicks.id' ,'button_clicks.created_at', 'button_types.button_type', 'companies.name as company', 'branches.branch');
        if (!empty($this->from)) {
            $x->where('button_clicks.created_at', '>=', $this->from);
        }

        if (!empty($this->to)) {
            $x->where('button_clicks.created_at', '<', $this->to);
        }

        return $x->get();
    }
}
