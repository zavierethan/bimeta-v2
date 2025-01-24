<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$invoice->invoice_no}}</title>
    <style>
    /* Container */
    .container {
        width: 100%;
        max-width: 1200px;
        font-size: 16px;
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
    <div class="container">
        <div style="margin-bottom: 20px;" class="row">
            <div class="col col-12">
                <h2 style="margin: 4px;">PT. BIMETA KARNUSA BANDUNG</h2>
            </div>
        </div>
        <div style="margin-bottom: 20px;" class="row">
            <div style="font-size: 14px;" class="col col-12">
                <div style="margin: 4px;"><span>Kepada</span></div>
                <div style="margin: 4px;"><span>{{$invoice->customer_name}}</span></div>
                <div style="margin: 4px;"><span>{{$invoice->address}}</span></div>
            </div>
        </div>
        <div style="margin-bottom: 20px;" class="row">
            <div style="font-size: 14px;" class="col col-12">
                <div style="margin: 4px;"><span style="margin-right: 35px;">No. Faktur</span> <span>: {{$invoice->alt_invoice_no}}</span></div>
                <div style="margin: 4px;"><span style="margin-right: 7px;">No. Surat Jalan</span> <span>: {{$travel_permit_no}}</span></div>
                <div style="margin: 4px;"><span style="margin-right: 57px;">No. PO</span> <span>: {{$po_number}}</span></div>
                <div style="margin: 4px;"><span style="margin-right: 6px;">Tanggal Faktur</span> <span>: <?php echo date("d/m/Y", strtotime($invoice->date)) ?></span></div>
            </div>
        </div>
        <table style="font-size: 14px;margin: 4px; width: 100%;border: 2px solid black;border-collapse: collapse;border: 2px solid black;">
            <thead>
                <tr style="padding: 8px;">
                    <th style="border: 2px solid black; padding: 5px;">NO</th>
                    <th style="border: 2px solid black; text-align: center;">NAMA BARANG</th>
                    <th style="border: 2px solid black; text-align: center">Qty</th>
                    <th style="border: 2px solid black; text-align: center">HARGA Rp.</th>
                    <th style="border: 2px solid black; text-align: center;">TOTAL Rp.</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach($detailInvoice as $detail)
                <tr>
                    <td style="border: 2px solid black; padding: 5px;text-align: center"><?php echo $no++; ?>.</td>
                    <td style="border: 2px solid black; text-align: center; padding: 10px;">{{$detail->goods_name}} UK :
                        {{$detail->measure}}</td>
                    <td style="border: 2px solid black; text-align: center; padding: 10px;" class="quantity">
                        {{$detail->quantity}}</td>
                    <td style="border: 2px solid black; text-align: right; padding: 10px;" class="price">
                        <?php echo number_format($detail->price, 2); ?></td>
                    <td style="border: 2px solid black; text-align: right; padding: 10px;" class="total-price">
                        <?php echo number_format($detail->total_price, 2); ?></td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="border: 2px solid black; padding: 5px;text-align: right">TOTAL Rp.</td>
                    <td style="border: 2px solid black; text-align: right; padding: 10px;"><?php echo number_format($sub_total, 2); ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div style="margin: 5px;font-weight: bold;">
        <div class="row">
            <div style="font-size: 14px;" class="col col-6">
                <p id="text">Terbilang:</p>
                <p style="font-style: italic">{{$invoice->spelled_out}}</p>
                <div style="margin: 2px;">
                    Pembayaran di Transfer
                </div>
                <div style="margin: 2px;">
                    <span style="margin-right: 20px;">Nama Bank</span><span>: BCA</span>
                </div>
                <div style="margin: 2px;">
                    <span style="margin-right: 12px;">Alamat Bank</span><span>: Jl. Asia Afrika Bandung</span>
                </div>
                <div style="margin: 2px;">
                    <span style="margin-right: 15px;">No Rekening</span><span>: 0083009397</span>
                </div>
                <div style="margin: 2px;">
                    <span style="margin-right: 26px;">Atas Nama</span><span>: PT.BIMETA KARNUSA</span>
                </div>
            </div>
            <div class="col col-3">

            </div>
            <div style="font-size: 14px;" class="col col-3">
                <p style="text-align: center;">Bandung, 17/03/2024</p>
                <p style="text-align: center;margin-top: 80px;">(-------------------------------)</p>
            </div>
        </div>
    </div>
</body>

</html>
