@extends('layouts._base')
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Procurement</li>
<li class="breadcrumb-item active" aria-current="page">Purchase Order</li>
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <h2 class="text-2xl font-extrabold dark:text-primary">Purchase Order</h2>
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <a href="javascript:;"  data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview" class="btn btn-primary shadow-md mr-2">Buat Purchase Order</a>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="data-table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="whitespace-nowrap">NO. PO</th>
                        <th class="whitespace-nowrap">SUPPLIER</th>
                        <th class="whitespace-nowrap text-center">TANGGAL PEMESANAN</th>
                        <th class="whitespace-nowrap text-center">STATUS</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{$item->po_no}}</td>
                        <td>{{$item->name}} ({{$item->code}})</td>
                        <td class="text-center"><?php echo date("d/m/Y", strtotime($item->date)); ?></td>
                        <td class="text-center text-success font-bold">{{$item->str_status}}</td>
                        <td class="table-report__action">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center text-primary mr-3" href="{{route('procurement.purchase-order.edit', ['id' => $item->id])}}"><i data-lucide="edit" class="w-4 h-4 mr-1"></i> Detail</a>
                                <a class="flex items-center text-primary mr-3" href="{{route('procurement.purchase-order.monitoring', ['id' => $item->id])}}"><i data-lucide="eye" class="w-4 h-4 mr-1"></i> Monitor</a>
                                <a class="flex items-center text-warning mr-3" href="{{route('procurement.purchase-order.print', ['id' => $item->id])}}" target="_blank" title="Print PO"><i data-lucide="printer" class="w-4 h-4 mr-1"></i> Print PO</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
    </div>
    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="superlarge-modal-size-preview" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- BEGIN: Horizontal Form -->
                    <div class="intro-y box">
                        <div
                            class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Buat PO
                            </h2>
                        </div>
                        <div id="horizontal-form" class="p-5">
                            <form method="POST" action="{{route('procurement.purchase-order.save')}}">
                                @csrf
                                <div class="preview">
                                    <div class="form-inline">
                                        <label for="horizontal-form-2" class="sm:w-32 font-bold">Supplier</label>
                                        <select data-placeholder="Pilih Supplier" class="tom-select w-full form-control"
                                            name="supplier_id" required>
                                            <option value=" "> - </option>
                                            @foreach($suppliers as $supplier)
                                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="sm:w-32 font-bold">Tanggal PO</label>
                                        <input id="horizontal-form-1" type="date" class="form-control" name="date"
                                            required>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="sm:w-32 font-bold">Jenis Pajak</label>
                                        <select data-placeholder="Pilih Jenis Pajak" class="tom-select w-full form-control" name="tax_type" required>
                                            <option value=" "> - </option>
                                            <option value="0">V0 (Kawasan Berikat)</option>
                                            <option value="1">V1 (Exclude PPN)</option>
                                            <option value="2">V2 (Include PPN)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                    <button type="button" data-tw-dismiss="modal" class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                    <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END: Horizontal Form -->
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->
</div>
@endsection

@section('script')
<script>
$(function() {
    $('#data-table').DataTable({
        order: [[0, 'desc']]
    });

})
</script>
@endsection
