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
        font-size: 18px;
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
        <div style="margin: 10px;border: 1px solid black;">
            <div class="row">
                <div class="col col-12">
                    <table style="border-collapse: collapse; margin-right: 5px;">
                        <tr>
                            <td style="padding: 15px;">NOMOR ROLL </td>
                            <td style="padding: 15px;">: {{$data->no_roll}}</td>
                        </tr>
                        <tr>
                            <td style="padding: 15px;">NAMA MATERIAL </td>
                            <td style="padding: 15px;">: {{$data->name}}</td>
                        </tr>
                        <tr>
                            <td style="padding: 15px;">GRAMATURE </td>
                            <td style="padding: 15px;">: {{$data->gramature}} {{$data->unit}}</td>
                        </tr>
                        <tr>
                            <td style="padding: 15px;">LEBAR (CM) </td>
                            <td style="padding: 15px;">: {{$data->material_width}} CM</td>
                        </tr>
                        <tr>
                            <td style="padding: 15px;">BERAT AWAL (KG) </td>
                            <td style="padding: 15px;">: {{$data->weight}} KG</td>
                        </tr>
                        <tr>
                            <td style="padding: 15px;">REFERENCE </td>
                            <td style="padding: 15px;">: {{$data->source_from}}</td>
                        </tr>
                        <tr>
                            <td style="padding: 15px;">TANGGAL MASUK </td>
                            <td style="padding: 15px;">: <?php echo date("d/m/Y H:i:s", strtotime($data->created_at)); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div style="margin: 10px;">
            <div class="row">
                <div class="col col-12">
                <table style="width: 100%;border: 1px solid black;border-collapse: collapse;border: 1px solid black;">
                    <tr style="padding: 8px;">
                        <td style="border: 1px solid black; padding: 5px; width: 20%">Tanggal</td>
                        <th style="border: 1px solid black; text-align: center; width: 20%">Pemakaian</th>
                        <th style="border: 1px solid black; text-align: center; width: 20%">BS</th>
                        <th style="border: 1px solid black; text-align: center; width: 20%">Berat Akhir</th>
                        <th style="border: 1px solid black; text-align: center; width: 20%">Operator</th>
                    </tr>
                    <?php?>
                    <tr>
                        <td style="border: 1px solid black;padding: 15px;"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;padding: 15px;"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;padding: 15px;"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;padding: 15px;"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;padding: 15px;"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;padding: 15px;"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;padding: 15px;"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;padding: 15px;"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;padding: 15px;"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;padding: 15px;"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;padding: 15px;"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;padding: 15px;"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;padding: 15px;"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;padding: 15px;"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;padding: 15px;"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                        <td style="border: 1px solid black; text-align: center"></td>
                    </tr>
                </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
