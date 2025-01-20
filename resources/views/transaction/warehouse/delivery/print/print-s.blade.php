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
        margin-bottom: 20px;
        border: 1px solid black;
        font-weight: bold;
    }

    table th, td {
        border: 1px solid black;
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
    <div class="container" style="border: 1px solid black;">
        <div style="margin: 10px;">
            <div class="row">
                <div class="col col-4">
                    <div class="row">
                        <div class="col col-12">
                            <p>PT. BIMETA KARNUSA </br> BANDUNG</p>
                        </div>
                    </div>
                </div>
                <div class="col col-4">
                    <div class="row">
                        <div class="col col-12 text-center">
                            <h3 style="text-decoration: underline;">SURAT JALAN SAMPLE</h3>
                            <p><strong>No. {{$deliveryOrder->travel_permit_no}}</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col col-4">
                    <div class="row">
                        <div class="col col-12">
                            <p>Bandung, <?php echo date("d-m-Y", strtotime($deliveryOrder->delivery_date)); ?> </p>
                            <p>Kepada Yth : </p>
                            <p>{{$deliveryOrder->customer_name}}</p>
                            <p>{{$deliveryOrder->shipping_address}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-12">
                    <p>Bersama kendaraan dengan Nopol <strong> {{$deliveryOrder->licence_plate}} </strong>, kami kirim barang - barang tersebut dibawah ini :</p>
                </div>
            </div>
            <div class="row">
                <table>
                    <thead>
                        <tr>
                            <th class="text-center">KUANTITAS</th>
                            <th>NAMA BARANG</th>
                            <th>KETERANGAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detailDeliveryOrder as $do)
                        <tr>
                            <td class="text-center">{{$do->quantity}}</td>
                            <td>{{$do->goods_name}} UK : {{$do->measure}}</td>
                            <td>{{$do->specification}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col col-4 text-center">
                    <p>Yang Menerima</p>
                    <p style="margin-top: 100px;"></p>
                </div>
                <div class="col col-4 text-center">
                    
                </div>
                <div class="col col-4 text-center">
                    <p>Hormat Kami</p>
                    <p style="margin-top: 100px;"></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>