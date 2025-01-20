@extends('layouts._base')
@section('active-url')
<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-12">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Laporan Umum
                        </h2>
                        <div class="form-inline ml-auto">
                            <label for="vertical-form-1" class="sm:w-32 font-bold">Filter Tanggal</label>
                            <input type="text" data-daterange="true" class="datepicker form-control w-56 block">
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="shopping-cart" class="report-box__icon text-primary"></i>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                                title="33% Higher than last month"> 33% <i data-lucide="chevron-up"
                                                    class="w-4 h-4 ml-0.5"></i> </div>
                                        </div>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">0</div>
                                    <div class="text-base text-slate-500 mt-1">Total SPK</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="monitor" class="report-box__icon text-warning"></i>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                                title="12% Higher than last month"> 12% <i data-lucide="chevron-up"
                                                    class="w-4 h-4 ml-0.5"></i> </div>
                                        </div>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">0</div>
                                    <div class="text-base text-slate-500 mt-1">Total SPK di Proses</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-lucide="user" class="report-box__icon text-success"></i>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                                title="22% Higher than last month"> 22% <i data-lucide="chevron-up"
                                                    class="w-4 h-4 ml-0.5"></i> </div>
                                        </div>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">0</div>
                                    <div class="text-base text-slate-500 mt-1">Total SPK Selesai</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->

                <!-- BEGIN: Weekly Top Products -->
                <div class="col-span-12 mt-6">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Laporan Hasil Produksi
                        </h2>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">

                        </div>
                    </div>
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <table class="table sm:mt-5" id="data-table-1">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="whitespace-nowrap">NAMA MATERIAL</th>
                                    <th class="text-center whitespace-nowrap">LEBAR</th>
                                    <th class="text-center whitespace-nowrap">TOTAL QUANTITY (KG)</th>
                                    <th class="text-center whitespace-nowrap">TOTAL ROLL</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END: Weekly Top Products -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(function() {
    $('#data-table-1').DataTable({
        order: [
            [0, 'asc'],
            [1, 'desc']
        ]
    });

    $('#data-table-2').DataTable({
        ordering: false
    });
})
</script>
@endsection
