<?php

namespace App\Exports;

use App\ButtonClick;
use Maatwebsite\Excel\Concerns\FromCollection;

class ButtonClicksExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ButtonClick::all();
    }
}
