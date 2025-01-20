@extends('layouts._base')
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Production</li>
<li class="breadcrumb-item" aria-current="page">SPK</li>
<li class="breadcrumb-item active" aria-current="page">Detail</li>
@endsection
@section('css')
<style>
.mandatory-sign {
    color: red;
}

.text-danger {
    color: red;
    font-size: 12px;
}
</style>
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-4 2xl:col-span-4">
            <div class="intro-y box mt-5">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Spesifikasi Barang
                    </h2>
                </div>
                <form method="POST" action="{{route('index-price.save')}}">
                    @csrf
                    <div id="horizontal-form" class="p-5">
                        <div class="preview">
                            <div class="form-inline">
                                <label for="vertical-form-1" class="sm:w-32 font-bold">Nama</label>
                                <input type="text" class="form-control" value="{{$data->name}}" readonly>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="sm:w-32 font-bold">Jenis</label>
                                <input type="text" class="form-control" value="{{$data->type}}"id="goods-type" readonly>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="sm:w-32 font-bold">Spesifikasi</label>
                                <input type="text" class="form-control" value="{{$data->spec_str}}" readonly>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="sm:w-32 font-bold">Ukuran</label>
                                <input type="text" class="form-control" value="{{$data->meas_str}}" readonly>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="sm:w-32 font-bold">Qty Pesanan</label>
                                <input type="text" class="form-control" id="-order-quantity" value="{{$data->order_quantity}}" readonly>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="intro-y box mt-5">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Proses Produksi
                    </h2>
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" data-tw-toggle="modal" data-tw-target="#add-process-prod"> <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Tambah Proses </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <!-- <th class="text-center">Urutan</th> -->
                                <th>Nama Proses</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productionProcessesItem as $process)
                            <tr>
                                <!-- <td class="text-center">{{$process->sequence_order}}</td> -->
                                <td>{{$process->process_name}}</td>
                                <td class="text-center">
                                    @if($process->status == 1)
                                    <div class="py-1 px-2 rounded-full text-xs bg-primary text-white cursor-pointer font-medium">INIT</div>
                                    @elseif($process->status == 2)
                                    <div class="py-1 px-2 rounded-full text-xs bg-warning text-white cursor-pointer font-medium">WORK IN PROGRESS</div>
                                    @else
                                    <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">COMPLETED</div>
                                    @endif
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3 text-danger" href="{{route('production.spk.progress-item.delete', ['id' => $process->id])}}" onclick="return confirm('Apakah anda yakin ?')"
                                            title="Monitor Progress"><i data-lucide="trash" class="w-4 h-4 mr-1"></i> Hapus
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="add-process-prod" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-body">
                                <!-- BEGIN: Horizontal Form -->
                                <div class="intro-y box">
                                    <div
                                        class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                        <h2 class="font-medium text-base mr-auto">
                                            Tambah Proses Produksi
                                        </h2>
                                    </div>
                                    <div id="horizontal-form" class="p-5">
                                        <form method="POST" action="{{route('production.spk.progress-item.save')}}">
                                            @csrf
                                            <table class="table table-striped">
                                                <thead class="bg-primary text-white">
                                                    <tr>
                                                        <th>Nama Proses</th>
                                                        <th class="text-center">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($productionProcesses as $process)
                                                    <tr>
                                                        <td>{{$process->process_name}}</td>
                                                        <td class="text-center">
                                                            <input class="form-check-input" type="checkbox" id="flag_use_customer_addr" name="processes[]" value="{{$process->id}}">
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                                <input type="hidden" name="spk_id" value="{{$data->id}}" />
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

        @if($data->type == 'A')
        <form method="POST" action="{{route('production.spk.update')}}" class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5">
            @csrf
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">NO. SPK : {{$data->spk_no}} ({{$data->spk_type}})</div>
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" id="calculate"> <i
                            data-lucide="calculator" class="w-4 h-4 mr-2"></i> Hitung Otomatis </a>
                </div>
                <div class="md:col-span-6 sm:col-span-12">
                    <div class="overflow-y-auto max-h-screen">
                        <div class="grid grid-cols-12">
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <table style="border-collapse: collapse;">
                                        <tr>
                                            <td width="70px" style="text-align: center;">

                                            </td>
                                            <td width="70px" style="text-align: center;">

                                            </td>
                                            <td width="120px" style="text-align: center;">
                                                JP: {{$data->netto_length}}
                                            </td>
                                            <td width="70px" style="text-align: center;padding: 8px">

                                            </td>
                                            <td style="text-align: center;">

                                            </td>
                                            <td width="80px" style="text-align: center;">

                                            </td>
                                            <td style="text-align: center;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="50px" height="50px" style="text-align: center;">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                {{$data->plape}}
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="text-align: center; padding:10px;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="70px" style="padding: 5px;">
                                                JL: {{$data->netto_width}}
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px; height: 20px;">
                                                {{$data->l2}}
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px;">
                                                {{$data->p1}}
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px;">
                                                {{$data->l1}}
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px;">
                                                {{$data->t}}
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px;">
                                                {{$data->p2}}
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px;width: 5px;">
                                                {{$data->k}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="50px" style="text-align: center;">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                {{$data->plape}}
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="text-align: center; padding:10px;">

                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-40 font-bold">Stitching</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio"
                                                        name="flag_stitching" value="0"
                                                        <?php echo ($data->flag_stitching == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_stitching" value="1"
                                                        <?php echo ($data->flag_stitching == 1) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-40 font-bold">Lem</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio"
                                                        name="flag_glue" value="0"
                                                        <?php echo ($data->flag_glue == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_glue" value="1"
                                                        <?php echo ($data->flag_glue == 1) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-40 font-bold">Pounch</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio"
                                                        name="flag_pounch" value="0"
                                                        <?php echo ($data->flag_pounch == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_pounch" value="1"
                                                        <?php echo ($data->flag_pounch == 1) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12">
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Qty SPK</label>
                                            <input type="number" class="form-control" name="quantity" id="tr-spk-qty" value="{{$data->quantity}}">
                                            <input type="hidden" class="form-control" name="id" value="{{$data->spk_id}}">
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Ukuran</label>
                                            <input type="text" class="form-control mr-3" placeholder="P" name="length" id="length" value="{{$data->length}}">
                                            <input type="text" class="form-control mr-3" placeholder="L" name="width" id="width" value="{{$data->width}}">
                                            <input type="text" class="form-control" placeholder="T" name="height" id="height" value="{{$data->height}}">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">L2</label>
                                            <input type="number" class="form-control" name="l2" value="{{$data->l2}}"
                                                id="l2">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">P1</label>
                                            <input type="number" class="form-control" name="p1" value="{{$data->p1}}"
                                                id="p1">
                                        </div>

                                        <!-- hjfhsjf -->
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">L1</label>
                                            <input type="number" class="form-control" name="l1" value="{{$data->l1}}"
                                                id="l1">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">T</label>
                                            <input type="number" class="form-control" name="t" value="{{$data->t}}"
                                                id="t">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">P2</label>
                                            <input type="number" class="form-control" name="p2" value="{{$data->p2}}"
                                                id="p2">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">PLAPE</label>
                                            <input type="number" class="form-control" name="plape"
                                                value="{{$data->plape}}" id="plape">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">K</label>
                                            <input type="number" class="form-control" name="k" value="{{$data->k}}"
                                                id="k">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Netto</label>
                                            <input type="text" class="form-control col-span-6 mr-3" placeholder="L" name="netto_width" value="{{$data->netto_width}}" id="netto-width">
                                            <input type="text" class="form-control col-span-6" placeholder="P" name="netto_length" value="{{$data->netto_length}}" id="netto-length">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Bruto</label>
                                            <input type="text" class="form-control col-span-6 mr-3" placeholder="L" name="bruto_width" value="{{$data->bruto_width}}" id="bruto-width">
                                            <input type="text" class="form-control col-span-6" placeholder="P" name="bruto_length" value="{{$data->bruto_length}}" id="bruto-length">
                                        </div>
                                        <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-20 font-bold">Sup Bruto</label>
                                                <input type="text" class="form-control mr-3 sup-bruto-width" placeholder="L" name="sup_bruto_width" value="">
                                                <input type="text" class="form-control sup-bruto-length" placeholder="P" name="sup_bruto_length" value="">
                                            </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Qty Sheet</label>
                                            <input type="number" class="form-control" name="sheet_quantity" value="{{$data->sheet_quantity}}" id="sheet-quantity">
                                        </div>
                                    </div>
                                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                        <a href="{{route('production.spk.print', ['id' => $data->id])}}" target="_blank" class="btn py-3 btn-primary w-full md:w-52">Preview SPK</a>
                                        <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Update SPK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endif

        @if($data->type == 'B')
        <form method="POST" action="{{route('production.spk.update')}}" class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5">
            @csrf
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">NO. SPK : {{$data->spk_no}}</div>
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" id="calculate"> <i data-lucide="calculator" class="w-4 h-4 mr-2"></i> Hitung Otomatis </a>
                </div>
                <div class="md:col-span-12 sm:col-span-12">
                    <div class="overflow-y-auto max-h-screen">
                        <div class="grid grid-cols-12 mt-5">
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <table style="width:70%;border-collapse: collapse; margin-right: 5px;margin-right: 100px;">
                                        <tr>
                                            <td width="50px" style="text-align: center;">

                                            </td>
                                            <td style="text-align: center;">

                                            </td>
                                            <td width="60px" style="text-align: center;" id="sheet-l-l">
                                                <strong>JP: {{$data->netto_width}}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="80px" style="text-align: center;">

                                            </td>
                                            <td style="border-top: 1px solid black;border-left: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="border-top: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="border-top: 1px solid black;border-right: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="70px" style="padding: 5px;">
                                                <strong>JL: {{$data->netto_length}}</strong>
                                            </td>
                                            <td style="border-left: 1px solid black;text-align: center; padding:17px; height: 20px;">

                                            </td>
                                            <td style="text-align: center; padding:17px;">

                                            </td>
                                            <td style="border-right: 1px solid black;text-align: center; padding:17px;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">

                                            </td>
                                            <td style="border-bottom: 1px solid black;border-left: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="border-bottom: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="border-bottom: 1px solid black;border-right: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Stitching</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio"
                                                        name="flag_stitching" value="0"
                                                        <?php echo ($data->flag_stitching == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_stitching" value="1"
                                                        <?php echo ($data->flag_stitching == 1) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Lem</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio"
                                                        name="flag_glue" value="0"
                                                        <?php echo ($data->flag_glue == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_glue" value="1"
                                                        <?php echo ($data->flag_glue == 1) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Pounch</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio"
                                                        name="flag_pounch" value="0"
                                                        <?php echo ($data->flag_pounch == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_pounch" value="1"
                                                        <?php echo ($data->flag_pounch == 1) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 mt-5">
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Qty SPK</label>
                                            <input type="number" class="form-control" name="quantity" value="{{$data->quantity}}">
                                            <input type="hidden" class="form-control" name="id" value="{{$data->spk_id}}">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Ukuran</label>
                                            <input type="text" class="form-control mr-3" placeholder="L" name="width" id="width" value="{{$data->width}}">
                                            <input type="text" class="form-control" placeholder="P" name="length" id="length" value="{{$data->length}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Netto</label>
                                            <input type="text" class="form-control mr-3" placeholder="L" name="netto_width" value="{{$data->netto_width}}" id="netto-width">
                                            <input type="text" class="form-control" placeholder="P" name="netto_length" value="{{$data->netto_length}}" id="netto-length">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Bruto</label>
                                            <input type="text" class="form-control mr-3" placeholder="L" name="bruto_width" value="{{$data->bruto_width}}" id="bruto-width">
                                            <input type="text" class="form-control" placeholder="P" name="bruto_length" value="{{$data->bruto_length}}" id="bruto-length">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Qty Sheet</label>
                                            <input type="number" class="form-control" name="sheet_quantity" value="{{$data->sheet_quantity}}" id="sheet-quantity">
                                        </div>
                                    </div>
                                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                        <a href="{{route('production.spk.print', ['id' => $data->id])}}" target="_blank" class="btn py-3 btn-primary w-full md:w-52">Preview SPK</a>
                                        <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Update SPK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endif

        @if($data->type == 'AB')
        <form  method="POST" action="{{route('production.spk.update')}}" class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5">
            @csrf
            @if($data->spk_type == "A")
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">NO. SPK : {{$data->spk_no}}</div>
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" id="calculate"> <i data-lucide="calculator" class="w-4 h-4 mr-2"></i> Hitung Otomatis </a>
                </div>
                <div class="md:col-span-6 sm:col-span-12">
                    <div class="overflow-y-auto max-h-screen">
                        <div class="grid grid-cols-12">
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <table style="border-collapse: collapse;">
                                        <tr>
                                            <td width="70px" style="text-align: center;">

                                            </td>
                                            <td width="70px" style="text-align: center;">

                                            </td>
                                            <td width="120px" style="text-align: center;">
                                                <strong>JP: {{$data->netto_length}}</strong>
                                            </td>
                                            <td width="70px" style="text-align: center;padding: 8px">

                                            </td>
                                            <td style="text-align: center;">

                                            </td>
                                            <td width="80px" style="text-align: center;">

                                            </td>
                                            <td style="text-align: center;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="70px" style="padding: 5px;">
                                                <strong>JL: {{$data->netto_width}}</strong>
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px; height: 20px;">
                                                {{$data->l2}}
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px;">
                                                {{$data->p1}}
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px;">
                                                {{$data->l1}}
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px;">
                                                {{$data->t}}
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px;">
                                                {{$data->p2}}
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px;width: 5px;">
                                                {{$data->k}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="50px" style="text-align: center;">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                {{$data->plape}}
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="text-align: center; padding:10px;">

                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Stitching</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio"
                                                        name="flag_stitching" value="0"
                                                        <?php echo ($data->flag_stitching == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_stitching" value="1"
                                                        <?php echo ($data->flag_stitching == 1) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Lem</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio"
                                                        name="flag_glue" value="0"
                                                        <?php echo ($data->flag_glue == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_glue" value="1"
                                                        <?php echo ($data->flag_glue == 1) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Pounch</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio"
                                                        name="flag_pounch" value="0"
                                                        <?php echo ($data->flag_pounch == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_pounch" value="1"
                                                        <?php echo ($data->flag_pounch == 1) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12">
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Qty SPK</label>
                                            <input type="number" class="form-control" name="quantity" id="tr-spk-qty" value="{{$data->quantity}}" >
                                            <input type="hidden" class="form-control" name="id" value="{{$data->spk_id}}">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Ukuran</label>
                                            <input type="text" class="form-control mr-3" placeholder="P" id="length" name="length" value="{{$data->length}}">
                                            <input type="text" class="form-control mr-3" placeholder="L" id="width" name="width" value="{{$data->width}}">
                                            <input type="text" class="form-control" placeholder="T" id="height" name="height" value="{{$data->height}}">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">L2</label>
                                            <input type="number" class="form-control" name="l2" value="{{$data->l2}}" id="l2" >
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">P1</label>
                                            <input type="number" class="form-control" name="p1" value="{{$data->p1}}" id="p1" >
                                        </div>

                                        <!-- hjfhsjf -->
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">L1</label>
                                            <input type="number" class="form-control" name="l1" value="{{$data->l1}}" id="l1" >
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">T</label>
                                            <input type="number" class="form-control" name="t" value="{{$data->t}}" id="t" >
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">P2</label>
                                            <input type="number" class="form-control" name="p2" value="{{$data->p2}}" id="p2" >
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">PLAPE</label>
                                            <input type="number" class="form-control" name="plape" value="{{$data->plape}}" id="plape" >
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">K</label>
                                            <input type="number" class="form-control" name="k" value="{{$data->k}}" id="k" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Netto</label>
                                            <input type="text" class="form-control mr-3" placeholder="L" name="netto_width" value="{{$data->netto_width}}" id="netto-width" >
                                            <input type="text" class="form-control" placeholder="P" name="netto_length" value="{{$data->netto_length}}" id="netto-length" >
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Bruto</label>
                                            <input type="text" class="form-control mr-3" placeholder="L" name="bruto_width" value="{{$data->bruto_width}}" id="bruto-width" >
                                            <input type="text" class="form-control" placeholder="P" name="bruto_length" value="{{$data->bruto_length}}" id="bruto-length" >
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Qty Sheet</label>
                                            <input type="number" class="form-control" name="sheet_quantity" value="{{$data->sheet_quantity}}" id="sheet-quantity" >
                                        </div>
                                    </div>
                                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                        <a href="{{route('production.spk.print', ['id' => $data->id])}}" target="_blank" class="btn py-3 btn-primary w-full md:w-52">Preview SPK</a>
                                        <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Update SPK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="box p-5 rounded-md mt-2">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">NO. SPK : {{$data->spk_no}}</div>
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" id="calculate"> <i data-lucide="calculator" class="w-4 h-4 mr-2"></i> Hitung Otomatis </a>
                </div>
                <div class="md:col-span-6 sm:col-span-12">
                    <div class="overflow-y-auto max-h-screen">
                        <div class="grid grid-cols-12">
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <table style="width:70%;border-collapse: collapse; margin-right: 5px;margin-right: 100px;">
                                        <tr>
                                            <td width="50px" style="text-align: center;">

                                            </td>
                                            <td style="text-align: center;">

                                            </td>
                                            <td width="60px" style="text-align: center;" id="sheet-l-l">
                                                <strong>JP: {{$data->netto_width}}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="80px" style="text-align: center;">

                                            </td>
                                            <td style="border-top: 1px solid black;border-left: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="border-top: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="border-top: 1px solid black;border-right: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="70px" style="padding: 5px;">
                                                <strong>JL: {{$data->netto_length}}</strong>
                                            </td>
                                            <td style="border-left: 1px solid black;text-align: center; padding:17px; height: 20px;">

                                            </td>
                                            <td style="text-align: center; padding:17px;">

                                            </td>
                                            <td style="border-right: 1px solid black;text-align: center; padding:17px;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">

                                            </td>
                                            <td style="border-bottom: 1px solid black;border-left: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="border-bottom: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="border-bottom: 1px solid black;border-right: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Stitching</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio"
                                                        name="flag_stitching" value="0"
                                                        <?php echo ($data->flag_stitching == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_stitching" value="1"
                                                        <?php echo ($data->flag_stitching == 1) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Lem</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio"
                                                        name="flag_glue" value="0"
                                                        <?php echo ($data->flag_glue == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_glue" value="1"
                                                        <?php echo ($data->flag_glue == 1) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Pounch</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio"
                                                        name="flag_pounch" value="0"
                                                        <?php echo ($data->flag_pounch == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_pounch" value="1"
                                                        <?php echo ($data->flag_pounch == 1) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12">
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Qty SPK</label>
                                            <input type="number" class="form-control" name="quantity" id="tr-spk-qty"  value="{{$data->quantity}}" >
                                            <input type="hidden" class="form-control" name="id" value="{{$data->spk_id}}">
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Ukuran</label>
                                            <input type="text" class="form-control mr-3" placeholder="P" id="length" name="length"  value="{{$data->length}}" >
                                            <input type="text" class="form-control" placeholder="L" id="width" name="width"  value="{{$data->width}}" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Netto</label>
                                            <input type="text" class="form-control mr-3" placeholder="L" name="netto_width" value="{{$data->netto_width}}" id="netto-width" >
                                            <input type="text" class="form-control" placeholder="P" name="netto_length" value="{{$data->netto_length}}" id="netto-length" >
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Bruto</label>
                                            <input type="text" class="form-control mr-3" placeholder="L" name="bruto_width" value="{{$data->bruto_width}}" id="bruto-width" >
                                            <input type="text" class="form-control" placeholder="P" name="bruto_length" value="{{$data->bruto_length}}" id="bruto-length" >
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Qty Sheet</label>
                                            <input type="number" class="form-control" name="sheet_quantity" value="{{$data->sheet_quantity}}" id="sheet-quantity" >
                                        </div>
                                    </div>
                                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                        <a href="{{route('production.spk.print', ['id' => $data->id])}}" target="_blank" class="btn py-3 btn-primary w-full md:w-52">Preview SPK</a>
                                        <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Update SPK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </form>
        @endif

        @if($data->type == 'BB')
        <form  method="POST" action="{{route('production.spk.update')}}" class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5">
            @csrf
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">NO. SPK : {{$data->spk_no}}</div>
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" id="calculate"> <i data-lucide="calculator" class="w-4 h-4 mr-2"></i> Hitung Otomatis </a>
                </div>
                <div class="md:col-span-6 sm:col-span-12">
                    <div class="overflow-y-auto max-h-screen">
                        <div class="grid grid-cols-12">
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <table style="border-collapse: collapse;">
                                        <tr>
                                            <td width="70px" style="text-align: center;">

                                            </td>
                                            <td width="70px" style="text-align: center;">

                                            </td>
                                            <td width="120px" style="text-align: center;">
                                                JP: {{$data->netto_length}}
                                            </td>
                                            <td width="70px" style="text-align: center;padding: 8px">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="50px" height="50px" style="text-align: center;">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                {{$data->height}}
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                {{$data->length}}
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                {{$data->height}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="70px" style="padding: 5px;">
                                                JL: {{$data->netto_width}}
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px; height: 20px;">
                                                {{$data->width}}
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px;">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px;">
                                                {{$data->width}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="50px" style="text-align: center;">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                {{$data->height}}
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                {{$data->length}}
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                {{$data->height}}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Stitching</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio"
                                                        name="flag_stitching" value="0"
                                                        <?php echo ($data->flag_stitching == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_stitching" value="1"
                                                        <?php echo ($data->flag_stitching == 1) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Lem</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio"
                                                        name="flag_glue" value="0"
                                                        <?php echo ($data->flag_glue == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_glue" value="1"
                                                        <?php echo ($data->flag_glue == 1) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Pounch</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio"
                                                        name="flag_pounch" value="0"
                                                        <?php echo ($data->flag_pounch == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_pounch" value="1"
                                                        <?php echo ($data->flag_pounch == 1) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 mt-5">
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Qty SPK</label>
                                            <input type="number" class="form-control" name="quantity" id="tr-spk-qty" value="{{$data->quantity}}">
                                            <input type="hidden" class="form-control" name="id" value="{{$data->spk_id}}">
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Ukuran</label>
                                            <input type="text" class="form-control mr-3" placeholder="P" id="length" name="length" value="{{$data->length}}">
                                            <input type="text" class="form-control mr-3" placeholder="L" id="width" name="width" value="{{$data->width}}">
                                            <input type="text" class="form-control" placeholder="T" id="height" name="height" value="{{$data->height}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Netto</label>
                                            <input type="text" class="form-control mr-3" placeholder="L" name="netto_width" value="{{$data->netto_width}}" id="netto-width">
                                            <input type="text" class="form-control" placeholder="P" name="netto_length" value="{{$data->netto_length}}" id="netto-length">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Bruto</label>
                                            <input type="text" class="form-control mr-3" placeholder="L" name="bruto_width" value="{{$data->bruto_width}}" id="bruto-width">
                                            <input type="text" class="form-control" placeholder="P" name="bruto_length" value="{{$data->bruto_length}}" id="bruto-length">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Qty Sheet</label>
                                            <input type="number" class="form-control" name="sheet_quantity" value="{{$data->sheet_quantity}}" id="sheet-quantity">
                                        </div>
                                    </div>
                                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                        <a href="{{route('production.spk.print', ['id' => $data->id])}}" target="_blank" class="btn py-3 btn-primary w-full md:w-52">Preview SPK</a>
                                        <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Update SPK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endif

        @if($data->type == 'ROLL')
        <form method="POST" action="{{route('production.spk.update')}}" class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5">
            @csrf
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">NO. SPK : {{$data->spk_no}}</div>
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" id="calculate"> <i data-lucide="calculator" class="w-4 h-4 mr-2"></i> Hitung Otomatis </a>
                </div>
                <div class="md:col-span-12 sm:col-span-12">
                    <div class="overflow-y-auto max-h-screen">
                        <div class="grid grid-cols-12 mt-5">
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <table style="width:70%;border-collapse: collapse; margin-right: 5px;margin-right: 100px;">
                                        <tr>
                                            <td width="50px" style="text-align: center;">

                                            </td>
                                            <td style="text-align: center;">

                                            </td>
                                            <td width="60px" style="text-align: center;" id="sheet-l-l">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="80px" style="text-align: center;">

                                            </td>
                                            <td style="border-top: 1px solid black;border-left: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="border-top: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="border-top: 1px solid black;border-right: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="70px" style="padding: 5px;">
                                                <strong>JL: {{$data->width}}</strong>
                                            </td>
                                            <td style="border-left: 1px solid black;text-align: center; padding:17px; height: 20px;">

                                            </td>
                                            <td style="text-align: center; padding:17px;">

                                            </td>
                                            <td style="border-right: 1px solid black;text-align: center; padding:17px;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">

                                            </td>
                                            <td style="border-bottom: 1px solid black;border-left: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="border-bottom: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="border-bottom: 1px solid black;border-right: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Stitching</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio"
                                                        name="flag_stitching" value="0"
                                                        <?php echo ($data->flag_stitching == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_stitching" value="1"
                                                        <?php echo ($data->flag_stitching == 1) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Lem</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio"
                                                        name="flag_glue" value="0"
                                                        <?php echo ($data->flag_glue == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_glue" value="1"
                                                        <?php echo ($data->flag_glue == 1) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Pounch</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio"
                                                        name="flag_pounch" value="0"
                                                        <?php echo ($data->flag_pounch == 0) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio"
                                                        name="flag_pounch" value="1"
                                                        <?php echo ($data->flag_pounch == 1) ? "checked" : ""; ?>>
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 mt-5">
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Qty SPK</label>
                                            <input type="number" class="form-control" name="quantity" value="{{$data->quantity}}">
                                            <input type="hidden" class="form-control" name="id" value="{{$data->spk_id}}">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Ukuran</label>
                                            <input type="text" class="form-control" placeholder="L" name="width" id="width" value="{{$data->width}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Netto</label>
                                            <input type="text" class="form-control mr-3" placeholder="L" name="netto_width" value="{{$data->netto_width}}" id="netto-width" readonly>
                                            <input type="text" class="form-control" placeholder="P" name="netto_length" value="{{$data->netto_length}}" id="netto-length" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Bruto</label>
                                            <input type="text" class="form-control mr-3" placeholder="L" name="bruto_width" value="{{$data->bruto_width}}" id="bruto-width" readonly>
                                            <input type="text" class="form-control" placeholder="P" name="bruto_length" value="{{$data->bruto_length}}" id="bruto-length" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Qty Sheet</label>
                                            <input type="number" class="form-control" name="sheet_quantity" value="{{$data->sheet_quantity}}" id="sheet-quantity" readonly>
                                        </div>
                                    </div>
                                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                        <a href="{{route('production.spk.print', ['id' => $data->id])}}" target="_blank" class="btn py-3 btn-primary w-full md:w-52">Preview SPK</a>
                                        <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Update SPK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endif
    </div>
</div>
@endsection

@section('script')
<script>
$(function() {
    $(".loader").hide();
    $("#collapse-form-production-process").hide();

    $("#add-production-process").click(function() {
        $("#collapse-form-production-process").slideToggle("slow");
    });

    var goods_type = $("#goods-type").val();
    var sheet_layout = $("#sheet-form");
    var box_layout = $("#box-form");
    var bottom_top_layout = $("#bottom-top-form");

    if (goods_type === 1 || goods_type === "1") {
        box_layout.hide();
        bottom_top_layout.hide()
    } else if (goods_type === 2 || goods_type === "2") {
        sheet_layout.hide();
        bottom_top_layout.hide();
    } else {
        box_layout.hide();
        sheet_layout.hide();
    }

    $("#flag-join").change(function() {
        var flag_join_form = $(".flag-join-form");

        if ($(this).val() === 1 || $(this).val() === "1") {
            flag_join_form.hide();
        } else {
            flag_join_form.show();
        }
    });

    function roundToNearestMultipleOf5(number) {
        return 5 * Math.round(number / 5);
    }

    function roundToNearestMultipleOf50(number) {
        return 50 * Math.ceil(number / 50);
    }

    // Control Box
    $("#l2").on("keyup", function() {
        $("#l-l2").text($(this).val())
    });

    $("#p1").on("keyup", function() {
        $("#l-p1").text($(this).val())
    });

    $("#l1").on("keyup", function() {
        $("#l-l1").text($(this).val())
    });

    $("#t").on("keyup", function() {
        $("#l-t").text($(this).val())
    });

    $("#p2").on("keyup", function() {
        $("#l-p2").text($(this).val())
    });

    $("#plape").on("keyup", function() {
        $("#l-plape-1").text($(this).val())
        $("#l-plape-2").text($(this).val())
    });

    $("#k").on("keyup", function() {
        $("#l-k").text($(this).val())
    });

    // control Sheet

    $("#sheet-f-w").on("keyup", function() {
        $("#sheet-l-w").text($(this).val())
    });

    $("#sheet-f-l").on("keyup", function() {
        $("#sheet-l-l").text($(this).val())
    });

    $("#tr-spk-qty").on("keyup", function() {
        $("#spk-qty").val($(this).val())
    });

    $("#flag-join").on("change", function() {
        console.log($(this).val());
        $("#fjoin").val($(this).val());
    });
});
</script>
@endsection
