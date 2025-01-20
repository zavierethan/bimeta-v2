@extends('layouts._base')
@section('css')
@endsection
@section('main-content')
<div class="content content--top-nav">
    <!-- BEGIN: Transaction Details -->
    <div class="intro-y grid grid-cols-12 gap-5 mt-5">
        <div class="col-span-12 lg:col-span-4 2xl:col-span-4">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Informasi Invoice</div>
                    <div class="flex items-center ml-auto">
                    <a href="{{route('finance.invoice.print', ['id' => $invoice->id])}}" target="_blank" class="btn btn-primary shadow-md mr-2"><i data-lucide="printer" class="w-4 h-4 mr-2"></i>Print Invoice</a>
                    </div>
                </div>

                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="w-32 font-bold">No Invoice</label>
                    <input id="vertical-form-1" type="text" class="form-control" value="{{$invoice->invoice_no}}" readonly>
                    <input id="vertical-form-1" type="hidden" class="form-control" name="id" value="{{$invoice->id}}" readonly>
                </div>
                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="w-32 font-bold">No P.O</label>
                    <input id="vertical-form-1" type="text" class="form-control" name="id" value="{{$invoice->ref_po_customer}}">
                </div>
                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="w-32 font-bold">Nama Customer</label>
                    <input id="vertical-form-1" type="text" class="form-control" name="id" value="{{$invoice->customer_name}}">
                </div>
                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="w-32 font-bold">Tanggal Invoice</label>
                    <input id="vertical-form-1" type="date" class="form-control" name="date" value="{{$invoice->date}}">
                </div>
                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="w-32 font-bold">Tanggal Jatuh Tempo</label>
                    <input id="vertical-form-1" type="date" class="form-control" name="date" value="{{$invoice->due_date}}">
                </div>
                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="w-32 font-bold">Tipe Pajak</label>
                    <input id="vertical-form-1" type="text" class="form-control" name="id" value="V{{$invoice->tax_type}}">
                </div>
                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                        <button type="button" id="calculate-hpp" class="btn py-3 btn-primary w-full md:w-52">Update</button>
                </div>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-8 2xl:col-span-8">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Detail Invoice</div>
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview" class="flex items-center ml-auto text-white btn btn-primary shadow-md"> <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
                        Tambah Barang
                    </a>
                </div>
                <div class="overflow-auto lg:overflow-visible -mt-3">
                    <table class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="whitespace-nowrap text-center">ACTION</th>
                                <th class="whitespace-nowrap">NAMA BARANG</th>
                                <th class="whitespace-nowrap text-center">QTY</th>
                                <th class="whitespace-nowrap text-right">HARGA</th>
                                <th class="whitespace-nowrap text-right">TOTAL HARGA</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detailInvoice as $detail)
                            <tr>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3 text-danger" href="{{route('finance.invoice.detail.delete', ['id' => $detail->id])}}" onclick="return confirm('Apakah anda yakin ?')"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Hapus </a>
                                    </div>
                                </td>
                                <td>{{$detail->goods_name}} | {{$detail->specification}} | UK : {{$detail->measure}}</td>
                                <td class="text-center quantity">{{$detail->quantity}}</td>
                                <td class="text-right price">{{$detail->price}}</td>
                                <td class="text-right total-price">0.00</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap text-center"></td>
                                <td class="whitespace-nowrap text-right font-bold">Sub Total</td>
                                <td class="whitespace-nowrap text-right sub-total">0,00</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap text-center"></td>
                                <td class="whitespace-nowrap text-right font-bold">Tax (11%)</td>
                                <td class="whitespace-nowrap text-right tax">0,00</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap text-center"></td>
                                <td class="whitespace-nowrap text-right font-bold">Jumlah Total (Rp)</td>
                                <td class="whitespace-nowrap text-right total-amount">0,00</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div id="superlarge-modal-size-preview" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-body">
                                <!-- BEGIN: Horizontal Form -->
                                <div class="intro-y box">
                                    <div
                                        class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                        <h2 class="font-medium text-base mr-auto">
                                            Tambah Barang
                                        </h2>
                                    </div>
                                    <div id="horizontal-form" class="p-5">
                                        <form method="POST" action="{{route('finance.invoice.detail.save')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="preview">
                                                <div class="form-inline">
                                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">No. Pengiriman</label>
                                                    <select data-placeholder="Pilih Barang" class="tom-select w-full form-control" name="delivery_order_id" required>
                                                        <option value="">-</option>
                                                        @foreach($shipmentList as $list)
                                                        <option value="{{$list->id}}">{{$list->travel_permit_no}}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="hidden" name="invoice_id" value="{{$invoice->id}}"/>
                                                </div>
                                            </div>
                                            <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                                <button type="button" data-tw-dismiss="modal"
                                                    class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                                <button type="submit"
                                                    class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- END: Horizontal Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Transaction Details -->
</div>
@endsection

@section('script')
<script>
$(function() {
    updateTotals()
    // Function to update totals when quantity or price changes
    function updateTotals() {
        var subtotal = 0;
        var taxRate = 0.11; // 11% tax rate

        // Iterate through each row in the tbody
        $('tbody tr').each(function() {
            var quantity = parseFloat($(this).find('.quantity').text());
            var price = parseFloat($(this).find('.price').text().replace(/,/g,'')); // Remove commas from the price

            $(this).find('.price').text(price.toLocaleString('en-US', {minimumFractionDigits: 2}));

            // Calculate total for the current row
            var total = quantity * price;

            // Update the total column for the current row
            $(this).find('.total-price').text(total.toLocaleString('en-US', {minimumFractionDigits: 2}));

            // Add the total to the subtotal
            subtotal += total;
        });

        var taxType = {{$invoice->tax_type}};

        if (taxType === 2) {
            taxRate = 0;
        }

        // Calculate tax and total amount
        var tax = subtotal * taxRate;
        var totalAmount = subtotal + tax;

        // Update the subtotal, tax, and total amount in the footer
        $('.sub-total').text(subtotal.toLocaleString('en-US', {minimumFractionDigits: 2}));
        $('.tax').text(tax.toLocaleString('en-US', {minimumFractionDigits: 2}));
        $('.total-amount').text(totalAmount.toLocaleString('en-US', {minimumFractionDigits: 2}));
    }
});
</script>
@endsection
