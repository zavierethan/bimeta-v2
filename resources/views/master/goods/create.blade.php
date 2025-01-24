@extends('layouts._base')
@section('main-content')
<div class="content content--top-nav">
    <div class="intro-y grid grid-cols-12 gap-5 mt-5">
        <div class="col-span-12 lg:col-span-12 2xl:col-span-12">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Informasi Barang</div>
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
                                <select data-placeholder="Pilih Tipe Barang" class="tom-select w-full form-control"
                                    name="type" id="type" required>
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
                <div class="flex justify-end items-center space-x-4">
                    <a href="{{route('master.goods.index')}}" class="btn btn-danger w-full md:w-52">Kembali</a>
                    <button type="button" class="btn btn-primary w-full md:w-52 ml-auto" id="btn-save">Simpan</button>
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


    $(document).on('click', '#btn-save', function(e) {
        e.preventDefault();

        if (true) {
            Swal.fire({
                title: 'Simpan Data Barang ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batalkan',
                confirmButtonText: 'Ya, simpan',
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    var code = $('#code').val();
                    var name = $('#name').val();
                    var type = $('#type').val();
                    var spec_str = $('#spec_str').val();
                    var meas_str = $('#meas_str').val();

                    // Build the JSON payload
                    const payload = {
                        header: {
                            code: code,
                            name: name,
                            type: type,
                            spec_str: spec_str,
                            meas_str: meas_str,
                        }
                    };

                    console.log(payload)

                    $.ajax({
                        url: `{{route('master.goods.save')}}`,
                        type: 'POST',
                        contentType: 'application/json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: JSON.stringify(payload),
                        success: function(response) {
                            Swal.fire({
                                title: 'Suceess !',
                                text: `Data berhasil di simpan`,
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Ok',
                                allowOutsideClick: false
                            }).then((result) => {
                                location.href =
                                    `{{ route('master.goods.index') }}`;
                            });
                        },
                        error: function(xhr, status, error) {
                            // Check if it's a validation error or server error
                            let response = xhr.responseJSON;

                            if (xhr.status === 400 && response && response.error) {
                                // Handle validation errors or duplicate code
                                Swal.fire(
                                    'Validation Error!',
                                    response.error,
                                    'error'
                                );
                            } else if (xhr.status === 500 && response && response.error) {
                                // Handle server-side errors
                                Swal.fire(
                                    'Server Error!',
                                    'An unexpected error occurred. Please try again later.',
                                    'error'
                                );
                            } else {
                                // Generic error message for unknown issues
                                Swal.fire(
                                    'Error!',
                                    error || 'An unknown error occurred.',
                                    'error'
                                );
                            }
                        }
                    });
                }
            });
        }
    });

});
</script>
@endsection
