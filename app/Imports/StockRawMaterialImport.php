<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use DB;

class StockRawMaterialImport implements ToCollection, WithCalculatedFormulas
{

    public function collection(Collection $collection)
    {
        foreach ($collection as $index => $row) {
            // Skip the header row if it exists

            $date = is_numeric($row[8]) ? Date::excelToDateTimeObject($row[8])->format('Y-m-d') : $row[8];

            if (in_array($index, [0, 1, 2])) {
                continue;
            }

            $material = DB::table('master.m_material')->where('code', $row[0])->first();

            DB::table('transaction.t_stock_raw_material')->insert([
                'material_id' => $material->id,
                'no_roll' => DB::select("SELECT transaction.generate_roll_code('$material->id') as roll_code")[0]->roll_code,
                'weight' => $row[5],
                'source_from' => $row[7],
                'date' => $date,
            ]);
        }
    }
}
