@extends('layouts._base')
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Settings</li>
<li class="breadcrumb-item" aria-current="page">General</li>
<li class="breadcrumb-item active" aria-current="page">Users</li>
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="intro-y">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="font-medium text-base mr-auto">
                Pengaturan
            </h2>
        </div>
        <div id="horizontal-form" class="p-5">
            <form method="POST" action="{{route('procurement.purchase-order.save')}}">
                @csrf
                <div class="preview">
                    <div class="form-inline">
                        <label for="horizontal-form-2" class="sm:w-32 font-bold">Supplier</label>
                        <select data-placeholder="Pilih Supplier" class="tom-select w-full form-control"
                            name="supplier_id" required>
                            <option value=" "> - </option>

                        </select>
                    </div>
                    <div class="form-inline mt-5">
                        <label for="horizontal-form-2" class="sm:w-32 font-bold">Tanggal PO</label>
                        <input id="horizontal-form-1" type="date" class="form-control" name="date" required>
                    </div>
                    <div class="form-inline mt-5">
                        <label for="horizontal-form-2" class="sm:w-32 font-bold">Jenis Pajak</label>
                        <select data-placeholder="Pilih Jenis Pajak" class="tom-select w-full form-control"
                            name="tax_type" required>
                            <option value=" "> - </option>
                            <option value="0">V0 (Kawasan Berikat)</option>
                            <option value="1">V1 (Exclude PPN)</option>
                            <option value="2">V2 (Include PPN)</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                    <button type="button" data-tw-dismiss="modal"
                        class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                    <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(function() {

})
</script>
@endsection
