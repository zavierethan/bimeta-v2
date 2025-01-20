@extends('layouts._base')
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Production</li>
<li class="breadcrumb-item active" aria-current="page">Pemakaian Material</li>
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <h2 class="text-2xl font-extrabold dark:text-primary">Laporan Pemakaian Material</h2>
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#form-input" class="btn btn-primary shadow-md mr-2">Input Pemakaian Material</a>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="data-table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="whitespace-nowrap">TANGGAL PEMAKAIAN</th>
                        <th class="text-center whitespace-nowrap">JUMLAH TOTAL PEMAKAIAN (KG)</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td><?php echo date("d/m/Y", strtotime($item->date)); ?></td>
                        <td class="text-center whitespace-nowrap">{{$item->total_quantity}}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center text-primary mr-3" href="{{route('production.material-used.detail', ['id' => $item->id])}}"><i data-lucide="edit"
                                class="w-4 h-4 mr-1"></i> Detail</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
    </div>
    <div id="form-input" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="intro-y box">
                        <div
                            class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Periode Pemakaian
                            </h2>
                        </div>
                        <div id="horizontal-form" class="p-5">
                            <form method="POST" action="{{route('production.material-used.save')}}">
                                @csrf
                                <div class="preview">
                                    <div class="form-inline">
                                        <label for="horizontal-form-2" class="sm:w-32 font-bold">Incharge</label>
                                        <input id="horizontal-form-1" type="text" class="form-control" name="incharge" required>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="sm:w-32 font-bold">Tanggal</label>
                                        <input id="horizontal-form-1" type="date" class="form-control" name="date" value="<?= date("Y-m-d"); ?>" required>
                                    </div>
                                </div>
                                <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                    <button type="button" data-tw-dismiss="modal" class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                    <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BEGIN: Delete Confirmation Modal -->
    <!-- END: Delete Confirmation Modal -->
</div>
@endsection

@section('script')
<script>
$(function() {
    $('#data-table').DataTable({
        order: [
            [0, 'desc']
        ]
    });
});

</script>
@endsection
