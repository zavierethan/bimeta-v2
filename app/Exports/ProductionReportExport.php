<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use DB;

class ProductionReportExport implements FromCollection, WithMapping, WithHeadings, WithStyles
{
    protected $startDate;
    protected $endDate;
    protected $pic;

    public function __construct($startDate, $endDate, $pic)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->pic = $pic;
    }

    public function collection()
    {
        $query = DB::table('transaction.t_detail_sales_order as detail_sales_order')
                ->join('transaction.t_spk as spk', 'spk.detail_sales_order_id', '=', 'detail_sales_order.id')
                ->join('transaction.t_sales_order as sales_order', 'sales_order.id', '=', 'detail_sales_order.sales_order_id')
                ->join('master.goods as goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->join('master.m_customer as customer', 'customer.id', '=', 'sales_order.customer_id')
                ->select(
                    'spk.*',
                    'goods.name AS goods_name',
                    'customer.name as customer_name',
                    'sales_order.ref_po_customer',
                    DB::raw("CASE
                                WHEN goods.type = '1' THEN 'A'
                                WHEN goods.type = '2' THEN 'B'
                                WHEN goods.type = '3' THEN 'AB'
                                ELSE 'BB'
                            END AS goods_type"),
                    'spk.specification',
                    'spk.sheet_quantity',
                    'spk.quantity',
                    DB::raw("CONCAT(spk.netto_width, ' X ', spk.netto_length) AS netto"),
                    DB::raw("CONCAT(spk.bruto_width, ' X ', spk.bruto_length) AS bruto"),
                )
                // ->whereIn('spk.status', [2,3])
                ->where('sales_order.assign_to', $this->pic)
                ->whereBetween('spk.start_date', [$this->startDate, $this->endDate]);

        $data = $query->orderBy('spk.spk_no', 'ASC')->get();

        return $data;
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
            $row->quantity,
        ];
    }

    public function headings(): array
    {
        return [
            'TANGGAL PROD',
            'NO. PO',
            'NO. SPK',
            'KONSUMEN',
            'LEBAR',
            'PANJANG',
            'KUALITAS',
            'QTY',
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

