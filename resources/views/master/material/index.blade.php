@extends('layouts._base')
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Master Data</li>
<li class="breadcrumb-item active" aria-current="page">Materials</li>
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <h2 class="text-2xl font-extrabold dark:text-primary">Master Data Material</h2>
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview" class="btn btn-primary text-white">
                    Tambah Material
                </a>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="data-table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="whitespace-nowrap">CODE</th>
                        <th class="whitespace-nowrap">NAMA MATERIAL</th>
                        <th class="text-center whitespace-nowrap">TIPE</th>
                        <th class="text-center whitespace-nowrap">GRAMATURE</th>
                        <th class="text-center whitespace-nowrap">LEBAR</th>
                        <th class="text-center whitespace-nowrap">KODE SUPPLIER</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr class="intro-x">
                        <td>{{$item->code}}</td>
                        <td>{{$item->name}}</td>
                        <td class="text-center">{{$item->paper_type}}</td>
                        <td class="text-center">{{$item->gramature}}</td>
                        <td class="text-center">{{$item->width}}</td>
                        <td class="text-center">{{$item->supplier_code}}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3 text-primary" href="{{route('master.material.edit', ['id' => $item->id])}}"> <i data-lucide="edit" class="w-4 h-4 mr-1"></i> Edit </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <div id="superlarge-modal-size-preview" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-body">
                        <!-- BEGIN: Horizontal Form -->
                        <div class="intro-y box">
                            <div
                                class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">
                                    Tambah Material
                                </h2>
                            </div>
                            <div id="horizontal-form" class="p-5">
                                <form method="POST" action="{{route('master.material.save')}}">
                                    @csrf
                                    <div id="horizontal-form" class="p-5">
                                        <div class="preview">
                                            <div class="form-inline">
                                                <label for="vertical-form-1" class="sm:w-32 font-bold">Code </label>
                                                <input type="text" class="form-control" name="code" id="code">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-32 font-bold">Nama</label>
                                                <input type="text" class="form-control" name="name" id="name">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-32 font-bold">Tipe</label>
                                                <select data-placeholder="Pilih Tipe Pajak" class="tom-select w-full form-control" name="type">
                                                    <option value=" ">-</option>
                                                    <option value="KRAFT">KRAFT</option>
                                                    <option value="MEDIUM">MEDIUM</option>
                                                </select>
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-32 font-bold">Jenis Kertas</label>
                                                <select data-placeholder="Pilih Tipe Pajak"
                                                    class="tom-select w-full form-control" name="paper_type">
                                                    <option value=" ">-</option>
                                                    <option value="BROWN KRAFT">BROWN KRAFT</option>
                                                    <option value="WHITE KRAFT">WHITE KRAFT</option>
                                                    <option value="MEDIUM">MEDIUM</option>
                                                    <option value="TEST LINER">TEST LINER</option>
                                                </select>
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-32 font-bold">Gramature</label>
                                                <input type="text" class="form-control" name="gramature">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-32 font-bold">Lebar</label>
                                                <input type="text" class="form-control" name="width">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-32 font-bold">Satuan</label>
                                                <select data-placeholder="Pilih Tipe Pajak"
                                                    class="tom-select w-full form-control" name="unit">
                                                    <option value=" ">-</option>
                                                    <option value="GSM" selected>GSM</option>
                                                </select>
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-32 font-bold">Kode Supplier</label>
                                                <select data-placeholder="Pilih Kode Supplier" class="tom-select w-full form-control" name="supplier_code">
                                                    <option value=" ">-</option>
                                                    @foreach($suppliers as $supplier)
                                                    <option value="{{$supplier->code}}">{{$supplier->code}} - {{$supplier->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-32 font-bold">Harga</label>
                                                <input type="text" class="form-control" name="price" id="price">
                                            </div>
                                        </div>
                                        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                            <button type="button" data-tw-dismiss="modal"
                                                class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                            <button type="submit"
                                                class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
                                        </div>
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
    <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-slate-500 mt-2">
                            Do you really want to delete these records?
                            <br>
                            This process cannot be undone.
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal"
                            class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        <button type="button" class="btn btn-danger w-24">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->
</div>
@endsection

@section('script')
<script>
$(function() {
    $('#data-table').DataTable({
        order: false
    });

    $('#code').on('input', function() {
        $(this).val($(this).val().replace(/\s/g, '').toUpperCase());
    });

    $('#code').on('keypress', function(event) {
        if (event.which === 32) {
            event.preventDefault();
        }
    });

    $('#name').on('input', function() {
        $(this).val($(this).val().toUpperCase());
    });
})
</script>
@endsection
