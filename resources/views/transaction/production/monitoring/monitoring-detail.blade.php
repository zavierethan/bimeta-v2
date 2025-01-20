@extends('layouts._base')
@section('css')
<style>
.layout-box-p {
    width: 200px;
    height: 100px;
    border: 1px solid #ccc;
    padding: 20px;
    font-size: 12px;
}

.layout-box-p-2 {
    width: 130px;
    height: 100px;
    border: 1px solid #ccc;
    padding: 20px;
    font-size: 12px;
}

.layout-box-l {
    width: 100px;
    height: 100px;
    border: 1px solid #ccc;
    padding: 20px;
    font-size: 12px;
}

.layout-box-t {
    width: 70px;
    height: 100px;
    border: 1px solid #ccc;
    border-right-style: dotted;
    padding: 20px;
    font-size: 12px;
}

.layout-box-k {
    width: 70px;
    height: 100px;
    border: 1px solid #ccc;
    padding: 20px;
    font-size: 12px;
}

.layout-box-row-plep {
    width: 200px;
    height: 50px;
    border: 1px solid #ccc;
    padding: 20px;
    font-size: 12px;
}

.mandatory-sign {
    color: red;
}

.text-danger {
    color: red;
    font-size: 12px;
}
</style>
@endsection
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Production</li>
<li class="breadcrumb-item active" aria-current="page">Monitoring</li>
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
                                <input type="text" class="form-control" value="{{$data->type}}" readonly>
                                <input type="hidden" class="form-control" value="{{$data->type}}" id="goods-type">
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="sm:w-32 font-bold">Spesifikasi</label>
                                <input type="text" class="form-control" value="{{$data->specification}}" readonly>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="sm:w-32 font-bold">Ukuran</label>
                                <input type="text" class="form-control" value="{{$data->measure}}" readonly>
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
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>Proses</th>
                                <th class="text-center">Hasil</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($productionProcessesItem as $process)
                            <tr data-id="{{$process->id}}">
                                <td><?php echo $no++; ?></td>
                                <td>{{$process->process_name}}</td>
                                <td class="text-center">{{$process->total_progress_amount}}</td>
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
                                        <a class="flex items-center text-success edit-detail-progres" href="javascript:;" data-tw-toggle="modal" data-tw-target="#edit-detail-progres-form"> <i data-lucide="edit" class="w-4 h-4 mr-1"></i> Edit </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div id="edit-detail-progres-form" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-body">
                                <!-- BEGIN: Horizontal Form -->
                                <div class="intro-y box">
                                    <div
                                        class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                        <h2 class="font-medium text-base mr-auto">
                                            Edit Proses Produksi
                                        </h2>
                                    </div>
                                    <div id="horizontal-form" class="p-5">
                                        <form method="POST" action="{{route('production.spk.monitoring.production-progress.update')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="preview">
                                                <div class="form-inline">
                                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Nama Proses</label>
                                                    <input type="text" class="form-control process-name" name="process_name" readonly>
                                                    <input type="hidden" class="form-control id" name="id" readonly>
                                                    <input type="hidden" class="form-control spk-id" name="spk_id" readonly>
                                                    <input type="hidden" class="form-control process-id" name="process_id" readonly>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Status</label>
                                                    <select data-placeholder="Pilih Status" class="tom-select w-full form-control status" name="status">
                                                        <option value="1">INIT</option>
                                                        <option value="2">WORK IN PROGRESS</option>
                                                        <option value="3">COMPLETED</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                                <button type="button" data-tw-dismiss="modal" class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                                <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Update</button>
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
        @if($data->type == 'A')
        <form method="POST" action="{{route('production.spk.save')}}"
            class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5">
            @csrf
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">NO. SPK : {{$data->spk_no}}</div>
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
                                            <input type="number" class="form-control" name="spk_qty" id="tr-spk-qty" value="{{$data->quantity}}" readonly>
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Ukuran</label>
                                            <input type="text" class="form-control mr-3" placeholder="P" id="length" value="{{$data->length}}" readonly>
                                            <input type="text" class="form-control mr-3" placeholder="L" id="width" value="{{$data->width}}" readonly>
                                            <input type="text" class="form-control" placeholder="T" id="height" value="{{$data->height}}" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">L2</label>
                                            <input type="number" class="form-control" name="l2" value="{{$data->l2}}" id="l2" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">P1</label>
                                            <input type="number" class="form-control" name="p1" value="{{$data->p1}}" id="p1" readonly>
                                        </div>

                                        <!-- hjfhsjf -->
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">L1</label>
                                            <input type="number" class="form-control" name="l1" value="{{$data->l1}}" id="l1" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">T</label>
                                            <input type="number" class="form-control" name="t" value="{{$data->t}}" id="t" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">P2</label>
                                            <input type="number" class="form-control" name="p2" value="{{$data->p2}}" id="p2" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">PLAPE</label>
                                            <input type="number" class="form-control" name="plape" value="{{$data->plape}}" id="plape" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">K</label>
                                            <input type="number" class="form-control" name="k" value="{{$data->k}}" id="k"  readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Netto</label>
                                            <input type="text" class="form-control col-span-6 mr-3" placeholder="L" name="netto_width" value="{{$data->netto_width}}" id="netto-width" readonly>
                                            <input type="text" class="form-control col-span-6" placeholder="P" name="netto_length" value="{{$data->netto_length}}" id="netto-length" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Bruto</label>
                                            <input type="text" class="form-control col-span-6 mr-3" placeholder="L" name="bruto_width" value="{{$data->bruto_width}}" id="bruto-width" readonly>
                                            <input type="text" class="form-control col-span-6" placeholder="P" name="bruto_length" value="{{$data->bruto_length}}" id="bruto-length" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Qty Sheet</label>
                                            <input type="number" class="form-control" name="sheet_quantity" value="{{$data->sheet_quantity}}" id="sheet-quantity" readonly>
                                        </div>
                                    </div>
                                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                        <a href="{{route('production.spk.print', ['id' => $data->id])}}" target="_blank" class="btn py-3 btn-primary w-full md:w-52">Preview SPK</a>
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
        <form method="POST" action="{{route('production.spk.save')}}" class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5">
            @csrf
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">NO. SPK : {{$data->spk_no}}</div>
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
                                            <input type="number" class="form-control" name="spk_qty" id="tr-spk-qty" value="{{$data->quantity}}" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Ukuran</label>
                                            <input type="text" class="form-control mr-3" placeholder="L" id="width" value="{{$data->width}}" readonly>
                                            <input type="text" class="form-control" placeholder="P" id="length" value="{{$data->length}}" readonly>
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
        <form  method="POST" action="{{route('production.spk.save')}}" class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5">
            @csrf
            @if($data->spk_type == "A")
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">NO. SPK : {{$data->spk_no}}</div>
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
                                            <input type="number" class="form-control"name="bottom_spk_quantity" id="tr-spk-qty" value="{{$data->quantity}}"  readonly>
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Ukuran</label>
                                            <input type="text" class="form-control mr-3" placeholder="P" id="length" name="bottom_length" value="{{$data->length}}" readonly>
                                            <input type="text" class="form-control mr-3" placeholder="L" id="width" name="bottom_width" value="{{$data->width}}" readonly>
                                            <input type="text" class="form-control" placeholder="T" id="height" name="bottom_height" value="{{$data->height}}" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">L2</label>
                                            <input type="number" class="form-control" name="bottom_l2" value="{{$data->l2}}" id="l2" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">P1</label>
                                            <input type="number" class="form-control" name="bottom_p1" value="{{$data->p1}}" id="p1" readonly>
                                        </div>

                                        <!-- hjfhsjf -->
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">L1</label>
                                            <input type="number" class="form-control" name="bottom_l1" value="{{$data->l1}}" id="l1" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">T</label>
                                            <input type="number" class="form-control" name="bottom_t" value="{{$data->t}}" id="t" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">P2</label>
                                            <input type="number" class="form-control" name="bottom_p2" value="{{$data->p2}}" id="p2" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">PLAPE</label>
                                            <input type="number" class="form-control" name="bottom_plape" value="{{$data->plape}}" id="plape" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">K</label>
                                            <input type="number" class="form-control" name="bottom_k" value="{{$data->k}}" id="k" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
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
                                            <input type="number" class="form-control" name="bottom_sheet_quantity" value="{{$data->sheet_quantity}}" id="sheet-quantity" readonly>
                                        </div>
                                    </div>
                                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                        <a href="{{route('production.spk.print', ['id' => $data->id])}}" target="_blank" class="btn py-3 btn-primary w-full md:w-52">Preview SPK</a>
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
                </div>
                <div class="md:col-span-6 sm:col-span-12">
                    <div class="overflow-y-auto max-h-screen">
                        <div class="grid grid-cols-12">
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <table style="width:60%;border-collapse: collapse; margin-right: 5px;margin-right: 100px;">
                                        <tr>
                                            <td width="50px" style="text-align: center;">

                                            </td>
                                            <td style="text-align: center;">

                                            </td>
                                            <td width="60px" style="text-align: center;" id="sheet-l-l">
                                                JP: {{$data->netto_width}}
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
                                                JL: {{$data->netto_length}}
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
                                            <input type="number" class="form-control" name="quantity" id="tr-spk-qty"  value="{{$data->quantity}}" readonly>
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Ukuran</label>
                                            <input type="text" class="form-control mr-3" placeholder="P" id="length" name="length"  value="{{$data->length}}" readonly>
                                            <input type="text" class="form-control" placeholder="L" id="width" name="width"  value="{{$data->width}}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
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
                                            <input type="number" class="form-control" name="top_sheet_quantity" value="{{$data->sheet_quantity}}" id="sheet-quantity" readonly>
                                        </div>
                                    </div>
                                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                        <a href="{{route('production.spk.print', ['id' => $data->id])}}" target="_blank" class="btn py-3 btn-primary w-full md:w-52">Preview SPK</a>
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
        <form  method="POST" action="{{route('production.spk.save')}}" class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5">
            @csrf
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">NO. SPK : {{$data->spk_no}}</div>
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
                                            <input type="number" class="form-control" name="spk_quantity" id="tr-spk-qty" value="{{$data->quantity}}" readonly>
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Ukuran</label>
                                            <input type="text" class="form-control mr-3" placeholder="P" id="length" name="length" value="{{$data->length}}" readonly>
                                            <input type="text" class="form-control mr-3" placeholder="L" id="width" name="width" value="{{$data->width}}" readonly>
                                            <input type="text" class="form-control" placeholder="T" id="height" name="height" value="{{$data->height}}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
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
                                            <input type="number" class="form-control" name="bottom_sheet_quantity" value="{{$data->sheet_quantity}}" id="sheet-quantity" readonly>
                                        </div>
                                    </div>
                                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                        <a href="{{route('production.spk.print', ['id' => $data->id])}}" target="_blank" class="btn py-3 btn-primary w-full md:w-52">Preview SPK</a>
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
                                            <input type="number" class="form-control" name="quantity" value="{{$data->quantity}}" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Ukuran</label>
                                            <input type="text" class="form-control" placeholder="L" name="width" id="width" value="{{$data->width}}" readonly>
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
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
<script>
$(function() {

    $(".edit-detail-progres").click(function() {
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
            url: '{{route("production.spk.monitoring.production-progress-edit")}}', // Specify the URL of your server endpoint
            type: 'POST', // or 'POST' depending on your server setup
            dataType: 'json', // Assuming the response will be
            data: { id: id },
            success: function(response) {

                // Assuming response.data is an array of SPK objects
                var data = response.data;

                console.log(data)

                $("#edit-detail-progres-form .id").val(data.id);
                var status = $("#edit-detail-progres-form .status")[0].tomselect;
                status.setValue(data.status);

                $("#edit-detail-progres-form .process-name").val(data.process_name);
                $("#edit-detail-progres-form .id").val(data.id);
                $("#edit-detail-progres-form .spk-id").val(data.spk_id);
                $("#edit-detail-progres-form .process-id").val(data.process_id);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    }
});
</script>
@endsection
