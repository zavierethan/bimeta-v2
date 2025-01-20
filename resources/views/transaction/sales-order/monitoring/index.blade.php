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
                </div>
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
                                <input id="vertical-form-1" type="text" class="form-control" name="id" value="{{$salesOrder->ref_po_customer}}" readonly>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="w-40 font-bold">Nama Customer</label>
                                <input id="vertical-form-1" type="text" class="form-control" name="id" value="{{$salesOrder->cust_name}}" readonly>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="w-40 font-bold">Jenis Pajak</label>
                                <input id="vertical-form-1" type="text" class="form-control" name="id" value="{{$salesOrder->str_tax_type}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 lg:col-span-6 2xl:col-span-6">
                        <div class="p-5 rounded-md">
                            <div class="form-inline">
                                <label for="vertical-form-1" class="w-40 font-bold">Tanggal P.O</label>
                                <input id="vertical-form-1" type="date" class="form-control" name="id" value="{{$salesOrder->order_date}}" readonly>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="w-40 font-bold">Tanggal kirim (Plan)</label>
                                <input id="vertical-form-1" type="date" class="form-control" name="id" value="{{$salesOrder->delivery_date}}" readonly>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="w-40 font-bold">Status</label>
                                <input id="vertical-form-1" type="text" class="form-control" name="id" value="{{$salesOrder->str_status}}" readonly>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="w-40 font-bold">Alamat Pengiriman</label>
                                <textarea id="vertical-form-1" type="text" name="id" class="form-control" readonly>{{$salesOrder->shipping_address}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Detail Pesanan</div>
                </div>
                <div class="overflow-auto lg:overflow-visible -mt-3">
                    <table class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="whitespace-nowrap text-center">ACTION</th>
                                <th class="whitespace-nowrap">NAMA BARANG</th>
                                <th class="whitespace-nowrap">SPESIFIKASI</th>
                                <th class="whitespace-nowrap">UKURAN</th>
                                <th class="whitespace-nowrap text-center">QUANTITY PESANAN</th>
                                <th class="whitespace-nowrap text-center">TERKIRIM</th>
                                <!-- <th class="whitespace-nowrap text-center">SISA</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detailSalesOrders as $detail)
                            <tr data-id="{{$detail->id}}">
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center text-primary mr-3 edit-detail" href="javascript:;" data-tw-toggle="modal" data-tw-target="#monitoring-form"> <i data-lucide="eye" class="w-4 h-4 mr-1"></i> Lihat Log Pengiriman</a>
                                    </div>
                                </td>
                                <td>{{$detail->goods_name}}</td>
                                <td>{{$detail->specification}}</td>
                                <td>{{$detail->measure}}</td>
                                <td class="text-center font-bold">{{$detail->quantity}}</td>
                                <td class="text-center font-bold text-danger">{{$detail->delivered_quantity}}</td>
                                <!-- <td class="text-center font-bold text-danger">{{$detail->remaining_amount}}</td> -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div id="monitoring-form" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-body">
                                <!-- BEGIN: Horizontal Form -->
                                <div class="intro-y box">
                                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                        <h2 class="font-medium text-base mr-auto">
                                            Log Pengiriman
                                        </h2>
                                    </div>
                                    <div id="horizontal-form" class="p-5">
                                        <table class="table" id="log-tbl">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th>NAMA BARANG</th>
                                                    <th>NO SURAT JALAN</th>
                                                    <th class="text-center">TANGGAL PENGIRIMAN</th>
                                                    <th class="text-center">QUANTITY</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
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
                url: '{{route("sales.monitroing.detail")}}', // Specify the URL of your server endpoint
                type: 'POST', // or 'POST' depending on your server setup
                dataType: 'json', // Assuming the response will be
                data: { id: id },
                success: function(response) {

                    $("#log-tbl tbody").empty();

                    // Assuming response.data is an array of SPK objects
                    var data = response.data;
                    console.log(data)

                    data.forEach(item => {

                        var newRow = `
                            <tr>
                                <td>
                                    <div><strong>${item.goods_name}</strong></div>
                                    <div><strong>${item.spec_str}</strong></div>
                                    <div><strong>UK: ${item.meas_str}</strong></div>
                                </td>
                                <td>${item.travel_permit_no}</td>
                                <td class="text-center">${formatDate(item.delivery_date)}</td>
                                <td class="text-center">${item.quantity}</td>
                            </tr>
                        `;

                        $("#log-tbl tbody").append(newRow);
                    });


                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        }

        function formatDate(dateString) {
            // Split the input date string by hyphen
            const parts = dateString.split('-');
            // Rearrange to DD/MM/YYYY
            const formattedDate = `${parts[2]}/${parts[1]}/${parts[0]}`;
            return formattedDate;
        }
    });
</script>
@endsection
