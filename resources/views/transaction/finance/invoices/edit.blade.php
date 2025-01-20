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
                    <div class="font-medium text-base truncate">Informasi Faktur</div>
                    <div class="flex items-center ml-auto">
                    <a href="{{route('finance.invoice.print', ['id' => $invoice->id])}}" target="_blank" class="btn btn-primary shadow-md mr-2"><i data-lucide="printer" class="w-4 h-4 mr-2"></i>Print Faktur</a>
                    </div>
                </div>

                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="w-32 font-bold">No. Faktur</label>
                    <input type="text" class="form-control" value="{{$invoice->invoice_no}}" readonly>
                    <input type="hidden" class="form-control" name="id" id="invoice_id" value="{{$invoice->id}}" readonly>
                </div>
                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="w-32 font-bold">Customer</label>
                    <select data-placeholder="Pilih Customer" class="tom-select w-full form-control" name="customer_id">
                        @foreach($customers as $customer)
                        <option value="{{$customer->id}}" <?php echo ($customer->id == $invoice->customer_id) ? 'selected' : '';?>>{{$customer->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="w-32 font-bold">Jenis Pajak</label>
                    <input type="text" class="form-control" name="tax_type" id="tax_type" value="V{{$invoice->tax_type}}" readonly>
                </div>
                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="w-32 font-bold">Ref. PO</label>
                    <input type="text" class="form-control" name="id" value="{{$poNosString}}" readonly>
                </div>
                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="w-32 font-bold">Ref. Surat Jalan</label>
                    <input type="text" class="form-control" name="id" value="{{$travelPermitNosString}}" readonly>
                </div>
                <div class="form-inline mt-5">
                    <label for="vertical-form-1" class="w-32 font-bold">Tanggal faktur</label>
                    <input type="date" class="form-control" name="date" value="{{$invoice->date}}">
                </div>
                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                    <button type="button" id="calculate-hpp" class="btn py-3 btn-primary w-full md:w-52">Update</button>
                </div>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-8 2xl:col-span-8">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Detail Faktur</div>
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview" class="flex items-center ml-auto text-white btn btn-primary shadow-md"> <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
                        Tambah Barang
                    </a>
                </div>
                @if(session('message'))
                <div class="alert alert-warning alert-dismissible show flex items-center mb-10" role="alert">
                    <i data-lucide="alert-triangle" class="w-6 h-6 mr-2"></i> {{ session('message') }} <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x" class="w-4 h-4"></i> </button>
                </div>
                @endif
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
                            <tr data-id="{{$detail->detail_sales_order_id}}">
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3 text-danger" href="{{route('finance.invoice.detail.delete', ['id' => $detail->id])}}" onclick="return confirm('Apakah anda yakin ?')"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Hapus </a>
                                        <a class="flex items-center mr-3 text-success edit-price" href="javascript:;" data-tw-toggle="modal" data-tw-target="#form-edit-price"> <i data-lucide="edit" class="w-4 h-4 mr-1"></i> Edit Harga </a>
                                    </div>
                                </td>
                                <td>{{$detail->goods_name}} <?php echo ($detail->type != "WASTE") ? $detail->specification. " | UK :".$detail->measure : ""; ?></td>
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
                            <tr>
                                <td class="whitespace-nowrap font-bold">Total Terbilang</td>
                                <td class="whitespace-nowrap text-right" colspan="4">
                                    <input type="text" class="form-control" name="spelled_out" id="spelled_out" value="{{$invoice->spelled_out}}">
                                </td>
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
                                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                        <!-- <h2 class="font-medium text-base mr-auto">
                                            Tambah Barang
                                        </h2> -->
                                    </div>
                                    <div id="horizontal-form" class="p-5">
                                        <form method="POST" action="{{route('finance.invoice.detail.save')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="preview">
                                                <div class="form-inline">
                                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">No. Pengiriman</label>
                                                    <select data-placeholder="Pilih No Pengiriman" class="tom-select w-full form-control delivery_order_id" name="delivery_order_id[]" multiple required>
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

                <div id="form-edit-price" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-body">
                                <!-- BEGIN: Horizontal Form -->
                                <div class="intro-y box">
                                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                        <h2 class="font-medium text-base mr-auto">
                                            Form Edit Harga
                                        </h2>
                                    </div>
                                    <div id="horizontal-form" class="p-5">
                                        <form method="POST" action="{{route('sales.detail.update')}}">
                                            @csrf
                                            <div class="preview">
                                                <div class="form-inline">
                                                    <label for="vertical-form-1" class="w-32 font-bold">Harga</label>
                                                    <input type="text" class="form-control price" name="price">
                                                    <input type="hidden" class="form-control id" name="id">
                                                    <input type="hidden" class="form-control goods_id" name="goods_id">
                                                    <input type="hidden" class="form-control quantity" name="quantity">
                                                    <input type="hidden" class="form-control flag_print" name="flag_print">
                                                    <input type="hidden" class="form-control remarks" name="remarks">
                                                </div>
                                            </div>
                                            <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                                <button type="button" data-tw-dismiss="modal" class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                                <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Update Harga</button>
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

        if (taxType === 2 || taxType === 0) {
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

    $(".edit-price").click(function() {
        var row = $(this).closest('tr');
        var row_id = row.attr('data-id');
        getDataRowById(row_id);
    });

    $('#spelled_out').on('keypress', function(e) {
        if (e.which == 13) {  // 13 is the keycode for the Enter key
            // Your code here
            var id = $("#invoice_id").val();
            var spelled_out = $("#spelled_out").val();

            console.log(id);
            console.log(spelled_out)

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{route("finance.invoice.spelled-out")}}', // Specify the URL of your server endpoint
                type: 'POST', // or 'POST' depending on your server setup
                dataType: 'json', // Assuming the response will be
                data: { id: id, spelled_out: spelled_out},
                success: function(response) {

                    // Assuming response.data is an array of SPK objects
                    var data = response.data;

                    console.log(data)

                    Swal.fire({
                        title: 'Success',
                        text: 'Data Berhasil di Perbaharui.',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        }
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

                $("#form-edit-price .id").val(data.id);
                $("#form-edit-price .goods_id").val(data.goods_id);
                $("#form-edit-price .price").val(data.price);
                $("#form-edit-price .quantity").val(data.quantity);
                $("#form-edit-price .price").val(data.price);
                $("#form-edit-price .flag_print").val(data.flag_print);
                $("#form-edit-price .remarks").val(data.remarks);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    }
});
</script>
@endsection
