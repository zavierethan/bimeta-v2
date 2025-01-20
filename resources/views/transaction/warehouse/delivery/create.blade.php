@extends('layouts._base')
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <!-- BEGIN: Horizontal Form -->
            <div class="intro-y box mt-5">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Informasi Pengiriman
                    </h2>
                </div>
                <div id="horizontal-form" class="p-5">
                    <form method="POST" action="{{route('warehouse.delivery.save')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="preview">
                            <div class="form-inline mt-5">
                                <label for="horizontal-form-2" class="form-label sm:w-40">No. PO</label>
                                <select data-placeholder="Pilih PO Customer" class="tom-select w-full form-control" name="sales_order_id" required>
                                    <option value=" "> - </option>
                                    @foreach($salesOrders as $order)
                                    <option value="{{$order->id}}">{{$order->transaction_no}} - {{$order->ref_po_customer}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="horizontal-form-2" class="form-label sm:w-40">Tanggal Pengiriman</label>
                                <input id="horizontal-form-1" type="date" class="form-control" name="delivery_date" required>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="form-label sm:w-40">Plat Nomor</label>
                                <input id="vertical-form-1" type="text" class="form-control" name="licence_plate" required>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="form-label sm:w-40">Driver</label>
                                <input id="vertical-form-1" type="text" class="form-control" name="driver_name" required>
                            </div>
                        </div>
                        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                            <button type="button"
                                class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Batal</button>
                            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END: Horizontal Form -->
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(function() {
    $(".loader").hide();
})
</script>
@endsection