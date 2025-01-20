@extends('layouts._base')
@section('css')
@endsection
@section('main-content')
<div class="content content--top-nav">
    <!-- BEGIN: Transaction Details -->
    <div class="intro-y grid grid-cols-12 gap-5 mt-5">
        <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Informasi Pembelian</div>
                    @if($purchase->status == 0)
                    <form action="{{route('procurement.purchase-order.confirm')}}" method="POST" class="flex items-center ml-auto">
                        @csrf
                        <input type="hidden" class="form-control" name="id" value="{{$purchase->id}}">
                        <button class="text-white btn btn-primary shadow-md"><i data-lucide="save" class="w-4 h-4 mr-2"></i>Konfirmasi & Simpan</button>
                    </form>
                    @endif
                </div>
                <form action="{{route('procurement.purchase-order.update')}}" method="POST">
                    @csrf
                    <div class="intro-y grid grid-cols-12 gap-5 mt-5">
                        <div class="col-span-12 lg:col-span-6 2xl:col-span-6">
                            <div class="rounded-md p-5">
                                <div class="form-inline">
                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">No. PO</label>
                                    <input id="horizontal-form-1" type="text" class="form-control" name="po_no" value="{{$purchase->po_no}}" readonly>
                                    <input id="horizontal-form-1" type="hidden" class="form-control" name="id" value="{{$purchase->id}}" readonly>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">Nama Supplier</label>
                                    <select data-placeholder="Pilih Supplier" class="tom-select w-full form-control" name="supplier_id" required>
                                        <option value=" "> - </option>
                                        @foreach($suppliers as $supplier)
                                        <option value="{{$supplier->id}}" <?php echo ($supplier->id == $purchase->supplier_id) ? 'selected' : ''; ?>>{{$supplier->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">Tanggal PO</label>
                                    <input id="horizontal-form-1" type="date" class="form-control" name="date" value="{{$purchase->date}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-6 2xl:col-span-6">
                            <div class="rounded-md p-5">
                                <div class="form-inline">
                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">Jenis Pajak</label>
                                    <select data-placeholder="Pilih Jenis Pajak" class="tom-select w-full form-control" name="tax_type" required>
                                        <option value=" "> - </option>
                                        <option value="0" <?php echo ($purchase->tax_type == '0') ? 'selected' : ''; ?>>V0 (Kawasan Berikat)</option>
                                        <option value="1" <?php echo ($purchase->tax_type == '1') ? 'selected' : ''; ?>>V1 (Exclude PPN)</option>
                                        <option value="2" <?php echo ($purchase->tax_type == '2') ? 'selected' : ''; ?>>V2 (Include PPN)</option>
                                    </select>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">Status</label>
                                    <input id="horizontal-form-1" type="text" class="form-control" name="status" value="{{$purchase->str_status}}" readonly>
                                </div>
                                <!-- <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Catatan</label>
                                    <textarea id="vertical-form-1" type="text" class="form-control" name="remarks">{{$purchase->remarks}}</textarea>
                                </div> -->
                                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                    <button type="submit" id="update" class="text-white btn btn-primary shadow-md"><i data-lucide="refresh-ccw" class="w-4 h-4 mr-2"></i>Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="intro-y grid grid-cols-12 gap-5 mt-5">
        <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Detail Pembelian</div>
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview" class="flex items-center ml-auto text-white btn btn-primary shadow-md"> <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
                        Tambah Barang
                    </a>
                </div>
                <div class="overflow-auto lg:overflow-visible -mt-3">
                    <table class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="whitespace-nowrap text-center">ACTION</th>
                                <th class="whitespace-nowrap">NAMA BARANG</th>
                                <th class="whitespace-nowrap text-center">UKURAN (CM)</th>
                                <th class="whitespace-nowrap text-center">JUMLAH</th>
                                <th class="whitespace-nowrap text-center">HARGA</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $data)
                            <tr data-id="{{$data->id}}">
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center text-danger mr-3" href="{{route('procurement.purchase-order.detail.delete', ['id' => $data->id])}}" onclick="return confirm('Apakah anda yakin ?')" title="Print SPK"><i data-lucide="trash-2"
                                        class="w-4 h-4 mr-1"></i> Delete</a>
                                        <a class="flex items-center text-success mr-3 edit-detail" href="javascript:;" data-tw-toggle="modal" data-tw-target="#edit-form"><i data-lucide="edit"
                                        class="w-4 h-4 mr-1"></i> Edit</a>
                                    </div>
                                </td>
                                <td>{{$data->name}}</td>
                                <td class="text-center">L: {{$data->width}}</td>
                                <td class="text-center quantity">{{$data->quantity}}</td>
                                <td class="text-center price">{{$data->price}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div id="superlarge-modal-size-preview" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-body">
                                <!-- BEGIN: Horizontal Form -->
                                <div class="intro-y box">
                                    <div
                                        class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                        <h2 class="font-medium text-base mr-auto">
                                            Tambah Barang
                                        </h2>
                                    </div>
                                    <div id="horizontal-form" class="p-5">
                                        <form method="POST" action="{{route('procurement.purchase-order.detail.save')}}">
                                            @csrf
                                            <div class="preview">
                                                <div class="form-inline mt-5">
                                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">Material</label>
                                                    <select data-placeholder="Pilih Material" class="tom-select w-full form-control" name="material_id" required>
                                                        <option value=" ">-</option>
                                                        @foreach($materials as $material)
                                                        <option value="{{$material->id}}">{{$material->name}} L: {{$material->width}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Jumlah (Roll)</label>
                                                    <input id="vertical-form-1" type="number" class="form-control" name="quantity" required>
                                                    <input id="vertical-form-1" type="hidden" class="form-control" name="purchase_id" value="{{$purchase->id}}">
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Harga </label>
                                                    <input id="vertical-form-1" type="number" class="form-control" name="price" value="0" required>
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

                <div id="edit-form" class="modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-body">
                                <!-- BEGIN: Horizontal Form -->
                                <div class="intro-y box">
                                    <div
                                        class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                        <h2 class="font-medium text-base mr-auto">
                                            Form Edit Barang (Raw Material)
                                        </h2>
                                    </div>
                                    <div id="horizontal-form" class="p-5">
                                        <form method="POST" action="{{route('procurement.purchase-order.detail.update')}}">
                                            @csrf
                                            <div class="preview">
                                                <div class="form-inline mt-5">
                                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">Material</label>
                                                    <select data-placeholder="Pilih Material" class="tom-select w-full form-control material_id" name="material_id" required>
                                                        <option value=" ">-</option>
                                                        @foreach($materials as $material)
                                                        <option value="{{$material->id}}">{{$material->name}} L: {{$material->width}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Jumlah (Roll)</label>
                                                    <input type="number" class="form-control quantity" name="quantity" required>
                                                    <input type="hidden" class="form-control id" name="id" required>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Harga</label>
                                                    <input type="number" class="form-control price" name="price" value="0" required>
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
            </div>
        </div>
    </div>
    <!-- END: Transaction Details -->
</div>
@endsection

@section('script')
<script>
    $(function() {
        $(".edit-detail").click(function() {
            var row = $(this).closest('tr');
            var row_id = row.attr('data-id');
            getDataRowById(row_id);
        });

        function getDataRowById(id) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{route("procurement.purchase-order.detail.edit")}}', // Specify the URL of your server endpoint
                type: 'POST', // or 'POST' depending on your server setup
                dataType: 'json', // Assuming the response will be
                data: { id: id },
                success: function(response) {

                    // Assuming response.data is an array of SPK objects
                    var data = response.data;

                    console.log(data)

                    $("#edit-form .id").val(data.id);
                    var goods_id = $("#edit-form .material_id")[0].tomselect;
                    goods_id.setValue(data.material_id);
                    $("#edit-form .quantity").val(data.quantity);
                    $("#edit-form .width").val(data.width);
                    $("#edit-form .price").val(data.price);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        }
    });
</script>
@endsection
