@extends('layouts._base')
@section('main-content')
<div class="content content--top-nav">
        <div class="intro-y grid grid-cols-12 gap-5 mt-5">
            <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
                <form action="{{route('master.goods.update')}}" method="post">
                    @csrf
                    <div class="box p-5 rounded-md">
                        <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                            <div class="font-medium text-base truncate">Informasi Barang</div>
                        </div>
                        <div class="intro-y grid grid-cols-12 gap-5 mt-5">
                                <div class="col-span-12 lg:col-span-6 2xl:col-span-6">
                                    <div class="rounded-md p-5">
                                        <div class="form-inline">
                                            <label for="horizontal-form-2" class="sm:w-28 font-bold">Kode Barang</label>
                                            <input type="text" class="form-control" name="code" id="code" value="{{$goods->code}}">
                                            <input type="hidden" class="form-control" name="id" id="id" value="{{$goods->id}}">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="horizontal-form-2" class="sm:w-28 font-bold">Nama Barang</label>
                                            <input type="text" class="form-control" name="name" id="name" value="{{$goods->name}}">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="horizontal-form-2" class="sm:w-28 font-bold">Tipe Barang</label>
                                            <select data-placeholder="Pilih Tipe Barang" class="tom-select w-full form-control" name="type" id="type">
                                                <option value="">-</option>
                                                <option value="A" <?php echo ($goods->type == 'A') ? 'selected' : ''; ?>>A</option>
                                                <option value="B" <?php echo ($goods->type == 'B') ? 'selected' : ''; ?>>B</option>
                                                <option value="AB" <?php echo ($goods->type == 'AB') ? 'selected' : ''; ?>>AB</option>
                                                <option value="BB" <?php echo ($goods->type == 'BB') ? 'selected' : ''; ?>>BB</option>
                                                <option value="ROLL" <?php echo ($goods->type == 'ROLL') ? 'selected' : ''; ?>>ROLL</option>
                                                <option value="WASTE" <?php echo ($goods->type == 'WASTE') ? 'selected' : ''; ?>>WASTE</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 lg:col-span-6 2xl:col-span-6">
                                    <div class="rounded-md p-5">
                                        <div class="form-inline">
                                            <label for="horizontal-form-2" class="sm:w-28 font-bold">Spesifikasi</label>
                                            <input type="text" class="form-control" name="spec_str" id="spec_str" value="{{$goods->spec_str}}">
                                        </div>
                                        <div class="form-inline mt-5">
                                            <label for="horizontal-form-2" class="sm:w-28 font-bold">Ukuran</label>
                                            <input type="text" class="form-control" name="meas_str" id="meas_str" value="{{$goods->meas_str}}">
                                        </div>
                                        <!-- <div class="form-inline mt-5">
                                            <label for="horizontal-form-2" class="sm:w-28 font-bold">Harga</label>
                                            <input type="text" class="form-control" name="price" id="price" value="{{$goods->price}}">
                                        </div> -->
                                        <div class="form-inline mt-5">
                                            <button type="submit" class="btn btn-primary w-full md:w-52 ml-auto">Perbaharui</button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="intro-y grid grid-cols-12 gap-3 mt-3">
            <div class="col-span-12 lg:col-span-12">
                <div class="intro-y box mt-5">
                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">
                            Detail Spesifikasi Barang
                        </h2>
                        <div class="ml-auto">
                            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#form-modal" class="btn text-white btn btn-primary shadow-md">
                                <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i></span>
                            </a>
                        </div>
                    </div>
                    <div id="horizontal-form" class="p-5">
                        <table class="table" id="data-table">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="text-center">ACTION</th>
                                    <th class="text-center">BAGIAN</th>
                                    <th class="text-center">TiPE PLY</th>
                                    <th class="text-center">TIPE FLUTE</th>
                                    <th class="text-center">SUBSTANCE</th>
                                    <th class="text-center">UKURAN</th>
                                    <th class="text-center">SATUAN UKURAN</th>
                                    <th class="text-center">TIPE UKURAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($specifications as $item)
                                <tr data-id="{{$item->id}}">
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <a href="{{route('master.goods.detail.delete', ['id' => $item->id])}}" class="flex items-center mr-3 text-danger" onclick="return confirm('Apakah anda yakin ? ketika data ini di hapus akan berpengaruh pada data yang lain .')">
                                                <i data-lucide="trash" class="w-4 h-4 mr-1"></i> Delete
                                            </a>
                                            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#form-modal-edit" class="flex items-center mr-3 text-success edit-detail">
                                                <i data-lucide="edit" class="w-4 h-4 mr-1"></i> Edit
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-center">{{$item->part_code}}</td>
                                    <td class="text-center">{{$item->ply_type}}</td>
                                    <td class="text-center">{{$item->flute_type}}</td>
                                    <td class="text-center">{{$item->substance}}</td>
                                    <td class="text-center">
                                        @if($item->part_code == 'A')
                                        <?php echo $item->length.' X '.$item->width. ' X ' .$item->height; ?>
                                        @else
                                        <?php echo $item->length.' X '.$item->width; ?>
                                        @endif
                                    </td>
                                    <td class="text-center">{{$item->measure_unit}}</td>
                                    <td class="text-center">{{$item->measure_type}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div id="form-modal" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <!-- BEGIN: Horizontal Form -->
                                    <div class="intro-y box">
                                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                            <h2 class="font-medium text-base mr-auto">
                                                Form Spesifikasi Barang
                                            </h2>
                                        </div>
                                        <div id="horizontal-form" class="p-5">
                                            <div class="form-inline">
                                                <label for="horizontal-form-2" class="sm:w-32 font-bold">Bagian </label>
                                                <select data-placeholder="Pilih Bagian" class="tom-select w-full form-control" name="part_code" id="part_code">
                                                    <option value=" ">-</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="ROLL">ROLL</option>
                                                </select>
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="horizontal-form-2" class="sm:w-32 font-bold">Tipe Ply</label>
                                                <select data-placeholder="Pilih Tipe Ply" class="tom-select w-full form-control" name="ply_type" id="ply_type">
                                                    <option value=" ">-</option>
                                                    <option value="SF">SF</option>
                                                    <option value="SW">SW</option>
                                                    <option value="DW">DW</option>
                                                    <option value="TW">TW</option>
                                                </select>
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="horizontal-form-2" class="sm:w-32 font-bold">Tipe Flute </label>
                                                <select data-placeholder="Pilih Tipe Flute" class="tom-select w-full form-control" name="flute_type" id="flute_type">
                                                    <option value=" ">-</option>
                                                    <option value="B">B/F</option>
                                                    <option value="C">C/F</option>
                                                    <option value="E">E/F</option>
                                                    <option value="B/C">B/C</option>
                                                </select>
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="horizontal-form-2" class="sm:w-32 font-bold">Substance</label>
                                                <select data-placeholder="Pilih Substance" class="tom-select w-full form-control" name="substance" id="substance">
                                                    <option value=" ">-</option>
                                                    @foreach($substances as $item)
                                                    <option value="{{$item->substance}}">{{$item->substance}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="horizontal-form-2" class="sm:w-32 font-bold">Ukuran</label>
                                                <input type="text" class="form-control mr-3" placeholder="P" name="length" id="length">
                                                <input type="text" class="form-control mr-3" placeholder="L" name="width" id="width">
                                                <input type="text" class="form-control" placeholder="T" name="height" id="height">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="horizontal-form-2" class="sm:w-32 font-bold">Satuan Ukuran</label>
                                                <select data-placeholder="Pilih Satuan Ukuran" class="tom-select w-full form-control" name="measure_unit" id="measure_unit">
                                                    <option value=" ">-</option>
                                                    <option value="INCH">INCH</option>
                                                    <option value="MM">MM</option>
                                                    <option value="CM">CM</option>
                                                    <option value="KG">KG</option>
                                                </select>
                                            </div>
                                            <div class="form-inline mt-5" id="form-measure_type">
                                                <label for="horizontal-form-2" class="sm:w-32 font-bold">Tipe Ukuran</label>
                                                <select data-placeholder="Pilih Satuan Ukuran" class="tom-select w-full form-control" name="measure_type" id="measure_type">
                                                    <option value=" ">-</option>
                                                    <option value="UL">UL</option>
                                                    <option value="UD">UD</option>
                                                </select>
                                            </div>
                                            <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                                <button type="button" data-tw-dismiss="modal" class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                                <button type="button" id="add" class="btn py-3 btn-primary w-full md:w-52">Tambahkan</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END: Horizontal Form -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="form-modal-edit" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <!-- BEGIN: Horizontal Form -->
                                    <div class="intro-y box">
                                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                            <h2 class="font-medium text-base mr-auto">
                                                Edit Spesifikasi Barang
                                            </h2>
                                        </div>
                                        <form action="{{route('master.goods.detail.update')}}" method="POST">
                                            @csrf
                                            <div id="horizontal-form" class="p-5">
                                                <div class="form-inline">
                                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">Bagian </label>
                                                    <select data-placeholder="Pilih Bagian" class="tom-select w-full form-control part_code" name="part_code">
                                                        <option value=" ">-</option>
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="ROLL">ROLL</option>
                                                    </select>
                                                    <input type="hidden" class="form-control mr-3 id" name="id">
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">Tipe Ply</label>
                                                    <select data-placeholder="Pilih Tipe Ply" class="tom-select w-full form-control ply_type" name="ply_type">
                                                        <option value=" ">-</option>
                                                        <option value="SF">SF</option>
                                                        <option value="SW">SW</option>
                                                        <option value="DW">DW</option>
                                                        <option value="TW">TW</option>
                                                    </select>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">Tipe Flute </label>
                                                    <select data-placeholder="Pilih Tipe Flute" class="tom-select w-full form-control flute_type" name="flute_type">
                                                        <option value=" ">-</option>
                                                        <option value="B">B/F</option>
                                                        <option value="C">C/F</option>
                                                        <option value="E">E/F</option>
                                                        <option value="B/C">B/C</option>
                                                    </select>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">Substance</label>
                                                    <select data-placeholder="Pilih Substance" class="tom-select w-full form-control substance" name="substance">
                                                        <option value=" ">-</option>
                                                        @foreach($substances as $item)
                                                        <option value="{{$item->substance}}">{{$item->substance}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">Ukuran</label>
                                                    <input type="text" class="form-control mr-3 length" placeholder="P" name="length">
                                                    <input type="text" class="form-control mr-3 width" placeholder="L" name="width">
                                                    <input type="text" class="form-control height" placeholder="T" name="height">
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">Satuan Ukuran</label>
                                                    <select data-placeholder="Pilih Satuan Ukuran" class="tom-select w-full form-control measure_unit" name="measure_unit">
                                                        <option value=" ">-</option>
                                                        <option value="INCH">INCH</option>
                                                        <option value="MM">MM</option>
                                                        <option value="CM">CM</option>
                                                        <option value="KG">KG</option>
                                                    </select>
                                                </div>
                                                <div class="form-inline mt-5" id="form-measure_type">
                                                    <label for="horizontal-form-2" class="sm:w-32 font-bold">Tipe Ukuran</label>
                                                    <select data-placeholder="Pilih Satuan Ukuran" class="tom-select w-full form-control measure_type" name="measure_type">
                                                        <option value=" ">-</option>
                                                        <option value="UL">UL</option>
                                                        <option value="UD">UD</option>
                                                    </select>
                                                </div>
                                                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                                    <button type="button" data-tw-dismiss="modal" class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                                    <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END: Horizontal Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>


@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
<script>
$(function() {

    $('#code').on('input', function() {
        $(this).val($(this).val().replace(/\s/g, '').toUpperCase());
    });

    $('#code').on('keypress', function(event) {
        if (event.which === 32) {
            event.preventDefault();
        }
    });

    $('#form-measure-type').hide();

    $('#type').change(function(){

        if($(this).val() == 'A') {
            $('#form-measure-type').show();
        } else {
            $('#form-measure-type').hide();
        }

    });

    $("#form-modal-edit #form-measure_type").hide();

    var goods_type = "{{$goods->type}}";

    if(goods_type === "A") {
        $("#form-modal-edit #form-measure_type").show();
    }

    if(goods_type === "B") {
        $('#form-modal-edit .height').hide();
    }

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
                url: '{{route("master.goods.detail.edit")}}', // Specify the URL of your server endpoint
                type: 'POST', // or 'POST' depending on your server setup
                dataType: 'json', // Assuming the response will be
                data: { id: id },
                success: function(response) {

                    // Assuming response.data is an array of SPK objects
                    var data = response.data;

                    console.log(data)

                    $("#form-modal-edit .id").val(data.id);
                    var part_code = $("#form-modal-edit .part_code")[0].tomselect;
                        part_code.setValue(data.part_code);

                    var ply_type = $("#form-modal-edit .ply_type")[0].tomselect;
                        ply_type.setValue(data.ply_type);

                    var flute_type = $("#form-modal-edit .flute_type")[0].tomselect;
                        flute_type.setValue(data.flute_type);

                    var substance = $("#form-modal-edit .substance")[0].tomselect;
                        substance.setValue(data.substance);

                    var measure_unit = $("#form-modal-edit .measure_unit")[0].tomselect;
                        measure_unit.setValue(data.measure_unit);

                    var measure_type = $("#form-modal-edit .measure_type")[0].tomselect;
                        measure_type.setValue(data.measure_type);

                    $("#form-modal-edit .length").val(data.length);
                    $("#form-modal-edit .width").val(data.width);
                    $("#form-modal-edit .height").val(data.height);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
    }

    $('#add').click(function() {

        var bagian = $('#part_code').val();
        var tipePly = $('#ply_type').val();
        var tipeFlute = $('#flute_type').val();
        var substance = $('#substance').val();
        var panjang = $('#length').val();
        var lebar = $('#width').val();
        var tinggi = $('#height').val();
        var satuanUkuran = $('#measure_unit').val();
        var tipeUkuran = $('#measure_type').val();

        var newRow = `<tr>
                        <td>
                            <a href="#" class="text-white btn btn-danger shadow-md delete-row">
                                <span class="w-5 h-5 flex items-center justify-center"> <i class="fa fa-minus"></i></span>
                            </a>
                        </td>
                        <td class="text-center part-code-val">${bagian}</td>
                        <td class="text-center ply-type-val">${tipePly}</td>
                        <td class="text-center flute_type-val">${tipeFlute}</td>
                        <td class="text-center substance-val">${substance}</td>
                        <td class="text-center length-val">${panjang}</td>
                        <td class="text-center width-val">${lebar}</td>
                        <td class="text-center height-val">${tinggi}</td>
                        <td class="text-center measure-unit-val">${satuanUkuran}</td>
                        <td class="text-center measure-type-val">${tipeUkuran}</td>
                    </tr>`;

        $('#data-table tbody').append(newRow);

        // Clear input fields after appending
        $('#part_code').val(' ');
        $('#ply_type').val(' ');
        $('#flute_type').val('');
        $('#substance').val('');
        $('#length').val('');
        $('#width').val('');
        $('#height').val('');
        $('#measure_unit').val('');

        $('[data-tw-dismiss="modal"]').click();
    });

});
</script>
@endsection
