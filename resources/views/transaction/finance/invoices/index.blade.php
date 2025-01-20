@extends('layouts._base')
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Finance</li>
<li class="breadcrumb-item active" aria-current="page">Invoice</li>
@endsection
@section('css')

@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <h2 class="text-2xl font-extrabold dark:text-primary">Faktur</h2>
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview" class="btn btn-primary shadow-md mr-2">Buat Faktur</a>
                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#form-kuitansi" class="btn btn-primary shadow-md mr-2">Cetak Template Kuitansi</a>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible  xl:overflow-visible">
            <table class="table table-report -mt-2 table-responsive" id="data-table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th style="text-align: left;">NO. FAKTUR</th>
                        <th>TANGGAL FAKTUR</th>
                        <th>CUSTOMER</th>
                        <th>REF. PO</th>
                        <th>REF. SURAT JALAN</th>
                        <th class="text-center">TOTAL</th>
                        <th style="text-align: center;">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{$item->invoice_no}}</td>
                        <td><?php echo date("d/m/Y", strtotime($item->date)) ?></td>
                        <td>{{$item->customer_name}}</td>
                        <td></td>
                        <td></td>
                        <td class="text-right">{{$item->total_price_sum}}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3 text-primary"
                                    href="{{route('finance.invoice.edit', ['id' => $item->id])}}">
                                    <i data-lucide="edit" class="w-4 h-4 mr-1"></i> Edit </a>
                                <a class="flex items-center mr-3 text-primary" target="_blank" href="{{route('finance.invoice.print', ['id' => $item->id])}}">
                                    <i data-lucide="printer" class="w-4 h-4 mr-1"></i> Print </a>
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
                                Buat Faktur
                            </h2>
                        </div>
                        <div id="horizontal-form" class="p-5">
                            <form method="POST" action="{{route('finance.invoice.save')}}">
                                @csrf
                                <div class="preview">
                                    <div class="form-inline">
                                        <label for="vertical-form-1" class="sm:w-32 font-bold">Customer</label>
                                        <select data-placeholder="Pilih Proses" class="tom-select w-full form-control" name="customer_id">
                                            <option value=" ">-</option>
                                            @foreach($customers as $cust)
                                            <option value="{{$cust->id}}">{{$cust->name}} - V{{$cust->tax_type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-32 font-bold">Tanggal Faktur</label>
                                        <input id="vertical-form-1" type="date" class="form-control" name="date" value="<?= date("Y-m-d"); ?>" required>
                                    </div>
                                </div>
                                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                    <button type="button" data-tw-dismiss="modal" class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                    <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END: Horizontal Form -->
                </div>
            </div>
        </div>
    </div>

    <div id="form-kuitansi" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- BEGIN: Horizontal Form -->
                    <div class="intro-y box">
                        <div
                            class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Form Cetak Template Kuitansi
                            </h2>
                        </div>
                        <div id="horizontal-form" class="p-5">
                            <form method="GET" action="{{route('finance.invoice.print.kuitansi')}}">
                                <!-- @csrf -->
                                <div class="preview">
                                    <div class="form-inline">
                                        <label for="vertical-form-1" class="sm:w-40 font-bold">No.</label>
                                        <input type="text" class="form-control" name="no_kuitansi" id="no_kuitansi">
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-40 font-bold">Sudah Terima Dari</label>
                                        <select data-placeholder="Pilih Proses" class="tom-select w-full form-control" name="received_from">
                                            <option value=" ">-</option>
                                            @foreach($customers as $cust)
                                            <option value="{{$cust->name}}">{{$cust->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-40 font-bold">Uang Sejumlah</label>
                                        <input type="text" class="form-control" name="nominal">
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-40 font-bold">Free Text (Nominal)</label>
                                        <textarea type="text" class="form-control" name="nominal_text"></textarea>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-40 font-bold">Tanggal</label>
                                        <input type="date" class="form-control" name="date">
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-40 font-bold">Untuk Pembayaran</label>
                                        <input type="text" class="form-control" name="pay_for">
                                    </div>
                                </div>
                                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                    <button type="button" data-tw-dismiss="modal" class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                    <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Cetak Kuitansi</button>
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
        order: [[1, 'desc']]
    });

    $('#no_kuitansi').on('input', function() {
        $(this).val($(this).val().replace(/\s/g, '').toUpperCase());
    });

    $('#no_kuitansi').on('keypress', function(event) {
        if (event.which === 32) {
            event.preventDefault();
        }
    });
});
</script>
@endsection
