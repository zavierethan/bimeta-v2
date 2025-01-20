@extends('layouts._base')
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Procurement</li>
<li class="breadcrumb-item active" aria-current="page">Purchase Order</li>
@endsection
@section('css')
@endsection
@section('main-content')
<div class="content content--top-nav">
    <!-- BEGIN: Transaction Details -->
    <div class="intro-y grid grid-cols-12 gap-5 mt-5">
        <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Informasi Pembelian</div>
                </div>
                <form action="{{route('procurement.purchase-order.update')}}" method="POST">
                    @csrf
                    <div class="intro-y grid grid-cols-12 gap-5 mt-5">
                        <div class="col-span-12 lg:col-span-6 2xl:col-span-6">
                            <div class="rounded-md p-5">
                                <div class="form-inline">
                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">No. PO</label>
                                    <input id="horizontal-form-1" type="text" class="form-control" name="po_no" value="{{$purchase->po_no}}" readonly>
                                    <input id="horizontal-form-1" type="hidden" class="form-control" name="id" value="{{$purchase->id}}" readonly>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">Nama Supplier</label>
                                    <select data-placeholder="Pilih Supplier" class="tom-select w-full form-control" name="supplier_id" required>
                                        <option value=" "> - </option>
                                        @foreach($suppliers as $supplier)
                                        <option value="{{$supplier->id}}" <?php echo ($supplier->id == $purchase->supplier_id) ? 'selected' : ''; ?>>{{$supplier->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">Tanggal PO</label>
                                    <input id="horizontal-form-1" type="date" class="form-control" name="date" value="{{$purchase->date}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-6 2xl:col-span-6">
                            <div class="rounded-md p-5">
                                <div class="form-inline">
                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">Jenis Pajak</label>
                                    <select data-placeholder="Pilih Jenis Pajak" class="tom-select w-full form-control" name="tax_type" required>
                                        <option value=" "> - </option>
                                        <option value="0" <?php echo ($purchase->tax_type == '0') ? 'selected' : ''; ?>>V0 (Kawasan Berikat)</option>
                                        <option value="1" <?php echo ($purchase->tax_type == '1') ? 'selected' : ''; ?>>V1 (Exclude PPN)</option>
                                        <option value="2" <?php echo ($purchase->tax_type == '2') ? 'selected' : ''; ?>>V2 (Include PPN)</option>
                                    </select>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">Status</label>
                                    <input id="horizontal-form-1" type="text" class="form-control" name="status" value="{{$purchase->str_status}}" readonly>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Catatan</label>
                                    <textarea id="vertical-form-1" type="text" class="form-control" name="remarks">{{$purchase->remarks}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="intro-y grid grid-cols-12 gap-5 mt-5">
        <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Detail Pembelian</div>
                </div>
                <div class="overflow-auto lg:overflow-visible -mt-3">
                    <table class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="whitespace-nowrap">NAMA BARANG</th>
                                <th class="whitespace-nowrap text-center">UKURAN (CM)</th>
                                <th class="whitespace-nowrap text-center">QUANTITY ORDER</th>
                                <th class="whitespace-nowrap text-center">SISA ROLL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $data)
                            <tr>
                                <td>{{$data->name}}</td>
                                <td class="text-center">L: {{$data->width}}</td>
                                <td class="text-center quantity">{{$data->quantity}}</td>
                                <td class="text-center quantity text-danger">{{$data->remaining_quantity}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Transaction Details -->
</div>
@endsection

@section('script')
<script>

</script>
@endsection
