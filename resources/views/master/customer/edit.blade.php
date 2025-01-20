@extends('layouts._base')
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-8">
            <!-- BEGIN: Horizontal Form -->
            <div class="intro-y box mt-5">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Informasi Customer
                    </h2>
                </div>
                <div id="horizontal-form" class="p-5">
                    <form method="POST" action="{{route('master.customer.update')}}">
                        @csrf
                        <div id="horizontal-form" class="p-5">
                            <div class="preview">
                                <div class="form-inline">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Code</label>
                                    <input type="text" class="form-control" name="code" value="{{$data->code}}">
                                    <input type="hidden" class="form-control" name="id" value="{{$data->id}}">
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Nama Customer</label>
                                    <input type="text" class="form-control" name="name" value="{{$data->name}}">
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{$data->email}}">
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Nomor Telepon</label>
                                    <input type="text" class="form-control" name="phone_number" value="{{$data->phone_number}}">
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Fax</label>
                                    <input type="text" class="form-control" name="fax" value="{{$data->fax}}">
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">PIC</label>
                                    <select data-placeholder="Pilih PIC" class="tom-select w-full form-control" name="pic">
                                        <option value=" ">-</option>
                                        @foreach($pic as $pic)
                                        <option value="{{$pic->display_name}}">{{$pic->display_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">No. Rekening</label>
                                    <input type="text" class="form-control" name="bank_account_no" value="{{$data->bank_account_number}}">
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Rekening A/N</label>
                                    <input type="text" class="form-control" name="bank_account_name" value="{{$data->bank_account_name}}">
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Bank</label>
                                    <input type="text" class="form-control" name="bank_name" value="{{$data->bank_name}}">
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">NPWP</label>
                                    <input type="text" class="form-control" name="npwp" value="{{$data->npwp}}">
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Tipe Pajak</label>
                                    <select data-placeholder="Pilih Tipe Pajak" class="tom-select w-full form-control" name="tax_type">
                                        <option value=" ">-</option>
                                        <option value="0" <?php echo ($data->tax_type == '0') ? "selected" : "" ?>>V0</option>
                                        <option value="1" <?php echo ($data->tax_type == '1') ? "selected" : "" ?>>V1</option>
                                        <option value="2" <?php echo ($data->tax_type == '2') ? "selected" : "" ?>>V2</option>
                                    </select>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Tipe Customer</label>
                                    <select data-placeholder="Pilih Tipe Customer" class="tom-select w-full form-control" name="customer_type">
                                        <option value=" ">-</option>
                                        <option value="1" <?php echo ($data->customer_type == '1') ? "selected" : "" ?>>PERSONAL</option>
                                        <option value="2" <?php echo ($data->customer_type == '2') ? "selected" : "" ?>>COMPANY</option>
                                    </select>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Alamat</label>
                                    <textarea type="text" class="form-control" name="address">{{$data->address}}</textarea>
                                </div>
                            </div>
                            <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END: Horizontal Form -->
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>

</script>
@endsection
