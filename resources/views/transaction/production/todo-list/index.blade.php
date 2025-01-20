@extends('layouts._base')
@section('active-url')
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Production</li>
<li class="breadcrumb-item active" aria-current="page">Todo List Order</li>
@endsection
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <h2 class="text-2xl font-extrabold dark:text-primary">Todo List Order</h2>
            <div class="hidden md:block mx-auto text-slate-500"></div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table -mt-2" id="data-table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="whitespace-nowrap">NO. SALES ORDER</th>
                        <th class="whitespace-nowrap">NO. PO</th>
                        <th class="whitespace-nowrap">CUSTOMER</th>
                        <th class="text-center whitespace-nowrap">TANGGAL PESANAN</th>
                        <th class="text-center whitespace-nowrap">TANGGAL PENGIRIMAN</th>
                        <th class="text-center whitespace-nowrap">STATUS</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr class="intro-x">
                        <td>{{$item->transaction_no}}</td>
                        <td>{{$item->ref_po_customer}}</td>
                        <td>{{$item->customer_name}}</td>
                        <td class="text-center"><?php echo date("d/m/Y", strtotime($item->order_date)); ?></td>
                        <td class="text-center"><?php echo date("d/m/Y", strtotime($item->delivery_date)); ?></td>
                        <td class="text-center">
                            @if($item->status == 1)
                            <div class="py-1 px-2 rounded-full text-xs bg-danger text-white cursor-pointer font-medium">NEW ORDER</div>
                            @endif
                            @if($item->status == 2)
                            <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">CLAIMED</div>
                            @endif
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                @if($item->status == 1)
                                <a class="flex items-center mr-3"
                                    href="{{route('production.todo-list.claim-order', ['id' => $item->id])}}"
                                    title="Klik untuk claim order"><i data-lucide="check-square"
                                        class="w-4 h-4 mr-1"></i>Claim</a>
                                @endif
                                @if($item->status == 2)
                                <a class="flex items-center mr-3"
                                    href="{{route('production.todo-list.detail', ['id' => $item->id])}}"
                                    title="Detail Order"><i data-lucide="edit" class="w-4 h-4 mr-1"></i>Detail Order</a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
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
        order: [[0, 'desc']]
    });
});
</script>
@endsection
