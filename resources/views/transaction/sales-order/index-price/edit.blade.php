@extends('layouts._base')
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Horizontal Form -->
            <div class="intro-y box mt-5">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Edit Index Harga
                    </h2>
                </div>
                <div id="horizontal-form" class="p-5">
                    <form method="POST" action="{{route('index-price.update')}}">
                        @csrf
                        <div class="preview p-3">
                            <div class="form-inline">
                                <label for="horizontal-form-2" class="sm:w-32 font-bold">Jenis Ply</label>
                                <select data-placeholder="Pilih Jenis Flute" class="tom-select w-full form-control" name="ply_type">
                                    <option value="">-</option>
                                    <option value="SF" <?php echo ($indexPrice->ply_type == "SF") ? "selected" : "" ?>>Single Face (SF)</option>
                                    <option value="SW" <?php echo ($indexPrice->ply_type == "SW") ? "selected" : "" ?>>Single Wall (SW)</option>
                                    <option value="DW" <?php echo ($indexPrice->ply_type == "DW") ? "selected" : "" ?>>Double Wall (DW)</option>
                                    <option value="TW" <?php echo ($indexPrice->ply_type == "TW") ? "selected" : "" ?>>Triple Wall (TW)</option>
                                </select>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="horizontal-form-2" class="sm:w-32 font-bold">Jenis Flute</label>
                                <select data-placeholder="Pilih Jenis Flute" class="tom-select w-full form-control" name="flute_type">
                                    <option value="">-</option>
                                    <option value="B" <?php echo ($indexPrice->flute_type == "B") ? "selected" : "" ?>>B/F</option>
                                    <option value="C" <?php echo ($indexPrice->flute_type == "C") ? "selected" : "" ?>>C/F</option>
                                    <option value="E" <?php echo ($indexPrice->flute_type == "B/C") ? "selected" : "" ?>>E/F</option>
                                    <option value="B/C" <?php echo ($indexPrice->flute_type == "E") ? "selected" : "" ?>>B/C</option>
                                </select>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-2" class="sm:w-32 font-bold">Substance</label>
                                <select data-placeholder="Pilih Substance" class="tom-select w-full form-control" name="substance">
                                    @foreach($substances as $substance)
                                    <option value="{{$substance->id}}"  <?php echo ($indexPrice->substance_id == $substance->id) ? "selected" : "" ?>>{{$substance->substance}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="sm:w-32 font-bold">Harga (Rp)</label>
                                <input type="number" class="form-control" name="index_price" value="{{$indexPrice->price}}">
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="sm:w-32 font-bold">Index Tag</label>
                                <input type="date" class="form-control" name="index_tag" value="{{$indexPrice->tag}}">
                            </div>
                        </div>
                        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                            <button type="button" class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Batal</button>
                            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END: Horizontal Form -->
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(function() {
    $(".loader").hide();
})
</script>
@endsection