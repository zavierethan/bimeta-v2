@extends('layouts._base')
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <!-- BEGIN: Horizontal Form -->
            <div class="intro-y box mt-5">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Informasi Pembelian Material
                    </h2>
                </div>
                <div id="horizontal-form" class="p-5">
                    <form method="POST" action="{{route('procurement.purchase-order.save')}}">
                        @csrf
                        <div class="preview">
                            <div class="form-inline">
                                <label for="horizontal-form-2" class="form-label sm:w-20">Supplier</label>
                                <select data-placeholder="Pilih Supplier" class="tom-select w-full form-control" name="supplier_id" required>
                                    <option value=" "> - </option>
                                    @foreach($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="horizontal-form-2" class="form-label sm:w-20">Tanggal PO</label>
                                <input id="horizontal-form-1" type="date" class="form-control" name="date" required>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="horizontal-form-2" class="form-label sm:w-20">Jenis Pajak</label>
                                <select data-placeholder="Pilih Jenis Pajak" class="tom-select w-full form-control" name="tax_type" required>
                                    <option value=" "> - </option>
                                    <option value="V0">V0 (Kawasan Berikat)</option>
                                    <option value="V1">V1 (Exclude PPN)</option>
                                    <option value="V2">V2 (Include PPN)</option>
                                </select>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="form-label sm:w-20">Catatan</label>
                                <textarea id="vertical-form-1" type="text" class="form-control" name="remarks" required></textarea>
                            </div>
                        </div>
                        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                            <button type="button"
                                class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Batal</button>
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