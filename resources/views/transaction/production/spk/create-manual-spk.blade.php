@extends('layouts._base')
@section('css')
<style>
.select-box {
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
                        Spesifikasi Bahan
                    </h2>
                    <div class="flex justify-end flex-col md:flex-row gap-2">
                        <a href="#" class="btn py-3 btn-primary w-full" id="add-from-template">Tambah Dari Template</a>
                        <a href="#" class="btn py-3 btn-primary w-full" id="add-form-layout">Tambah</a>
                    </div>
                </div>
                <div id="horizontal-form" class="p-5">
                    <div class="preview">
                        <div class="form-inline">
                            <label for="vertical-form-1" class="sm:w-32 font-bold">Nama Barang</label>
                            <input type="text" class="form-control" value="{{$goodsInformations->name}}" readonly>
                            <input type="hidden" class="form-control" value="{{$goodsInformations->id}}" id="goods-id"
                                readonly>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="vertical-form-1" class="sm:w-32 font-bold">Jenis</label>
                            <input type="text" class="form-control" value="{{$goodsInformations->type}}" id="goods-type"
                                readonly>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="vertical-form-1" class="sm:w-32 font-bold">Spesifikasi</label>
                            <input type="text" class="form-control" value="{{$goodsInformations->spec_str}}"
                                id="goods-type" readonly>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="vertical-form-1" class="sm:w-32 font-bold">Ukuran</label>
                            <input type="text" class="form-control" value="{{$goodsInformations->meas_str}}"
                                id="goods-type" readonly>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="vertical-form-1" class="sm:w-32 font-bold">Qty Pesanan</label>
                            <input type="text" class="form-control" id="order-quantity" value="{{$goodsInformations->quantity}}" readonly>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="vertical-form-1" class="sm:w-46 font-bold mr-3">Simpan Template ?</label>
                            <input class="form-check-input is-save-as-template" type="checkbox" name="is_save_as_template" id="is-save-as-template" checked>
                        </div>
                        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                            <a href="#" class="btn py-3 btn-primary w-full md:w-40" id="btn-generate-spk">Generate
                                SPK</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8" id="form-layout-container">

        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
    var layoutId = 0;

    var sheetLayoutHtml = `<div class="p-5 layout-item">
                                    <table style="width:60%;border-collapse: collapse;margin-right: 100px;">
                                        <tr>
                                            <td width="50px" style="text-align: center;">

                                            </td>
                                            <td style="text-align: center;">

                                            </td>
                                            <td width="60px" style="text-align: center;" id="jp">
                                                <input type="text" class="form-control jp" name="jp" style="text-align: center; width: 70px;" placeholder="JP">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="80px" style="text-align: center;">

                                            </td>
                                            <td
                                                style="border-top: 1px solid black;border-left: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td
                                                style="border-top: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td
                                                style="border-top: 1px solid black;border-right: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="70px" style="padding: 5px;" id="jl">
                                                <input type="text" class="form-control jl" name="jl" style="text-align: center" placeholder="JL">
                                            </td>
                                            <td
                                                style="border-left: 1px solid black;text-align: center; padding:17px; height: 20px;">

                                            </td>
                                            <td style="text-align: center; padding:17px;">

                                            </td>
                                            <td
                                                style="border-right: 1px solid black;text-align: center; padding:17px;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">

                                            </td>
                                            <td
                                                style="border-bottom: 1px solid black;border-left: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td
                                                style="border-bottom: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td
                                                style="border-bottom: 1px solid black;border-right: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                        </tr>
                                    </table>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-40 font-bold">Tampilkan Layout ?</label>
                                        <input class="form-check-input show-layout" type="checkbox" name="show_layout" value="0">
                                    </div>
                                </div>`;

    var boxLayoutHtml = `<div class="p-3 layout-item">
                                    <table style="border-collapse: collapse;">
                                        <tr>
                                            <td width="70px" style="text-align: center;padding: 10px;">

                                            </td>
                                            <td width="70px" colspan="6" style="text-align: center;padding: 10px;">
                                                <input type="text" class="form-control jp" name="jp" style="text-align: center; width: 70px;" placeholder="JP">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="50px" height="50px" style="text-align: center;">

                                            </td>
                                            <td width="80px" style="border: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td width="120px" style="border: 1px solid black;text-align: center; padding:10px;"

                                            </td>
                                            <td width="80px" style="border: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td width="90px" style="border: 1px solid black;text-align: center; padding:10px;">
                                                <input type="text" class="form-control plape-1" name="plape_1" style="text-align: center" placeholder="PLAPE">
                                            </td>
                                            <td width="120px" style="border: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="text-align: center; padding:10px;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px;">
                                                <input type="text" class="form-control jl" name="jl" style="text-align: center" placeholder="JL">
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px; height: 20px;" class="form-inp-non-join">
                                                <input type="text" class="form-control l2" name="l2" style="text-align: center" placeholder="L2">
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;" class="form-inp-non-join">
                                                <input type="text" class="form-control p1" name="p1" style="text-align: center" placeholder="P1">
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                <input type="text" class="form-control l1" name="l1" style="text-align: center" placeholder="L1">
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                <input type="text" class="form-control t" name="t" style="text-align: center" placeholder="T">
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                <input type="text" class="form-control p2" name="p2" style="text-align: center" placeholder="P2">
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;width: 80px;">
                                                <input type="text" class="form-control k" name="k" style="text-align: center" placeholder="K">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="50px" style="text-align: center;">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;" class="form-inp-non-join">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;" class="form-inp-non-join">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                <input type="text" class="form-control plape-2" name="plape_2" style="text-align: center" placeholder="PLAPE">
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="text-align: center; padding:10px;">

                                            </td>
                                        </tr>
                                    </table>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-40 font-bold">Tampilkan Layout ?</label>
                                        <input class="form-check-input show-layout" type="checkbox" name="show_layout" value="1">
                                    </div>
                                </div>`;

    $("#add-form-layout").on("click", function() {
        layoutId++;

        $('#is-save-as-template').prop('disabled', false);
        $('#is-save-as-template').prop('checked', true);

        var html = `<form class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5 spk-form">
                <div class="box p-5 rounded-md">
                    <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                        <div class="font-medium text-base truncate">
                            <div class="form-inline">
                                <label for="vertical-form-1" class="sm:w-20 font-bold">Tipe SPK</label>
                                <select data-placeholder="Pilih SPK" class="spk-select select-box form-control spk-type">
                                    <option value=" ">-</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="ROLL">ROLL</option>
                                </select>
                            </div>
                        </div>
                        <div class="font-medium text-base truncate pl-5">
                            <div class="form-inline">
                                <label for="vertical-form-1" class="sm:w-32 font-bold">Jenis Layout</label>
                                <select data-placeholder="Pilih SPK" class="spk-select select-box form-control layout-type">
                                    <option value=" ">-</option>
                                    <option value="BOX">BOX</option>
                                    <option value="SHEET">SHEET</option>
                                    <option value="ROLL">ROLL</option>
                                </select>
                            </div>
                        </div>
                        <a href="#" class="btn py-3 btn-danger flex items-center ml-auto delete-form">Hapus</a>
                    </div>
                    <div class="md:col-span-12 sm:col-span-12">
                        <div class="overflow-y-auto max-h-screen">
                            <div class="grid grid-cols-12">
                                <div class="col-span-7 layout-container">

                                </div>
                                <div class="col-span-5">
                                    <div id="horizontal-form" class="p-5 mt-3">
                                        <div class="preview mt-10">
                                            <div class="form-inline">
                                                <label for="vertical-form-1" class="sm:w-20 font-bold">Stitching</label>
                                                <div class="flex flex-col sm:flex-row">
                                                    <div class="form-check mr-2">
                                                        <input id="radio-switch-4" class="form-check-input" type="radio" name="flag_stitching_${layoutId}" value="0" checked>
                                                        <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                    </div>
                                                    <div class="form-check mr-2 sm:mt-0">
                                                        <input id="radio-switch-5" class="form-check-input" type="radio" name="flag_stitching_${layoutId}" value="1">
                                                        <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-20 font-bold">Lem</label>
                                                <div class="flex flex-col sm:flex-row">
                                                    <div class="form-check mr-2">
                                                        <input id="radio-switch-4" class="form-check-input" type="radio" name="flag_glue_${layoutId}" value="0" checked>
                                                        <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                    </div>
                                                    <div class="form-check mr-2 sm:mt-0">
                                                        <input id="radio-switch-5" class="form-check-input" type="radio" name="flag_glue_${layoutId}" value="1">
                                                        <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-20 font-bold">Pounch</label>
                                                <div class="flex flex-col sm:flex-row">
                                                    <div class="form-check mr-2">
                                                        <input id="radio-switch-4" class="form-check-input" type="radio" name="flag_pounch_${layoutId}" value="0" checked>
                                                        <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                    </div>
                                                    <div class="form-check mr-2 sm:mt-0">
                                                        <input id="radio-switch-5" class="form-check-input" type="radio" name="flag_pounch_${layoutId}" value="1">
                                                        <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 mt-5">
                                <div class="col-span-6">
                                    <div id="horizontal-form" class="p-5">
                                        <div class="preview">
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-20 font-bold">Spesifikasi</label>
                                                <input type="text" class="form-control specification" value="" name="specification">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-20 font-bold">Jenis Flute</label>
                                                <select data-placeholder="Pilih Tipe Flute" class="spk-select select-box form-control flute-type" name="flute_type" id="flute-type">
                                                    <option value=" ">-</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="B/C">B/C</option>
                                                </select>
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-20 font-bold">Qty SPK</label>
                                                <input type="text" class="form-control spk-quantity" name="spk_quantity">
                                                <input type="hidden" class="form-control detail-sales-order-id" name="detail_sales_order_id" value="{{$goodsInformations->detail_sales_order_id}}">
                                            </div>
                                            <div class="form-inline mt-5 ">
                                                <label for="vertical-form-1" class="sm:w-20 font-bold">Ukuran</label>
                                                <input type="number" class="form-control mr-3 length" placeholder="P" name="length">
                                                <input type="number" class="form-control mr-3 width" placeholder="L" name="width">
                                                <input type="number" class="form-control height" placeholder="T" name="height">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-6">
                                    <div id="horizontal-form" class="p-5">
                                        <div class="preview">
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-20 font-bold">Netto</label>
                                                <input type="text" class="form-control mr-3 netto-width" placeholder="L" name="netto_width">
                                                <input type="text" class="form-control netto-length" placeholder="P" name="netto_length">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-20 font-bold">Bruto</label>
                                                <input type="text" class="form-control mr-3 bruto-width" placeholder="L" name="bruto_width">
                                                <input type="text" class="form-control bruto-length" placeholder="P" name="bruto_length" >
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-20 font-bold">Sup Bruto</label>
                                                <input type="number" class="form-control mr-3 sup-bruto-width" placeholder="L" name="sup_bruto_width" value="">
                                                <input type="number" class="form-control sup-bruto-length" placeholder="P" name="sup_bruto_length" value="">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-20 font-bold">Qty Sheet</label>
                                                <input type="text" class="form-control sheet-quantity" name="sheet_quantity">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>`;

        $("#form-layout-container").append(html);
    });

    $("#add-from-template").on("click", function() {

        let goodsId = $("#goods-id").val();

        $('#is-save-as-template').prop('checked', false);
        $('#is-save-as-template').prop('disabled', true);

        $.ajax({
            url: `{{route('production.spk.populate.from.template')}}`,
            type: 'GET',
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                param: goodsId
            },
            success: function(response) {
                if (response.data && response.data.length > 0) {
                    // Iterate through the data array
                    let content = "";
                    let counter = 1;
                    $.each(response.data, function(index, item) {

                        var sheetLayoutHtml = `<div class="p-5 layout-item">
                                    <table style="width:60%;border-collapse: collapse;margin-right: 100px;">
                                        <tr>
                                            <td width="50px" style="text-align: center;">

                                            </td>
                                            <td style="text-align: center;">

                                            </td>
                                            <td width="60px" style="text-align: center;" id="jp">
                                                <input type="text" class="form-control jp" name="jp" style="text-align: center; width: 70px;" placeholder="JP" value="${item.jp}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="80px" style="text-align: center;">

                                            </td>
                                            <td
                                                style="border-top: 1px solid black;border-left: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td
                                                style="border-top: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td
                                                style="border-top: 1px solid black;border-right: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="70px" style="padding: 5px;" id="jl">
                                                <input type="text" class="form-control jl" name="jl" style="text-align: center" placeholder="JL" value="${item.jl}">
                                            </td>
                                            <td
                                                style="border-left: 1px solid black;text-align: center; padding:17px; height: 20px;">

                                            </td>
                                            <td style="text-align: center; padding:17px;">

                                            </td>
                                            <td
                                                style="border-right: 1px solid black;text-align: center; padding:17px;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">

                                            </td>
                                            <td
                                                style="border-bottom: 1px solid black;border-left: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td
                                                style="border-bottom: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td
                                                style="border-bottom: 1px solid black;border-right: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                        </tr>
                                    </table>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-40 font-bold">Tampilkan Layout ?</label>
                                        <input class="form-check-input show-layout" type="checkbox" name="show_layout" checked>
                                    </div>
                                </div>`;

                        var boxLayoutHtml = `<div class="p-3 layout-item">
                                    <table style="border-collapse: collapse;">
                                        <tr>
                                            <td width="70px" style="text-align: center;padding: 10px;">

                                            </td>
                                            <td width="70px" colspan="6" style="text-align: center;padding: 10px;">
                                                <input type="text" class="form-control jp" name="jp" style="text-align: center; width: 70px;" placeholder="JP" value="${item.jp}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="50px" height="50px" style="text-align: center;">

                                            </td>
                                            <td width="80px" style="border: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td width="120px" style="border: 1px solid black;text-align: center; padding:10px;"

                                            </td>
                                            <td width="80px" style="border: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td width="90px" style="border: 1px solid black;text-align: center; padding:10px;">
                                                <input type="text" class="form-control plape-1" name="plape_1" style="text-align: center" placeholder="PLAPE" value="${item.plape_1}">
                                            </td>
                                            <td width="120px" style="border: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="text-align: center; padding:10px;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px;">
                                                <input type="text" class="form-control jl" name="jl" style="text-align: center" placeholder="JL" value="${item.jl}">
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px; height: 20px;" class="form-inp-non-join">
                                                <input type="text" class="form-control l2" name="l2" style="text-align: center" placeholder="L2" value="${item.l2}">
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;" class="form-inp-non-join">
                                                <input type="text" class="form-control p1" name="p1" style="text-align: center" placeholder="P1" value="${item.p1}">
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                <input type="text" class="form-control l1" name="l1" style="text-align: center" placeholder="L1" value="${item.l1}">
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                <input type="text" class="form-control t" name="t" style="text-align: center" placeholder="T" value="${item.t}">
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                <input type="text" class="form-control p2" name="p2" style="text-align: center" placeholder="P2" value="${item.p2}">
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;width: 80px;">
                                                <input type="text" class="form-control k" name="k" style="text-align: center" placeholder="K" value="${item.k}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="50px" style="text-align: center;">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;" class="form-inp-non-join">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;" class="form-inp-non-join">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                <input type="text" class="form-control plape-2" name="plape_2" style="text-align: center" placeholder="PLAPE" value="${item.plape_2}">
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="text-align: center; padding:10px;">

                                            </td>
                                        </tr>
                                    </table>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-40 font-bold">Tampilkan Layout ?</label>
                                        <input class="form-check-input show-layout" type="checkbox" name="show_layout" checked>
                                    </div>
                                </div>`;

                        if(item.layout_type === 'BOX' ) {
                            content = boxLayoutHtml;
                        }

                        if (item.layout_type === 'SHEET') {
                            content = sheetLayoutHtml;
                        }

                        // Populate your UI with the data
                        let html = `<form class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5 spk-form">
                                <div class="box p-5 rounded-md">
                                    <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                                        <div class="font-medium text-base truncate">
                                            <div class="form-inline">
                                                <label for="vertical-form-1" class="sm:w-20 font-bold">Tipe SPK</label>
                                                <select data-placeholder="Pilih SPK" class="spk-select select-box form-control spk-type">
                                                    <option value=" ">-</option>
                                                    <option value="A" ${(item.spk_type === 'A') ? 'selected' : ''}>A</option>
                                                    <option value="B" ${(item.spk_type === 'B') ? 'selected' : ''}>B</option>
                                                    <option value="ROLL" ${(item.spk_type === 'ROLL') ? 'selected' : ''}>ROLL</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="font-medium text-base truncate pl-5">
                                            <div class="form-inline">
                                                <label for="vertical-form-1" class="sm:w-32 font-bold">Jenis Layout</label>
                                                <select data-placeholder="Pilih SPK" class="spk-select select-box form-control layout-type">
                                                    <option value=" ">-</option>
                                                    <option value="BOX" ${(item.layout_type === 'BOX') ? 'selected' : ''}>BOX</option>
                                                    <option value="SHEET" ${(item.layout_type === 'SHEET') ? 'selected' : ''}>SHEET</option>
                                                    <option value="ROLL" ${(item.layout_type === 'ROLL') ? 'selected' : ''}>ROLL</option>
                                                </select>
                                            </div>
                                        </div>
                                        <a href="#" class="btn py-3 btn-danger flex items-center ml-auto delete-form">Hapus</a>
                                    </div>
                                    <div class="md:col-span-12 sm:col-span-12">
                                        <div class="overflow-y-auto max-h-screen">
                                            <div class="grid grid-cols-12">
                                                <div class="col-span-7 layout-container">
                                                    ${content}
                                                </div>
                                                <div class="col-span-5">
                                                    <div id="horizontal-form" class="p-5 mt-3">
                                                        <div class="preview mt-10">
                                                            <div class="form-inline">
                                                                <label for="vertical-form-1" class="sm:w-20 font-bold">Stitching</label>
                                                                <div class="flex flex-col sm:flex-row">
                                                                    <div class="form-check mr-2">
                                                                        <input id="radio-switch-4" class="form-check-input" type="radio" name="flag_stitching_${counter}" value="0" ${(item.flag_stitching === 0) ? 'checked' : ''}>
                                                                        <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                                    </div>
                                                                    <div class="form-check mr-2 sm:mt-0">
                                                                        <input id="radio-switch-5" class="form-check-input" type="radio" name="flag_stitching_${counter}" value="1" ${(item.flag_stitching === 1) ? 'checked' : ''}>
                                                                        <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-inline mt-5">
                                                                <label for="vertical-form-1" class="sm:w-20 font-bold">Lem</label>
                                                                <div class="flex flex-col sm:flex-row">
                                                                    <div class="form-check mr-2">
                                                                        <input id="radio-switch-4" class="form-check-input" type="radio" name="flag_glue_${counter}" value="0" ${(item.flag_glue === 0) ? 'checked' : ''}>
                                                                        <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                                    </div>
                                                                    <div class="form-check mr-2 sm:mt-0">
                                                                        <input id="radio-switch-5" class="form-check-input" type="radio" name="flag_glue_${counter}" value="1" ${(item.flag_glue === 1) ? 'checked' : ''}>
                                                                        <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-inline mt-5">
                                                                <label for="vertical-form-1" class="sm:w-20 font-bold">Pounch</label>
                                                                <div class="flex flex-col sm:flex-row">
                                                                    <div class="form-check mr-2">
                                                                        <input id="radio-switch-4" class="form-check-input" type="radio" name="flag_pounch_${counter}" value="0" ${(item.flag_pounch === 0) ? 'checked' : ''}>
                                                                        <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                                    </div>
                                                                    <div class="form-check mr-2 sm:mt-0">
                                                                        <input id="radio-switch-5" class="form-check-input" type="radio" name="flag_pounch_${counter}" value="1" ${(item.flag_pounch === 1) ? 'checked' : ''}>
                                                                        <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-12 mt-5">
                                                <div class="col-span-6">
                                                    <div id="horizontal-form" class="p-5">
                                                        <div class="preview">
                                                            <div class="form-inline mt-5">
                                                                <label for="vertical-form-1" class="sm:w-20 font-bold">Spesifikasi</label>
                                                                <input type="text" class="form-control specification" value="${item.specification}" name="specification">
                                                                <input type="hidden" class="form-control flute-type" value="${item.flute_type}" name="flute_type">
                                                            </div>
                                                            <div class="form-inline mt-5">
                                                                <label for="vertical-form-1" class="sm:w-20 font-bold">Jenis Flute</label>
                                                                <select data-placeholder="Pilih Tipe Flute" class="spk-select select-box form-control flute-type" name="flute_type" id="flute-type">
                                                                    <option value=" ">-</option>
                                                                    <option value="B" ${(item.flute_type === 'B') ? 'selected' : ''}>B</option>
                                                                    <option value="C" ${(item.flute_type === 'C') ? 'selected' : ''}>C</option>
                                                                    <option value="E" ${(item.flute_type === 'E') ? 'selected' : ''}>E</option>
                                                                    <option value="B/C" ${(item.flute_type === 'B/C') ? 'selected' : ''}>B/C</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-inline mt-5">
                                                                <label for="vertical-form-1" class="sm:w-20 font-bold">Qty SPK</label>
                                                                <input type="text" class="form-control spk-quantity" name="spk_quantity" value="${item.quantity}">
                                                                <input type="hidden" class="form-control detail-sales-order-id" name="detail_sales_order_id" value="{{$goodsInformations->detail_sales_order_id}}">
                                                            </div>
                                                            <div class="form-inline mt-5 ">
                                                                <label for="vertical-form-1" class="sm:w-20 font-bold">Ukuran</label>
                                                                <input type="number" class="form-control mr-3 length" placeholder="P" name="length" value="${item.length}">
                                                                <input type="number" class="form-control mr-3 width" placeholder="L" name="width" value="${item.width}">
                                                                <input type="number" class="form-control height" placeholder="T" name="height" value="${item.height}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-span-6">
                                                    <div id="horizontal-form" class="p-5">
                                                        <div class="preview">
                                                            <div class="form-inline mt-5">
                                                                <label for="vertical-form-1" class="sm:w-20 font-bold">Netto</label>
                                                                <input type="number" class="form-control mr-3 netto-width" placeholder="L" name="netto_width" value="${item.netto_width}">
                                                                <input type="number" class="form-control netto-length" placeholder="P" name="netto_length" value="${item.netto_length}">
                                                            </div>
                                                            <div class="form-inline mt-5">
                                                                <label for="vertical-form-1" class="sm:w-20 font-bold">Bruto</label>
                                                                <input type="number" class="form-control mr-3 bruto-width" placeholder="L" name="bruto_width" value="${item.bruto_width}">
                                                                <input type="number" class="form-control bruto-length" placeholder="P" name="bruto_length" value="${item.bruto_length}">
                                                            </div>
                                                            <div class="form-inline mt-5">
                                                                <label for="vertical-form-1" class="sm:w-20 font-bold">Sup Bruto</label>
                                                                <input type="number" class="form-control mr-3 sup-bruto-width" placeholder="L" name="sup_bruto_width" value="${item.sup_bruto_width}">
                                                                <input type="number" class="form-control sup-bruto-length" placeholder="P" name="sup_bruto_length" value="${item.sup_bruto_length}">
                                                            </div>
                                                            <div class="form-inline mt-5">
                                                                <label for="vertical-form-1" class="sm:w-20 font-bold">Qty Sheet</label>
                                                                <input type="number" class="form-control sheet-quantity" name="sheet_quantity" value="${item.sheet_quantity}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>`;

                        $('#form-layout-container').append(html);

                        counter++;
                    });
                } else {
                    alert('No data found, but success status received.');
                }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    title: 'Template tidak di temukan !',
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok',
                    allowOutsideClick: false
                })
            }
        });
    });

    $("#form-layout-container").on("click", ".delete-form", function() {
        $(this).closest("form").remove(); // Removes the closest parent <form> element
        layoutId--;
    });

    $("#btn-generate-spk").on("click", function() {

        Swal.fire({
            title: 'Proses SPK ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batalkan',
            confirmButtonText: 'Ya, Proses SPK',
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {

                let flagIsSaveAsTemplate = 0;

                if ($('#is-save-as-template').is(":checked")) {
                    flagIsSaveAsTemplate = 1;
                }

                const goodsId = $("#goods-id").val();
                const isSaveAsTemplate = flagIsSaveAsTemplate;
                const itemLists = [];

                let counter = 1;
                $('#form-layout-container').find('.spk-form').each(function() {

                    let flagShowLayout = 0;

                    if ($(this).find('.show-layout').is(":checked")) {
                        flagShowLayout = 1;
                    }

                    let detailSalesOrderId = $(this).find('.detail-sales-order-id')
                        .val();
                    let spkQuantity = $(this).find('.spk-quantity').val();
                    let length = $(this).find('.length').val();
                    let width = $(this).find('.width').val();
                    let height = $(this).find('.height').val();
                    let l2 = $(this).find('.l2').val() || '';
                    let p1 = $(this).find('.p1').val() || '';
                    let l1 = $(this).find('.l1').val() || '';
                    let p2 = $(this).find('.p2').val() || '';
                    let t = $(this).find('.t').val() || '';
                    let plape1 = $(this).find('.plape-1').val() || '';
                    let plape2 = $(this).find('.plape-2').val() || '';
                    let k = $(this).find('.k').val() || '';
                    let nettoWidth = $(this).find('.netto-width').val();
                    let nettoLength = $(this).find('.netto-length').val();
                    let brutoWidth = $(this).find('.bruto-width').val();
                    let brutoLength = $(this).find('.bruto-length').val();
                    let supBrutoWidth = $(this).find('.sup-bruto-width').val();
                    let supBrutoLength = $(this).find('.sup-bruto-length').val();
                    let sheetQuantity = $(this).find('.sheet-quantity').val();
                    let flagStitching = $(this).find(
                        `input[name="flag_stitching_${counter}"]:checked`).val();
                    let flagGlue = $(this).find(
                        `input[name="flag_glue_${counter}"]:checked`).val();
                    let flagPounch = $(this).find(
                        `input[name="flag_pounch_${counter}"]:checked`).val();
                    let specification = $(this).find('.specification').val();
                    let fluteType = $(this).find('.flute-type').val();
                    let spkType = $(this).find('.spk-type').val();
                    let showLayout = flagShowLayout;
                    let layoutType = $(this).find('.layout-type').val();
                    let jl = $(this).find('.jl').val();
                    let jp = $(this).find('.jp').val();

                    counter++;

                    itemLists.push({
                        detail_sales_order_id: detailSalesOrderId,
                        spk_quantity: spkQuantity,
                        length: length,
                        width: width,
                        height: height,
                        l2: l2 || '',
                        p1: p1 || '',
                        l1: l1 || '',
                        p2: p2 || '',
                        t: t || '',
                        plape_1: plape1 || '',
                        plape_2: plape2 || '',
                        k: k || '',
                        netto_width: nettoWidth,
                        netto_length: nettoLength,
                        bruto_width: brutoWidth,
                        bruto_length: brutoLength,
                        sup_bruto_width: supBrutoWidth,
                        sup_bruto_length: supBrutoLength,
                        sheet_quantity: sheetQuantity,
                        flag_stitching: flagStitching,
                        flag_glue: flagGlue,
                        flag_pounch: flagPounch,
                        specification: specification,
                        flute_type: fluteType,
                        spk_type: spkType,
                        show_layout: showLayout,
                        layout_type: layoutType,
                        jp: jp,
                        jl: jl,
                    });
                });

                // Build the JSON payload
                const payload = {
                    goods_id: goodsId,
                    is_save_as_template: flagIsSaveAsTemplate,
                    data: itemLists
                };

                console.log(payload)

                $.ajax({
                    url: `{{route('production.spk.save.manual')}}`,
                    type: 'POST',
                    contentType: 'application/json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: JSON.stringify(payload),
                    success: function(response) {
                        Swal.fire({
                            title: 'Suceess !',
                            text: `SPK berhasil di simpan`,
                            icon: 'success',
                            confirmButtonText: 'Ok',
                            confirmButtonColor: '#3085d6',
                            allowOutsideClick: false
                        }).then((result) => {

                            // Redirect the current page to the transaction index
                            // location.href =
                            //     `{{ route('production.spk.index') }}`;
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire(
                            'Error!',
                            error,
                            'error'
                        )
                    }
                });
            }
        });
    });

    $("#form-layout-container").on("change", ".layout-type", function() {
        $(this).closest("form").find('.layout-item').remove();

        let content = "";

        if ($(this).val() == 'BOX') {
            content = boxLayoutHtml;
        }

        if ($(this).val() == 'BOX') {
            content = boxLayoutHtml;
        }

        if ($(this).val() == 'SHEET') {
            content = sheetLayoutHtml;
        }

        $(this).closest("form").find('.layout-container').append(content);
    });
});
</script>
@endsection
