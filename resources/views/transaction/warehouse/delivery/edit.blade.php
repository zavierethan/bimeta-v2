@extends('layouts._base')
@section('css')
<style>
    .modal .modal-dialog.modal-xl {
        width: 1134px;
    }
</style>
@endsection
@section('main-content')
<div class="content content--top-nav">
    <!-- BEGIN: Transaction Details -->
    <div class="intro-y grid grid-cols-12 gap-5 mt-5">
        <div class="col-span-12 lg:col-span-4 2xl:col-span-4">
            <div class="box p-5 rounded-md">
                <form action="{{route('warehouse.delivery.update')}}" method="POST">
                    @csrf
                    <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                        <div class="font-medium text-base truncate">
                            Informasi Pengiriman
                        </div>
                        <div class="flex items-center ml-auto">
                            <a href="{{route('warehouse.delivery.print', ['id' => $deliveryOrder->id])}}" target="_blank" class="btn btn-primary shadow-md mr-2"><i data-lucide="printer" class="w-4 h-4 mr-2"></i>Print Surat Jalan</a>
                        </div>
                    </div>
                    <div class="form-inline mt-5">
                        <label for="vertical-form-1" class="w-40 font-bold">No Pengiriman</label>
                        <input id="vertical-form-1" type="text" class="form-control" value="{{$deliveryOrder->travel_permit_no}}" readonly>
                        <input id="vertical-form-1" type="hidden" class="form-control" name="id" value="{{$deliveryOrder->id}}" readonly>
                    </div>
                    <div class="form-inline mt-5">
                        <label for="vertical-form-1" class="w-40 font-bold">No. Sales Order</label>
                        <input id="vertical-form-1" type="text" class="form-control" value="{{$deliveryOrder->transaction_no}}" readonly>
                    </div>
                    <div class="form-inline mt-2">
                        <label for="vertical-form-1" class="sm:w-40 font-bold"></label>
                        <label class="form-check-label" for="checkbox-switch-1"><a class="flex items-center mr-3 text-danger" href="{{route('sales.monitroing.index', ['id' => $deliveryOrder->sales_order_id])}}" target="_blank"><strong>Klik untuk melihat history pengiriman</strong></a></label>
                    </div>
                    <div class="form-inline mt-5">
                        <label for="vertical-form-1" class="w-40 font-bold">No P.O</label>
                        <input id="vertical-form-1" type="text" class="form-control" value="{{$deliveryOrder->ref_po_customer}}" readonly>
                    </div>
                    <div class="form-inline mt-5">
                        <label for="vertical-form-1" class="w-40 font-bold">Customer</label>
                        <input id="vertical-form-1" type="text" class="form-control" value="{{$deliveryOrder->customer_name}}"readonly>
                    </div>
                    <div class="form-inline mt-5">
                        <label for="vertical-form-1" class="w-40 font-bold">Tanggal kirim</label>
                        <input id="vertical-form-1" type="date" class="form-control" name="delivery_date" value="{{$deliveryOrder->actual_delivery_date}}">
                    </div>
                    <div class="form-inline mt-5">
                        <label for="vertical-form-1" class="w-40 font-bold">Alamat Pengiriman</label>
                        <textarea id="vertical-form-1" type="text" class="form-control" readonly>{{$deliveryOrder->shipping_address}}</textarea>
                    </div>
                    <div class="form-inline mt-5">
                        <label for="vertical-form-1" class="w-40 font-bold">Lampiran</label>
                        <input class="form-check-input mr-2" type="radio" id="flag_use_attachments" name="flag_use_attachments" value="1" <?php echo ($deliveryOrder->flag_use_attachments == 1) ? 'checked' : ''; ?>> <span class="mr-3">Ya</span>
                        <input class="form-check-input mr-2" type="radio" id="flag_use_attachments" name="flag_use_attachments" value="0" <?php echo ($deliveryOrder->flag_use_attachments == 0) ? 'checked' : ''; ?>> <span>Tidak</span>
                    </div>
                    <div class="form-inline mt-5">
                        <label for="horizontal-form-2" class="sm:w-40 font-bold">Status</label>
                        <select data-placeholder="Pilih Status" class="tom-select w-full form-control" name="status">
                            <option value=" ">-</option>
                            <option value="1" <?php echo ($deliveryOrder->status == '1') ? 'selected' : ''; ?>>DRAFT</option>
                            <option value="2" <?php echo ($deliveryOrder->status == '2') ? 'selected' : ''; ?>>DALAM PENGIRIMAN</option>
                            <option value="3" <?php echo ($deliveryOrder->status == '3') ? 'selected' : ''; ?>>SUDAH DI TERIMA CUSTOMER</option>
                            <option value="4" <?php echo ($deliveryOrder->status == '4') ? 'selected' : ''; ?>>REJECT</option>
                        </select>
                    </div>
                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                            <a href="{{route('warehouse.delivery.index')}}" class="btn btn-danger w-full md:w-52">Kembali</a>
                            <button type="submit" class="btn btn-primary w-full md:w-52">Update</button>
                    </div>
                </form>
            </div>
            <!-- <div class="box p-5 rounded-md mt-5">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                    <div class="font-medium text-base truncate">Daftar SPK</div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>NO. SPK</th>
                                <th class="text-center">Qty</th>
                                <th class="text-center">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listSPK as $list)
                            <tr>
                                <td>{{$list->spk_no}}</td>
                                <td class="text-center">{{$list->quantity}}</td>
                                <td class="text-center">
                                    @if($list->status == 1)
                                    <div class="py-1 px-2 rounded-full text-xs bg-primary text-white cursor-pointer font-medium">INIT</div>
                                    @elseif($list->status == 2)
                                    <div class="py-1 px-2 rounded-full text-xs bg-warning text-white cursor-pointer font-medium">SCHEDULED</div>
                                    @elseif($list->status == 3)
                                    <div class="py-1 px-2 rounded-full text-xs bg-warning text-white cursor-pointer font-medium">WORK IN PROGRESS</div>
                                    @else
                                    <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">COMPLETED</div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> -->
        </div>
        <div class="col-span-12 lg:col-span-8 2xl:col-span-8">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">
                        Detail Pengiriman
                    </div>
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview" class="flex items-center ml-auto text-white btn btn-primary shadow-md">
                        <i data-lucide="plus" class="w-4 h-4"></i>
                    </a>
                </div>
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible show flex items-center mb-10" role="alert">
                    <i data-lucide="alert-triangle" class="w-6 h-6 mr-2"></i> {{ session('error') }} <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x" class="w-4 h-4"></i> </button>
                </div>
                @endif
                <div class="overflow-auto lg:overflow-visible -mt-3">
                    <table class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="whitespace-nowrap text-center">ACTION</th>
                                <th class="whitespace-nowrap">NAMA BARANG</th>
                                <th class="whitespace-nowrap">SPESIFIKASI</th>
                                <th class="whitespace-nowrap">UKURAN</th>
                                <th class="whitespace-nowrap text-center">QUANTITY</th>
                                <th class="whitespace-nowrap">CATATAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detailDeliveryOrder as $do)
                            <tr data-id="{{$do->id}}">
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3 text-danger" href="{{route('warehouse.delivery.detail.delete', ['id' => $do->id ])}}" onclick="return confirm('Apakah anda yakin ?')"> <i data-lucide="trash-2"
                                                class="w-4 h-4 mr-1"></i> Hapus </a>
                                        <a class="flex items-center mr-3 text-success edit-detail" href="javascript:;" data-tw-toggle="modal" data-tw-target="#edit-form"> <i data-lucide="edit"
                                                class="w-4 h-4 mr-1"></i> Edit </a>
                                    </div>
                                </td>
                                <td>{{$do->goods_name}}</td>
                                <td>{{$do->specification}}</td>
                                <td>{{$do->measure}}</td>
                                <td class="text-center">{{$do->quantity}}</td>
                                <td>{{$do->remarks}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @if($deliveryOrder->flag_use_attachments == 1)

            <div class="box p-5 rounded-md mt-5" id="attachments">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">
                        Lampiran
                    </div>
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#lampiran-modal"  class="flex items-center ml-auto text-white btn btn-primary shadow-md">
                        <i data-lucide="plus" class="w-4 h-4"></i>
                    </a>
                </div>

                <div class="overflow-auto lg:overflow-visible -mt-3">
                    <table class="table table-striped">
                        <tbody>
                            @foreach($deliveryAttachments as $da)
                            <tr>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3 text-danger" href="{{route('warehouse.delivery.detail.lampiran.delete', ['id' => $da->id ])}}" onclick="return confirm('Apakah anda yakin ?')"> <i data-lucide="trash-2"
                                                class="w-4 h-4 mr-1"></i> Hapus </a>
                                    </div>
                                </td>
                                <td class="text-center">{{$da->col_1}}</td>
                                <td class="text-center">{{$da->col_2}}</td>
                                <td class="text-center">{{$da->col_3}}</td>
                                <td class="text-center">{{$da->col_4}}</td>
                                <td class="text-center">{{$da->col_5}}</td>
                                <td class="text-center">{{$da->col_6}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif

        <div id="superlarge-modal-size-preview" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="grid grid-cols-12 gap-6">
                            <div class="intro-y col-span-12 lg:col-span-12">
                                <!-- BEGIN: Horizontal Form -->
                                <div class="intro-y box">
                                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                        <h2 class="font-medium text-base mr-auto">
                                            Tambah Barang
                                        </h2>
                                    </div>
                                    <div id="horizontal-form" class="p-5">
                                        <form method="POST" action="{{route('warehouse.delivery.detail.save')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="preview">
                                                <div class="form-inline mt-5">
                                                    <label for="horizontal-form-2" class="sm:w-20 font-bold">Barang</label>
                                                    <select data-placeholder="Pilih Barang" class="tom-select w-full form-control" name="detail_sales_order_id" required>
                                                        <option value=" ">-</option>
                                                        @foreach($goodsList as $goods)
                                                        <option value="{{$goods->id}}" <?php echo ($goods->quantity == 0) ? "disabled" : "" ?>>{{$goods->code}} | {{$goods->goods_name}} | {{$goods->specification}} | {{$goods->measure}} | QTY : {{$goods->quantity}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-20 font-bold">Quantity </label>
                                                    <input id="vertical-form-1" type="number" class="form-control" name="quantity" required>
                                                    <input type="hidden" class="form-control" name="delivery_order_id" value="{{$deliveryOrder->id}}">
                                                    <input type="hidden" class="form-control" name="sales_order_id" value="{{$deliveryOrder->sales_order_id}}">
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-20 font-bold">Catatan</label>
                                                    <textarea type="text" class="form-control" name="remarks" id="remarks" readonly></textarea>
                                                </div>
                                                <div class="form-inline mt-2">
                                                    <label for="vertical-form-1" class="sm:w-20 font-bold"></label>
                                                    <input class="form-check-input" type="checkbox" id="flag_use_remarks" name="flag_use_remarks" value="1">
                                                    <label class="form-check-label" for="checkbox-switch-1">Tambahkan Catatan</label>
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

        <div id="edit-form" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="grid grid-cols-12 gap-6">
                            <div class="intro-y col-span-12 lg:col-span-12">
                                <!-- BEGIN: Horizontal Form -->
                                <div class="intro-y box">
                                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                        <h2 class="font-medium text-base mr-auto">
                                            Edit Barang
                                        </h2>
                                    </div>
                                    <div id="horizontal-form" class="p-5">
                                        <form method="POST" action="{{route('warehouse.delivery.detail.update')}}">
                                            @csrf
                                            <div class="preview">
                                                <div class="form-inline mt-5">
                                                    <label for="horizontal-form-2" class="sm:w-20 font-bold">Barang</label>
                                                    <select data-placeholder="Pilih Barang" class="tom-select w-full form-control detail_sales_order_id" name="detail_sales_order_id" required>
                                                        <option value=" ">-</option>
                                                        @foreach($goodsList as $goods)
                                                        <option value="{{$goods->id}}" <?php echo ($goods->quantity == 0) ? "disabled" : "" ?>>{{$goods->code}} | {{$goods->goods_name}} | {{$goods->specification}} | {{$goods->measure}} | QTY : {{$goods->quantity}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-20 font-bold">Quantity </label>
                                                    <input type="number" class="form-control quantity" name="quantity" required>
                                                    <input type="hidden" class="form-control id" name="id">
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-20 font-bold">Catatan</label>
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

        <div id="lampiran-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="grid grid-cols-12 gap-6">
                            <div class="intro-y col-span-12 lg:col-span-12">
                                <!-- BEGIN: Horizontal Form -->
                                <div class="intro-y box">
                                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                        <h2 class="font-medium text-base mr-auto">
                                            Form Lampiran Pengiriman
                                        </h2>
                                        <a href="javascript:;" id="addRowBtn" class="flex items-center ml-auto text-white btn btn-primary shadow-md">
                                            <i data-lucide="plus" class="w-4 h-4"></i>
                                        </a>
                                    </div>
                                    <div id="horizontal-form" class="p-5">
                                        <table class="table table-striped" id="data-table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="flex justify-center items-center">
                                                            <a class="flex items-center mr-3 text-danger delete-row" href="#"> <i class="w-4 h-4 mr-1 fa fa-trash"></i> Hapus </a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input class="form-control col_1" type="text" name="date">
                                                        <input type="hidden" class="delivery_order_id form-control" value={{$deliveryOrder->id}}>
                                                    </td>
                                                    <td>
                                                        <input class="form-control col_2" type="text">
                                                    </td>
                                                    <td>
                                                        <input class="form-control col_3" type="text">
                                                    </td>
                                                    <td>
                                                        <input class="form-control col_4" type="text">
                                                    </td>
                                                    <td>
                                                        <input class="form-control col_5" type="text">
                                                    </td>
                                                    <td>
                                                        <input class="form-control col_6" type="text">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                            <button type="button" data-tw-dismiss="modal" class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                            <button type="button" id="save" class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
                                        </div>
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
    // $("#attachments").hide();
    $("#flag_use_remarks").change(function () {
        if($(this).is(":checked")) {
            $("#remarks").prop("readonly", false);
        } else {
            $("#remarks").prop("readonly", true);
        }
    });

    $(document).on('click', '.delete-row', function(e) {
        e.preventDefault();
        $(this).closest('tr').remove();
    });

    $(".edit-detail").click(function() {
        var row = $(this).closest('tr');
        var row_id = row.attr('data-id');
        getDataRowById(row_id);
    });

    $('#addRowBtn').click(function() {
        var newRow = `
            <tr>
                <td>
                    <div class="flex justify-center items-center">
                        <a class="flex items-center mr-3 text-danger delete-row" href="#"> <i class="w-4 h-4 mr-1 fa fa-trash"></i> Hapus </a>
                    </div>
                </td>
                <td>
                    <input class="form-control col_1" type="text" name="date">
                    <input type="hidden" class="delivery_order_id form-control" value={{$deliveryOrder->id}}>
                </td>
                <td>
                    <input class="form-control col_2" type="text">
                </td>
                <td>
                    <input class="form-control col_3" type="text">
                </td>
                <td>
                    <input class="form-control col_4" type="text">
                </td>
                <td>
                    <input class="form-control col_5" type="text">
                </td>
                <td>
                    <input class="form-control col_6" type="text">
                </td>
            </tr>`;

        $('#data-table tbody').append(newRow);
    });

    $('#save').click(function (event) {
        event.preventDefault(); // Prevent default form submission

        // Array to store checked rows' data
        var rows = $("#data-table tbody tr");
        var formData = [];
        rows.each(function() {
            var row = $(this);
            var col_1 = row.find(".col_1").val();
            var col_2 = row.find(".col_2").val();
            var col_3 = row.find(".col_3").val();
            var col_4 = row.find(".col_4").val();
            var col_5 = row.find(".col_5").val();
            var col_6 = row.find(".col_6").val();
            var progress_id = row.find(".delivery_order_id").val();

            formData.push({
                delivery_order_id: progress_id,
                col_1: col_1,
                col_2: col_2,
                col_3: col_3,
                col_4: col_4,
                col_5: col_5,
                col_6: col_6,
            });
        });

        console.log(formData)

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{route('warehouse.delivery.detail.lampiran.save')}}",
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(formData),
            success: function (response, status, xhr) {
                // Handle success response from server
                if (xhr.status === 200) {
                    console.log('Data sent successfully:', response);
                    //window.location.href = "{{route('production.spk.index')}}";
                    location.reload();
                } else {
                        console.error('Error:', xhr.status);
                        alert(xhr.status);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
                alert(error);
            }
        });
    });

    function getDataRowById(id) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '{{route("warehouse.delivery.detail.edit")}}', // Specify the URL of your server endpoint
            type: 'POST', // or 'POST' depending on your server setup
            dataType: 'json', // Assuming the response will be
            data: { id: id },
            success: function(response) {

                // Assuming response.data is an array of SPK objects
                var data = response.data;

                console.log(data)

                $("#edit-form .id").val(data.id);
                var detail_sales_order_id = $("#edit-form .detail_sales_order_id")[0].tomselect;
                detail_sales_order_id.setValue(data.detail_sales_order_id);
                $("#edit-form .quantity").val(data.quantity);

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

</script>
@endsection
