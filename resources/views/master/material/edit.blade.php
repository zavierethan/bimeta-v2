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
                        Edit Material
                    </h2>
                </div>
                <div id="horizontal-form" class="p-5">
                    <form method="POST" action="{{route('master.material.update')}}">
                        @csrf
                        <div id="horizontal-form" class="p-5">
                            <div class="preview">
                                <div class="form-inline">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Code</label>
                                    <input type="text" class="form-control" name="code" value="{{$data->code}}">
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Nama </label>
                                    <input type="text" class="form-control" name="name" value="{{$data->name}}" >
                                    <input type="hidden" class="form-control" name="id" value="{{$data->id}}">
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Tipe</label>
                                    <select data-placeholder="Pilih Tipe Pajak" class="tom-select w-full form-control" name="type">
                                        <option value=" ">-</option>
                                        <option value="KRAFT" <?php echo ($data->type == "KRAFT") ? "selected" : ""; ?>>KRAFT</option>
                                        <option value="MEDIUM" <?php echo ($data->type == "MEDIUM") ? "selected" : ""; ?>>MEDIUM</option>
                                    </select>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Jenis Kertas</label>
                                    <select data-placeholder="Pilih Tipe Pajak" class="tom-select w-full form-control" name="paper_type">
                                        <option value="">-</option>
                                        <option value="KRAFT" <?php echo ($data->paper_type == "KRAFT") ? "selected" : ""; ?>>KRAFT</option>
                                        <option value="BROWN KRAFT" <?php echo ($data->paper_type == "BROWN KRAFT") ? "selected" : ""; ?>>BROWN KRAFT</option>
                                        <option value="TEST LINER" <?php echo ($data->paper_type == "TEST LINER") ? "selected" : ""; ?>>TEST LINER</option>
                                        <option value="WHITE KRAFT" <?php echo ($data->paper_type == "WHITE KRAFT") ? "selected" : ""; ?>>WHITE KRAFT</option>
                                        <option value="MEDIUM" <?php echo ($data->paper_type == "MEDIUM") ? "selected" : ""; ?>>MEDIUM</option>
                                    </select>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Gramature</label>
                                    <input type="text" class="form-control" name="gramature" value="{{$data->gramature}}">
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Lebar</label>
                                    <input type="text" class="form-control" name="width" value="{{$data->width}}">
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Satuan</label>
                                    <select data-placeholder="Pilih Tipe Pajak" class="tom-select w-full form-control" name="unit">
                                        <option value="">-</option>
                                        <option value="GSM" <?php echo ($data->unit == "GSM") ? "selected" : ""; ?>>GSM</option>
                                        <option value="ROLL" <?php echo ($data->unit == "ROLL") ? "selected" : ""; ?>>ROLL</option>
                                    </select>
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Harga</label>
                                    <input type="text" class="form-control" name="price" id="price" value="{{$data->price}}">
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="vertical-form-1" class="sm:w-32 font-bold">Kode Supplier</label>
                                    <select data-placeholder="Pilih Kode Supplier" class="tom-select w-full form-control" name="supplier_code">
                                        <option value=" ">-</option>
                                        @foreach($suppliers as $supplier)
                                        <option value="{{$supplier->code}}" <?php echo ($supplier->code == $data->supplier_code) ? 'selected' : ''; ?>>{{$supplier->code}} - {{$supplier->name}}</option>
                                        @endforeach
                                    </select>
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
