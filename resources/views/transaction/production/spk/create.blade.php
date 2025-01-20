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
                </div>
                <form method="POST" action="{{route('index-price.save')}}">
                    @csrf
                    <div id="horizontal-form" class="p-5">
                        <div class="preview">
                            <div class="form-inline">
                                <label for="vertical-form-1" class="sm:w-32 font-bold">Nama Barang</label>
                                <input type="text" class="form-control" value="{{$goodsInformations->name}}" readonly>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="sm:w-32 font-bold">Jenis</label>
                                <input type="text" class="form-control" value="{{$goodsInformations->type}}" id="goods-type" readonly>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="sm:w-32 font-bold">Spesifikasi</label>
                                <input type="text" class="form-control" value="{{$goodsInformations->spec_str}}" id="goods-type" readonly>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="sm:w-32 font-bold">Ukuran</label>
                                <input type="text" class="form-control" value="{{$goodsInformations->meas_str}}" id="goods-type" readonly>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="sm:w-32 font-bold">Qty Pesanan</label>
                                <input type="text" class="form-control" id="order-quantity" value="{{$goodsInformations->quantity}}" readonly>

                                <input type="hidden" class="form-control" id="type" value="{{$goodsInformations->type}}">

                                @if($goodsInformations->type == 'A' || $goodsInformations->type == 'B')
                                <input type="hidden" class="form-control" id="ply-type" value="{{$spec_details[0]->ply_type}}">
                                <input type="hidden" class="form-control" id="flute-type" value="{{$spec_details[0]->flute_type}}">
                                <input type="hidden" class="form-control" id="substance" value="{{$spec_details[0]->substance}}">
                                <input type="hidden" class="form-control" id="meas-unit" value="{{$spec_details[0]->measure_unit}}">
                                <input type="hidden" class="form-control" id="meas-type" value="{{$spec_details[0]->measure_type}}">
                                <input type="hidden" class="form-control" id="length" value="{{$spec_details[0]->length}}">
                                <input type="hidden" class="form-control" id="width" value="{{$spec_details[0]->width}}">
                                <input type="hidden" class="form-control" id="height" value="{{$spec_details[0]->height}}">
                                @endif

                                @if($goodsInformations->type == 'AB' || $goodsInformations->type == 'BB')
                                <input type="hidden" class="form-control" id="top-ply-type" value="{{$spec_details[0]->ply_type}}">
                                <input type="hidden" class="form-control" id="top-flute-type" value="{{$spec_details[0]->flute_type}}">
                                <input type="hidden" class="form-control" id="top-substance" value="{{$spec_details[0]->substance}}">
                                <input type="hidden" class="form-control" id="top-meas-unit" value="{{$spec_details[0]->measure_unit}}">
                                <input type="hidden" class="form-control" id="top-length" value="{{$spec_details[0]->length}}">
                                <input type="hidden" class="form-control" id="top-width" value="{{$spec_details[0]->width}}">
                                <input type="hidden" class="form-control" id="top-height" value="{{$spec_details[0]->height}}">

                                <input type="hidden" class="form-control" id="bottom-ply-type" value="{{$spec_details[1]->ply_type}}">
                                <input type="hidden" class="form-control" id="bottom-flute-type" value="{{$spec_details[1]->flute_type}}">
                                <input type="hidden" class="form-control" id="bottom-substance" value="{{$spec_details[1]->substance}}">
                                <input type="hidden" class="form-control" id="bottom-meas-unit" value="{{$spec_details[1]->measure_unit}}">
                                <input type="hidden" class="form-control" id="bottom-length" value="{{$spec_details[1]->length}}">
                                <input type="hidden" class="form-control" id="bottom-width" value="{{$spec_details[1]->width}}">
                                <input type="hidden" class="form-control" id="bottom-height" value="{{$spec_details[1]->height}}">
                                @endif

                                @if($goodsInformations->type == 'ROLL')
                                <input type="hidden" class="form-control" id="ply-type" value="{{$spec_details[0]->ply_type}}">
                                <input type="hidden" class="form-control" id="flute-type" value="{{$spec_details[0]->flute_type}}">
                                <input type="hidden" class="form-control" id="substance" value="{{$spec_details[0]->substance}}">
                                <input type="hidden" class="form-control" id="meas-unit" value="{{$spec_details[0]->measure_unit}}">
                                <input type="hidden" class="form-control" id="meas-type" value="{{$spec_details[0]->measure_type}}">
                                <input type="hidden" class="form-control" id="width" value="{{$spec_details[0]->width}}">
                                @endif

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @if($goodsInformations->type == 'A')
        <form  method="POST" action="{{route('production.spk.save')}}" class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5" id="form-b">
            @csrf
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Parameter SPK (A)</div>
                    @if(($goodsInformations->quantity - $totalSPKCreated) != 0)
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" id="calc-form-b"> <i data-lucide="calculator" class="w-4 h-4 mr-2"></i> Hitung Otomatis </a>
                    @endif
                </div>
                <div class="md:col-span-12 sm:col-span-12">
                    <div class="overflow-y-auto max-h-screen">
                        <div class="grid grid-cols-12">
                            <div class="col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <table style="border-collapse: collapse;">
                                        <tr>
                                            <td width="70px" style="text-align: center;">

                                            </td>
                                            <td width="70px" style="text-align: center;" class="form-inp-non-join">

                                            </td>
                                            <td width="120px" style="text-align: center;" class="form-inp-non-join">

                                            </td>
                                            <td width="70px" style=";padding: 8px" colspan="2">
                                                <strong>JP: </strong><strong class="jp">0</strong>
                                            </td>
                                            <td width="80px" style="text-align: center;">

                                            </td>
                                            <td style="text-align: center;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="50px" height="50px" style="text-align: center;">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;" class="form-inp-non-join">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;" class="form-inp-non-join">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;" width="70px">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                <strong class="plape">PLAPE</string>
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="text-align: center; padding:10px;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="70px" style="padding: 5px;">
                                                <strong>JL: </strong><strong class="jl">0</strong>
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px; height: 20px;" class="form-inp-non-join">
                                                <strong class="l2">L2</string>
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px;" class="form-inp-non-join">
                                                <strong class="p1">P1</string>
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px;">
                                                <strong class="l1">L1</string>
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px;">
                                                <strong class="t">T</string>
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px;">
                                                <strong class="p2">P2</string>
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px;width: 5px;">
                                                <strong class="k">K</string>
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
                                                <strong class="plape">PLAPE</string>
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">

                                            </td>
                                            <td style="text-align: center; padding:10px;">

                                            </td>
                                        </tr>
                                    </table>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-40 font-bold">Tampilkan Layout ?</label>
                                        <input class="form-check-input" type="checkbox" id="flag_show_layout_a" name="flag_show_layout_a" value="1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-6">
                                <div id="horizontal-form" class="p-5 mt-5">
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-20 font-bold">Stitching</label>
                                        <div class="flex flex-col sm:flex-row">
                                            <div class="form-check mr-2">
                                                <input id="radio-switch-4" class="form-check-input" type="radio" name="flag_stitching" value="0" checked>
                                                <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                            </div>
                                            <div class="form-check mr-2 sm:mt-0">
                                                <input id="radio-switch-5" class="form-check-input" type="radio" name="flag_stitching" value="1">
                                                <label class="form-check-label" for="radio-switch-5">Ya</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-20 font-bold">Lem</label>
                                        <div class="flex flex-col sm:flex-row">
                                            <div class="form-check mr-2">
                                                <input id="radio-switch-4" class="form-check-input" type="radio" name="flag_glue" value="0" checked>
                                                <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                            </div>
                                            <div class="form-check mr-2 sm:mt-0">
                                                <input id="radio-switch-5" class="form-check-input" type="radio" name="flag_glue" value="1">
                                                <label class="form-check-label" for="radio-switch-5">Ya</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-20 font-bold">Pounch</label>
                                        <div class="flex flex-col sm:flex-row">
                                            <div class="form-check mr-2">
                                                <input id="radio-switch-4" class="form-check-input" type="radio" name="flag_pounch" value="0" checked>
                                                <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                            </div>
                                            <div class="form-check mr-2 sm:mt-0">
                                                <input id="radio-switch-5" class="form-check-input" type="radio" name="flag_pounch" value="1">
                                                <label class="form-check-label" for="radio-switch-5">Ya</label>
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
                                            <label for="horizontal-form-1" class="sm:w-20 font-bold">Gabung</label>
                                            <select class="form-control select-box" id="flag-join" name="flag_join" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "disabled" : ""; ?> required>
                                                <option value="0">Tidak</option>
                                                <option value="1">Ya</option>
                                            </select>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Spesifikasi</label>
                                            <input type="text" class="form-control" value="{{$goodsInformations->spec_str}}" name="spec" readonly>
                                            <input type="hidden" class="form-control" value="{{$spec_details[0]->flute_type}}" name="flute_type" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Qty SPK</label>
                                            <input type="number" class="form-control spk-quantity" name="spk_quantity" placeholder="Maksimal Quantity {{$goodsInformations->quantity - $totalSPKCreated}}"required <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="hidden" class="form-control" name="goods_type" value="{{$goodsInformations->type}}">
                                            <input type="hidden" class="form-control" name="detail_sales_order_id" value="{{$goodsInformations->detail_sales_order_id}}">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Ukuran</label>
                                            <input type="number" class="form-control mr-3 length" placeholder="P" name="length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="number" class="form-control mr-3 width" placeholder="L" name="width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="number" class="form-control height" placeholder="T" name="height" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inp-non-join form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">L2</label>
                                            <input type="number" class="form-control form-l2" name="l2" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inp-non-join form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">P1</label>
                                            <input type="number" class="form-control form-p1" name="p1" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>

                                        <!-- hjfhsjf -->
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">L1</label>
                                            <input type="number" class="form-control form-l1" name="l1" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">T</label>
                                            <input type="number" class="form-control form-t" name="t" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">P2</label>
                                            <input type="number" class="form-control form-p2" name="p2" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">PLAPE</label>
                                            <input type="number" class="form-control form-plape" name="plape" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">K</label>
                                            <input type="number" class="form-control form-k" name="k" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Netto</label>
                                            <input type="number" class="form-control mr-3 form-netto-width" placeholder="L" name="netto_width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="number" class="form-control form-netto-length" placeholder="P" name="netto_length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Bruto</label>
                                            <input type="number" class="form-control mr-3 form-bruto-width" placeholder="L" name="bruto_width" required <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="number" class="form-control form-bruto-length" placeholder="P" name="bruto_length" required <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Qty Sheet</label>
                                            <input type="text" class="form-control form-qty-sheet" name="sheet_quantity" required <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                    </div>
                                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                        @if(($goodsInformations->quantity - $totalSPKCreated) != 0)
                                        <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Generate SPK</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endif

        @if($goodsInformations->type == 'B')
        <form  method="POST" action="{{route('production.spk.save')}}" class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5" id="form-a">
            @csrf
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Parameter SPK (B)</div>
                    @if(($goodsInformations->quantity - $totalSPKCreated) != 0)
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" id="calc-form-a"> <i data-lucide="calculator" class="w-4 h-4 mr-2"></i> Hitung Otomatis </a>
                    @endif
                </div>
                <div class="md:col-span-12 sm:col-span-12">
                    <div class="overflow-y-auto max-h-screen">
                        <div class="grid grid-cols-12">
                            <div class="col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <table style="width:60%;border-collapse: collapse;margin-right: 100px;">
                                        <tr>
                                            <td width="50px" style="text-align: center;">

                                            </td>
                                            <td style="text-align: center;">

                                            </td>
                                            <td width="60px" style="text-align: center;" id="jp">
                                                <strong>JP: </strong><strong class="jp">0</strong>
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
                                            <td height="70px" style="padding: 5px;" id="jl">
                                                <strong>JL: </strong><strong class="jl">0</strong>
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
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-40 font-bold">Tampilkan Layout ?</label>
                                        <input class="form-check-input" type="checkbox" id="flag_show_layout_b" name="flag_show_layout_b" value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-6">
                                <div id="horizontal-form" class="p-5 mt-5">
                                    <div class="preview">
                                        <div class="form-inline">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Stitching</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="flag_stitching" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="flag_stitching" value="1">
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Lem</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="flag_glue" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="flag_glue" value="1">
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Pounch</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="flag_pounch" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="flag_pounch" value="1">
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
                                            <input type="text" class="form-control" value="{{$goodsInformations->spec_str}}" name="spec" readonly>
                                            <input type="hidden" class="form-control" value="{{$spec_details[0]->flute_type}}" name="flute_type" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Qty SPK</label>
                                            <input type="text" class="form-control spk-quantity" name="spk_quantity" id="tr-spk-qty" placeholder="Maksimal Quantity {{$goodsInformations->quantity - $totalSPKCreated}}" required <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="hidden" class="form-control" name="goods_type" value="{{$goodsInformations->type}}">
                                            <input type="hidden" class="form-control" name="detail_sales_order_id" value="{{$goodsInformations->detail_sales_order_id}}">
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Ukuran</label>
                                            <input type="text" class="form-control mr-3 width" placeholder="L" name="width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="text" class="form-control length" placeholder="P" name="length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Netto</label>
                                            <input type="text" class="form-control mr-3 form-netto-width" placeholder="L" name="netto_width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="text" class="form-control form-netto-length" placeholder="P" name="netto_length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Bruto</label>
                                            <input type="text" class="form-control mr-3 form-bruto-width" placeholder="L" name="bruto_width" required <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="text" class="form-control form-bruto-length" placeholder="P" name="bruto_length" required <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Qty Sheet</label>
                                            <input type="text" class="form-control form-qty-sheet" name="sheet_quantity" required <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                    </div>
                                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                        @if(($goodsInformations->quantity - $totalSPKCreated) != 0)
                                        <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Generate SPK</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endif

        @if($goodsInformations->type == 'AB')
        <form  method="POST" action="{{route('production.spk.save')}}" class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5" id="form-ab">
            @csrf
            <div class="box p-5 rounded-md" id="ab-b">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Parameter SPK (A)</div>
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" id="calc-form-ab-b"> <i data-lucide="calculator" class="w-4 h-4 mr-2"></i> Hitung Otomatis </a>
                </div>
                <div class="md:col-span-6 sm:col-span-12">
                    <div class="overflow-y-auto max-h-screen">
                        <div class="grid grid-cols-12 mt-5">
                            <div class="col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <table style="border-collapse: collapse;">
                                        <tr>
                                            <td width="70px" style="text-align: center;">

                                            </td>
                                            <td width="70px" style="text-align: center;">

                                            </td>
                                            <td width="120px" style="text-align: center;">
                                                <strong>JP: </strong><strong class="jp">0</strong>
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
                                                <strong>JL: </strong><strong class="jl">0</strong>
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px; height: 20px;">
                                                <strong class="l2">L2</string>
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px;">
                                                <strong class="p1">P1</string>
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px;">
                                                <strong class="l1">L1</string>
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px;">
                                                <strong class="t">T</string>
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px;">
                                                <strong class="p2">P2</string>
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px;width: 5px;">
                                                <strong class="k">K</string>
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

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                <strong class="plape">PLAPE</string>
                                            </td>
                                            <td style="text-align: center; padding:10px;">

                                            </td>
                                        </tr>
                                    </table>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-40 font-bold">Tampilkan Layout ?</label>
                                        <input class="form-check-input" type="checkbox" id="flag_show_layout_ab_a" name="flag_show_layout_bb_b2" value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Stitching</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="bottom_flag_stitching" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="bottom_flag_stitching" value="1">
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Lem</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="bottom_flag_glue" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="bottom_flag_glue" value="1">
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Pounch</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="bottom_flag_pounch" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="bottom_flag_pounch" value="1">
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12">
                            <div class="col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Spesifikasi</label>
                                            <input type="text" class="form-control" value="{{$goodsInformations->spec_str}}" name="bottom_spec" readonly>
                                            <input type="hidden" class="form-control" value="{{$spec_details[0]->flute_type}}" name="bottom_flute_type" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Ukuran</label>
                                            <input type="text" class="form-control" value="<?php $str = explode('/', $goodsInformations->meas_str); echo $str[0]; ?>" name="" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Qty SPK</label>
                                            <input type="number" class="form-control spk-quantity" name="bottom_spk_quantity" placeholder="Maksimal Quantity {{$goodsInformations->quantity - $totalSPKCreated}}" required <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="hidden" class="form-control" name="goods_type" value="{{$goodsInformations->type}}">
                                            <input type="hidden" class="form-control" name="detail_sales_order_id" value="{{$goodsInformations->detail_sales_order_id}}">
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Ukuran</label>
                                            <input type="number" class="form-control mr-3 length" placeholder="P" name="bottom_length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="number" class="form-control mr-3 width" placeholder="L" name="bottom_width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="number" class="form-control height" placeholder="T" name="bottom_height" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">L2</label>
                                            <input type="number" class="form-control form-l2" name="bottom_l2" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">P1</label>
                                            <input type="number" class="form-control form-p1" name="bottom_p1" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>

                                        <!-- hjfhsjf -->
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">L1</label>
                                            <input type="number" class="form-control form-l1" name="bottom_l1" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">T</label>
                                            <input type="number" class="form-control form-t" name="bottom_t" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">P2</label>
                                            <input type="number" class="form-control form-p2" name="bottom_p2" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">PLAPE</label>
                                            <input type="number" class="form-control form-plape" name="bottom_plape" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">K</label>
                                            <input type="number" class="form-control form-k" name="bottom_k" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Netto</label>
                                            <input type="number" class="form-control mr-3 form-bottom-netto-width" placeholder="L" name="bottom_netto_width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="number" class="form-control form-bottom-netto-length" placeholder="P" name="bottom_netto_length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Bruto</label>
                                            <input type="number" class="form-control mr-3 form-bottom-bruto-width" placeholder="L" name="bottom_bruto_width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="number" class="form-control form-bottom-bruto-length" placeholder="P" name="bottom_bruto_length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Qty Sheet</label>
                                            <input type="number" class="form-control form-bottom-quantity-sheet" name="bottom_sheet_quantity" value="" id="sheet-quantity" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box p-5 rounded-md mt-2" id="ab-a">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Parameter SPK (B)</div>
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" id="calc-form-ab-a"> <i data-lucide="calculator" class="w-4 h-4 mr-2"></i> Hitung Otomatis </a>
                </div>
                <div class="md:col-span-6 sm:col-span-12">
                    <div class="overflow-y-auto max-h-screen">
                        <div class="grid grid-cols-12 mt-5">
                            <div class="col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <table style="width:70%;border-collapse: collapse; margin-right: 5px;margin-right: 100px;">
                                        <tr>
                                            <td width="50px" style="text-align: center;">

                                            </td>
                                            <td style="text-align: center;">

                                            </td>
                                            <td width="60px" style="text-align: center;" id="sheet-l-l">
                                                <strong>JP: </strong><strong class="jp">0</strong>
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
                                                <strong>JL: </strong><strong class="jl">0</strong>
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
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-40 font-bold">Tampilkan Layout ?</label>
                                        <input class="form-check-input" type="checkbox" id="flag_show_layout_ab_b" name="flag_show_layout_bb_b2" value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Stitching</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="top_flag_stitching" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="top_flag_stitching" value="1">
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Lem</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="top_flag_glue" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="top_flag_glue" value="1">
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Pounch</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="top_flag_pounch" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="top_flag_pounch" value="1">
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
                                            <input type="text" class="form-control" value="{{$goodsInformations->spec_str}}" name="top_spec" readonly>
                                            <input type="hidden" class="form-control" value="{{$spec_details[1]->flute_type}}" name="top_flute_type" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Ukuran</label>
                                            <input type="text" class="form-control" value="<?php $str = explode('/', $goodsInformations->meas_str); echo $str[1]; ?>" name="" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Qty SPK</label>
                                            <input type="number" class="form-control spk-quantity"name="top_spk_quantity" id="tr-spk-qty" placeholder="Maksimal Quantity {{$goodsInformations->quantity - $totalSPKCreated}}"required <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="hidden" class="form-control" name="goods_type" value="{{$goodsInformations->type}}">
                                            <input type="hidden" class="form-control" name="detail_sales_order_id" value="{{$goodsInformations->detail_sales_order_id}}">
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Ukuran</label>
                                            <input type="number" class="form-control mr-3 length" placeholder="P" id="length" name="top_length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="number" class="form-control width" placeholder="L" id="width" name="top_width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Netto</label>
                                            <input type="number" class="form-control mr-3 form-top-netto-width" placeholder="L" name="top_netto_width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="number" class="form-control form-top-netto-length" placeholder="P" name="top_netto_length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Bruto</label>
                                            <input type="number" class="form-control mr-3 form-top-bruto-width" placeholder="L" name="top_bruto_width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="number" class="form-control form-top-bruto-length" placeholder="P" name="top_bruto_length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Qty Sheet</label>
                                            <input type="number" class="form-control form-top-sheet-quantity" name="top_sheet_quantity" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                    </div>
                                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                        <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Generate SPK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endif

        @if($goodsInformations->type == 'BB')
        <form  method="POST" action="{{route('production.spk.save')}}" class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5" id="form-bb">
            @csrf
            <div class="box p-5 rounded-md" id="bb-b">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Parameter SPK (B)</div>
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" id="calc-form-bb-b"> <i data-lucide="calculator" class="w-4 h-4 mr-2"></i> Hitung Otomatis </a>
                </div>
                <div class="md:col-span-6 sm:col-span-12">
                    <div class="overflow-y-auto max-h-screen">
                        <div class="grid grid-cols-12 mt-5">
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <table style="border-collapse: collapse;">
                                        <tr>
                                            <td width="70px" style="text-align: center;">

                                            </td>
                                            <td width="70px" style="text-align: center;">

                                            </td>
                                            <td width="120px" style="text-align: center;">
                                                <strong>JP: </strong><strong class="jp">0</strong>
                                            </td>
                                            <td width="70px" style="text-align: center;padding: 8px">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="50px" height="50px" style="text-align: center;">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                <strong class="l-height">T</strong>
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                <strong class="l-length">P</strong>
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                <strong class="l-height">T</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="70px" style="padding: 5px;">
                                                <strong>JL: </strong><strong class="jl">0</strong>
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px; height: 20px;">
                                                <strong class="l-width">L</strong>
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px;">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px;">
                                                <strong class="l-width">L</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="50px" style="text-align: center;">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                <strong class="l-height">T</strong>
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                <strong class="l-length">P</strong>
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                <strong class="l-height">T</strong>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-40 font-bold">Tampilkan Layout ?</label>
                                        <input class="form-check-input" type="checkbox" id="flag_show_layout_bb_b1" name="flag_show_layout_bb_b1" value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Stitching</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="bottom_flag_stitching" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="bottom_flag_stitching" value="1">
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Lem</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="bottom_flag_glue" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="bottom_flag_glue" value="1">
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Pounch</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="bottom_flag_pounch" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="bottom_flag_pounch" value="1">
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
                                            <input type="number" class="form-control bottom-spk-quantity" name="bottom_spk_quantity" placeholder="Maksimal Quantity {{$goodsInformations->quantity - $totalSPKCreated}}"required <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="hidden" class="form-control" name="goods_type" value="{{$goodsInformations->type}}">
                                            <input type="hidden" class="form-control" name="detail_sales_order_id" value="{{$goodsInformations->detail_sales_order_id}}">
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Ukuran</label>
                                            <input type="number" class="form-control mr-3 bottom-length" placeholder="P" id="length" name="bottom_length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="number" class="form-control mr-3 bottom-width" placeholder="L" id="width" name="bottom_width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="number" class="form-control bottom-height" placeholder="T" id="height" name="bottom_height" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Netto</label>
                                            <input type="number" class="form-control mr-3 form-bottom-netto-width" placeholder="L" name="bottom_netto_width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="number" class="form-control form-bottom-netto-length" placeholder="P" name="bottom_netto_length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Bruto</label>
                                            <input type="number" class="form-control mr-3 form-bottom-bruto-width" placeholder="L" name="bottom_bruto_width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="number" class="form-control form-bottom-bruto-length" placeholder="P" name="bottom_bruto_length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Qty Sheet</label>
                                            <input type="number" class="form-control form-bottom-sheet-quantity" name="bottom_sheet_quantity" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box p-5 rounded-md mt-2" id="bb-a">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Parameter SPK (B)</div>
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" id="calc-form-bb-a"> <i data-lucide="calculator" class="w-4 h-4 mr-2"></i> Hitung Otomatis </a>
                </div>
                <div class="md:col-span-6 sm:col-span-12">
                    <div class="overflow-y-auto max-h-screen">
                        <div class="grid grid-cols-12 mt-5">
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <table style="border-collapse: collapse;">
                                        <tr>
                                            <td width="70px" style="text-align: center;">

                                            </td>
                                            <td width="70px" style="text-align: center;">

                                            </td>
                                            <td width="120px" style="text-align: center;">
                                                <strong>JP: </strong><strong class="jp">0</strong>
                                            </td>
                                            <td width="70px" style="text-align: center;padding: 8px">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="50px" height="50px" style="text-align: center;">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                <strong class="l-height">T</strong>
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                <strong class="l-length">P</strong>
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                <strong class="l-height">T</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="70px" style="padding: 5px;">
                                                <strong>JL: </strong><strong class="jl">0</strong>
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px; height: 20px;">
                                                <strong class="l-width">L</strong>
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px;">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:17px;">
                                                <strong class="l-width">L</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="50px" style="text-align: center;">

                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                <strong class="l-height">T</strong>
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                <strong class="l-length">P</strong>
                                            </td>
                                            <td style="border: 1px solid black;text-align: center; padding:10px;">
                                                <strong class="l-height">T</strong>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-40 font-bold">Tampilkan Layout ?</label>
                                        <input class="form-check-input" type="checkbox" id="flag_show_layout_bb_b2" name="flag_show_layout_bb_b2" value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Stitching</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="top_flag_stitching" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="top_flag_stitching" value="1">
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Lem</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="top_flag_glue" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="top_flag_glue" value="1">
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Pounch</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="top_flag_pounch" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="top_flag_pounch" value="1">
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
                                            <input type="number" class="form-control top-spk-quantity" name="top_spk_quantity" placeholder="Maksimal Quantity {{$goodsInformations->quantity - $totalSPKCreated}}"required <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="hidden" class="form-control" name="goods_type" value="{{$goodsInformations->type}}">
                                            <input type="hidden" class="form-control" name="detail_sales_order_id" value="{{$goodsInformations->detail_sales_order_id}}">
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Ukuran</label>
                                            <input type="text" class="form-control mr-3 top-length" placeholder="P" id="length" name="top_length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="text" class="form-control mr-3 top-width" placeholder="L" id="width" name="top_width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="text" class="form-control top-length" placeholder="T" id="height" name="top_height" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md:col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Netto</label>
                                            <input type="number" class="form-control mr-3 form-top-netto-width" placeholder="L" name="top_netto_width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="number" class="form-control form-top-netto-length" placeholder="P" name="top_netto_length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Bruto</label>
                                            <input type="number" class="form-control mr-3 form-top-bruto-width" placeholder="L" name="top_bruto_width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="number" class="form-control form-top-bruto-length" placeholder="P" name="top_bruto_length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Qty Sheet</label>
                                            <input type="number" class="form-control form-top-sheet-quantity" name="top_sheet_quantity" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                    </div>
                                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                        <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Generate SPK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endif

        @if($goodsInformations->type == 'ROLL')
        <form  method="POST" action="{{route('production.spk.save')}}" class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5" id="form-roll">
            @csrf
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Parameter SPK (ROLL)</div>
                    @if(($goodsInformations->quantity - $totalSPKCreated) != 0)
                    <a href="javascript:;" class="flex items-center ml-auto text-primary" id="calc-form-a"> <i data-lucide="calculator" class="w-4 h-4 mr-2"></i> Hitung Otomatis </a>
                    @endif
                </div>
                <div class="md:col-span-12 sm:col-span-12">
                    <div class="overflow-y-auto max-h-screen">
                        <div class="grid grid-cols-12">
                            <div class="col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <table style="width:60%;border-collapse: collapse;margin-right: 100px;">
                                        <tr>
                                            <td width="50px" style="text-align: center;">

                                            </td>
                                            <td style="text-align: center;">

                                            </td>
                                            <td width="60px" style="text-align: center;" id="jp">
                                                <strong>JP: </strong><strong class="jp">0</strong>
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
                                            <td height="70px" style="padding: 5px;" id="jl">
                                                <strong>JL: </strong><strong class="jl">0</strong>
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
                            <div class="col-span-6">
                                <div id="horizontal-form" class="p-5 mt-5">
                                    <div class="preview">
                                        <div class="form-inline">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Stitching</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="flag_stitching" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="flag_stitching" value="1">
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Lem</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="flag_glue" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="flag_glue" value="1">
                                                    <label class="form-check-label" for="radio-switch-5">Ya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Pounch</label>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="form-check mr-2">
                                                    <input id="radio-switch-4" class="form-check-input" type="radio" name="flag_pounch" value="0" checked>
                                                    <label class="form-check-label" for="radio-switch-4">Tidak</label>
                                                </div>
                                                <div class="form-check mr-2 sm:mt-0">
                                                    <input id="radio-switch-5" class="form-check-input" type="radio" name="flag_pounch" value="1">
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
                                            <input type="text" class="form-control" value="{{$goodsInformations->spec_str}}" name="spec" readonly>
                                            <input type="hidden" class="form-control" value="{{$spec_details[0]->flute_type}}" name="flute_type" readonly>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Qty (Kg)</label>
                                            <input type="text" class="form-control spk-quantity" name="spk_quantity" id="tr-spk-qty" placeholder="Maksimal Quantity {{$goodsInformations->quantity - $totalSPKCreated}}" required <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="hidden" class="form-control" name="goods_type" value="{{$goodsInformations->type}}">
                                            <input type="hidden" class="form-control" name="detail_sales_order_id" value="{{$goodsInformations->detail_sales_order_id}}">
                                        </div>
                                        <div class="form-inline mt-5 ">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Ukuran (L)</label>
                                            <input type="text" class="form-control width" placeholder="L" name="width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-6">
                                <div id="horizontal-form" class="p-5">
                                    <div class="preview">
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Netto</label>
                                            <input type="text" class="form-control mr-3 form-netto-width" placeholder="L" name="netto_width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="text" class="form-control form-netto-length" placeholder="P" name="netto_length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Bruto</label>
                                            <input type="text" class="form-control mr-3 form-bruto-width" placeholder="L" name="bruto_width" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                            <input type="text" class="form-control form-bruto-length" placeholder="P" name="bruto_length" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="vertical-form-1" class="sm:w-20 font-bold">Qty Sheet</label>
                                            <input type="text" class="form-control form-qty-sheet" name="sheet_quantity" <?php echo (($goodsInformations->quantity - $totalSPKCreated) == 0) ? "readonly" : ""; ?>>
                                        </div>
                                    </div>
                                    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                        @if(($goodsInformations->quantity - $totalSPKCreated) != 0)
                                        <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Generate SPK</button>
                                        @endif
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{asset('assets/src/js/form-control/form-control-b.js')}}"></script>
<script src="{{asset('assets/src/js/form-control/form-control-a.js')}}"></script>
<script src="{{asset('assets/src/js/form-control/form-control-ab.js')}}"></script>
<!-- <script src="{{asset('assets/src/js/form-control/form-control-bb.js')}}"></script> -->
<script src="{{asset('assets/src/js/form-control/form-control-roll.js')}}"></script>
<script>
$(function() {
    $('input[name=flag_stitching_trigger]').change(function() {
        if ($(this).val() === 1 || $(this).val() === "1") {
            $("#flag-stitching").val(1);
        } else {
            $("#flag-stitching").val(0);
        }
    });

    $('input[name=flag_glue_trigger]').change(function() {
        if ($(this).val() === 1 || $(this).val() === "1") {
            $("#flag-glue").val(1);
        } else {
            $("#flag-glue").val(0);
        }
    });

    $('input[name=flag_pounch_trigger]').change(function() {
        if ($(this).val() === 1 || $(this).val() === "1") {
            $("#flag-pounch").val(1);
        } else {
            $("#flag-pounch").val(0);
        }
    });
});
</script>
@endsection
