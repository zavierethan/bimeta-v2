@extends('layouts._base')
@section('main-content')
<div class="content content--top-nav">
        <div class="intro-y grid grid-cols-12 gap-5 mt-5">
            <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
                <div class="box p-5 rounded-md">
                    <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                        <div class="font-medium text-base truncate">Informasi Barang</div>
                        <button type="button" class="btn btn-primary w-full md:w-52 ml-auto" id="save">Konfirmasi & Simpan</button>
                    </div>
                    <div class="intro-y grid grid-cols-12 gap-5 mt-5">
                        <div class="col-span-12 lg:col-span-6 2xl:col-span-6">
                            <div class="rounded-md p-5">
                                <div class="form-inline">
                                    <label for="horizontal-form-2" class="sm:w-28 font-bold">Kode Barang</label>
                                    <input type="text" class="form-control" name="code" id="code" required>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="horizontal-form-2" class="sm:w-28 font-bold">Nama Barang</label>
                                    <input type="text" class="form-control" name="name" id="name" required>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="horizontal-form-2" class="sm:w-28 font-bold">Tipe Barang</label>
                                    <select data-placeholder="Pilih Jenis Ply" class="tom-select w-full form-control" name="type" id="type" required>
                                        <option value="">-</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">AB</option>
                                        <option value="BB">BB</option>
                                        <option value="ROLL">ROLL</option>
                                        <option value="WASTE">WASTE</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-6 2xl:col-span-6">
                            <div class="rounded-md p-5">
                                <div class="form-inline">
                                    <label for="horizontal-form-2" class="sm:w-28 font-bold">Spesifikasi</label>
                                    <input type="text" class="form-control" name="spec_str" id="spec_str" required>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="horizontal-form-2" class="sm:w-28 font-bold">Ukuran</label>
                                    <input type="text" class="form-control" name="meas_str" id="meas_str" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="intro-y grid grid-cols-12 gap-3 mt-3">
            <div class="col-span-12 lg:col-span-12">
                <div class="intro-y box mt-5">
                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">
                            Detail Spesifikasi
                        </h2>
                        <div class="ml-auto">
                            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#form-modal" id="btn-input-spec" class="text-white btn btn-primary shadow-md">
                                <span class="flex items-center justify-center">Input Spesifikasi</span>
                            </a>
                        </div>
                    </div>

                    <div id="horizontal-form" class="p-5">
                        <table class="table" id="data-table">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th></th>
                                    <th class="text-center">BAGIAN</th>
                                    <th class="text-center">TiPE PLY</th>
                                    <th class="text-center">TIPE FLUTE</th>
                                    <th class="text-center">SUBSTANCE</th>
                                    <th class="text-center">PANJANG</th>
                                    <th class="text-center">LEBAR</th>
                                    <th class="text-center">TINGGI</th>
                                    <th class="text-center">SATUAN UKURAN</th>
                                    <th class="text-center">TIPE UKURAN</th>
                                </tr>
                            </thead>
                            <tbody>

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
                                            <div class="form-inline mt-5" id="form-measure-type">
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

    $('#type').change(function(){

        $('#form-modal #form-measure-type').hide();
        $('#form-modal #length').show();
        $('#form-modal #width').show();
        $('#form-modal #height').show();

        if($(this).val() === "A") {
            var part_code = $("#form-modal #part_code")[0].tomselect;
            part_code.setValue("A");
            $('#form-modal #form-measure-type').show();
        }

        if($(this).val() === "B") {
            var part_code = $("#form-modal #part_code")[0].tomselect;
            part_code.setValue("B");
            $('#form-modal #height').hide();
            $('#form-modal #form-measure-type').hide();
        }

        if($(this).val() === "ROLL") {
            var part_code = $("#form-modal #part_code")[0].tomselect;
            part_code.setValue("ROLL");
            $('#form-modal #length').hide();
            $('#form-modal #height').hide();
            $('#form-modal #form-measure-type').hide();
        }

        if($(this).val() === "AB" || $(this).val() === "BB") {
            var part_code = $("#form-modal #part_code")[0].tomselect;
            part_code.setValue("");
            $('#form-modal #form-measure-type').hide();
        }

    });

    $("#form-modal #part_code").change(function() {

        $('#form-modal #length').show();
        $('#form-modal #width').show();
        $('#form-modal #height').show();

        if($(this).val() === "B") {
            $('#form-modal #height').hide();
            $('#form-modal #form-measure-type').hide();
        }

        if($(this).val() === "ROLL") {
            var part_code = $("#form-modal #part_code")[0].tomselect;
            part_code.setValue("ROLL");
            $('#form-modal #length').hide();
            $('#form-modal #height').hide();
            $('#form-modal #form-measure-type').hide();
        }
    });

    $(document).on('click', '.delete-row', function(e) {
        e.preventDefault();
        $(this).closest('tr').remove();
    });


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

    $('#save').click(function(){
        event.preventDefault();
        var payloads = {
            "code" :  $('#code').val(),
            "name" :  $('#name').val(),
            "type" :  $('#type').val(),
            "spec_str" :  $('#spec_str').val(),
            "meas_str" :  $('#meas_str').val(),
        }

        var formDetails = [];

        var rows = $("#data-table tbody tr");

        rows.each(function() {
            var row = $(this);

            var part_code = row.find(".part-code-val").text();
            var ply_type = row.find(".ply-type-val").text();
            var flute_type = row.find(".flute_type-val").text();
            var substance = row.find(".substance-val").text();
            var length = row.find(".length-val").text();
            var width = row.find(".width-val").text();
            var height = row.find(".height-val").text();
            var measure_unit = row.find(".measure-unit-val").text();
            var measure_type = row.find(".measure-type-val").text();

            formDetails.push({
                part_code : part_code,
                ply_type : ply_type,
                flute_type : flute_type,
                substance : substance,
                length : length,
                width : width,
                height : height,
                measure_unit : measure_unit,
                measure_type : measure_type
            });
        });

        payloads.specifications = formDetails;

        console.log(payloads.specifications.length);

        if(payloads.specifications.length > 0) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{route('master.goods.save')}}",
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(payloads),
                success: function (response, status, xhr) {
                    // Handle success response from server
                    if (xhr.status === 200) {
                        console.log('Data sent successfully:', response);
                        window.location.href = "{{route('master.goods.index')}}";
                    } else {
                            console.error('Error:', xhr.status);
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                }
            });

        } else if(payloads.type == 'WASTE') {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{route('master.goods.save')}}",
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(payloads),
                success: function (response, status, xhr) {
                    // Handle success response from server
                    if (xhr.status === 200) {
                        console.log('Data sent successfully:', response);
                        window.location.href = "{{route('master.goods.index')}}";
                    } else {
                            console.error('Error:', xhr.status);
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        } else {
            Swal.fire({
                title: 'Perhatian !',
                text: 'Detail spesifikasi barang tidak boleh kosong !',
                icon: 'warning',
                confirmButtonText: 'Ok'
            });
        }

    });

});
</script>
@endsection
