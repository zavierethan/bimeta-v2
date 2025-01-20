@extends('layouts._base')
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Master Data</li>
<li class="breadcrumb-item active" aria-current="page">Barang</li>
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <h2 class="text-2xl font-extrabold dark:text-primary">Master Data Barang</h2>
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <a href="{{route('master.goods.create')}}" class="btn btn-primary shadow-md mr-2">Tambah Barang</a>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="data-table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="whitespace-nowrap">KODE</th>
                        <th class="whitespace-nowrap">NAMA BARANG</th>
                        <th class="whitespace-nowrap text-center">JENIS BARANG</th>
                        <th class="whitespace-nowrap">SPESIFIKASI</th>
                        <th class="whitespace-nowrap">UKURAN</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{$item->code}}</td>
                        <td>{{$item->name}}</td>
                        <td class="text-center">{{$item->type}}</td>
                        <td>{{$item->spec_str}}</td>
                        <td>{{$item->meas_str}}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3 text-primary"
                                    href="{{route('master.goods.edit', ['id' => $item->id])}}"> <i data-lucide="edit"
                                        class="w-4 h-4 mr-1"></i> Edit </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
    </div>
</div>
@endsection

@section('script')
<script>
$(function() {
    $('#data-table').DataTable();
});
</script>
@endsection
