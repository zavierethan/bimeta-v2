@extends('layouts._base')
@section('css')
<style>
.layout-box-p {
    width: 200px;
    height: 100px;
    border: 1px solid #ccc;
    padding: 20px;
    font-size: 12px;
}

.layout-box-p-2 {
    width: 130px;
    height: 100px;
    border: 1px solid #ccc;
    padding: 20px;
    font-size: 12px;
}

.layout-box-l {
    width: 100px;
    height: 100px;
    border: 1px solid #ccc;
    padding: 20px;
    font-size: 12px;
}

.layout-box-t {
    width: 70px;
    height: 100px;
    border: 1px solid #ccc;
    border-right-style: dotted;
    padding: 20px;
    font-size: 12px;
}

.layout-box-k {
    width: 70px;
    height: 100px;
    border: 1px solid #ccc;
    padding: 20px;
    font-size: 12px;
}

.layout-box-row-plep {
    width: 200px;
    height: 50px;
    border: 1px solid #ccc;
    padding: 20px;
    font-size: 12px;
}

.mandatory-sign {
    color: red;
}

.text-danger {
    color: red;
    font-size: 12px;
}
</style>
@endsection
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Production</li>
<li class="breadcrumb-item active" aria-current="page">Monitoring</li>
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-4 2xl:col-span-4">
            <div class="intro-y box mt-5">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Proses Produksi
                    </h2>
                </div>
                <form method="POST" action="{{route('production.spk.monitoring.production-progress.update')}}">
                    @csrf
                    <div id="horizontal-form" class="p-5">
                        <div class="preview">
                            <div class="form-inline">
                                <label for="vertical-form-1" class="sm:w-20 font-bold">Nama</label>
                                <input type="text" class="form-control" name="process_name"
                                    value="{{$processItem->process_name}}" readonly>
                                <input type="hidden" class="form-control" name="production_process_id"
                                    value="{{$processItem->id}}">
                                <input type="hidden" class="form-control" name="spk_id"
                                    value="{{$processItem->spk_id}}">
                            </div>
                            <div class="form-inline mt-5">
                                <label for="vertical-form-1" class="sm:w-20 font-bold">Status</label>
                                <select data-placeholder="Pilih Status" class="tom-select w-full form-control" name="status">
                                    <option value="1" <?php echo ($processItem->status == 1) ? "selected" : ""; ?>>INIT</option>
                                    <option value="2" <?php echo ($processItem->status == 2) ? "selected" : ""; ?>>WORK IN PROGRESS</option>
                                    <option value="3" <?php echo ($processItem->status == 3) ? "selected" : ""; ?>>COMPLETED</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                            <button type="submit" id="calculate-hpp" class="btn py-3 btn-primary w-full md:w-52">Update Status Progress</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="intro-y col-span-12 lg:col-span-8 2xl:col-span-8 mt-5">
            <div class="box p-5 rounded-md">
                <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                    <div class="font-medium text-base truncate">Item Progress Produksi</div>
                    <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview" class="flex items-center ml-auto text-white btn btn-primary shadow-md"> <i data-lucide="plus"
                            class="w-4 h-4 mr-2"></i>
                        Tambah Progres </a>
                </div>
                <div class="overflow-auto lg:overflow-visible -mt-3">
                    <table class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="whitespace-nowrap">TANGGAL PROSES</th>
                                <th class="whitespace-nowrap">HASIL</th>
                                <th class="whitespace-nowrap">OPERATOR</th>
                                <th class="whitespace-nowrap">CATATAN</th>
                                <th class="whitespace-nowrap text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($processItemDetails as $details)
                            <tr>
                                <td>{{$details->date}}</td>
                                <td>{{$details->result}}</td>
                                <td>{{$details->operator}}</td>
                                <td>{{$details->remarks}}</td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3 text-success"
                                            href=""> <i
                                                data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                        <a class="flex items-center text-danger" href="javascript:;"
                                            data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i
                                                data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                    </div>
                                </td>
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
                                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                        <h2 class="font-medium text-base mr-auto">
                                            Input Progres Produksi
                                        </h2>
                                    </div>
                                    <div id="horizontal-form" class="p-5">
                                        <form method="POST" action="{{route('production.spk.monitoring.production-progress.detail.save')}}">
                                            @csrf
                                            <div class="preview">
                                                <div class="form-inline">
                                                    <label for="vertical-form-1" class="sm:w-20 font-bold">Operator</label>
                                                    <input type="text" class="form-control" name="operator" required>
                                                    <input type="hidden" class="form-control" name="production_process_id" value="{{$processItem->id}}" required>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-20 font-bold">Tanggal</label>
                                                    <input type="date" class="form-control" name="date" required>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-20 font-bold">Hasil</label>
                                                    <input type="number" class="form-control" name="result" required>
                                                </div>
                                                <div class="form-inline mt-5">
                                                    <label for="vertical-form-1" class="sm:w-20 font-bold">Catatan</label>
                                                    <textarea type="text" class="form-control" name="remarks"> </textarea>
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
</div>
@endsection

@section('script')
<script>
</script>
@endsection