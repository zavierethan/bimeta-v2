$(function() {

    var meas_unit = $("#meas-unit").val();

    var length = $("#length").val();
    var width = $("#width").val();

    switch (meas_unit) {
        case "INCH":
            var length = Math.round(parseFloat(length * 25.4));
            var width = Math.round(parseFloat(width * 25.4));
            break;
        case "CM":
            var length = Math.round(parseFloat(length * 10));
            var width = Math.round(parseFloat(width * 10));
            break;
        default:
            var length = Math.round(parseFloat(length));
            var width = Math.round(parseFloat(width));
            break;
    }

    $("#form-a .length").val(length);
    $("#form-a .width").val(width);

    $("#calc-form-a").click(function() {

        var spk_qty = $("#form-a .spk-quantity").val();

        var netto_width = width;
        var netto_length = length;

        if (spk_qty.trim().length === 0) {
            $("#form-a .spk-quantity").focus();
            // Change the border color to red
            $("#form-a .spk-quantity").css("border-color", "red");
            return
        }

        $("#form-a .form-netto-width").val(netto_width);
        $("#form-a .form-netto-length").val(netto_length);

        $("#form-a .jl").text(netto_width)
        $("#form-a .jp").text(netto_length)

        // Perhitungan Panjang dan lebar Bruto
        var bruto_width = netto_width * 2;
        var bruto_length = netto_length + 20; // 20 penambahan buangan, ini bersifat dinamis tergantung dari customer

        //$("#form-a .form-bruto-width").val(roundToNearestMultipleOf50(bruto_width));
        //$("#form-a .form-bruto-length").val(roundToNearestMultipleOf5(bruto_length));

        var param1 = netto_width * 2;
        var param2 = roundToNearestMultipleOf50(bruto_width);

        if ((param2 - param1) < 50) {
            bruto_width = bruto_width + 50;
        }

        //perhitungan banyak sheet
        if (netto_width <= 850) {
            var qty_sheet = Math.ceil(spk_qty / 2);
        } else {
            var qty_sheet = spk_qty * 1;
        }

        //$("#form-a .form-qty-sheet").val(qty_sheet);

    });

    $("#form-a .form-netto-width").on("keyup", function() {
        $("#form-a .jl").text($(this).val())
    });

    $("#form-a .form-netto-length").on("keyup", function() {
        $("#form-a .jp").text($(this).val())
    });

    function roundToNearestMultipleOf5(number) {
        return 5 * Math.round(number / 5);
    }

    function roundToNearestMultipleOf50(number) {
        return 50 * Math.ceil(number / 50);
    }

});
