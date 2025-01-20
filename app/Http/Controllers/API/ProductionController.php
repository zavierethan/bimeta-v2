<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ProductionController extends Controller
{
    public function page(Request $request) {
        $query = DB::table('transaction.t_detail_sales_order as detail_sales_order')
            ->join('transaction.t_spk as spk', 'spk.detail_sales_order_id', '=', 'detail_sales_order.id')
            ->join('transaction.t_sales_order as sales_order', 'sales_order.id', '=', 'detail_sales_order.sales_order_id')
            ->join('public.users as user', 'user.id', '=', 'sales_order.assign_to')
            ->join('master.m_goods as goods', 'goods.id', '=', 'detail_sales_order.goods_id')
            ->join('master.m_customer as customer', 'customer.id', '=', 'sales_order.customer_id')
            ->select(
                'spk.id',
                'spk.spk_no',
                'spk.start_date',
                'spk.bruto_width',
                'spk.bruto_length',
                'spk.persentage',
                'goods.name AS goods_name',
                'customer.name as customer_name',
                'sales_order.ref_po_customer',
                'user.name as pic',
                DB::raw("CASE
                            WHEN goods.type = '1' THEN 'A' 
                            WHEN goods.type = '2' THEN 'B' 
                            WHEN goods.type = '3' THEN 'AB' 
                            ELSE 'BB' 
                        END AS goods_type"),
                'spk.current_process',
                'spk.specification',
                'spk.sheet_quantity',
                'spk.quantity',
                DB::raw("CASE
                            WHEN spk.status = '1' THEN '' 
                            WHEN spk.status = '2' THEN 'SCHEDULED' 
                            WHEN spk.status = '3' THEN 'WORK IN PROGRESS' 
                            ELSE 'COMPLETED' 
                        END AS status")
            )
            ->whereIn('spk.status', [2, 3, 4]);
            // ->orderByDesc('spk.created_at');

        $totalRecords = $query->count();
    
        if ($request->has('search')) {

            $search = $request->search;
            $query->where('customer.name', 'ILIKE', "%$search%")
                ->orWhere('goods.name', 'ILIKE', "%$search%")
                ->orWhere('spk.spk_no', 'ILIKE', "%$search%")
                ->orWhere('sales_order.ref_po_customer', 'ILIKE', "%$search%");
        }
        
        $data = $query->paginate(10);
    
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $data->total(),
            'data' => $data->items(),
        ]);
    }
    
}
