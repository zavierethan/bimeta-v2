@extends('layouts._base')
@section('css')
@endsection
@section('main-content')
<div class="content content--top-nav">
    <!-- BEGIN: Transaction Details -->
    <div class="intro-y grid grid-cols-12 gap-5 mt-5">
        <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Informasi Pesanan</div>
                    @if($salesOrder->status < 1)
                    <form action="{{route('sales.confirm-order')}}" method="POST" class="flex items-center ml-auto">
                        @csrf
                        <input type="hidden" class="form-control" name="id" value="{{$salesOrder->id}}">
                        <button class="text-white btn btn-primary shadow-md"><i data-lucide="save" class="w-4 h-4 mr-2"></i>Konfirmasi & Simpan</button>
                    </form>
                    @endif

                </div>
                <form action="{{route('sales.update')}}" method="POST">
                    @csrf
                    <div class="intro-y grid grid-cols-12 gap-5 mt-5">
                        <div class="col-span-12 lg:col-span-6 2xl:col-span-6">
                            <div class="p-5 rounded-md">
                                <div class="form-inline">
                                    <label for="vertical-form-1" class="w-40 font-bold">No Sales Order</label>
                                    <input id="vertical-form-1" type="text" class="form-control" value="{{$salesOrder->transaction_no}}" readonly>
                                    <input id="vertical-form-1" type="hidden" class="form-control" name="id" value="{{$salesOrder->id}}" readonly>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="w-40 font-bold">No P.O</label>
                                    <input id="vertical-form-1" type="text" class="form-control" name="ref_po_customer" value="{{$salesOrder->ref_po_customer}}">
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="w-40 font-bold">Nama Customer</label>
                                    <select data-placeholder="Pilih customer" class="tom-select w-full form-control" id="customer_id" name="customer_id" required>
                                        <option value=" "> - </option>
                                        @foreach($customers as $customer)
                                        <option value="{{$customer->id}}"<?php echo ($customer->id == $salesOrder->cust_id) ? 'selected' : ''; ?>>{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="w-40 font-bold">Tanggal Pesan</label>
                                    <input id="vertical-form-1" type="date" class="form-control" name="order_date" value="{{$salesOrder->order_date}}">
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="w-40 font-bold">Tanggal kirim</label>
                                    <input id="vertical-form-1" type="date" class="form-control" name="delivery_date" value="{{$salesOrder->delivery_date}}">
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="w-40 font-bold">Jenis Pajak</label>
                                    <select data-placeholder="Pilih Jenis Pajak" class="tom-select w-full form-control" id="tax_type" name="tax_type" required>
                                        <option value=" "> - </option>
                                        <option value="0" <?php echo ($salesOrder->tax_type == '0') ? 'selected' : ''; ?>>V0 (Kawasan Berikat)</option>
                                        <option value="1" <?php echo ($salesOrder->tax_type == '1') ? 'selected' : ''; ?>>V1 (Exclude PPN)</option>
                                        <option value="2" <?php echo ($salesOrder->tax_type == '2') ? 'selected' : ''; ?>>V2 (Include PPN)</option>
                                        <option value="3" <?php echo ($salesOrder->tax_type == '3') ? 'selected' : ''; ?>>V3 (Sample)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-6 2xl:col-span-6">
                            <div class="p-5 rounded-md">
                                <div class="form-inline">
                                    <label for="horizontal-form-2" class="sm:w-40 font-bold">Status Order</label>
                                    <select data-placeholder="Pilih Jenis Pajak" class="tom-select w-full form-control" id="status" name="status" required>
                                        <option value="0" <?php echo ($salesOrder->status == '0') ? 'selected' : ''; ?>>DRAFT</option>
                                        <option value="1" <?php echo ($salesOrder->status == '1') ? 'selected' : ''; ?>>MENUNGGU CLAIM PIC</option>
                                        <option value="2" <?php echo ($salesOrder->status == '2') ? 'selected' : ''; ?>>SUDAH DI CLAIM PIC (PROSES PRODUKSI)</option>
                                        <option value="3" <?php echo ($salesOrder->status == '3') ? 'selected' : ''; ?>>SELESAI</option>
                                    </select>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="w-40 font-bold">PIC Produksi</label>
                                    <select data-placeholder="Pilih PIC" class="tom-select w-full form-control" id="assign_to" name="assign_to" required>
                                        <option value=" "> - </option>
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}" <?php echo ($user->id == $salesOrder->assign_to) ? 'selected' : ''; ?>>{{$user->display_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="w-40 font-bold">Alamat Pengiriman</label>
                                    <textarea id="vertical-form-1" type="text" name="shipping_address" class="form-control">{{$salesOrder->shipping_address}}</textarea>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="w-40 font-bold">Lampiran</label>
                                    <p class="text-success"><a href="{{route('sales.detail.preview', ['id' => $salesOrder->id])}}" target="_blank">Klik untuk melihat lampiran (PO)</a></p>
                                </div>
                                <div class="form-inline mt-2">
                                    <label for="vertical-form-1" class="sm:w-40 font-bold"></label>
                                    <input type="file" class="form-control" id="attachment" name="attachment">
                                    <label class="form-check-label text-success" for="checkbox-switch-1">Pilih Untuk update lampiran</label>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="w-40 font-bold">Catatan</label>
                                    <textarea type="text" class="form-control" id="remarks" name="remarks">{{$salesOrder->remarks}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                        <button id="update" class="flex items-center ml-auto text-white btn btn-primary shadow-md"><i data-lucide="refresh-ccw" class="w-4 h-4 mr-2"></i>Perbaharui</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Detail Pesanan</div>
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
                                <th class="whitespace-nowrap">SPESIFIKASI</th>
                                <th class="whitespace-nowrap">UKURAN</th>
                                <th class="whitespace-nowrap text-center">QUANTITY</th>
                                <th class="whitespace-nowrap text-right">HARGA</th>
                                <th class="whitespace-nowrap text-right">TOTAL HARGA</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detailSalesOrders as $detail)
                            <tr data-id="{{$detail->id}}">
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3 text-danger" href="{{route('sales.detail.delete', ['id' => $detail->id])}}" onclick="return confirm('Apakah anda yakin ?')"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                        <a class="flex items-center text-success edit-detail" href="javascript:;" data-tw-toggle="modal" data-tw-target="#edit-form"> <i data-lucide="edit" class="w-4 h-4 mr-1"></i> Edit </a>
                                    </div>
                                </td>
                                <td>{{$detail->goods_name}}</td>
                                <td>{{$detail->spec_str}}</td>
                                <td>{{$detail->meas_str}}</td>
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
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap text-center"></td>
                                <td class="whitespace-nowrap text-right font-bold">Sub Total</td>
                                <td class="whitespace-nowrap text-right sub-total">0,00</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap text-center"></td>
                                <td class="whitespace-nowrap text-right font-bold">Tax (11%)</td>
                                <td class="whitespace-nowrap text-right tax">0,00</td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap"></td>
                                <td class="whitespace-nowrap"></td>
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
                                        <form method="POST" action="{{route('sales.detail.save')}}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="preview">
                                                <div class="form-inline">
                                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">Nama Barang</label>
                                                    <select data-placeholder="Pilih Barang" class="tom-select w-full form-control" name="goods_id" required>
                                                        <option value="">-</option>
                                                        @foreach($goods as $data)
                                                        <option value="{{$data->id}}">({{$data->code}}) {{$data->name}} | {{$data->spec_str}} | {{$data->meas_str}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-inline mt-2">
                                                    <label for="vertical-form-1" class="sm:w-32 font-bold"></label>
                                                    <label class="form-check-label text-success" for="checkbox-switch-1">
                                                        <a class="flex items-center text-success edit-detail" href="{{route('master.goods.create')}}" target="_blank"> <i data-lucide="plus" class="w-4 h-4 mr-1"></i>Klik untuk menambahkan master data barang</a>
                                                    </label>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Quantity</label>
                                                    <input id="vertical-form-1" type="number" class="form-control" name="quantity" required>
                                                    <input id="vertical-form-1" type="hidden" class="form-control" name="sales_order_id" value="{{$salesOrder->id}}">
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Harga</label>
                                                    <input id="vertical-form-1" type="number" class="form-control" name="price" value="0" required>
                                                </div>
                                                <div class="form-inline mt-5 lem">
                                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Cetakan</label>
                                                    <div class="flex flex-col sm:flex-row">
                                                        <div class="form-check mr-2">
                                                            <input id="radio-switch-4" class="form-check-input" type="radio" name="flag_print" value="0" checked>
                                                            <label class="form-check-label" for="radio-switch-4">Polos</label>
                                                        </div>
                                                        <div class="form-check mr-2 sm:mt-0">
                                                            <input id="radio-switch-5" class="form-check-input" type="radio" name="flag_print" value="1">
                                                            <label class="form-check-label" for="radio-switch-5">Print</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Catatan</label>
                                                    <textarea id="vertical-form-1" type="text" class="form-control"name="remarks"></textarea>
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

                <div id="edit-form" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-body">
                                <!-- BEGIN: Horizontal Form -->
                                <div class="intro-y box">
                                    <div
                                        class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                        <h2 class="font-medium text-base mr-auto">
                                            Edit Barang
                                        </h2>
                                    </div>
                                    <div id="horizontal-form" class="p-5">
                                        <form method="POST" action="{{route('sales.detail.update')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="preview">
                                                <div class="form-inline">
                                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">Nama Barang</label>
                                                    <select data-placeholder="Pilih Barang" class="tom-select w-full form-control goods-id" name="goods_id" required>
                                                        <option value="">-</option>
                                                        @foreach($goods as $data)
                                                        <option value="{{$data->id}}">{{$data->code}} | {{$data->name}} | {{$data->spec_str}} | {{$data->meas_str}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-inline mt-2">
                                                    <label for="vertical-form-1" class="sm:w-32 font-bold"></label>
                                                    <label class="form-check-label text-success" for="checkbox-switch-1">
                                                        <a class="flex items-center text-success edit-detail" href="{{route('master.goods.create')}}" target="_blank"> <i data-lucide="plus" class="w-4 h-4 mr-1"></i>Klik untuk menambahkan master data barang</a>
                                                    </label>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Quantity</label>
                                                    <input type="number" class="form-control quantity" name="quantity" required>
                                                    <input type="hidden" class="form-control id" name="id">
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Harga</label>
                                                    <input type="number" class="form-control price" name="price" value="0" required>
                                                </div>
                                                <div class="form-inline mt-5 lem">
                                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Cetakan</label>
                                                    <div class="flex flex-col sm:flex-row">
                                                        <div class="form-check mr-2">
                                                            <input class="form-check-input flag-print-no" type="radio" name="flag_print" value="0">
                                                            <label class="form-check-label" for="radio-switch-4">Polos</label>
                                                        </div>
                                                        <div class="form-check mr-2 sm:mt-0">
                                                            <input class="form-check-input flag-print-yes" type="radio" name="flag_print" value="1">
                                                            <label class="form-check-label" for="radio-switch-5">Print</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Catatan</label>
                                                    <textarea type="text" class="form-control remarks" name="remarks"></textarea>
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
            </div>
        </div>
    </div>
    <!-- END: Transaction Details -->
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
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

        var taxType = {{$salesOrder->tax_type}};

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

    $(".edit-detail").click(function() {
        var row = $(this).closest('tr');
        var row_id = row.attr('data-id');
        getDataRowById(row_id);
    });

    function getDataRowById(id) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '{{route("sales.detail.edit")}}', // Specify the URL of your server endpoint
            type: 'POST', // or 'POST' depending on your server setup
            dataType: 'json', // Assuming the response will be
            data: { id: id },
            success: function(response) {

                // Assuming response.data is an array of SPK objects
                var data = response.data;

                console.log(data)

                $("#edit-form .id").val(data.id);
                var goods_id = $("#edit-form .goods-id")[0].tomselect;
                goods_id.setValue(data.goods_id);
                $("#edit-form .quantity").val(data.quantity);
                $("#edit-form .price").val(data.price);

                if (data.flag_print === 0) {
                        $('#edit-form .flag-print-no').prop('checked', true);
                } else if (data.flag_print === 1) {
                        $('#edit-form .flag-print-yes').prop('checked', true);
                }

                $("#edit-form .remarks").val(data.remarks);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    }

    $("#customer_id").change(function() {

        var id = $(this).val();

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        $.ajax({
            url: '{{route("get-data-customer")}}', // Specify the URL of your server endpoint
            type: 'POST', // or 'POST' depending on your server setup
            dataType: 'json', // Assuming the response will be
            data: { id: id},
            success: function(response) {

                    // Assuming response.data is an array of SPK objects
                var data = response.data;

                console.log(data)

                // $("#form-modal-edit .id").val(data.id);
                var tax_type = $("#tax_type")[0].tomselect;
                    tax_type.setValue(data.tax_type);

                // var assign_to = $("#assign_to")[0].tomselect;
                //     assign_to.setValue(data.PIC);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    });
});
</script>
@endsection
