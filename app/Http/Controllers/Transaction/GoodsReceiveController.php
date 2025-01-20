<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class GoodsReceiveController extends Controller
{
    public function index() {

        $purchase = DB::table('transaction.t_purchase as purchase')
                    ->select('purchase.*', 'supplier.name')
                    ->join('master.m_supplier as supplier', 'supplier.id', '=', 'purchase.supplier_id')
                    ->where('purchase.status', 1)
                    ->get();

        $data = DB::table('transaction.t_goods_receive as goods_receive')
                        ->select('goods_receive.*', 'supplier.name', 'purchase.po_no',)
                        ->join('transaction.t_purchase as purchase', 'purchase.id', '=', 'goods_receive.purchase_id')
                        ->join('master.m_supplier as supplier', 'supplier.id', '=', 'purchase.supplier_id')
                        ->orderBy('goods_receive.created_at', 'DESC')
                        ->paginate(20);

        return view('transaction.procurement.goods-receive.index', compact('purchase', 'data'));
    }

    public function save(Request $request) {

        $goods_receive = DB::table('transaction.t_goods_receive')->insertGetId([
            "purchase_id" => $request->purchase_id,
            "gr_no" => $request->gr_no,
            "date" => $request->date,
            "status" => 1,
            "receiver" => $request->receiver,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name,
        ]);

        return redirect()->route('procurement.goods-receive.edit', ['id' => $goods_receive]);
    }

    public function edit($id) {

        $goodsReceive = DB::table('transaction.t_goods_receive as goods_receive')
                        ->select('goods_receive.id','purchase.id as purchase_ids','purchase.po_no', 'supplier.name', 'goods_receive.gr_no', 'goods_receive.date', 'goods_receive.receiver','goods_receive.status')
                        ->join('transaction.t_purchase as purchase', 'purchase.id', '=', 'goods_receive.purchase_id')
                        ->join('master.m_supplier as supplier', 'supplier.id', '=', 'purchase.supplier_id')
                        ->where('goods_receive.id', $id)
                        ->first();



        $materials = DB::table('transaction.t_detail_purchase AS detail_purchase')
                    ->select(
                        'detail_purchase.id',
                        'material.name',
                        'material.width',
                        'detail_purchase.quantity',
                        DB::raw('(detail_purchase.quantity - (
                            SELECT COUNT(*)
                            FROM transaction.t_detail_goods_receive AS detail_goods_receive
                            WHERE detail_goods_receive.detail_purchase_id = detail_purchase.id
                        )) AS remaining_quantity')
                    )
                    ->join('master.m_material AS material', 'material.id', '=', 'detail_purchase.material_id')
                    ->where('detail_purchase.purchase_id', $goodsReceive->purchase_ids)
                    ->get();

        $detail = DB::table('transaction.t_detail_goods_receive as detail_goods_receive')
                ->select('detail_goods_receive.*', 'material.width', 'detail_purchase.measure_unit', 'material.name', 'material.gramature', 'material.unit')
                ->join('transaction.t_detail_purchase as detail_purchase', 'detail_purchase.id', '=', 'detail_goods_receive.detail_purchase_id')
                ->join('master.m_material as material', 'material.id', '=', 'detail_purchase.material_id')
                ->where('detail_goods_receive.goods_receive_id', $goodsReceive->id)
                ->get();

        return view('transaction.procurement.goods-receive.edit', compact('goodsReceive', 'materials', 'detail'));
    }

    public function saveDetail(Request $request) {

        try {
            DB::beginTransaction();

            $formData = $request->all();

            foreach($formData as $item) {
                DB::table('transaction.t_detail_goods_receive')->insert([
                    "goods_receive_id" => $item["goods_receive_id"],
                    "detail_purchase_id" => $item["detail_purchase_id"],
                    "weight" => $item["weight"],
                    "created_at" => date('Y-m-d H:i:s'),
                    "created_by" => Auth::user()->name,
                ]);
            }

            DB::commit();

            return response()->json([
                "message" => "Data successfully saved."
            ], 200);

        } catch (\Exception $e) {

            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);

        }
    }

    public function editDetail(Request $request) {

        $data = DB::table('transaction.t_detail_goods_receive')->where('id', $request->id)->first();

        return response()->json([
            "data" => $data
        ], 200);
    }

    public function updateDetail(Request $request) {

        DB::table('transaction.t_detail_goods_receive')->where('id', $request->id)->update([
            "detail_purchase_id" => $request->detail_purchase_id,
            "no_roll" => $request->no_roll,
            "weight" => $request->weight,
        ]);

        return redirect()->back();
    }

    public function deleteDetail($id){
        DB::table('transaction.t_detail_goods_receive')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function confirm($id) {

        try {

            DB::beginTransaction();

            $detailMaterial = DB::table('transaction.t_detail_goods_receive as detail_goods_receive')
                        ->select(
                            'detail_purchase.material_id',
                            'detail_goods_receive.no_roll',
                            'detail_goods_receive.weight',
                            'purchase.po_no',
                            'purchase.id as purchase_id'
                        )
                        ->join('transaction.t_detail_purchase as detail_purchase', 'detail_purchase.id', '=', 'detail_goods_receive.detail_purchase_id')
                        ->join('master.m_material as material', 'material.id', '=', 'detail_purchase.material_id')
                        ->join('transaction.t_purchase as purchase', 'purchase.id', '=', 'detail_purchase.purchase_id')
                        ->where('detail_goods_receive.goods_receive_id', $id)
                        ->get();

            foreach($detailMaterial as $value) {
                DB::table('transaction.t_stock_raw_material')->insert([
                    "material_id" => $value->material_id,
                    "no_roll" => DB::select("SELECT transaction.generate_roll_code('$value->material_id') as roll_code")[0]->roll_code,
                    "weight" => $value->weight,
                    "source_from" => $value->po_no,
                    "date" => date('Y-m-d H:i:s'),
                    "created_at" => date('Y-m-d H:i:s'),
                    "created_by" => Auth::user()->name,
                ]);
            }

            DB::table('transaction.t_goods_receive')->where('id', $id)->update([
                "status" => 2,
            ]);

            if($this->checkOrderIsCompleted($detailMaterial[0]->purchase_id)){
                DB::table('transaction.t_purchase')->where('id', $detailMaterial[0]->purchase_id)
                        ->update([
                            'status' => 2,
                            'updated_at' => date('Y-m-d H:i:s'),
                            'updated_by' => Auth::user()->name,
                ]);
            }


            DB::commit();

            return redirect()->route('procurement.goods-receive.index');

        } catch (\Exception $e) {

            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);

        }
    }

    public function checkOrderIsCompleted($purchaseId) {

        $totalOrderQuantity = DB::select("
                            SELECT
                                SUM(detail_purchase.quantity) AS order_quantity
                            FROM
                                TRANSACTION.t_detail_purchase AS detail_purchase
                            WHERE
                                detail_purchase.purchase_id = ?", [$purchaseId]);

        $totalOrderCompleted = DB::select("
                            SELECT COUNT
                                ( * ) AS order_received
                            FROM
                                TRANSACTION.t_detail_goods_receive AS detail_goods_receive
                                JOIN TRANSACTION.t_detail_purchase AS detail_purchase ON detail_purchase.ID = detail_goods_receive.detail_purchase_id
                            WHERE
                                detail_purchase.purchase_id = ?", [$purchaseId]);

        // Access the result
        $totalOrder = $totalOrderQuantity[0]->order_quantity;
        $orderCompleted = $totalOrderCompleted[0]->order_received;

        if(($totalOrder - $orderCompleted) == 0) {
            return true;
        } else {
            return false;
        }

    }
}
