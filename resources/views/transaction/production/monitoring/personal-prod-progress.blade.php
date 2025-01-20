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
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Production</li>
<li class="breadcrumb-item active" aria-current="page">Monitoring</li>
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12mt-5">
        <h2 class="intro-y text-lg font-medium mt-10">Progress Monitoring {{$productionProcess->process_name}}</h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview"
                    class="btn btn-primary shadow-md mr-2">Buat Progress Harian</a>
                <div class="dropdown">
                    <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                        <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4"
                                data-lucide="plus"></i>
                        </span>
                    </button>
                    <div class="dropdown-menu w-40">
                        <ul class="dropdown-content">
                            <li>
                                <a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i>
                                    Export to Excel </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i>
                                    Export to PDF </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="hidden md:block mx-auto text-slate-500"></div>
                <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <div class="w-56 relative text-slate-500">
                        <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                    </div>
                </div>
            </div>
            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="whitespace-nowrap">TANGGAL</th>
                            <th class="whitespace-nowrap">KONSUMEN</th>
                            <th class="whitespace-nowrap">NO PO</th>
                            <th class="whitespace-nowrap text-center">NO SPK</th>
                            <th class="whitespace-nowrap text-center">UKURAN</th>
                            <th class="whitespace-nowrap text-center">HASIL</th>
                            <th class="whitespace-nowrap">OPERATOR</th>
                            <th class="whitespace-nowrap">KETERANGAN</th>
                            <th class="whitespace-nowrap text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td><?php echo date("d/m/Y", strtotime($item->date)); ?></td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->ref_po_customer}}</td>
                            <td class="text-center">{{$item->spk_no}}</td>
                            <td class="text-center"></td>
                            <td class="text-center">{{$item->result}}</td>
                            <td>{{$item->operator}}</td>
                            <td>{{$item->remarks}}</td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3 text-success" href="" title="Masrk As Done"><i
                                            data-lucide="check-square" class="w-4 h-4 mr-1"></i>Edit</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END: Data List -->
            <!-- BEGIN: Pagination -->
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
                <nav class="w-full sm:w-auto sm:mr-auto">
                    <ul class="pagination">
                        @if ($data->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link" aria-hidden="true"><i class="w-4 h-4"
                                    data-lucide="chevrons-left"></i></span>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $data->previousPageUrl() }}" rel="prev"><i class="w-4 h-4"
                                    data-lucide="chevron-left"></i></a>
                        </li>
                        @endif

                        @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
                        <li class="page-item @if($page == $data->currentPage()) active @endif">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                        @endforeach

                        @if ($data->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $data->nextPageUrl() }}" rel="next"><i class="w-4 h-4"
                                    data-lucide="chevron-right"></i></a>
                        </li>
                        @else
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link" aria-hidden="true"><i class="w-4 h-4"
                                    data-lucide="chevrons-right"></i></span>
                        </li>
                        @endif
                    </ul>
                </nav>
                <select class="w-20 form-select box mt-3 sm:mt-0">
                    <option>10</option>
                    <option>25</option>
                    <option>35</option>
                    <option>50</option>
                </select>
            </div>
            <!-- END: Pagination -->
            <div id="superlarge-modal-size-preview" class="modal" tabindex="-1" aria-hidden="true">
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
                                        <button class="dropdown-toggle btn px-2 box" id="addRowBtn">
                                            <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i></span>
                                        </button>
                                    </div>
                                </div>
                                <!-- <div id="horizontal-form" class="p-5">
                                    <form action="{{route('production.spk.monitoring.personal-progress.save')}}"
                                        method="post">
                                        @csrf
                                        <div class="preview">
                                            <div class="form-inline">
                                                <label for="vertical-form-1" class="sm:w-20 font-bold">Tanggal</label>
                                                <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>">
                                                <input type="hidden" class="form-control" name="process_id" value="{{$productionProcess->id}}">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-20 font-bold">No SPK</label>
                                                
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-20 font-bold">Hasil</label>
                                                <input type="number" class="form-control" name="result">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-20 font-bold">Operator</label>
                                                <input type="text" class="form-control" name="operator">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-20 font-bold">Keterangan</label>
                                                <textarea type="text" class="form-control" name="remarks"> </textarea>
                                            </div>
                                        </div>
                                        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                            <button type="button" data-tw-dismiss="modal" class="btn py-3 btn-danger w-full md:w-52">Batal</button>
                                            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
                                        </div>
                                    </form>
                                </div> -->
                                <div id="horizontal-form" class="p-5">
                                    <table class="table" id="data-table">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th></th>
                                                    <th>TANGGAL</th>
                                                    <th>NO SPK</th>
                                                    <th>HASIL</th>
                                                    <th>OPERATOR</th>
                                                    <th>KETERANGAN</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                        </table>
                                        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                            <button type="button" data-tw-dismiss="modal" class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                            <button type="button" id="myForm" class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
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
@endsection

@section('script')
<script>
$(document).ready(function() {

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