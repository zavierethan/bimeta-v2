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
                        Informasi Pesanan
                    </h2>
                </div>
                <div id="horizontal-form" class="p-5">
                    <form method="POST" action="{{route('sales.save')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="preview">
                            <div class="form-inline">
                                <label for="horizontal-form-1" class="form-label sm:w-40">PO. Customer</label>
                                <input id="horizontal-form-1" type="text" class="form-control" name="ref_po_customer" required>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="horizontal-form-2" class="form-label sm:w-40">Customer</label>
                                <select data-placeholder="Pilih customer" class="tom-select w-full form-control" name="customer_id" required>
                                    <option value=" "> - </option>
                                    @foreach($customers as $customer)
                                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="horizontal-form-2" class="form-label sm:w-40">Tanggal Pesanan</label>
                                <input id="horizontal-form-1" type="date" class="form-control" name="order_date" required>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="horizontal-form-2" class="form-label sm:w-40">Tanggal Pengiriman</label>
                                <input id="horizontal-form-1" type="date" class="form-control" name="delivery_date" required>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="horizontal-form-2" class="form-label sm:w-40">Jenis Pajak</label>
                                <select data-placeholder="Pilih Jenis Pajak" class="tom-select w-full form-control" name="tax_type" required>
                                    <option value=" "> - </option>
                                    <option value="0">V0 (Kawasan Berikat)</option>
                                    <option value="1">V1 (Exclude PPN)</option>
                                    <option value="2">V2 (Include PPN)</option>
                                    <option value="3">V3 (Sample)</option>
                                </select>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-2" class="form-label sm:w-40">PIC</label>
                                <select data-placeholder="Pilih customer" class="tom-select w-full form-control" name="assign_to" required>
                                    <option value=" "> - </option>
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="form-label sm:w-40">Alamat Pengiriman</label>
                                <textarea id="vertical-form-1" type="text" class="form-control" name="shipping_address" required></textarea>
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="form-label sm:w-40">Catatan</label>
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