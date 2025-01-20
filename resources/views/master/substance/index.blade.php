@extends('layouts._base')
@section('active-url')
<li class="breadcrumb-item" aria-current="page">Master Data</li>
<li class="breadcrumb-item active" aria-current="page">Substances</li>
@endsection
@section('css')
<style>
    .text-center {
    text-align: center;
}
</style>
@endsection
@section('main-content')
<div class="content content--top-nav">
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <h2 class="text-2xl font-extrabold dark:text-primary">Master Data Substance</h2>
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#superlarge-modal-size-preview" class="btn btn-primary shadow-md mr-2">Tambah Substance</a>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report" id="data-table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="whitespace-nowrap">SUBSTANCE</th>
                        <th class="whitespace-nowrap">ALIAS</th>
                        <th class="text-center whitespace-nowrap">CODE COR</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <!-- END: Data List -->

        <div id="superlarge-modal-size-preview" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-body">
                        <!-- BEGIN: Horizontal Form -->
                        <div class="intro-y box">
                            <div
                                class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">
                                    Tambah Substance
                                </h2>
                            </div>
                            <div id="horizontal-form" class="p-5">
                                <form method="POST" action="{{route('master.substance.save')}}">
                                    @csrf
                                    <div id="horizontal-form" class="p-5">
                                        <div class="preview">
                                            <div class="form-inline">
                                                <label for="horizontal-form-2" class="sm:w-32 font-bold">Code</label>
                                                <input type="text" class="form-control" name="code">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="horizontal-form-2" class="sm:w-32 font-bold">Substance</label>
                                                <input type="text" class="form-control" name="substance">
                                            </div>
                                            <div class="form-inline mt-5">
                                                <label for="horizontal-form-2" class="sm:w-32 font-bold">Kode COR</label>
                                                <input type="text" class="form-control" name="cor_code">
                                            </div>
                                            <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                                                <button type="button" data-tw-dismiss="modal" class="btn btn-danger py-3 border-slate-300 dark:border-darkmode-400 w-full md:w-52">Batal</button>
                                                <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Simpan</button>
                                            </div>
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
@endsection

@section('script')
 <script>
        $(document).ready(function () {
            $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('master.substance.get-data') !!}',
                columns: [
                    { data: 'substance', name: 'substance' },
                    { data: 'code', name: 'code' },
                    { data: 'cor_code', name: 'cor_code' },
                    {
                        data: null,
                        render: function (data, type, row) {
                            return `<div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3 text-primary" href="/master/substances/${data.id}"> <i class="fa fa-edit w-4 h-4 mr-1"></i> Edit </a>
                                    </div>`;
                        }
                    }
                ],
                columnDefs: [
                    { targets: [2], className: 'text-center' },
                    { targets: [3], className: 'text-center' } // Center align all columns
                ],
                language: {
                    processing: `<div class="col-span-6 sm:col-span-3 xl:col-span-2 flex flex-col justify-end items-center">
                        <svg width="20" viewBox="0 0 135 135" xmlns="http://www.w3.org/2000/svg" fill="rgb(30, 41, 59)" class="w-8 h-8">
                        <path d="M67.447 58c5.523 0 10-4.477 10-10s-4.477-10-10-10-10 4.477-10 10 4.477 10 10 10zm9.448 9.447c0 5.523 4.477 10 10 10 5.522 0 10-4.477 10-10s-4.478-10-10-10c-5.523 0-10 4.477-10 10zm-9.448 9.448c-5.523 0-10 4.477-10 10 0 5.522 4.477 10 10 10s10-4.478 10-10c0-5.523-4.477-10-10-10zM58 67.447c0-5.523-4.477-10-10-10s-10 4.477-10 10 4.477 10 10 10 10-4.477 10-10z">
                            <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="-360 67 67" dur="2.5s" repeatCount="indefinite"></animateTransform>
                        </path>
                        <path d="M28.19 40.31c6.627 0 12-5.374 12-12 0-6.628-5.373-12-12-12-6.628 0-12 5.372-12 12 0 6.626 5.372 12 12 12zm30.72-19.825c4.686 4.687 12.284 4.687 16.97 0 4.686-4.686 4.686-12.284 0-16.97-4.686-4.687-12.284-4.687-16.97 0-4.687 4.686-4.687 12.284 0 16.97zm35.74 7.705c0 6.627 5.37 12 12 12 6.626 0 12-5.373 12-12 0-6.628-5.374-12-12-12-6.63 0-12 5.372-12 12zm19.822 30.72c-4.686 4.686-4.686 12.284 0 16.97 4.687 4.686 12.285 4.686 16.97 0 4.687-4.686 4.687-12.284 0-16.97-4.685-4.687-12.283-4.687-16.97 0zm-7.704 35.74c-6.627 0-12 5.37-12 12 0 6.626 5.373 12 12 12s12-5.374 12-12c0-6.63-5.373-12-12-12zm-30.72 19.822c-4.686-4.686-12.284-4.686-16.97 0-4.686 4.687-4.686 12.285 0 16.97 4.686 4.687 12.284 4.687 16.97 0 4.687-4.685 4.687-12.283 0-16.97zm-35.74-7.704c0-6.627-5.372-12-12-12-6.626 0-12 5.373-12 12s5.374 12 12 12c6.628 0 12-5.373 12-12zm-19.823-30.72c4.687-4.686 4.687-12.284 0-16.97-4.686-4.686-12.284-4.686-16.97 0-4.687 4.686-4.687 12.284 0 16.97 4.686 4.687 12.284 4.687 16.97 0z">
                            <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="360 67 67" dur="8s" repeatCount="indefinite"></animateTransform>
                        </path>
                    </svg>
                        <div class="text-center text-xs mt-2">Loading</div>
                    </div>`
                }
            });
        });
    </script>
@endsection
