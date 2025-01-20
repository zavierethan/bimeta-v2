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
                        <a href="" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw"
                                class="w-4 h-4 mr-3"></i> Reload Data </a>
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
                                    <div class="text-base text-slate-500 mt-1">Total Pengiriman</div>
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
                                    <div class="text-base text-slate-500 mt-1">Total Rejected</div>
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
                                    <div class="text-base text-slate-500 mt-1">Total Stok Finish Goods</div>
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
                            Laporan Pengiriman
                        </h2>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">

                        </div>
                    </div>
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <table class="table table-striped mt-2" id="data-table">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="whitespace-nowrap">NO SALES ORDER</th>
                                    <th class="whitespace-nowrap">NO. PO</th>
                                    <th class="whitespace-nowrap">NAMA BARANG</th>
                                    <th class="whitespace-nowrap">SPESIFIKASI</th>
                                    <th class="text-center whitespace-nowrap">TGL KIRIM</th>
                                    <th class="text-center whitespace-nowrap">NO SURAT JALAN</th>
                                    <th class="text-center whitespace-nowrap">QUANTITY PENGIRIMAN</th>
                                    <!-- <th class="text-center whitespace-nowrap">SISA</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $row)
                                    <tr>
                                        <td class="whitespace-nowrap">
                                            <div>{{ $row->customer_name }}</div>
                                            <div>{{ $row->sales_order }}</div>
                                        </td>
                                        <td class="whitespace-nowrap">{{ $row->ref_po_customer }}</td>
                                        <td class="whitespace-nowrap">
                                            <div>{{ $row->goods_name }}</div>
                                        </td>
                                        <td class="whitespace-nowrap">{{ $row->specification }} UK: {{ $row->measure }}</td>
                                        <td class="text-center whitespace-nowrap">
                                            @if($row->delivered_quantity != null)
                                                <?php echo date("d/m/Y", strtotime($row->delivery_date)); ?>
                                            @else
                                                <span class="text-danger">BELUM TERKIRIM</span>
                                            @endif
                                        </td>
                                        <td class="text-center whitespace-nowrap">{{ $row->travel_permit_no }}</td>
                                        <td class="text-center whitespace-nowrap">{{ $row->delivered_quantity }}</td>
                                        <!-- <td class="text-center whitespace-nowrap">{{ $row->remaining_amount }}</td> -->
                                    </tr>
                                @endforeach
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
    $('#data-table').DataTable({
        ordering: false
    });
})
</script>
@endsection
