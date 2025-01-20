@extends('layouts._base')
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Sales Order</li>
<li class="breadcrumb-item active" aria-current="page">PO Customer</li>
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <h2 class="text-2xl font-extrabold dark:text-primary">Sales Order</h2>
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview" class="btn btn-primary flex items-center text-white"> <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
                    Input P.O Customer
                </a>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="data-table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="whitespace-nowrap">NO. SALES ORDER</th>
                        <th class="whitespace-nowrap">NO. PO</th>
                        <th class="whitespace-nowrap">CUSTOMER</th>
                        <th class="text-center whitespace-nowrap">TANGGAL PESANAN</th>
                        <th class="text-center whitespace-nowrap">TANGGAL PENGIRIMAN</th>
                        <th class="text-center whitespace-nowrap">PIC</th>
                        <th class="text-center whitespace-nowrap">JENIS PAJAK</th>
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
                        <td class="text-center">{{$item->assigned_to}}</td>
                        <td class="text-center">{{$item->str_tx_type}}</td>
                        <td class="text-center text-success font-bold">{{$item->str_status}}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3 text-primary" href="{{route('sales.edit', ['id' => $item->id])}}"> <i data-lucide="edit" class="w-4 h-4 mr-1"></i> Detail </a>
                                <a class="flex items-center mr-3 text-primary" href="{{route('sales.monitroing.index', ['id' => $item->id])}}"> <i data-lucide="eye" class="w-4 h-4 mr-1"></i> Monitor </a>
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
    <div id="superlarge-modal-size-preview" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- BEGIN: Horizontal Form -->
                    <div class="intro-y box">
                        <div
                            class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Input P.O Customer
                            </h2>
                        </div>
                        <div id="horizontal-form" class="p-5">
                            <form method="POST" action="{{route('sales.save')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="preview">
                                    <div class="form-inline">
                                        <label for="horizontal-form-1" class="sm:w-40 font-bold">PO. Customer</label>
                                        <input type="text" class="form-control" id="ref_po_customer" name="ref_po_customer" required>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="sm:w-40 font-bold">Customer</label>
                                        <select data-placeholder="Pilih customer" class="tom-select w-full form-control" id="customer_id" name="customer_id" required>
                                            <option value=" "> - </option>
                                            @foreach($customers as $customer)
                                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="sm:w-40 font-bold">Tanggal Pesanan</label>
                                        <input type="date" class="form-control" id="order_date" name="order_date" required>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="sm:w-40 font-bold">Tanggal Pengiriman</label>
                                        <input type="date" class="form-control" id="delivery_date" name="delivery_date" required>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="sm:w-40 font-bold">Jenis Pajak</label>
                                        <select data-placeholder="Pilih Jenis Pajak" class="tom-select w-full form-control" id="tax_type" name="tax_type" required>
                                            <option value=" "> - </option>
                                            <option value="0">V0 (Kawasan Berikat)</option>
                                            <option value="1">V1 (Exclude PPN)</option>
                                            <option value="2">V2 (Include PPN)</option>
                                            <option value="3">V3 (Sample)</option>
                                        </select>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-2" class="sm:w-40 font-bold">PIC Produksi</label>
                                        <select data-placeholder="Pilih customer" class="tom-select w-full form-control" id="assign_to" name="assign_to" required>
                                            <option value=" "> - </option>
                                            @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->display_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-inline mt-5 shipping-address">
                                        <label for="vertical-form-1" class="sm:w-40 font-bold">Alamat Pengiriman</label>
                                        <textarea type="text" class="form-control" id="shipping_address" name="shipping_address"></textarea>
                                    </div>
                                    <div class="form-inline mt-2">
                                        <label for="vertical-form-1" class="sm:w-40 font-bold"></label>
                                        <input class="form-check-input" type="checkbox" id="flag_use_customer_addr" name="flag_use_customer_addr" value="1">
                                        <label class="form-check-label" for="checkbox-switch-1">Gunakan Alamat Custumer Sebagai Alamat Pengiriman</label>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-40 font-bold">Lampiran</label>
                                        <input type="file" class="form-control" id="attachment" name="attachment">
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-40 font-bold">Bypass Ke Pengiriman ?</label>
                                        <input class="form-check-input" type="checkbox" id="flag_bypass" name="flag_bypass" value="1">
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="vertical-form-1" class="sm:w-40 font-bold">Catatan</label>
                                        <textarea type="text" class="form-control" id="remarks" name="remarks"></textarea>
                                    </div>
                                </div>
                                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                    <button type="button" data-tw-dismiss="modal" class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                    <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END: Horizontal Form -->
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
    $("#superlarge-modal-size-preview").show();
    $("#collapse-form").hide();

    $("#add-data").click(function() {
        $("#collapse-form").slideToggle("slow");
    });

    $("#flag_use_customer_addr").change(function () {
            if($(this).is(":checked")) {
                $("#shipping_address").prop("readonly", true);
            } else {
                $("#shipping_address").prop("readonly", false);
            }
    });

    $("#customer_id").change(function() {

        var id = $(this).val();

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        $.ajax({
            url: '{{route("get-data-customer")}}', // Specify the URL of your server endpoint
            type: 'POST', // or 'POST' depending on your server setup
            dataType: 'json', // Assuming the response will be
            data: { id: id},
            success: function(response) {

                    // Assuming response.data is an array of SPK objects
                var data = response.data;

                console.log(data)

                // $("#form-modal-edit .id").val(data.id);
                var tax_type = $("#tax_type")[0].tomselect;
                    tax_type.setValue(data.tax_type);

                var assign_to = $("#assign_to")[0].tomselect;
                    assign_to.setValue(data.PIC);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    });
})
</script>
@endsection
