<?php

namespace App\Exports;

use App\Models\InfoCard;
use Maatwebsite\Excel\Concerns\FromCollection;

class InfoCardExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Infocard::all();
    }
}
