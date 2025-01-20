<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$deliveryOrder->travel_permit_no}}</title>
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

    table {
        width: 100%;
        border-collapse: collapse;
        font-weight: bold;
    }

    table th {
        padding: 8px;
        text-align: left;
        color: white;
    }

    table td {
        padding: 8px;
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
        <div style="margin: 10px;">
            <div class="row">
                <div class="col col-6">
                    <div class="row">
                        <div class="col col-12">
                            <p></p>
                            <p></p>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="col col-6">
                    <div class="row">
                        <div class="col col-12">
                            <p style="margin-left: 50px;"><strong>BANDUNG</strong> <strong style="margin-left: 50px;"><?php echo date("d/m/Y", strtotime($deliveryOrder->delivery_date)) ?></strong></p>
                            <p style="margin-left: 50px; margin-top: 30px;"><strong>{{$deliveryOrder->customer_name}}</strong></p>
                            <p style="margin-left: 50px;"><strong>{{$deliveryOrder->shipping_address}}</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-12">
                    <span><strong style="margin-left: 30px;">{{$deliveryOrder->travel_permit_no}}</strong></span>
                </div>
            </div>
            <div class="">
                <div class="col col-12">
                    <p><span style="color: white;">Bersama kendaraan dengan No. Kendaraan </span><strong style="margin-left: 55px;"> {{$deliveryOrder->licence_plate}} </strong> <span style="color: white;">>kami kirim barang - barang tersebut dibawah ini :</span></p>
                </div>
            </div>
            <div class="" style="margin-top: 30px;">
                <table>
                    <thead>
                        <tr>
                            <th class="text-center">QTY</th>
                            <th class="text-center"></th>
                            <th>JENIS BARANG / UKURAN</th>
                            <th>KETERANGAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($detailDeliveryOrder as $do)
                        <tr>
                            <td class="text-center">{{$do->quantity}}</td>
                            <td class="text-center"></td>
                            <td>
                                <span style="margin-left: 45px;">{{$do->goods_name}}</span>
                            </td>
                            <td><span style="margin-left: 45px;">{{$do->specification}}</span></td>
                        </tr>
                        <tr>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td>
                                <span style="margin-left: 45px;">UK : {{$do->measure}}</span>
                            </td>
                            <td><span style="margin-left: 45px;"></span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
