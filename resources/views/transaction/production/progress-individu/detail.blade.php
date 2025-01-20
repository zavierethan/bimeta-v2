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
                    <div class="font-medium text-base truncate">Informasi Progress</div>
                </div>
                <form action="{{route('production.pogress-individu.update')}}" method="POST">
                    @csrf
                    <div class="intro-y grid grid-cols-12 gap-5 mt-5">
                        <div class="col-span-12 lg:col-span-6 2xl:col-span-6">
                            <div class="rounded-md p-5">
                                <div class="form-inline">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Nama Bagian</label>
                                    <select data-placeholder="Pilih Proses" class="tom-select w-full form-control" name="process_id">
                                        @foreach($productionProcesses as $process)
                                        <option value="{{$process->id}}" <?php echo ($data->process_id == $process->id) ? 'selected' : ''; ?>>{{$process->process_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Tanggal</label>
                                    <input type="date" class="form-control" name="date" value="{{$data->date}}" required>
                                    <input type="hidden" class="form-control" name="id" value="{{$data->id}}" required>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Operator</label>
                                    <input type="text" class="form-control" name="operator" value="{{$data->operator}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-6 2xl:col-span-6">
                            <div class="rounded-md p-5">
                                <div class="form-inline">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Kepala Regu</label>
                                    <input type="text" class="form-control" name="team_leader" value="{{$data->team_leader}}" required>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Kepala Shift</label>
                                    <input type="text" class="form-control" name="shift_head" value="{{$data->shift_head}}" required>
                                </div>
                                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                    <button type="submit" id="update" class="text-white btn btn-primary shadow-md md:w-43"><i data-lucide="refresh-ccw" class="w-4 h-4 mr-2"></i>Update</button>
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
                    <div class="font-medium text-base truncate">Detail Progress</div>
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#form-modal" class="flex items-center ml-auto text-white btn btn-primary shadow-md"> <i data-lucide="plus" class="w-4 h-4"></i>

                    </a>
                </div>
                <div class="overflow-auto lg:overflow-visible -mt-3">
                    <table class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="whitespace-nowrap text-center">ACTION</th>
                                <th class="whitespace-nowrap">NO SPK</th>
                                <th class="whitespace-nowrap">CUSTOMER</th>
                                <th class="whitespace-nowrap">NO PO</th>
                                <th class="whitespace-nowrap">UKURAN</th>
                                <th class="whitespace-nowrap text-center">QTY SPK</th>
                                <th class="whitespace-nowrap text-center">HASIL</th>
                                <th class="whitespace-nowrap">KETERANGAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detail as $item)
                                <tr data-id="{{$item->id}}">
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3 text-danger" href="{{route('production.pogress-individu.detail.delete', ['id' => $item->id])}}" onclick="return confirm('Apakah anda yakin ?')"><i data-lucide="trash" class="w-4 h-4 mr-1"></i>Delete</a>
                                            <a class="flex items-center mr-3 text-success edit-detail" href="javascript:;" data-tw-toggle="modal" data-tw-target="#form-edit"><i data-lucide="edit" class="w-4 h-4 mr-1"></i>Edit</a>
                                        </div>
                                    </td>
                                    <td>{{$item->spk_no}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->ref_po_customer}}</td>
                                    <td>{{$item->measure}}</td>
                                    <td class="text-center">{{$item->quantity}}</td>
                                    <td class="text-center">{{$item->result}}</td>
                                    <td>{{$item->remarks}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div id="form-modal" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-body">
                                <!-- BEGIN: Horizontal Form -->
                                <div class="intro-y box">
                                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                        <h2 class="font-medium text-base mr-auto">
                                            Tambah Proses Produksi
                                        </h2>
                                        <div class="ml-auto">
                                            <!-- <button class="flex items-center ml-auto text-white btn btn-primary shadow-md" id="addRowBtn">
                                                <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i></span>
                                            </button> -->
                                        </div>
                                    </div>
                                    <div id="horizontal-form" class="p-5">
                                        <table class="table" id="data-table">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th></th>
                                                    <th>NO SPK</th>
                                                    <th>HASIL</th>
                                                    <th>KETERANGAN</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="#" class="flex items-center ml-auto text-white btn btn-danger shadow-md delete-row">
                                                            <span class="w-5 h-5 flex items-center justify-center"> <i class="fa fa-minus"></i></span>
                                                        </a>
                                                    </td>
                                                    <td style="width:30%;">
                                                        <select data-placeholder="Pilih SPK" class="tom-select w-full form-control spk_id">
                                                                <option value=" ">-</option>
                                                                @foreach($spk as $spkk)
                                                                <option value="{{$spkk->id}}">{{$spkk->spk_no}}</option>
                                                                @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="result form-control">
                                                        <input type="hidden" class="progress_individu_id form-control" value="{{$data->id}}">
                                                        <input type="hidden" class="process_id form-control" value="{{$data->process_id}}">
                                                    </td>
                                                    <td>
                                                        <textarea type="text" class="remarks form-control"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="#" class="flex items-center ml-auto text-white btn btn-danger shadow-md delete-row">
                                                            <span class="w-5 h-5 flex items-center justify-center"> <i class="fa fa-minus"></i></span>
                                                        </a>
                                                    </td>
                                                    <td style="width:30%;">
                                                        <select data-placeholder="Pilih SPK" class="tom-select w-full form-control spk_id">
                                                                <option value=" ">-</option>
                                                                @foreach($spk as $spkk)
                                                                <option value="{{$spkk->id}}">{{$spkk->spk_no}}</option>
                                                                @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="result form-control">
                                                        <input type="hidden" class="progress_individu_id form-control" value="{{$data->id}}">
                                                        <input type="hidden" class="process_id form-control" value="{{$data->process_id}}">
                                                    </td>
                                                    <td>
                                                        <textarea type="text" class="remarks form-control"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="#" class="flex items-center ml-auto text-white btn btn-danger shadow-md delete-row">
                                                            <span class="w-5 h-5 flex items-center justify-center"> <i class="fa fa-minus"></i></span>
                                                        </a>
                                                    </td>
                                                    <td style="width:30%;">
                                                        <select data-placeholder="Pilih SPK" class="tom-select w-full form-control spk_id">
                                                                <option value=" ">-</option>
                                                                @foreach($spk as $spkk)
                                                                <option value="{{$spkk->id}}">{{$spkk->spk_no}}</option>
                                                                @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="result form-control">
                                                        <input type="hidden" class="progress_individu_id form-control" value="{{$data->id}}">
                                                        <input type="hidden" class="process_id form-control" value="{{$data->process_id}}">
                                                    </td>
                                                    <td>
                                                        <textarea type="text" class="remarks form-control"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="#" class="flex items-center ml-auto text-white btn btn-danger shadow-md delete-row">
                                                            <span class="w-5 h-5 flex items-center justify-center"> <i class="fa fa-minus"></i></span>
                                                        </a>
                                                    </td>
                                                    <td style="width:30%;">
                                                        <select data-placeholder="Pilih SPK" class="tom-select w-full form-control spk_id">
                                                                <option value=" ">-</option>
                                                                @foreach($spk as $spkk)
                                                                <option value="{{$spkk->id}}">{{$spkk->spk_no}}</option>
                                                                @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="result form-control">
                                                        <input type="hidden" class="progress_individu_id form-control" value="{{$data->id}}">
                                                        <input type="hidden" class="process_id form-control" value="{{$data->process_id}}">
                                                    </td>
                                                    <td>
                                                        <textarea type="text" class="remarks form-control"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="#" class="flex items-center ml-auto text-white btn btn-danger shadow-md delete-row">
                                                            <span class="w-5 h-5 flex items-center justify-center"> <i class="fa fa-minus"></i></span>
                                                        </a>
                                                    </td>
                                                    <td style="width:30%;">
                                                        <select data-placeholder="Pilih SPK" class="tom-select w-full form-control spk_id">
                                                                <option value=" ">-</option>
                                                                @foreach($spk as $spkk)
                                                                <option value="{{$spkk->id}}">{{$spkk->spk_no}}</option>
                                                                @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="result form-control">
                                                        <input type="hidden" class="progress_individu_id form-control" value="{{$data->id}}">
                                                        <input type="hidden" class="process_id form-control" value="{{$data->process_id}}">
                                                    </td>
                                                    <td>
                                                        <textarea type="text" class="remarks form-control"></textarea>
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

                <div id="form-edit" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-body">
                                <!-- BEGIN: Horizontal Form -->
                                <form action="{{route('production.pogress-individu.detail.update')}}" method="POST">
                                    @csrf
                                    <div class="intro-y box">
                                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                            <h2 class="font-medium text-base mr-auto">
                                                Edit Proses Produksi
                                            </h2>
                                        </div>
                                        <div id="horizontal-form" class="p-5">
                                            <div class="intro-y grid grid-cols-12 gap-5">
                                                <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
                                                    <div class="rounded-md p-5">
                                                        <div class="form-inline">
                                                            <label for="vertical-form-1" class="sm:w-32 font-bold">No SPK</label>
                                                            <select data-placeholder="Pilih SPK" class="tom-select w-full form-control spk_id" name="spk_id">
                                                                <option value=" ">-</option>
                                                                @foreach($spk as $spk)
                                                                <option value="{{$spk->id}}">{{$spk->spk_no}}</option>
                                                                @endforeach
                                                            </select>
                                                            <input type="hidden" class="form-control id" name="id">
                                                        </div>
                                                        <div class="form-inline mt-5">
                                                            <label for="vertical-form-1" class="sm:w-32 font-bold">Hasil</label>
                                                            <input type="number" class="result form-control" name="result">
                                                        </div>
                                                        <div class="form-inline mt-5">
                                                            <label for="vertical-form-1" class="sm:w-32 font-bold">Keterangan</label>
                                                            <textarea type="text" class="remarks form-control" name="remarks"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                                <button type="button" data-tw-dismiss="modal" class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                                <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
$(document).ready(function() {

    fetchAndPopulateSPKData()

    $(document).on('click', '.delete-row', function(e) {
        e.preventDefault();
        $(this).closest('tr').remove();
    });

    $('#save').click(function (event) {
        event.preventDefault(); // Prevent default form submission

        // Array to store checked rows' data
        var rows = $("#data-table tbody tr");
        var formData = [];
        rows.each(function() {
            var row = $(this);
            var progress_individu_id = row.find(".progress_individu_id").val();
            var process_id = row.find(".process_id").val();
            var spk_id = row.find(".spk_id").val();
            var result = row.find(".result").val();
            var remarks = row.find(".remarks").val();

            formData.push({
                progress_individu_id: progress_individu_id,
                process_id: process_id,
                spk_id: spk_id,
                result: result,
                remarks: remarks
            });
        });

        console.log(formData)

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{route('production.pogress-individu.detail.save')}}",
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(formData),
            success: function (response, status, xhr) {
                // Handle success response from server
                if (xhr.status === 200) {
                    console.log('Data sent successfully:', response);
                    window.location.href = "/production/progress-individu/detail/" + response.id;
                } else {
                    console.error('Error:', xhr.status);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });

    $('#addRowBtn').click(function() {
        fetchAndPopulateSPKData()
            var spkOptions = @json($spk);
            console.log(spkOptions);
            var newRow = `
                <tr>
                    <td>
                        <a href="#" class="flex items-center ml-auto text-white btn btn-danger shadow-md delete-row">
                            <span class="w-5 h-5 flex items-center justify-center"> <i class="fa fa-minus"></i></span>
                        </a>
                    </td>
                    <td style="width:30%;">
                        <select data-placeholder="Pilih SPK" class="spk-select select-box form-control">
                            <option value=" ">-</option>
                        </select>
                    </td>
                    <td>
                        <input type="number" class="result form-control">
                        <input type="hidden" class="progress-id form-control" value={{$data->id}}>
                        <input type="hidden" class="process_id form-control" value={{$data->process_id}}>
                    </td>
                    <td>
                        <textarea type="text" class="remarks form-control"></textarea>
                    </td>
                </tr>
            `;
            $('#data-table tbody').append(newRow);
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
            url: '{{route("production.pogress-individu.detail.edit")}}', // Specify the URL of your server endpoint
            type: 'POST', // or 'POST' depending on your server setup
            dataType: 'json', // Assuming the response will be
            data: { id: id },
            success: function(response) {

                // Assuming response.data is an array of SPK objects
                var data = response.data;

                console.log(data)

                $("#form-edit .id").val(data.id);

                var spk = $("#form-edit .spk_id")[0].tomselect;
                spk.setValue(data.spk_id);

                $("#form-edit .result").val(data.result);
                $("#form-edit .remarks").val(data.remarks);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    }

    function fetchAndPopulateSPKData() {
        $.ajax({
            url: "{{route('production.spk.monitoring.get-data-spk')}}", // Specify the URL of your server endpoint
            type: 'GET', // or 'POST' depending on your server setup
            dataType: 'json', // Assuming the response will be JSON
            success: function(response) {
                // Assuming response.data is an array of SPK objects
                var spkData = response.data;

                console.log(spkData)

                // Clear existing options
                // $('.spk-select').empty();

                $.each(spkData, function(index, spk) {
                    $('.spk-select').append($('<option>', {
                        value: spk.id,
                        text: spk.spk_no
                    }));
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching SPK data:', error);
            }
        });
    }
</script>
@endsection
