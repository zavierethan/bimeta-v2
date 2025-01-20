<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN PESEDIAAN BAHAN BAKU</title>
    <style>
    /* Container */
    .container {
        width: 100%;
        max-width: 1200px;
        font-size: 14px;
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

    .text-right {
        text-align: right;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        font-weight: bold;
    }

    table th,
    td {
        border: 1px solid black;
        padding: 5px;
        text-align: left;
    }

    /* Responsive Columns */
    @media screen and (max-width: 768px) {
        .col {
            width: 100%;
        }
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col col-12">
                <h2><strong>PT BIMETA KARNUSA BANDUNG</strong></h2>
                <p></p>
                <p><strong>KARTU PESEDIAAN BAHAN BAKU KERTAS</strong></p>

                <div style="margin-top: 2px;">
                    <strong><span style="margin-right: 20px;">PERIODE</span><span style="margin-left: 50px;">PER <?php echo date("d M Y", strtotime($startDate)). " - " . date("d M Y", strtotime($endDate));?></span></strong>
                </div>
                <div style="margin-top: 2px;">
                    <strong><span style="margin-right: 20px;">SUPPLIER</span><span style="margin-left: 45px;">{{$supplier}}</span></strong>
                </div>

                <div style="margin-top: 2px;">
                    <strong><span style="margin-right: 20px;">JENIS</span><span style="margin-left: 75px;">{{$specification}} GR/M2</span></strong>
                </div>

                <table id="materials-table" style="margin-top: 20px; margin-bottom: 20px;">
                    <thead>
                        <tr>
                            <th class="text-center">LEBAR</th>
                            <th class="text-center">PERS. AWAL</th>
                            <th class="text-center">PEMBELIAN</th>
                            <th class="text-center">PEMAKAIAN</th>
                            <th class="text-center">CONES</th>
                            <th colspan="3" class="text-center">SISA</th>
                            <th class="text-center">PERS. AKHIR</th>
                        </tr>
                        <tr>
                            <th class="text-center">CM</th>
                            <th class="text-center">KG</th>
                            <th class="text-center">KG</th>
                            <th class="text-center">KG</th>
                            <th class="text-center">KG</th>
                            <th class="text-center">A</th>
                            <th class="text-center">+</th>
                            <th class="text-center">B</th>
                            <th class="text-center">KG</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($materials as $material)
                        <tr>
                            <td class="text-center">{{$material->width}}</td>
                            <td class="text-right">{{$material->initial_stock}}</td>
                            <td class="text-right">{{$material->quantity_order}}</td>
                            <td class="text-right">{{$material->quantity_used}}</td>
                            <td class="text-right">0</td>
                            <td class="text-right">0</td>
                            <td class="text-center">+</td>
                            <td class="text-right">0</td>
                            <td class="text-right">{{$material->remaining_qty}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td class="text-center">JML</td>
                            <td class="text-right" id="total-initial-stock"><strong>{{$total_initial_stock}}</strong></td>
                            <td class="text-right" id="total-purchase"><strong>{{$total_quantity_order}}</strong></td>
                            <td class="text-right" id="total-quantity-used">{{$total_quantity_used}}</td>
                            <td class="text-right" id="total-cones">0</td>
                            <td class="text-right" id="total-a">0</td>
                            <td>+</td>
                            <td class="text-right" id="total-b">0</td>
                            <td class="text-right" id="total-final">{{$total_remaining_qty}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
