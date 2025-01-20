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
                    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                        <h2 class="text-2xl font-extrabold dark:text-primary">Laporan Umum</h2>
                        <div class="hidden md:block mx-auto text-slate-500"></div>
                        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#filter-laporan-persediaan" class="btn btn-primary shadow-md mr-2">Export Laporan Persediaan Bahan Baku</a>
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
                                                title="33% Higher than last month">  <i data-lucide="chevron-up"
                                                    class="w-4 h-4 ml-0.5"></i> </div>
                                        </div>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">{{$totalPurchase}}</div>
                                    <div class="text-base text-slate-500 mt-1">Total Pembelian (Kg)</div>
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
                                                title="22% Higher than last month">  <i data-lucide="chevron-up"
                                                    class="w-4 h-4 ml-0.5"></i> </div>
                                        </div>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">{{$totalStockMaterial}}</div>
                                    <div class="text-base text-slate-500 mt-1">Total Persediaan (Kg)</div>
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
                                                title="12% Higher than last month">  <i data-lucide="chevron-up"
                                                    class="w-4 h-4 ml-0.5"></i> </div>
                                        </div>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">{{$totalMaterialUsed}}</div>
                                    <div class="text-base text-slate-500 mt-1">Total Pemakaian (Kg)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->

                <div class="col-span-12 mt-6">
                    <div class="intro-y block sm:flex items-center h-10 mb-5">
                        <h2 class="text-2xl font-extrabold dark:text-primary mr-5">
                            Laporan Pembelian Material
                        </h2>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#" class="btn btn-primary shadow-md mr-2">Export Excel</a>
                        </div>
                    </div>
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <table class="table sm:mt-3" id="data-table-3">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="whitespace-nowrap">TANGGAL</th>
                                    <th class="whitespace-nowrap">NAMA MATERIAL</th>
                                    <th class="text-center whitespace-nowrap">LEBAR</th>
                                    <th class="text-center whitespace-nowrap">TOTAL QUANTITY (KG)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($purchase as $p)
                                <tr>
                                    <td class="whitespace-nowrap"><?php echo date("d/m/Y", strtotime($p->date)); ?></td>
                                    <td class="whitespace-nowrap">{{$p->specification}}</td>
                                    <td class="text-center whitespace-nowrap">{{$p->width}}</td>
                                    <td class="text-center whitespace-nowrap">{{$p->total_purchase}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- BEGIN: Weekly Top Products -->
                <div class="col-span-12 mt-6">
                    <div class="intro-y block sm:flex items-center h-10  mb-5">
                        <h2 class="text-2xl font-extrabold dark:text-primary mr-5">
                            Laporan Persediaan Material
                        </h2>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#" class="btn btn-primary shadow-md mr-2">Export Excel</a>
                        </div>
                    </div>
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <table class="table sm:mt-3" id="data-table-1">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="whitespace-nowrap">NAMA MATERIAL</th>
                                    <th class="text-center whitespace-nowrap">LEBAR</th>
                                    <th class="text-center whitespace-nowrap">TOTAL QUANTITY (KG)</th>
                                    <th class="text-center whitespace-nowrap">TOTAL ROLL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stockList as $stock)
                                <tr>
                                    <td class="whitespace-nowrap">{{$stock->name}}</td>
                                    <td class="text-center whitespace-nowrap">{{$stock->width}}</td>
                                    <td class="text-center whitespace-nowrap">{{$stock->total_weight}}</td>
                                    <td class="text-center whitespace-nowrap">{{$stock->total_roll}}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END: Weekly Top Products -->

                <!-- BEGIN: Weekly Top Products -->
                <div class="col-span-12 mt-6">
                    <div class="intro-y block sm:flex items-center h-10 mb-5">
                        <h2 class="text-2xl font-extrabold dark:text-primary mr-5">
                            Laporan Pemakaian Material
                        </h2>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#" class="btn btn-primary shadow-md mr-2">Export Excel</a>
                        </div>
                    </div>
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <table class="table sm:mt-3" id="data-table-2">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="whitespace-nowrap">TANGGAL PEMAKAIAN</th>
                                    <th class="whitespace-nowrap">NAMA MATERIAL</th>
                                    <th class="whitespace-nowrap text-center">LEBAR</th>
                                    <th class="text-center whitespace-nowrap">TOTAL PEMAKAIAN (KG)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($materialUsed as $item)
                                <tr>
                                    <td><?php echo date("d/m/Y", strtotime($item->date)); ?></td>
                                    <td>{{$item->name}}</td>
                                    <td class="whitespace-nowrap text-center">{{$item->width}}</td>
                                    <td class="text-center whitespace-nowrap">{{$item->total_material_used}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                </div>
                <!-- END: Weekly Top Products -->
            </div>
            <!-- BEGIN: Filter Laporan Persediaan Bahan Baku Modal -->
            <div id="filter-laporan-persediaan" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="intro-y box">
                                <div
                                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                    <h2 class="font-medium text-base mr-auto">
                                        Periode Tanggal
                                    </h2>
                                </div>
                                <div id="horizontal-form" class="p-5">
                                    <form method="GET" action="{{route('procurement.report.export')}}">
                                        @csrf
                                        <div class="preview">
                                            <div class="form-inline mt-5">
                                                <label for="horizontal-form-2" class="sm:w-32 font-bold">Dari Tanggal</label>
                                                <input id="horizontal-form-1" type="date" class="form-control" name="start_date" required>
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="horizontal-form-2" class="sm:w-32 font-bold">Sampai Tanggal</label>
                                                <input id="horizontal-form-1" type="date" class="form-control" name="end_date" required>
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="horizontal-form-2" class="sm:w-32 font-bold">Material</label>
                                                <select data-placeholder="Pilih Stok Material" class="tom-select w-full form-control" name="material" required>
                                                    <option value=" "> - </option>
                                                    @foreach($materials as $material)
                                                    <option value="{{$material->name}}">{{$material->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                            <button type="button" data-tw-dismiss="modal" class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <!-- END: Stock Opname Modal -->
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
        order: [
            [0, 'desc'],
            [2, 'asc']
        ]
    });

    $('#data-table-3').DataTable({
        ordering: false
    });
})
</script>
@endsection
