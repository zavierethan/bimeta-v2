<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$purchaseOrder->po_no}}</title>
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
        border: 1px solid #ddd;
        font-weight: bold;
    }

    table th,
    td {
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
    <div class="container">
        <div class="row text-center" style="color: #4CAF50">
            <h2 style="margin: 2px;">PT. BIMETA KARNUSA</h2>
            <p style="margin: 2px;"><strong>CORRUGATED CARTOON BOARD & BOX MFG.CO.</strong></p>
            <p style="margin: 2px;">Jl. Raya Batujajar No. 98 Cimareme Kec. Ngamprah Kab. Bandung Barat - Indonesia</p>
            <p style="margin: 2px;">Phone/Fax: (022) 6866526 E-Mail: bimeta98@yahoo.com</p>
            <hr style="margin-bottom: 2px;"/>
            <hr style="margin-top: 2px;"/>
        </div>
        <div class="row">
            <div class="col col-12">
                <p>Kepada Yth</p>
                <p><strong>{{$purchaseOrder->name}}</strong></p>
                <p>Up.</p>
                <p>PO No. : {{$purchaseOrder->po_no}}</p>
                <p>Dengan Hormat, </p>
                <p>Bersama ini kami memesan barang dengan rincian berikut :</p>
                <table>
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th class="text-center">Qty</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Quality</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($detailPurchaseOrder as $po)
                        <tr>
                            <td>
                                {{$po->paper_type}} {{$po->gramature}} {{$po->supplier_code}} / L: {{$po->width}} CM
                            </td>
                            <td class="text-center">{{$po->quantity}}</td>
                            <td>ROLL</td>
                            <td>{{$po->price}}</td>
                            <td>{{$po->gramature}} GRM</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <p>Demikian pesanan kami, atas perhatiannya kami ucapkan terimakasih.</p>
                <p>Bandung, <?php echo date("d-m-Y", strtotime($purchaseOrder->date)); ?></p>
                <p>Hormat Kami, </p>
                <p style="margin-top: 50px;">Paulus A</p>
                <p><strong>Catatan: Pembayaran 2 bulan setelah penerimaan barang.</strong></p>
            </div>
        </div>
    </div>
</body>

</html>
