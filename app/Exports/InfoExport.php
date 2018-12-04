<?php

namespace App\Exports;

use App\Info;
use Maatwebsite\Excel\Concerns\FromCollection;

class InfoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Info::all();
    }
}
