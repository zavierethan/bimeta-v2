@extends('layouts._base')
@section('css')
<style>
    .modal .modal-dialog.modal-xl {
        width: 1134px;
    }

    .spk-select {
        min-height: 40px;
        padding: 7.5px 32px 7.5px 12px;
        background-image: url(data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='rgb(74 85 104)' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='lucide lucide-chevron-down'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E);
        background-size: 18px;
        background-position: center right 0.6rem;
        border-radius: 0.25rem;
        --tw-border-opacity: 1;
        border-color: rgb(var(--color-slate-200) / var(--tw-border-opacity));
        background-repeat: no-repeat;
        font-size: 0.875rem;
        line-height: 1.25rem;
        --tw-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
        --tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
    }
</style>
@endsection
@section('main-content')
<div class="content content--top-nav">
    <!-- BEGIN: Transaction Details -->
    <div class="intro-y grid grid-cols-12 gap-5 mt-5">
        <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Informasi Penerimaan</div>
                </div>
                <form action="" method="POST">
                    @csrf
                    <div class="intro-y grid grid-cols-12 gap-5 mt-5">
                        <div class="col-span-6 lg:col-span-6 2xl:col-span-6">
                            <div class="rounded-md p-5">
                                <div class="form-inline">
                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">No PO</label>
                                    <input id="horizontal-form-1" type="text" class="form-control" name="supplier" value="{{$goodsReceive->po_no}}" readonly>
                                    <input id="horizontal-form-1" type="hidden" class="form-control" name="id" value="{{$goodsReceive->id}}" readonly>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">Nama Supplier</label>
                                    <input id="horizontal-form-1" type="text" class="form-control" name="date"  value="{{$goodsReceive->name}}" readonly>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">No Surat Jalan</label>
                                    <input id="horizontal-form-1" type="text" class="form-control" name="jenis_pajak" value="{{$goodsReceive->gr_no}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-6 lg:col-span-6 2xl:col-span-6">
                            <div class="rounded-md p-5">
                                <div class="form-inline">
                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">Tanggal</label>
                                    <input id="horizontal-form-1" type="date" class="form-control" name="date" value="{{$goodsReceive->date}}" readonly>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">Penerima</label>
                                    <input id="horizontal-form-1" type="text" class="form-control" name=""  value="{{$goodsReceive->receiver}}" readonly>
                                </div>
                                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                    <!-- <button type="button" class="text-white btn btn-primary shadow-md md:w-43"><i data-lucide="refresh-ccw" class="w-4 h-4 mr-2"></i>Update</button> -->
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
                    <div class="font-medium text-base truncate">Detail Penerimaan</div>

                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#form-modal" class="flex items-center ml-auto text-white btn btn-primary shadow-md">
                        <i data-lucide="plus" class="w-4 h-4"></i>
                    </a>

                </div>
                <div class="overflow-auto lg:overflow-visible -mt-3">
                    <table class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="whitespace-nowrap text-center">ACTION</th>
                                <th class="whitespace-nowrap">NAMA BARANG</th>
                                <th class="whitespace-nowrap text-center">BERAT (KG)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detail as $item)
                            <tr data-id="{{$item->id}}">
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center text-danger mr-3" href="{{route('procurement.goods-receive.detail.delete', ['id' => $item->id])}}" onclick="return confirm('Apakah anda yakin ?')" title="Print SPK"><i data-lucide="trash"
                                        class="w-4 h-4 mr-1"></i> Delete</a>
                                        <a class="flex items-center text-success mr-3 edit-detail" href="javascript:;" data-tw-toggle="modal" data-tw-target="#edit-form"><i data-lucide="edit"
                                        class="w-4 h-4 mr-1"></i> Edit</a>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap">{{$item->name}} L: {{$item->width}}</td>
                                <td class="whitespace-nowrap text-center weight">{{$item->weight}}</td>
                            </tr>
                            @endforeach
                        </tbody>
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
                                            Form Tambah Material
                                        </h2>
                                    </div>
                                    <div id="horizontal-form" class="p-5">
                                        <form method="POST" action="{{route('procurement.goods-receive.detail.save')}}">
                                            @csrf
                                            <div class="preview">
                                                <div class="form-inline mt-5">
                                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">Nama Barang</label>
                                                    <select data-placeholder="Pilih Material" class="tom-select w-full form-control" name="detail_purchase_id" required>
                                                        <option value=" ">-</option>
                                                        @foreach($materials as $material)
                                                        <option value="{{$material->id}}" <?php echo ($material->remaining_quantity == 0) ? "disabled" : "" ?>>{{$material->name}} | L {{$material->width}} CM | SISA QTY: {{$material->remaining_quantity}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Nomor Roll</label>
                                                    <input id="vertical-form-1" type="text" class="form-control" name="no_roll" required>
                                                    <input id="vertical-form-1" type="hidden" class="form-control" name="goods_receive_id" value="{{$goodsReceive->id}}" required>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Berat (Kg)</label>
                                                    <input id="vertical-form-1" type="number" class="form-control" name="weight" required>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Keterangan</label>
                                                    <textarea id="vertical-form-1" type="text" class="form-control" name="remarks"></textarea>
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

                <div id="form-modal" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-body">
                                <!-- BEGIN: Horizontal Form -->
                                <div class="intro-y box">
                                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                        <h2 class="font-medium text-base mr-auto">
                                            Form Penerimaan Material
                                        </h2>
                                    </div>
                                    <div id="horizontal-form" class="p-5">
                                        <table class="table" id="data-table">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th>ACTION</th>
                                                    <th>NAMA MATERIAL</th>
                                                    <!-- <th>NO ROLL</th> -->
                                                    <th>BERAT (KG)</th>
                                                    <th class="text-center">PILIH</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($materials as $material)
                                                @for ($i = 0; $i < $material->remaining_quantity; $i++)
                                                    <tr>
                                                        <td class="table-report__action w-32">
                                                            <div class="flex justify-center items-center">
                                                                <a href="#" class="flex items-center text-white btn btn-danger shadow-md delete-row">
                                                                    <i data-lucide="trash" class="w-4 h-4 mr-1"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" value="{{ $material->name }} L: {{ $material->width }}">
                                                            <input type="hidden" class="form-control detail_purchase_id" value="{{ $material->id }}">
                                                            <input type="hidden" class="form-control goods_receive_id" value="{{$goodsReceive->id}}">
                                                        </td>
                                                        <!-- <td><input type="text" class="form-control roll_no"></td> Quantity of each individual item rendered as 1 -->
                                                        <td><input type="number" class="form-control weight"></td>
                                                        <td class="text-center">
                                                            <input class="form-check-input" type="checkbox">
                                                        </td>
                                                    </tr>
                                                @endfor
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                            <button type="button" data-tw-dismiss="modal" class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                            <button type="button" id="save-detail" class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
                                        </div>
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
                                            Form Edit Penerimaan
                                        </h2>
                                    </div>
                                    <div id="horizontal-form" class="p-5">
                                        <form method="POST" action="{{route('procurement.goods-receive.detail.update')}}">
                                            @csrf
                                            <div class="preview">
                                                <div class="form-inline mt-5">
                                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">Material</label>
                                                    <select data-placeholder="Pilih Material" class="tom-select w-full form-control detail_purchase_id" name="detail_purchase_id" required>
                                                        @foreach($materials as $material)
                                                        <option value="{{$material->id}}">{{$material->name}} L: {{$material->width}}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="hidden" class="form-control id" name="id" required>
                                                </div>
                                                <!-- <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-32 font-bold">No. Roll</label>
                                                    <input type="text" class="form-control no_roll" name="no_roll" required>
                                                </div> -->
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Berat (Kg)</label>
                                                    <input type="number" class="form-control weight" name="weight" required>
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
    $(function(){

        $(document).on('click', '.delete-row', function(e) {
            e.preventDefault();
            $(this).closest('tr').remove();
        });

        $('.roll_no').on('input', function() {
            $(this).val($(this).val().replace(/\s/g, '').toUpperCase());
        });

        $('.roll_no').on('keypress', function(event) {
            if (event.which === 32) {
                event.preventDefault();
            }
        });

        $('#addRowBtn').click(function() {
            var newRow = `
                <tr>
                    <td>
                        <a href="#" class="flex items-center ml-auto text-white btn btn-danger shadow-md delete-row">
                            <span class="w-5 h-5 flex items-center justify-center"> <i class="fa fa-minus"></i></span>
                        </a>
                    </td>
                    <td style="width:30%;">

                    </td>
                    <td>
                        <input type="text" class="form-control roll_no">
                    </td>
                    <td>
                        <input type="number" class="form-control weight">
                    </td>
                </tr>
            `;

            $('#data-table tbody').append(newRow);
        });
    });

    $('#save-detail').click(function (event) {
        event.preventDefault(); // Prevent default form submission

        const checkedRowsData = [];

        $('#data-table .form-check-input:checked').each(function () {
            const goods_receive_id = $(this).closest('tr').find('.goods_receive_id').val();
            const detail_purchase_id = $(this).closest('tr').find('.detail_purchase_id').val();
            const roll_no = $(this).closest('tr').find('.roll_no').val();
            const weight = $(this).closest('tr').find('.weight').val();

            // Push data to array
            checkedRowsData.push({
                goods_receive_id: goods_receive_id,
                detail_purchase_id: detail_purchase_id,
                roll_no: roll_no,
                weight: weight
            });
        });

        console.log(JSON.stringify(checkedRowsData));

        if(checkedRowsData.length === 0) {
            var dismissButton = $('#form-modal button[data-tw-dismiss="modal"]');

            dismissButton.click();

            Swal.fire({
                title: 'Perhatian !',
                text: 'Harap Checked terlebih dahulu data yang akan di terima !.',
                icon: 'warning',
                confirmButtonText: 'Ok'
            });

            return;
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{route('procurement.goods-receive.detail.save')}}",
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(checkedRowsData),
            success: function (response, status, xhr) {
                // Handle success response from server
                if (xhr.status === 200) {
                    console.log('Data sent successfully:', response);

                    window.location.reload();
                } else {
                    console.error('Error:', xhr.status);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });

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
                url: '{{route("procurement.goods-receive.detail.edit")}}', // Specify the URL of your server endpoint
                type: 'POST', // or 'POST' depending on your server setup
                dataType: 'json', // Assuming the response will be
                data: { id: id },
                success: function(response) {

                    // Assuming response.data is an array of SPK objects
                    var data = response.data;

                    console.log(data)

                    $("#edit-form .id").val(data.id);
                    var goods_id = $("#edit-form .detail_purchase_id")[0].tomselect;
                    goods_id.setValue(data.detail_purchase_id);
                    $("#edit-form .no_roll").val(data.no_roll);
                    $("#edit-form .weight").val(data.weight);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        }
</script>
@endsection
