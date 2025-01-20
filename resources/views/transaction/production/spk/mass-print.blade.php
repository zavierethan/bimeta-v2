<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
    /* Container */
    .container {
        width: 100%;
        max-width: 1200px;
        font-size: 12px;
        font-weight: bold;
    }

    /* Row */
    .row::after {
        content: "";
        clear: both;
        display: table;
    }

    /* Columns */
    .col {
        box-sizing: border-box;
        float: left;
    }

    /* Example classes for different column sizes */
    .col-1 {
        width: 8.33%;
    }

    .col-2 {
        width: 16.66%;
    }

    .col-3 {
        width: 25%;
    }

    .col-4 {
        width: 33.33%;
    }

    .col-5 {
        width: 41.66%;
    }

    .col-6 {
        width: 50%;
    }

    .col-7 {
        width: 58.33%;
    }

    .col-8 {
        width: 66.66%;
    }

    .col-9 {
        width: 75%;
    }

    .col-10 {
        width: 83.33%;
    }

    .col-11 {
        width: 91.66%;
    }

    .col-12 {
        width: 100%;
    }

    .text-center {
        text-align: center;
    }

    /* table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        border: 1px solid black;
    } */
    </style>
</head>

<body>
    @foreach($data as $data)
    <div class="container" style="border: 1px solid black;">
        <div style="margin: 10px;">
            <div class="row">
                <div class="col col-4">
                    <p style="writing-mode: vertical-rl;text-orientation: mixed;">PT. BIMETA KARNUSA BANDUNG</p>
                    <p>NO. SPK : {{$data->spk_no}} ({{$data->spk_type}})</p>
                </div>
                <div class="col col-4"></div>
                <div class="col col-4">
                    <p>NO.SO : {{$data->transaction_no}} </p>
                    <p>TANGGAL : <?php echo date("d/m/Y", strtotime($data->created_at)); ?> </p>
                </div>
            </div>

            <div class="row">
                <div class="col col-8">
                    <p>KONSUMEN : {{$data->customer_name}}</p>
                    <p>NAMA BARANG : {{$data->name}}</p>
                </div>
                <div class="col col-4">
                    <p>NO. PO : {{$data->ref_po_customer}}</p>
                    <p>TANGGAL PENGIRIMAN : <?php echo date("d/m/Y", strtotime($data->delivery_date)); ?></p>
                </div>
            </div>

            <table style="width: 100%;border: 1px solid black;border-collapse: collapse;margin-bottom: 5px;border: 1px solid black;">
                <tr>
                    <td width="30%" style="border: 1px solid black; text-align: center;padding: 8px;">BANYAK SHEET</td>
                    <td width="30%" style="border: 1px solid black; text-align: center;padding: 8px;">KUANTITAS ORDER</td>
                    <td width="60%" style="border: 1px solid black; text-align: center;padding: 8px;">UKURAN</td>
                </tr>
                <tr>
                    <td style="border: 1px solid black;text-align: center; height: 30px;padding: 8px;">{{$data->sheet_quantity}}</td>
                    <td style="border: 1px solid black;text-align: center;;padding: 8px;">{{$data->quantity}}</td>
                    <td style="border: 1px solid black;text-align: center;;padding: 8px;">
                        @if($data->type == 'A' || $data->type == 'B')
                        <div>{{$data->meas_str}}</div>
                        @endif

                        <div>{{$data->measure}}</div>
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; text-align: center;padding: 8px;">KUALITAS</td>
                    <td colspan="2" style="border: 1px solid black; text-align: center;padding: 8px;">UKURAN SHEET</td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; text-align: center; height: 30px;padding: 8px;">{{$data->specification}}</td>
                    <td colspan="2" style="border: 1px solid black;">
                        <table style="width: 100%;border-collapse: collapse;">
                            <tr>
                                <td style="text-align: center; padding:17px;">
                                    Netto : {{$data->netto}} <sup></sup>
                                </td>
                                <td style="border-left: 1px solid black;text-align: center;padding:17px;">
                                    Bruto : {{$data->bruto_width}} @php echo ($data->sup_bruto_width) ? "<sup> x ".$data->sup_bruto_width."</sup>" : "" @endphp X  {{$data->bruto_length}} @php echo ($data->sup_bruto_length) ? "<sup> x ".$data->sup_bruto_length."</sup>" : "" @endphp
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td rowspan="6" style="border: 1px solid black;text-align: center;">
                        @if($data->show_layout == 1)
                            @if($data->layout_type == 'SHEET')
                            <table style="border-collapse: collapse; margin-right: 5px; margin-left: 50px;margin-right: 100px;">
                                <tr>
                                    <td width="50px" style="text-align: center;">

                                    </td>
                                    <td style="text-align: center;">

                                    </td>
                                    <td width="70px" style="text-align: center;">
                                        P: {{$data->netto_length}}
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50px" style="text-align: center;">

                                    </td>
                                    <td style="border-top: 1px solid black;border-left: 1px solid black;text-align: center; padding:10px;">

                                    </td>
                                    <td style="border-top: 1px solid black;text-align: center; padding:10px;">

                                    </td>
                                    <td style="border-top: 1px solid black;border-right: 1px solid black;text-align: center; padding:10px;">

                                    </td>
                                </tr>
                                <tr>
                                    <td style="writing-mode: vertical-rl;padding: 5px;">
                                        L: {{$data->netto_width}}
                                    </td>
                                    <td style="border-left: 1px solid black;text-align: center; padding:17px; height: 20px;">
                                        {{$data->l2}}
                                    </td>
                                    <td style="text-align: center; padding:17px;">
                                        {{$data->p1}}
                                    </td>
                                    <td style="border-right: 1px solid black;text-align: center; padding:17px;">
                                        {{$data->l1}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">

                                    </td>
                                    <td style="border-bottom: 1px solid black;border-left: 1px solid black;text-align: center; padding:10px;">

                                    </td>
                                    <td style="border-bottom: 1px solid black;text-align: center; padding:10px;">

                                    </td>
                                    <td style="border-bottom: 1px solid black;border-right: 1px solid black;text-align: center; padding:10px;">

                                    </td>
                                </tr>
                            </table>
                            @endif

                            @if($data->layout_type == 'BOX')
                                <table style="border-collapse: collapse; margin-right: 5px;">
                                    <tr>
                                        <td width="50px" style="text-align: center;">

                                        </td>
                                        <td style="text-align: center;">

                                        </td>
                                        <td width="70px" style="text-align: center;">

                                        </td>
                                        <td style="text-align: center;padding: 8px">
                                            JP: {{$data->netto_length}}
                                        </td>
                                        <td style="text-align: center;">

                                        </td>
                                        <td width="70px" style="text-align: center;">

                                        </td>
                                        <td style="text-align: center;">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50px" style="text-align: center;">

                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">

                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">

                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">

                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            {{$data->plape_1}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">

                                        </td>
                                        <td style="text-align: center; padding:10px;">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="writing-mode: vertical-rl;padding: 5px;">
                                            JL: {{$data->netto_width}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px; height: 20px;">
                                            {{$data->l2}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;">
                                            {{$data->p1}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;">
                                            {{$data->l1}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;">
                                            {{$data->t}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;">
                                            {{$data->p2}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:17px;width: 5px;">
                                            {{$data->k}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">

                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">

                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">

                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">

                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">
                                            {{$data->plape_2}}
                                        </td>
                                        <td style="border: 1px solid black;text-align: center; padding:10px;">

                                        </td>
                                        <td style="text-align: center; padding:10px;">

                                        </td>
                                    </tr>
                                </table>
                            @endif

                            @if($data->layout_type == 'ROLL')
                            <table style="border-collapse: collapse; margin-right: 5px; margin-left: 50px;margin-right: 100px;">
                            <tr>
                                <td width="50px" style="text-align: center;">

                                </td>
                                <td style="text-align: center;">

                                </td>
                                <td width="70px" style="text-align: center;">

                                </td>
                            </tr>
                            <tr>
                                <td width="50px" style="text-align: center;">

                                </td>
                                <td style="border-top: 1px solid black;border-left: 1px solid black;text-align: center; padding:10px;">

                                </td>
                                <td style="border-top: 1px solid black;text-align: center; padding:10px;">

                                </td>
                                <td style="border-top: 1px solid black;border-right: 1px solid black;text-align: center; padding:10px;">

                                </td>
                            </tr>
                            <tr>
                                <td style="writing-mode: vertical-rl;padding: 5px;">
                                    L: {{$data->width}}
                                </td>
                                <td style="border-left: 1px solid black;text-align: center; padding:17px; height: 20px;">
                                    {{$data->l2}}
                                </td>
                                <td style="text-align: center; padding:17px;">
                                    {{$data->p1}}
                                </td>
                                <td style="border-right: 1px solid black;text-align: center; padding:17px;">
                                    {{$data->l1}}
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">

                                </td>
                                <td style="border-bottom: 1px solid black;border-left: 1px solid black;text-align: center; padding:10px;">

                                </td>
                                <td style="border-bottom: 1px solid black;text-align: center; padding:10px;">

                                </td>
                                <td style="border-bottom: 1px solid black;border-right: 1px solid black;text-align: center; padding:10px;">

                                </td>
                            </tr>
                        </table>
                            @endif
                        @endif
                    </td>
                    <td colspan="2" style="border: 1px solid black; text-align: center;padding: 8px;">CETAKAN</td>
                </tr>
                <tr>
                    <td colspan="2" style="border: 1px solid black;text-align: center;padding: 17px;">
                        @if($data->flag_print == 1)
                            PRINT
                        @else
                            POLOS
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="border: 1px solid black;text-align: center;">
                        <table style="width: 100%;border-collapse: collapse;">
                            <tr>
                                <td style="text-align: center; padding:8px;">
                                    STITCHING
                                </td>
                                <td style="border-left: 1px solid black;border-left: 1px solid black;text-align: center; padding:8px;">
                                    LEM
                                </td>
                                <td style="border-left: 1px solid black;border-left: 1px solid black;text-align: center; padding:8px;">
                                    POUNCH
                                </td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid black;text-align: center; padding:8px;">
                                    <input type="checkbox" name="stitching" value="" <?php echo ($data->flag_stitching == 1) ? "checked":""; ?>>
                                </td>
                                <td style="border-left: 1px solid black;border-top: 1px solid black;text-align: center; padding:8px;">
                                    <input type="checkbox" name="lem" value="" <?php echo ($data->flag_glue == 1) ? "checked":""; ?>>
                                </td>
                                <td style="border-left: 1px solid black;border-top: 1px solid black;text-align: center; padding:8px;">
                                    <input type="checkbox" name="pounch" value="" <?php echo ($data->flag_pounch == 1) ? "checked":""; ?>>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <table style="width: 100%;border-collapse: collapse;">
                            <tr>
                                <td style="">
                                    Catatan:
                                </td>
                                <td style="text-align: center; padding:8px;">

                                </td>
                                <td style="text-align: center; padding:8px;">

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <table style="width: 100%;border-collapse: collapse;">
                            <tr>
                                <td style="">
                                </td>
                                <td style="">

                                </td>
                                <td style="">

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <table style="width: 100%;border-collapse: collapse;">
                            <tr>
                                <td style="">

                                </td>
                                <td style="">

                                </td>
                                <td style="">

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table style="width: 100%;border: 1px solid black;border-collapse: collapse;border: 1px solid black;">
                <tr style="padding: 8px;">
                    <td style="border: 1px solid black; padding: 5px;">BAGIAN</td>
                    <th style="border: 1px solid black; text-align: center;">TGL</th>
                    <th style="border: 1px solid black; text-align: center">OPT</th>
                    <th style="border: 1px solid black; text-align: center">HSL</th>
                    <th style="border: 1px solid black; text-align: center;">TGL</th>
                    <th style="border: 1px solid black; text-align: center">OPT</th>
                    <th style="border: 1px solid black; text-align: center">HSL</th>
                    <th style="border: 1px solid black; text-align: center;">TGL</th>
                    <th style="border: 1px solid black; text-align: center">OPT</th>
                    <th style="border: 1px solid black; text-align: center">HSL</th>
                    <th style="border: 1px solid black; text-align: center;">TGL</th>
                    <th style="border: 1px solid black; text-align: center">OPT</th>
                    <th style="border: 1px solid black; text-align: center">HSL</th>
                    <th style="border: 1px solid black; text-align: center">TOTAL</th>
                </tr>
                @foreach($productionProcessesItem as $item)
                    @if($item->spk_id == $data->spk_id)
                    <tr>
                        <td style="border: 1px solid black;padding: 5px;">{{$item->process_name}}</td>
                        <td style="border: 1px solid black; text-align: center;"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center;"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center;"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center;"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                    </tr>
                    @endif
                @endforeach
            </table>
        </div>
    </div>

    <div style="page-break-after: always;"></div>

    @endforeach
</body>

</html>
