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
                        Edit Substance
                    </h2>
                </div>
                <div id="horizontal-form" class="p-5">
                    <form method="POST" action="{{route('master.substance.update')}}">
                        @csrf
                        <div id="horizontal-form" class="p-5">
                            <div class="preview">
                                <div class="form-inline">
                                    <label for="horizontal-form-2" class="sm:w-28 font-bold">Code</label>
                                    <input type="text" class="form-control" name="code" value="{{$data->code}}">
                                    <input type="hidden" class="form-control" name="id" value="{{$data->id}}">
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="horizontal-form-2" class="sm:w-28 font-bold">Substance</label>
                                    <input type="text" class="form-control" name="substance" value="{{$data->substance}}">
                                </div>
                                <div class="form-inline mt-5">
                                    <label for="horizontal-form-2" class="sm:w-28 font-bold">Cor Code</label>
                                    <input type="text" class="form-control" name="cor_code" value="{{$data->cor_code}}">
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
