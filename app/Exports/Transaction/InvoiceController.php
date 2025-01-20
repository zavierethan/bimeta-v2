<?php

namespace App\Exports\Transaction;

use Maatwebsite\Excel\Concerns\FromCollection;

class InvoiceController implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
    }
}
