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
    </style>
</head>

<body>
    <div class="container">
        <div style="margin-bottom: 20px;" class="row">
            <div class="col col-12">
                <hr style="margin-bottom: 2px;"/>
                <hr style="margin-top: 1px;"/>
            </div>
        </div>
        <div style="margin-bottom: 20px;" class="row">
            <div style="font-size: 16px;" class="col col-12">
                <div style="margin: 5px;"><span style="margin-right: 128px;font-style: italic;">No. </span> <span>: {{$data["no_kuitansi"]}}</span></div>
                <div style="margin: 5px;"><span style="margin-right: 160px;font-style: italic;"> </span> <span>--------------------------------------------------------------------------------------------------</span></div>
                <div style="margin: 5px;"><span style="margin-right: 27px;font-style: italic;">Sudah Terima Dari</span> <span>: {{$data["received_from"]}}</span></div>
                <div style="margin: 5px;"><span style="margin-right: 160px;font-style: italic;"> </span> <span>--------------------------------------------------------------------------------------------------</span></div>
                <div style="margin: 5px;"><span style="margin-right: 52px;font-style: italic;">Uang Sejumlah</span> <span>: {{$data["nominal_text"]}}</span></div>
                <div style="margin: 5px;"><span style="margin-right: 160px;font-style: italic;"> </span> <span>--------------------------------------------------------------------------------------------------</span></div>
                <div style="margin-top: 20px;margin-left: 5px;"><span style="margin-right: 160px;font-style: italic;"> </span> <span>--------------------------------------------------------------------------------------------------</span></div>
                <div style="margin: 5px;"><span style="margin-right: 27px;font-style: italic;">Untuk Pembayaran</span> <span>: {{$data["pay_for"]}}</span></div>
                <div style="margin: 5px;"><span style="margin-right: 160px;font-style: italic;"> </span> <span>--------------------------------------------------------------------------------------------------</span></div>
            </div>
        </div>
    </div>
    <div style="margin: 5px;font-weight: bold;">
        <div class="row">
            <div style="font-size: 16px;" class="col col-6">
                <table style="font-size: 14px;margin-top: 100px; width: 100%;border: 2px solid black;border-collapse: collapse;border: 2px solid black;">
                    <thead>
                        <tr style="padding: 8px;">
                            <th style="border: 2px solid black; padding: 5px;font-style: italic;font-size: 16px;">Rp.</th>
                            <th style="border: 2px solid black; text-align: center;font-style: italic;font-size: 16px;">{{$data["nominal"]}}</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div style="font-size: 16px;" class="col col-6">
                <p style="text-align: right;font-style: italic;">Bandung, <?php echo date("d M Y", strtotime($data["date"])) ?></p>
                <p style="text-align: right;margin-top: 80px;">(-----------------------------)</p>
            </div>
        </div>
    </div>
</body>

</html>
