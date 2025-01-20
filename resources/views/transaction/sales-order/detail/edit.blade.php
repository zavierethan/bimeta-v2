@extends('layouts._base')
@section('main-content')
<form method="POST" action="{{route('sales.detail.save')}}" enctype="multipart/form-data" id="goods-form">
    @csrf
    <div class="content-wrapper pb-0">
        <!-- first row starts here -->
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="page-header flex-wrap">
                            <div class="header-left d-flex flex-wrap mt-2 mt-sm-0">
                                <h4 class="card-title">PO Customer (Detail Sales Order)</h4>
                            </div>
                            <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                                <button type="submit" class="btn btn-md btn-primary" style="padding: 10px;">Confirm & Save</button>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Jenis Barang</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="goods_type" id="goods-type" required>
                                            <option value="">-</option>
                                            <option value="1">Sheet</option>
                                            <option value="2">Box</option>
                                            <option value="3">Box (Badan + Tutup)</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Nama Barang</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="goods_name" required>
                                        <input type="hidden" class="form-control" name="sales_order_id" value="{{$id}}">
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Jumlah</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="quantity" required>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Harga</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="price" value="0">
                                    </div>
                                </div>
                                <hr />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row form-standard-box">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Spesifikasi Barang</h3>
                        <hr />
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Jenis Ply</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="ply_type" id="ply-type">
                                            <option value="">-</option>
                                            <option value="SF">Single Face (SF)</option>
                                            <option value="SW">Single Wall (SW)</option>
                                            <option value="DW">Double Wall (DW)</option>
                                            <option value="TW">Triple Wall (TW)</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Jenis flute</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="flute_type" id="flute-type">
                                            <option value="">-</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="B/C">B/C</option>
                                            <option value="E">E</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Substance</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="substance" id="substance">
                                            <option value="">-</option>
                                            @foreach($substances as $substance)
                                            <option value="{{$substance->substance}}">{{$substance->substance}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr />
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Satuan</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="meas_unit" id="measurement-unit">
                                            <option value="">-</option>
                                            <option value="INCH">INCH</option>
                                            <option value="MM">MM</option>
                                            <option value="CM">CM</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row form-meas-type">
                                    <label class="col-sm-3 col-form-label">Jenis Ukuran</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="meas_type" id="measurement-type">
                                            <option value="">-</option>
                                            <option value="UD">Dalam</option>
                                            <option value="UL">Luar</option>
                                        </select>
                                    </div>
                                </div>
                                <hr class="form-meas-type" />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Ukuran</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="length" id="length">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="width" id="width">
                                    </div>
                                    <div class="col-sm-3" id="form-height">
                                        <input type="text" class="form-control" name="height" id="height">
                                    </div>
                                </div>
                                <hr />
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row form-param-check">
                                    <label class="col-sm-3 col-form-label">Cetakan</label>
                                    <div class="col-sm-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="flag_print" value="0"
                                                checked>
                                            <label class="form-check-label" for="inlineRadio2">Polos</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flag_print" value="1">
                                            <label class="form-check-label" for="inlineRadio1">Print</label>
                                        </div>
                                    </div>
                                </div>
                                <hr class="form-param-check" />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Catatan</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" name="remarks"></textarea>
                                    </div>
                                </div>
                                <hr />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- chart row starts here -->
        <div class="row form-bottom-top">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Spesifikasi Barang (Badan)</h3>
                        <hr />
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Jenis Ply</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="bottom_ply_type" id="bottom-ply-type">
                                            <option value="">-</option>
                                            <option value="SF">Single Face (SF)</option>
                                            <option value="SW">Single Wall (SW)</option>
                                            <option value="DW">Double Wall (DW)</option>
                                            <option value="TW">Triple Wall (TW)</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Jenis flute</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="bottom_flute_type" id="bottom-flute-type">
                                            <option value="">-</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="B/C">B/C</option>
                                            <option value="E">E</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Substance</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="bottom_substance" id="bottom-substance">
                                            <option value="">-</option>
                                            @foreach($substances as $substance)
                                            <option value="{{$substance->substance}}">{{$substance->substance}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr />
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Satuan</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="bottom_meas_unit" id="bottom-meas-unit">
                                            <option value="">-</option>
                                            <option value="INCH">INCH</option>
                                            <option value="MM">MM</option>
                                            <option value="CM">CM</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jenis</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="bottom_meas_type" id="bottom-meas-type">
                                            <option value="">-</option>
                                            <option value="UD">Ukuran Dalam</option>
                                            <option value="UL">Ukuran Luar</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Ukuran</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="bottom_length" id="bottom-length">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="bottom_width" id="bottom-width">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="bottom_height" id="bottom-height">
                                    </div>
                                </div>
                                <hr />
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Cetakan</label>
                                    <div class="col-sm-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="bottom_flag_print"
                                                value="0" checked>
                                            <label class="form-check-label" for="inlineRadio2">Polos</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="bottom_flag_print"
                                                value="1">
                                            <label class="form-check-label" for="inlineRadio1">Print</label>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Catatan</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" name="bottom_remarks"></textarea>
                                    </div>
                                </div>
                                <hr />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row form-bottom-top">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Spesifikasi Barang (Tutup)</h3>
                        <hr />
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Jenis Ply</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="top_ply_type" id="top-ply-type">
                                            <option value="">-</option>
                                            <option value="SF">Single Face (SF)</option>
                                            <option value="SW">Single Wall (SW)</option>
                                            <option value="DW">Double Wall (DW)</option>
                                            <option value="TW">Triple Wall (TW)</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Jenis flute</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="top_flute_type" id="top-flute-type">
                                            <option value="">-</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="B/C">B/C</option>
                                            <option value="E">E</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Substance</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="top_substance" id="top-substance">
                                            <option value="">-</option>
                                            @foreach($substances as $substance)
                                            <option value="{{$substance->substance}}">{{$substance->substance}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr />
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Satuan</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="top_meas_unit" id="top_meas_unit">
                                            <option value="">-</option>
                                            <option value="INCH">INCH</option>
                                            <option value="MM">MM</option>
                                            <option value="CM">CM</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jenis</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="top_meas_type">
                                            <option value="">-</option>
                                            <option value="UD">Ukuran Dalam</option>
                                            <option value="UL">Ukuran Luar</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Ukuran</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="top_length" id="top-length">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="top_width" id="top-width">
                                    </div>
                                </div>
                                <hr />
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Cetakan</label>
                                    <div class="col-sm-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="top_flag_print" value="0"
                                                checked>
                                            <label class="form-check-label" for="inlineRadio2">Polos</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="top_flag_print"
                                                value="1">
                                            <label class="form-check-label" for="inlineRadio1">Print</label>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Catatan</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" name="top_remarks"></textarea>
                                    </div>
                                </div>
                                <hr />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('script')

@endsection