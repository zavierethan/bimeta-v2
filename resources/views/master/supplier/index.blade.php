@extends('layouts._base')
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Master Data</li>
<li class="breadcrumb-item active" aria-current="page">Supplier</li>
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <h2 class="text-2xl font-extrabold dark:text-primary">Master Data Supplier</h2>
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview" class="btn btn-primary text-white">
                    Tambah Supplier
                </a>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="data-table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="whitespace-nowrap">CODE</th>
                        <th class="whitespace-nowrap">NAMA SUPPLIER</th>
                        <th class="whitespace-nowrap">EMAIL</th>
                        <th class="whitespace-nowrap">NO. TELEPON</th>
                        <th class="whitespace-nowrap">ALAMAT</th>
                        <th class="text-center">PIC</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td class="whitespace-nowrap">{{$item->code}}</td>
                        <td class="whitespace-nowrap">{{$item->name}}</td>
                        <td class="whitespace-nowrap">{{$item->email}}</td>
                        <td class="whitespace-nowrap">{{$item->phone_number}}</td>
                        <td class="whitespace-nowrap">{{$item->address}}</td>
                        <td class="text-center">{{$item->pic}}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3 text-primary"
                                    href="{{route('master.supplier.edit', ['id' => $item->id])}}"> <i data-lucide="edit"
                                        class="w-4 h-4 mr-1"></i> Edit </a>
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
                                    Tambah Supplier
                                </h2>
                            </div>
                            <div id="horizontal-form" class="p-5">
                                <form method="POST" action="{{route('master.supplier.save')}}">
                                    @csrf
                                    <div id="horizontal-form" class="p-5">
                                        <div class="preview">
                                            <div class="form-inline">
                                                <label for="vertical-form-1" class="sm:w-32 font-bold">Code</label>
                                                <input type="text" class="form-control" name="code" id="code">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-32 font-bold">Nama Supplier</label>
                                                <input type="text" class="form-control" name="name">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-32 font-bold">Email</label>
                                                <input type="email" class="form-control" name="email">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-32 font-bold">Nomor Telepon</label>
                                                <input type="text" class="form-control" name="phone_number">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-32 font-bold">Fax</label>
                                                <input type="text" class="form-control" name="fax">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-32 font-bold">PIC</label>
                                                <input type="text" class="form-control" name="pic">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-32 font-bold">No. Rekening</label>
                                                <input type="text" class="form-control" name="bank_account_no">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-32 font-bold">Rekening A/N</label>
                                                <input type="text" class="form-control" name="bank_account_name">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-32 font-bold">Bank</label>
                                                <input type="text" class="form-control" name="bank_name">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-32 font-bold">NPWP</label>
                                                <input type="text" class="form-control" name="npwp">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-32 font-bold">Jenis Pajak</label>
                                                <select data-placeholder="Pilih Tipe Pajak" class="tom-select w-full form-control" name="tax_type">
                                                    <option value=" ">-</option>
                                                    <option value="0">V0</option>
                                                    <option value="1">V1</option>
                                                    <option value="2">V2</option>
                                                </select>
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="vertical-form-1" class="sm:w-32 font-bold">Alamat</label>
                                                <textarea type="text" class="form-control" name="address"></textarea>
                                            </div>
                                        </div>
                                        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                            <button type="button" data-tw-dismiss="modal" class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
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
</div>
@endsection

@section('script')
<script>
$(function() {
    $('#data-table').DataTable();

    $('#code').on('input', function() {
        $(this).val($(this).val().replace(/\s/g, '').toUpperCase());
    });

    $('#code').on('keypress', function(event) {
        if (event.which === 32) {
            event.preventDefault();
        }
    });
})
</script>
@endsection
