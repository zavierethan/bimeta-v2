@extends('layouts._base')
@section('css')
@endsection
@section('main-content')
<div class="content content--top-nav">
    <!-- BEGIN: Transaction Details -->
    <div class="intro-y grid grid-cols-12 gap-5 mt-5">
        <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
            <div class="box p-5 rounded-md mb-5">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Informasi Pemakaian</div>
                </div>
                <div class="intro-y grid grid-cols-12 gap-5 mt-5">
                    <div class="col-span-12 lg:col-span-4 2xl:col-span-4">
                        <div class="form-inline">
                            <label for="vertical-form-1" class="w-40 font-bold">Incharge</label>
                            <input id="vertical-form-1" type="text" class="form-control" value="{{$materialUsed->incharge}}" readonly>
                        </div>
                        <div class="form-inline mt-5">
                            <label for="vertical-form-1" class="w-40 font-bold">Tanggal Pemakaian</label>
                            <input id="vertical-form-1" type="date" class="form-control" value="{{$materialUsed->date}}" readonly>
                        </div>
                    </div>
                </div>
                <!-- <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <button id="update" class="flex items-center ml-auto text-white btn btn-primary shadow-md"><i data-lucide="refresh-ccw" class="w-4 h-4 mr-2"></i>Perbaharui</button>
                </div> -->
            </div>
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Detail Pemakaian</div>

                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview"
                        class="flex items-center ml-auto text-white btn btn-primary shadow-md"> <i data-lucide="plus" class="w-4 h-4"></i>
                    </a>

                </div>
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible show flex items-center mb-10" role="alert">
                    <i data-lucide="alert-triangle" class="w-6 h-6 mr-2"></i> {{ session('error') }} <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x" class="w-4 h-4"></i> </button>
                </div>
                @endif
                <div class="overflow-auto lg:overflow-visible -mt-3">
                    <table class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="whitespace-nowrap text-center">ACTION</th>
                                <th class="whitespace-nowrap text-center">NO. MESIN</th>
                                <th class="whitespace-nowrap">NO. ROLL</th>
                                <th class="whitespace-nowrap">NAMA MATERIAL</th>
                                <!-- <th class="whitespace-nowrap">SPESIFIKASI</th> -->
                                <th class="whitespace-nowrap text-center">LEBAR (CM)</th>
                                <th class="whitespace-nowrap text-center">MASUK MESIN (KG)</th>
                                <th class="whitespace-nowrap text-center">TERPAKAI (KG)</th>
                                <th class="whitespace-nowrap text-center">SISA TIMBANGAN (KG)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detailMateialUsed as $data)
                            <tr data-id="{{$data->id}}">
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center text-danger mr-3"
                                            href="{{route('production.material-used.detail.delete', ['id' => $data->id])}}"
                                            onclick="return confirm('Apakah anda yakin ?')"><i
                                                data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete</a>
                                        <a class="flex items-center text-success mr-3 edit-detail" data-tw-toggle="modal" data-tw-target="#edit-form"
                                            href="javascript:;"><i data-lucide="edit" class="w-4 h-4 mr-1"></i> Edit</a>
                                    </div>
                                </td>
                                <td class="text-center">{{$data->machine_no}}</td>
                                <td>{{$data->no_roll}}</td>
                                <td>{{$data->material_name}}</td>
                                <!-- <td>{{$data->material_type_name}} {{$data->gramature}} {{$data->supplier_code}}</td> -->
                                <td class="text-center">{{$data->width}}</td>
                                <td class="text-center">{{$data->initial_quantity}}</td>
                                <td class="text-center">{{$data->quantity_used}}</td>
                                <td class="text-center">{{$data->remaining_quantity}}</td>
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
                                            Form Pemakaian Material
                                        </h2>
                                    </div>
                                    <div id="horizontal-form" class="p-5">
                                        <form method="POST" action="{{route('production.material-used.detail.save')}}">
                                            @csrf
                                            <div class="preview">
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Nomor Mesin</label>
                                                    <select data-placeholder="Pilih Material" class="tom-select w-full form-control" name="machine_no" required>
                                                        <option value=" ">-</option>
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">Material</label>
                                                    <select data-placeholder="Pilih Material" class="tom-select w-full form-control" name="material_id" required>
                                                        <option value=" ">-</option>
                                                        @foreach($materials as $material)
                                                        <option value="{{$material->id}}">
                                                            {{$material->no_roll}} | {{$material->name}} L : {{$material->material_width}} | STOCK QTY : {{$material->weight}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Masuk Mesin (Kg)</label>
                                                    <input id="vertical-form-1" type="text" class="form-control" name="initial_quantity" required>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Terpakai (Kg)</label>
                                                    <input id="vertical-form-1" type="text" class="form-control" name="quantity_used" required>
                                                    <input id="vertical-form-1" type="hidden" class="form-control" name="material_used_id" value="{{$materialUsed->id}}" required>
                                                </div>
                                            </div>
                                            <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                                <button type="button" data-tw-dismiss="modal"
                                                    class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                                <button type="submit"
                                                    class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
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
                                            Form Edit Pemakaian Material
                                        </h2>
                                    </div>
                                    <div id="horizontal-form" class="p-5">
                                        <form method="POST" action="{{route('production.material-used.detail.update')}}">
                                            @csrf
                                            <div class="preview">
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Nomor Mesin</label>
                                                    <select data-placeholder="Pilih Material" class="tom-select w-full form-control machine_no" name="machine_no" required>
                                                        <option value=" ">-</option>
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">Material</label>
                                                    <select data-placeholder="Pilih Material" class="tom-select w-full form-control material_id" name="material_id" required>
                                                        <option value=" ">-</option>
                                                        @foreach($materials as $material)
                                                        <option value="{{$material->id}}">
                                                            {{$material->no_roll}} | {{$material->name}} L : {{$material->material_width}} | {{$material->weight}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Masuk Mesin (Kg)</label>
                                                    <input id="vertical-form-1" type="text" class="form-control initial_quantity" name="initial_quantity" required>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Terpakai (Kg)</label>
                                                    <input id="vertical-form-1" type="text" class="form-control quantity_used" name="quantity_used" required>
                                                    <input id="vertical-form-1" type="hidden" class="form-control id" name="id" value="{{$materialUsed->id}}" required>
                                                </div>
                                            </div>
                                            <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                                <button type="button" data-tw-dismiss="modal"
                                                    class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                                <button type="submit"
                                                    class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
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


            <div class="box p-5 rounded-md mt-5">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Summary Detail Pemakaian</div>
                </div>
                <div class="overflow-auto lg:overflow-visible -mt-3">
                    <table class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="whitespace-nowrap">NAMA MATERIAL</th>
                                <th class="whitespace-nowrap text-center">LEBAR (CM)</th>
                                <th class="whitespace-nowrap text-center">TOTAL PEMAKAIAN (KG)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detailMateialSummary as $data)
                            <tr>
                                <td>{{$data->material_name}}</td>
                                <td class="text-center">{{$data->width}}</td>
                                <td class="text-center">{{$data->total_pemakaian}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <!-- END: Transaction Details -->
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
<script>
$(document).ready(function() {

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
            url: '{{route("production.material-used.detail.edit")}}', // Specify the URL of your server endpoint
            type: 'POST', // or 'POST' depending on your server setup
            dataType: 'json', // Assuming the response will be
            data: { id: id },
            success: function(response) {

                // Assuming response.data is an array of SPK objects
                var data = response.data;

                $("#edit-form .id").val(data.id);

                var machine_no = $("#edit-form .machine_no")[0].tomselect;
                machine_no.setValue(data.machine_no);

                var material_id = $("#edit-form .material_id")[0].tomselect;
                material_id.setValue(data.material_id);

                $("#edit-form .initial_quantity").val(data.initial_quantity);

                $("#edit-form .quantity_used").val(data.quantity_used);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    }
});
</script>
@endsection
