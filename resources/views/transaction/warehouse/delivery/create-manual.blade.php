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
                <form action="" method="POST" id="form-header">
                    <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                        <div class="font-medium text-base truncate">
                            Informasi Pengiriman
                        </div>
                        <div class="flex items-center ml-auto">

                        </div>
                    </div>
                    <div class="form-inline mt-5">
                        <label for="horizontal-form-2" class="sm:w-40 font-bold">Jenis SJ</label>
                        <select data-placeholder="Pilih Status" class="tom-select w-full form-control"
                            name="letter-type" id="letter-type">
                            <option value=" ">-</option>
                            <option value="B">B</option>
                            <option value="K">K</option>
                            <option value="S">S</option>
                        </select>
                    </div>
                    <div class="form-inline mt-5">
                        <label for="vertical-form-1" class="w-40 font-bold">No Pengiriman</label>
                        <input type="text" class="form-control" value="" id="delivery-number">
                    </div>
                    <div class="form-inline mt-5">
                        <label for="vertical-form-1" class="w-40 font-bold">No P.O</label>
                        <input type="text" class="form-control" value="" id="purchase-order-no">
                    </div>
                    <div class="form-inline mt-5">
                        <label for="vertical-form-1" class="w-40 font-bold">Tanggal Kirim</label>
                        <input type="date" class="form-control" name="delivery_date" value="" id="delivery-date">
                    </div>
                    <div class="form-inline mt-5">
                        <label for="vertical-form-1" class="w-40 font-bold">Nomor Kendaraan</label>
                        <input type="text" class="form-control" value="" id="licence">
                    </div>
                    <div class="form-inline mt-5">
                        <label for="vertical-form-1" class="w-40 font-bold">Customer</label>
                        <input type="text" class="form-control" value="" id="customer">
                    </div>
                    <div class="form-inline mt-5">
                        <label for="vertical-form-1" class="w-40 font-bold">Alamat Pengiriman</label>
                        <textarea type="text" class="form-control" id="address"></textarea>
                    </div>
                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                        <a href="#" class="btn btn-primary w-full md:w-52" id="btn-print-surat-jalan">Print Surat
                            Jalan</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-8 2xl:col-span-8">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">
                        Detail Pengiriman
                    </div>
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview"
                        class="flex items-center ml-auto text-white btn btn-primary shadow-md">
                        <i data-lucide="plus" class="w-4 h-4"></i>
                    </a>
                </div>
                <div class="overflow-auto lg:overflow-visible -mt-3">
                    <table class="table table-striped" id="tbl-items">
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

                        </tbody>
                    </table>
                </div>
            </div>

            <div id="superlarge-modal-size-preview" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="grid grid-cols-12 gap-6">
                                <div class="intro-y col-span-12 lg:col-span-12">
                                    <!-- BEGIN: Horizontal Form -->
                                    <div class="intro-y box">
                                        <div
                                            class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                            <h2 class="font-medium text-base mr-auto">
                                                Tambah Barang
                                            </h2>
                                        </div>
                                        <div id="horizontal-form" class="p-5">
                                            <form id="goods-form">
                                                @csrf
                                                <div class="preview">
                                                    <div class="form-inline mt-5">
                                                        <label for="horizontal-form-2" class="sm:w-32 font-bold">Nama
                                                            Barang</label>
                                                        <input id="goods-name" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-inline mt-5">
                                                        <label for="horizontal-form-2"
                                                            class="sm:w-32 font-bold">Ukuran</label>
                                                        <input id="measure" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-inline mt-5">
                                                        <label for="horizontal-form-2"
                                                            class="sm:w-32 font-bold">Spesifikasi</label>
                                                        <input id="specification" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-inline mt-5">
                                                        <label for="vertical-form-1" class="sm:w-32 font-bold">Quantity
                                                        </label>
                                                        <input id="quantity" type="number" class="form-control">
                                                    </div>
                                                    <div class="form-inline mt-5">
                                                        <label for="vertical-form-1"
                                                            class="sm:w-32 font-bold">Catatan</label>
                                                        <textarea type="text" class="form-control"
                                                            id="remarks"></textarea>
                                                    </div>
                                                    <div class="form-inline mt-2">
                                                        <label for="vertical-form-1" class="sm:w-32 font-bold"></label>
                                                        <input class="form-check-input" type="checkbox"
                                                            id="flag_use_remarks" name="flag_use_remarks" value="1">
                                                        <label class="form-check-label"
                                                            for="checkbox-switch-1">Tambahkan Catatan</label>
                                                    </div>
                                                </div>
                                                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                                    <button type="button" data-tw-dismiss="modal"
                                                        class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                                    <a href="#" id="add-items"
                                                        class="btn py-3 btn-primary w-full md:w-52">Tambahkan</a>
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
                                        <div
                                            class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                            <h2 class="font-medium text-base mr-auto">
                                                Form Lampiran Pengiriman
                                            </h2>
                                            <a href="javascript:;" id="addRowBtn"
                                                class="flex items-center ml-auto text-white btn btn-primary shadow-md">
                                                <i data-lucide="plus" class="w-4 h-4"></i>
                                            </a>
                                        </div>
                                        <div id="horizontal-form" class="p-5">
                                            <table class="table table-striped" id="data-table">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="flex justify-center items-center">
                                                                <a class="flex items-center mr-3 text-danger delete-row"
                                                                    href="#"> <i class="w-4 h-4 mr-1 fa fa-trash"></i>
                                                                    Hapus </a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <input class="form-control col_1" type="text" name="date">
                                                            <input type="hidden" class="delivery_order_id form-control"
                                                                value=>
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
                                                <button type="button" data-tw-dismiss="modal"
                                                    class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                                <button type="button" id="save"
                                                    class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
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
    $(document).on('click', '#btn-print-surat-jalan', function(e) {
        e.preventDefault();

        if (true) {
            Swal.fire({
                title: 'Cetak surat jalan ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batalkan',
                confirmButtonText: 'Ya, cetak'
            }).then((result) => {
                if (result.isConfirmed) {
                    const itemLists = [];

                    $('#tbl-items tbody tr').each(function() {
                        // Get the text content of specific cells in the current row
                        var goods_name = $(this).find(".goods-name")
                            .text(); // Get text in the first <td> (trim to remove extra spaces)
                        var measure = $(this).find(".measure").text();
                        var specification = $(this).find(".specification").text();
                        var quantity = $(this).find(".quantity").text();
                        var remarks = $(this).find(".remarks").text();

                        itemLists.push({
                            goods_name: goods_name,
                            measure: measure,
                            specification: specification,
                            quantity: quantity,
                            remarks: remarks,
                        });

                    });

                    var letter_type = $('#form-header #letter-type').val();
                    var delivery_number = $('#form-header #delivery-number').val();
                    var delivery_date = $('#form-header #delivery-date').val();
                    var purchase_order_no = $('#form-header #purchase-order-no').val();
                    var customer = $('#form-header #customer').val();
                    var address = $('#form-header #address').val();
                    var licence_plate = $('#form-header #licence').val();

                    // Build the JSON payload
                    const payload = {
                        header: {
                            letter_type: letter_type,
                            travel_permit_no: delivery_number,
                            delivery_date: delivery_date,
                            ref_po_customer: purchase_order_no,
                            customer_name: customer,
                            shipping_address: address,
                            licence_plate: licence_plate,
                            flag_use_attachments: 0
                        },
                        details: itemLists
                    };

                    console.log(payload)

                    $.ajax({
                        url: `{{route('warehouse.delivery.print.manual')}}`,
                        type: 'POST',
                        contentType: 'application/json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: JSON.stringify(payload),
                        success: function(response, status, xhr) {
                            const contentType = xhr.getResponseHeader('Content-Type');
                            if (contentType === 'application/pdf') {
                                const blob = new Blob([response], {
                                    type: 'application/pdf'
                                });
                                const url = URL.createObjectURL(blob);
                                window.open(url, '_blank'); // Open PDF in a new tab
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Unexpected response format.',
                                    'error'
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire(
                                'Error!',
                                error,
                                'error'
                            );
                        },
                        xhrFields: {
                            responseType: 'blob' // Ensure the response is handled as a binary Blob
                        }
                    });

                }
            });
        }
    });
    // $("#attachments").hide();

    $("#add-items").on("click", function() {
        var goods_name = $("#goods-form #goods-name").val();
        var measure = $("#goods-form #measure").val();
        var specification = $("#goods-form #specification").val();
        var quantity = $("#goods-form #quantity").val();
        var remarks = $("#goods-form #remarks").val();

        var row = `<tr>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3 text-danger" href="#" onclick="deleteRow(this)">Hapus </a>
                            </div>
                        </td>
                        <td class="goods-name">${goods_name}</td>
                        <td class="specification">${measure}</td>
                        <td class="measure">${specification}</td>
                        <td class="text-center quantity">${quantity}</td>
                        <td class="remarks">${remarks}</td>
                    </tr>`;


        $('#tbl-items tbody').append(row);

        $('button[data-tw-dismiss="modal"]').click();

        $("#goods-form #goods-name").val("");
        $("#goods-form #measure").val("");
        $("#goods-form #specification").val("");
        $("#goods-form #quantity").val("");
        $("#goods-form #remarks").val("");
    });

    $("#flag_use_remarks").change(function() {
        if ($(this).is(":checked")) {
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

    $('#save').click(function(event) {
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
            success: function(response, status, xhr) {
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
            error: function(xhr, status, error) {
                console.error('Error:', error);
                alert(error);
            }
        });
    });

    function deleteRow(button) {
        $(button).closest('tr').remove();
    }
    </script>
    @endsection
