@extends('layouts._base')
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Procurement</li>
<li class="breadcrumb-item active" aria-current="page">Penerimaan Barang</li>
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <h2 class="text-2xl font-extrabold dark:text-primary">Penerimaan Material</h2>
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview" class="btn btn-primary shadow-md mr-2">Input Penerimaan</a>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="data-table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="whitespace-nowrap">NO. PO</th>
                        <th class="whitespace-nowrap">SUPPLIER</th>
                        <th class="whitespace-nowrap">NO. SURAT JALAN</th>
                        <th class="whitespace-nowrap text-center">TANGGAL</th>
                        <th class="whitespace-nowrap text-center">PENERIMA</th>
                        <th class="whitespace-nowrap">STATUS</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{$item->po_no}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->gr_no}}</td>
                        <td class="text-center">{{$item->date}}</td>
                        <td class="text-center">{{$item->receiver}}</td>
                        <td>
                            @if($item->status == 1)
                                <span class="text-warning font-bold">DRAFT</span>
                            @else
                                <span class="text-success font-bold">SUDAH TRANSFER KE GUDANG</span>
                            @endif
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3 text-primary" href="{{route('procurement.goods-receive.edit', ['id' => $item->id])}}"><i data-lucide="edit" class="w-4 h-4 mr-1"></i> Detail</a>
                                @if($item->status == 1)
                                <a class="flex items-center mr-3 text-success" href="{{route('procurement.goods-receive.confirm', ['id' => $item->id])}}" onclick="return confirm('Apakah anda yakin untuk mentransfer data penerimaan ke data Stok ?')"><i data-lucide="refresh-ccw" class="w-4 h-4 mr-1"></i> Transfer Ke Data Stok</a>
                                @endif
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
                                Penerimaan Material
                            </h2>
                        </div>
                        <div id="horizontal-form" class="p-5">
                            <form method="POST" action="{{route('procurement.goods-receive.save')}}">
                                @csrf
                                <div class="preview">
                                    <div class="form-inline">
                                        <label for="horizontal-form-2" class="sm:w-32 font-bold">No Pembelian</label>
                                        <select data-placeholder="Pilih No. Pembelian" class="tom-select w-full form-control" name="purchase_id" required>
                                            <option value=" ">-</option>
                                            @foreach($purchase as $po)
                                            <option value="{{$po->id}}" <?php echo ($po->status == 2) ? "disabled" : "" ?>>{{$po->po_no}} - {{$po->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-32 font-bold">No. Surat Jalan</label>
                                        <input id="vertical-form-1" type="text" class="form-control" name="gr_no" required>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-32 font-bold">Tanggal</label>
                                        <input id="vertical-form-1" type="date" class="form-control" name="date" required>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-32 font-bold">No. Kendaraan</label>
                                        <input id="vertical-form-1" type="text" class="form-control" name="receiver" required>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-32 font-bold">Penerima</label>
                                        <input id="vertical-form-1" type="text" class="form-control" name="receiver" value="ELIS" required>
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

    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="log-goods-received" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- BEGIN: Horizontal Form -->
                    <div class="intro-y box">
                        <div
                            class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Log Penerimaan Material
                            </h2>
                        </div>
                        <div id="horizontal-form" class="p-5">
                            <form method="POST" action="{{route('procurement.goods-receive.save')}}">
                                @csrf
                                <div class="preview">
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="form-label sm:w-40">No Pembelian</label>
                                        <select data-placeholder="Pilih Material" class="tom-select w-full form-control" name="purchase_id" required>
                                            <option value=" ">-</option>
                                            @foreach($purchase as $po)
                                            <option value="{{$po->id}}">{{$po->po_no}} - {{$po->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                    <button type="button" data-tw-dismiss="modal" class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                    <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Lihat Log</button>
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
