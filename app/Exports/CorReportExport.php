<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use DB;

class CorReportExport implements FromCollection, WithMapping, WithHeadings, WithStyles
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        $toReturn = DB::table('transaction.t_detail_sales_order as detail_sales_order')
                ->join('transaction.t_spk as spk', 'spk.detail_sales_order_id', '=', 'detail_sales_order.id')
                ->join('transaction.t_sales_order as sales_order', 'sales_order.id', '=', 'detail_sales_order.sales_order_id')
                // ->leftJoin('master.m_substance as substance', 'substance.substance', '=', 'spk.specification')
                ->join('master.goods as goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->join('master.m_customer as customer', 'customer.id', '=', 'sales_order.customer_id')
                ->select(
                    'spk.*',
                    'goods.name AS goods_name',
                    'goods.type as goods_type',
                    'customer.name as customer_name',
                    'sales_order.ref_po_customer',
                    'spk.specification',
                    'substance.cor_code',
                    'spk.sheet_quantity',
                    'spk.quantity',
                    DB::raw("CONCAT(spk.bruto_width, ' X ', spk.bruto_length) AS bruto"),
                )
                ->whereIn('spk.id', $this->data)
                ->orderBy('spk.bruto_width', 'desc')
                ->get();

        return $toReturn;
    }

    public function map($row): array
    {
        return [
            $row->start_date,
            $row->ref_po_customer,
            $row->spk_no,
            $row->customer_name,
            $row->bruto_width,
            $row->bruto_length,
            $row->specification,
            // $row->cor_code,
            $row->quantity,
        ];
    }

    public function headings(): array
    {
        return [
            'TGL PROD',
            'NO PO',
            'NO SPK',
            'KONSUMEN',
            'LEBAR',
            'PANJANG',
            'KUALITAS',
            // 'CODE CORR',
            'QTY',
            'KET',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $columns = range('A', $sheet->getHighestDataColumn());

        foreach ($columns as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        $highestRow = $sheet->getHighestDataRow();

        // Center all cells and add borders
        return [
            1 => [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
                ['font' => ['bold' => true]]
            ],
            'A2:' . $sheet->getHighestDataColumn() . $highestRow => [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
            ],
        ];
    }
}
