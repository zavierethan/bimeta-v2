@extends('layouts._base')
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Production</li>
<li class="breadcrumb-item active" aria-current="page">Progress Individu</li>
@endsection
@section('css')
<style>
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
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Production</li>
<li class="breadcrumb-item active" aria-current="page">Monitoring</li>
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12mt-5">
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                <h2 class="text-2xl font-extrabold dark:text-primary">Laporan Proses Produksi</h2>
                <div class="hidden md:block mx-auto text-slate-500"></div>
                <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#add-progress" class="btn btn-primary shadow-md mr-2">Input Hasil Produksi</a>
                </div>
            </div>
            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2" id="data-table">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="whitespace-nowrap">TANGGAL</th>
                            <th class="whitespace-nowrap">NAMA PROCESS</th>
                            <th class="whitespace-nowrap">OPERATOR</th>
                            <th class="whitespace-nowrap">KA RU</th>
                            <th class="whitespace-nowrap">KA SHIFT</th>
                            <th class="whitespace-nowrap text-center">TOTAL HASIL PRODUKSI</th>
                            <th class="whitespace-nowrap text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td><?php echo date("d/m/Y", strtotime($item->date)) ?></td>
                            <td>{{$item->process_name}}</td>
                            <td>{{$item->operator}}</td>
                            <td>{{$item->team_leader}}</td>
                            <td>{{$item->shift_head}}</td>
                            <td class="text-center">{{$item->total_production_amount}}</td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3 text-primary" href="{{route('production.pogress-individu.detail', ['id' => $item->id])}}"><i data-lucide="edit" class="w-4 h-4 mr-1"></i> Detail</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END: Data List -->
            <div id="add-progress" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-body">
                            <!-- BEGIN: Horizontal Form -->
                            <div class="intro-y box">
                                <div
                                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                    <h2 class="font-medium text-base mr-auto">
                                        Laporan Progres Produksi
                                    </h2>
                                </div>
                                <div id="horizontal-form" class="p-5">
                                    <form method="POST" action="{{route('production.pogress-individu.save')}}">
                                        @csrf
                                        <div class="preview">
                                            <div class="form-inline">
                                            <label for="vertical-form-1" class="sm:w-32 font-bold">Nama Bagian</label>
                                                <select data-placeholder="Pilih Proses" class="tom-select w-full form-control" name="process_id">
                                                    @foreach($productionProcesses as $process)
                                                    <option value="{{$process->id}}">{{$process->process_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-32 font-bold">Tanggal</label>
                                                <input type="date" class="form-control" name="date" value="<?= date("Y-m-d"); ?>" required>
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-32 font-bold">Operator</label>
                                                <input type="text" class="form-control" name="operator" required>
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-32 font-bold">Kepala Regu</label>
                                                <input type="text" class="form-control" name="team_leader" required>
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-32 font-bold">Kepala Shift</label>
                                                <input type="text" class="form-control" name="shift_head" required>
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
@endsection

@section('script')
<script>
$(document).ready(function() {

    $('#data-table').DataTable();

   // fetchAndPopulateSPKData()

    $(document).on('click', '.delete-row', function(e) {
        e.preventDefault();
        $(this).closest('tr').remove();
    });

    $('#myForm').click(function (event) {
        event.preventDefault(); // Prevent default form submission

        // Array to store checked rows' data
        var rows = $("#data-table tbody tr");
        var formData = [];
        rows.each(function() {
            var row = $(this);
            var date = row.find(".date").val();
            var spk = row.find(".spk-select").val();
            var result = row.find(".result").val();
            var operator = row.find(".operator").val();
            var remarks = row.find(".remarks").val();

            formData.push({
                date: date,
                spk: spk,
                result: result,
                operator: operator,
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
            url: "{{route('production.spk.monitoring.personal-progress.save')}}",
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(formData),
            success: function (response, status, xhr) {
                // Handle success response from server
                if (xhr.status === 200) {
                    console.log('Data sent successfully:', response);
                    window.location.href = "{{route('production.spk.index')}}";
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
            var newRow = `
                <tr>
                    <td>
                        <a href="#" class="dropdown-toggle btn px-2 box delete-row">
                            <span class="w-5 h-5 flex items-center justify-center"> <i class="fa fa-minus"></i></span>
                        </>
                    </td>
                    <td>
                        <input type="date" class="form-control date"value="<?php echo date('Y-m-d'); ?>">
                    </td>
                    <td style="width:30%;">
                        <select data-placeholder="Pilih SPK" class="spk-select form-control">
                            <option value=" ">-</option>
                        </select>
                    </td>
                    <td>
                        <input type="number" class="result form-control">
                    </td>
                    <td>
                        <input type="text" class="operator form-control">
                    </td>
                    <td>
                        <textarea type="text" class="remarks form-control"></textarea>
                    </td>
                </tr>
            `;
            $('#data-table tbody').append(newRow);

        });
    });

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
