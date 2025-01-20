@extends('layouts._base')
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Production</li>
<li class="breadcrumb-item active" aria-current="page">SPK</li>
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <h2 class="text-2xl font-extrabold dark:text-primary">SPK (Surat Perintah Kerja)</h2>
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <a href="javascript:;" class="btn btn-primary shadow-md mr-2 md:w-32" id="mass-print">Print</a>
                <a href="javascript:;" class="btn btn-primary shadow-md mr-2 md:w-32">Export</a>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table -mt-2" id="spk-table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th style="text-align: left;"></th>
                        <th class="whitespace-nowrap">NO. SPK</th>
                        <th class="whitespace-nowrap">NO. PO</th>
                        <th class="whitespace-nowrap">NAMA BARANG</th>
                        <th class="text-center whitespace-nowrap">JENIS BARANG</th>
                        <th class="text-center whitespace-nowrap">TIPE SPK</th>
                        <th class="text-center whitespace-nowrap">QUANTITY</th>
                        <th class="text-center whitespace-nowrap">QUALITY</th>
                        <th class="text-center whitespace-nowrap">NETTO (L X P)</th>
                        <th class="text-center whitespace-nowrap">BRUTO (L X P)</th>
                        <th class="text-center whitespace-nowrap">SHEET QUANTITY</th>
                        <th class="text-center whitespace-nowrap">STATUS</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr class="intro-x">
                        <td class="text-center">
                            <input class="form-check-input select-spk" type="checkbox" data-spk-id="{{$item->id}}">
                        </td>
                        <td>{{$item->spk_no}}</td>
                        <td>{{$item->ref_po_customer}}</td>
                        <td>{{$item->goods_name}}</td>
                        <td class="text-center whitespace-nowrap">{{$item->goods_type}}</td>
                        <td class="text-center whitespace-nowrap">{{$item->spk_type}}</td>
                        <td class="text-center whitespace-nowrap">{{$item->quantity}}</td>
                        <td class="text-center whitespace-nowrap"><?php echo htmlspecialchars_decode($item->specification);?></td>
                        <td class="text-center whitespace-nowrap">{{$item->netto}}</td>
                        <td class="text-center whitespace-nowrap">{{$item->bruto}}</td>
                        <td class="text-center whitespace-nowrap">{{$item->sheet_quantity}}</td>
                        <td class="text-center">
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
                        <td class="table-report__action">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3 text-primary" href="{{route('production.spk.edit', ['id' => $item->id])}}" title="Edit SPK"><i data-lucide="edit" class="w-4 h-4 mr-1"></i> Edit</a>
                                <a class="flex items-center mr-3 text-warning" href="{{route('production.spk.print', ['id' => $item->id])}}" target="_blank" title="Print SPK"><i data-lucide="printer" class="w-4 h-4 mr-1"></i> Print SPK</a>
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
</div>
@endsection

@section('script')
<script>
$(document).ready(function () {
    $('#schedule-table').DataTable({
        order: [[0, 'desc']]
    });

    $('#spk-table').DataTable({
        order: [[1, 'desc']]
    });

    $('#mass-print').click(function (event) {
        event.preventDefault(); // Prevent default form submission

        // Array to store checked rows' data
        const checkedRowsData = [];

        $('#spk-table tbody .select-spk:checked').each(function () {
            const spkId = $(this).data('spk-id');
            // Push data to array
            checkedRowsData.push(spkId);
        });

        if(checkedRowsData.length === 0) {
            Swal.fire({
                title: 'Perhatian !',
                text: 'Harap pilih SPK yang akan di cetak.',
                icon: 'warning',
                confirmButtonText: 'Ok'
            });
            return;
        }

        console.log(JSON.stringify(checkedRowsData))

        $.ajax({
            url: `{{route('production.spk.print-mass')}}`,
            type: 'POST',
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: JSON.stringify(checkedRowsData),
            xhrFields: {
                responseType: 'blob' // Important for binary data
            },
            success: function (data) {
                var file = new Blob([data], { type: 'application/pdf' });
                var fileURL = URL.createObjectURL(file);
                window.open(fileURL, '_blank'); // Opens in a new tab
                $('#spk-table tbody .select-spk:checked').prop('checked', false);
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});
</script>
@endsection
