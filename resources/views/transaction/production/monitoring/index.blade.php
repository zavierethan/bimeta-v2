@extends('layouts._base')
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Production</li>
<li class="breadcrumb-item active" aria-current="page">Monitoring</li>
@endsection
@section('css')

@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <h2 class="text-2xl font-extrabold dark:text-primary">Monitoring Proses Produksi</h2>
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-schedule" class="btn btn-primary shadow-md mr-2">Buat Jadwal Produksi</a>
                <!-- <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#cor-report" class="btn btn-primary shadow-md mr-2">Export COR</a> -->
                <a href="javascript:;" id="export-cor-btn" class="btn btn-primary shadow-md mr-2">Export COR</a>
                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#production-report" class="btn btn-primary shadow-md mr-2">Export Laporan Produksi</a>
                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#export-finish-goods" class="btn btn-primary shadow-md mr-2">Export to Finish Goods</a>
            </div>

        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12">
            <table class="table -mt-2 table-responsive" id="spk-monitoring-table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th style="text-align: left;"></th>
                        <th style="text-align: left;">TANGGAL PROD.</th>
                        <th style="text-align: left;">PIC</th>
                        <th class="">NO. SPK</th>
                        <th>NO. PO</th>
                        <th>CUSTOMER</th>
                        <th style="text-align: center;">TIPE FLUTE</th>
                        <th style="text-align: center;">LEBAR</th>
                        <th style="text-align: center;">PANJANG</th>
                        <th>KUALITAS</th>
                        <th style="text-align: center"> SPK QTY</th>
                        <th style="text-align: center"> SHEET QTY</th>
                        <th style="text-align: center">PROSES SAAT INI</th>
                        <th style="text-align: center;">STATUS</th>
                        <th style="text-align: center;">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td class="text-center">
                            <input class="form-check-input monitoring-inp" type="checkbox" data-spk-id="{{$item->id}}">
                        </td>
                        <td><?php echo date("d/m/Y", strtotime($item->start_date)) ?></td>
                        <td>{{$item->pic}}</td>
                        <td>{{$item->spk_no}}</td>
                        <td>{{$item->ref_po_customer}}</td>
                        <td>{{$item->customer_name}}</td>
                        <td style="text-align: center;">{{$item->flute_type}}/F</td>
                        <td style="text-align: center;">{{$item->bruto_width}}</td>
                        <td style="text-align: center;">{{$item->bruto_length}}</td>
                        <td>{{$item->specification}}</td>
                        <td style="text-align: center;">{{$item->quantity}}</td>
                        <td style="text-align: center;">{{$item->sheet_quantity}}</td>
                        <td style="text-align: center;">{{$item->current_process}}</td>
                        <td style="text-align: center;">
                            @if($item->status == 1)
                                <div class="py-1 px-2 rounded-full text-xs bg-primary text-white cursor-pointer font-medium">INIT</div>
                            @elseif($item->status == 2)
                                <div class="py-1 px-2 rounded-full text-xs bg-warning text-white cursor-pointer font-medium">SCHEDULED</div>
                            @elseif($item->status == 3)
                                <div class="py-1 px-2 rounded-full text-xs bg-warning text-white cursor-pointer font-medium">WORK IN PROGRESS</div>
                            @else
                                <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">COMPLETED</div>
                            @endif
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                @if($item->status != 4)
                                <a class="flex items-center mr-3 text-success" onclick="return confirm('Apakah anda yakin sudah menyelesaikan SPK ?')"
                                    href="/production/spk/mark-as-done/{{$item->id}}"
                                    title="Mark As Done"><i data-lucide="check-square" class="w-4 h-4 mr-1"></i>Done
                                </a>
                                @endif
                                <a class="flex items-center mr-3 text-warning" href="/production/monitoring/{{$item->id}}"
                                    title="Monitor Progress"><i data-lucide="eye" class="w-4 h-4 mr-1"></i> Monitor
                                </a>
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
                                Laporan Progres Individu
                            </h2>
                        </div>
                        <div id="horizontal-form" class="p-5">
                            <form method="GET" action="{{route('production.spk.monitoring.personal-progress')}}">
                                <div class="preview">
                                    <div class="form-inline">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Nama Bagian</label>
                                        <select data-placeholder="Pilih Proses" class="tom-select w-full form-control" name="process_id">
                                            <option value=" "> - </option>
                                            @foreach($productionProcesses as $process)
                                            <option value="{{$process->id}}">{{$process->process_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-32 font-bold">Tanggal</label>
                                        <input type="date" class="form-control" name="date" required>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-32 font-bold">Operator</label>
                                        <input type="text" class="form-control" name="operator" required>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-32 font-bold">Kepala Regu</label>
                                        <input type="text" class="form-control" name="kepala_regu" required>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-32 font-bold">Kepala Shift</label>
                                        <input type="text" class="form-control" name="kepala_shift" required>
                                    </div>
                                </div>
                                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                    <button type="button" data-tw-dismiss="modal" class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                    <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Laporan Progress</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END: Horizontal Form -->
                </div>
            </div>
        </div>
    </div>

    <div id="cor-report" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- BEGIN: Horizontal Form -->
                    <div class="intro-y box">
                        <div
                            class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Export COR
                            </h2>
                        </div>
                        <div id="horizontal-form" class="p-5">
                            <form method="POST" action="{{route('production.spk.monitoring.cor.report.export')}}">
                                @csrf
                                <div class="preview">
                                    <div class="form-inline">
                                        <label for="vertical-form-1" class="sm:w-32 font-bold">Dari Tanggal</label>
                                        <input type="date" class="form-control" name="start_date" required>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-32 font-bold">Sampai Tanggal</label>
                                        <input type="date" class="form-control" name="end_date" required>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-32 font-bold">Kualitas</label>
                                        <select data-placeholder="Pilih Proses" class="tom-select w-full form-control" name="flute_type">
                                            <option value=" "> - </option>
                                            <option value="B">B/F </option>
                                            <option value="C">C/F</option>
                                            <option value="E">E/F</option>
                                            <option value="B/C">B/C</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                    <button type="button" data-tw-dismiss="modal" class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                    <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Export Excel</button>
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

    <div id="production-report" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- BEGIN: Horizontal Form -->
                    <div class="intro-y box">
                        <div
                            class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Export Laporan Produksi
                            </h2>
                        </div>
                        <div id="horizontal-form" class="p-5">
                            <form method="POST" action="{{route('production.spk.monitoring.production.report.export')}}">
                                @csrf
                                <div class="preview">
                                    <div class="form-inline">
                                        <label for="vertical-form-1" class="sm:w-32 font-bold">Dari Tanggal</label>
                                        <input type="date" class="form-control" name="start_date" required>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-32 font-bold">Sampai Tanggal</label>
                                        <input type="date" class="form-control" name="end_date" required>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-32 font-bold">PIC</label>
                                        <select data-placeholder="Pilih PIC" class="tom-select w-full form-control" name="pic">
                                            @foreach($pics as $pic)
                                            <option value="{{$pic->id}}">{{$pic->display_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                    <button type="button" data-tw-dismiss="modal" class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                    <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Export Excel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END: Horizontal Form -->
                </div>
            </div>
        </div>
    </div>

    <!-- BEGIN: Production Schedule Modal -->
    <div id="add-schedule" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- BEGIN: Horizontal Form -->
                    <div class="intro-y box">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Jadwal Produksi
                            </h2>
                        </div>
                        <div id="horizontal-form" class="p-5">
                            <form method="POST" action="{{route('production.spk.progress-item.save')}}">
                                @csrf
                                <table class="table" id="schedule-table">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>NO SPK</th>
                                            <th>SPESIFIKASI</th>
                                            <th>FLUTE</th>
                                            <th>TANGGAL</th>
                                            <th class="text-center">PILIH</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($spkSchedule as $spk)
                                        <tr>
                                            <td>
                                                {{$spk->spk_no}}
                                                <input class="form-control" type="hidden" name="spk_id" id="spk-id" value="{{$spk->id}}">
                                            </td>
                                            <td>{{$spk->specification}}</td>
                                            <td>{{$spk->flute_type}}/F</td>
                                            <td>
                                                <input class="form-control date-input" type="date" name="date" value="<?= date("Y-m-d"); ?>">
                                            </td>
                                            <td class="text-center">
                                                <input class="form-check-input" type="checkbox" data-spk-id="{{$spk->id}}">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                    <button type="button" data-tw-dismiss="modal" class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                    <button type="button" id="myForm" class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
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

    <div id="export-finish-goods" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- BEGIN: Horizontal Form -->
                    <div class="intro-y box">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Export to Finish Goods
                            </h2>
                        </div>
                        <div id="horizontal-form" class="p-5">
                            <form method="POST" action="{{route('production.spk.progress-item.save')}}">
                                @csrf
                                <table class="table" id="export-finish-goods-table">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>NO SPK</th>
                                            <th>SPESIFIKASI</th>
                                            <th>FLUTE</th>
                                            <th>QTY</th>
                                            <th class="text-center">PILIH</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($spkToFinishgoods as $spk)
                                        <tr>
                                            <td>
                                                {{$spk->spk_no}}
                                                <input class="form-control" type="hidden" name="spk_id" id="spk-id" value="{{$spk->id}}">
                                            </td>
                                            <td>{{$spk->specification}}</td>
                                            <td>{{$spk->flute_type}}/F</td>
                                            <td>{{$spk->quantity}}</td>
                                            <td class="text-center">
                                                <input class="form-check-input" type="checkbox" data-spk-id="{{$spk->id}}">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                    <button type="button" data-tw-dismiss="modal" class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                    <button type="button" id="btn-transfer-fg" class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
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
@endsection

@section('script')
<script>
$(function() {
    $('#schedule-table').DataTable({
        order: [[0, 'desc']]
    });

    $('#spk-monitoring-table').DataTable({
        order: [[3, 'desc']],
        scrollX: true,
    });

    $('#export-finish-goods-table').DataTable({
        order: [[0, 'desc']]
    });

    $('#myForm').click(function (event) {
        event.preventDefault(); // Prevent default form submission

        // Array to store checked rows' data
        const checkedRowsData = [];

        $('#schedule-table .form-check-input:checked').each(function () {
            const spkId = $(this).data('spk-id');
            const dateValue = $(this).closest('tr').find('.date-input').val();

            // Push data to array
            checkedRowsData.push({
                spkId: spkId,
                date: dateValue
            });
        });

        console.log(JSON.stringify(checkedRowsData))

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{route('production.spk.filtered-schedule.save')}}",
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(checkedRowsData),
            success: function (response, status, xhr) {

                if (xhr.status === 200) {
                    console.log('Data sent successfully:', response);
                    window.location.href = "{{route('production.spk.monitoring.index')}}";
                } else {
                    console.error('Error:', xhr.status);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });

    $('#btn-transfer-fg').click(function (event) {
        event.preventDefault(); // Prevent default form submission

        // Array to store checked rows' data
        const checkedRowsData = [];

        $('#export-finish-goods .form-check-input:checked').each(function () {
            const spkId = $(this).data('spk-id');

            // Push data to array
            checkedRowsData.push({
                spkId: spkId,
            });
        });

        if(checkedRowsData.length === 0) {
            var dismissButton = $('#export-finish-goods button[data-tw-dismiss="modal"]');

            dismissButton.click();

            Swal.fire({
                title: 'Perhatian !',
                text: 'Harap pilih SPK yang akan di transfer ke finish goods !.',
                icon: 'warning',
                confirmButtonText: 'Ok'
            });
            return;
        }

        console.log(JSON.stringify(checkedRowsData))

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{route('production.spk.export-to-finish-goods.save')}}",
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(checkedRowsData),
            success: function (response, status, xhr) {

                if (xhr.status === 200) {
                    console.log('Data sent successfully:', response);
                    window.location.href = "{{route('production.spk.monitoring.index')}}";
                } else {
                    console.error('Error:', xhr.status);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });

    $('#export-cor-btn').click(function (event) {
        event.preventDefault(); // Prevent default form submission

        // Array to store checked rows' data
        const checkedRowsData = [];

        $('#spk-monitoring-table tbody .monitoring-inp:checked').each(function () {
            const spkId = $(this).data('spk-id');
            // Push data to array
            checkedRowsData.push(spkId);
        });

        if(checkedRowsData.length === 0) {
            Swal.fire({
                title: 'Perhatian !',
                text: 'Harap pilih SPK yang akan di export.',
                icon: 'warning',
                confirmButtonText: 'Ok'
            });
            return;
        }

        console.log(JSON.stringify(checkedRowsData))

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{route('production.spk.monitoring.cor.report.export')}}",
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(checkedRowsData),
            xhrFields: {
                responseType: 'blob' // Important for binary data
            },
            success: function (response, status, xhr) {

                if (xhr.status === 200) {
                    console.log('Data sent successfully:', response);
                    var blob = new Blob([response], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = 'Export COR.xlsx';
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);

                    Swal.fire({
                        title: 'Success !',
                        text: 'Data Berhasil di Export',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });

                    // Uncheck all checkboxes
                    $('#spk-monitoring-table tbody .monitoring-inp:checked').prop('checked', false);
                } else {
                    console.error('Error:', xhr.status);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});
</script>
@endsection
