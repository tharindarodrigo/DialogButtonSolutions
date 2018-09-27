<?php

namespace App\Exports;

use App\ButtonClick;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class ButtonClicksExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return ButtonClick::whereHas('buttonType', function ($q1) {
            $q1->select('button_type');
        })->whereHas('company', function ($q2) {
            $q2->select('name');
        })->whereHas('branch', function ($q3) {
            $q3->select('branch');
        })->get();
    }
}
