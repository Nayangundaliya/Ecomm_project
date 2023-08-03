<?php

namespace App\Exports;

// use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Modules\Product\Entities\Product;

class ProductExport implements FromCollection
{
    /**
    *
    * @return \Illuminate\Support\Collection
    */
    

    public function collection()
    {
        return Product::all();
    }
}
