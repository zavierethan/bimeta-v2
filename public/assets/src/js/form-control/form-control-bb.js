$(function() {
    // Form BB-B

    var bottom_meas_unit = $("#bottom-meas-unit").val();

    var bottom_length = $("#bottom-length").val();
    var bottom_width = $("#bottom-width").val();
    var bottom_height = $("#bottom-height").val();

    var bottom_ply_type = $("#bottom-ply-type").val();

    switch (bottom_meas_unit) {
        case "INCH":
            var bottom_length = Math.round(parseFloat(bottom_length * 25.4));
            var bottom_width = Math.round(parseFloat(bottom_width * 25.4));
            var bottom_height = Math.round(parseFloat(bottom_height * 25.4));
            break;
        case "CM":
            var bottom_length = Math.round(parseFloat(bottom_length * 10));
            var bottom_width = Math.round(parseFloat(bottom_width * 10));
            var bottom_height = Math.round(parseFloat(bottom_height * 10));
            break;
        default:
            var bottom_length = Math.round(parseFloat(bottom_length));
            var bottom_width = Math.round(parseFloat(bottom_width));
            var bottom_height = Math.round(parseFloat(bottom_height));
            break;
    }

    $("#form-bb #bb-b .bottom-length").val(bottom_length);
    $("#form-bb #bb-b .bottom-width").val(bottom_width);
    $("#form-bb #bb-b .bottom-height").val(bottom_height);

    $("#calc-form-bb-b").click(function() {

        var spk_qty = $("#form-bb #bb-b .bottom-spk-quantity").val();

        if (spk_qty.trim().length === 0) {

            $("#form-bb #bb-b .bottom-spk-quantity").focus();
            // Change the border color to red
            $("#form-bb #bb-b .bottom-spk-quantity").css("border-color", "red");

            return
        }

        $("#form-bb #bb-b .l-length").text(bottom_length);
        $("#form-bb #bb-b .l-width").text(bottom_width);
        $("#form-bb #bb-b .l-height").text(bottom_height);

        var form_bottom_netto_width = bottom_height + bottom_width + bottom_height;
        var form_bottom_netto_length = bottom_height + bottom_length + bottom_height;

        $("#form-bb #bb-b .form-bottom-netto-width").val(form_bottom_netto_width);
        $("#form-bb #bb-b .form-bottom-netto-length").val(form_bottom_netto_length);

        $("#form-bb #bb-b .jl").text(form_bottom_netto_width);
        $("#form-bb #bb-b .jp").text(form_bottom_netto_length);

        // Perhitungan Panjang dan lebar Bruto
        var form_bottom_bruto_width = form_bottom_netto_width * 2;
        var form_bottom_bruto_length = form_bottom_netto_length + 20; // 20 penambahan buangan, ini bersifat dinamis tergantung dari customer

        $("#form-bb #bb-b .form-bottom-bruto-width").val(roundToNearestMultipleOf50(form_bottom_bruto_width));
        $("#form-bb #bb-b .form-bottom-bruto-length").val(roundToNearestMultipleOf5(form_bottom_bruto_length));

        var param1 = form_bottom_netto_width * 2;
        var param2 = roundToNearestMultipleOf50(form_bottom_bruto_width);

        if ((param2 - param1) < 50) {
            form_bottom_bruto_width = form_bottom_bruto_width + 50;
        }

        //perhitungan banyak sheet
        if (form_bottom_netto_width <= 850) {
            var qty_sheet = Math.ceil(spk_qty / 2);
        } else {
            var qty_sheet = spk_qty * 1;
        }

        $("#form-bb #bb-b .form-bottom-sheet-quantity").val(qty_sheet);
    });

    $("#form-bb #bb-b .form-netto-width").on("keyup", function() {
        $("#form-bb #bb-b .jl").text($(this).val())
    });

    $("#form-bb #bb-b .form-netto-length").on("keyup", function() {
        $("#form-bb #bb-b .jp").text($(this).val())
    });

    // Form BB-A

    var top_meas_unit = $("#top-meas-unit").val();

    var top_length = $("#top-length").val();
    var top_width = $("#top-width").val();
    var top_height = $("#top-height").val();

    var top_ply_type = $("#top-ply-type").val();

    switch (top_meas_unit) {
        case "INCH":
            var top_length = Math.round(parseFloat(top_length * 25.4));
            var top_width = Math.round(parseFloat(top_width * 25.4));
            var top_height = Math.round(parseFloat(top_height * 25.4));
            break;
        case "CM":
            var top_length = Math.round(parseFloat(top_length * 10));
            var top_width = Math.round(parseFloat(top_width * 10));
            var top_height = Math.round(parseFloat(top_height * 10));
            break;
        default:
            var top_length = Math.round(parseFloat(top_length));
            var top_width = Math.round(parseFloat(top_width));
            var top_height = Math.round(parseFloat(top_height));
            break;
    }

    $("#form-bb #bb-a .top-length").val(top_length);
    $("#form-bb #bb-a .top-width").val(top_width);
    $("#form-bb #bb-a .top-height").val(top_height);

    $("#calc-form-bb-a").click(function() {

        var spk_qty = $("#form-bb #bb-a .top-spk-quantity").val();

        if (spk_qty.trim().length === 0) {

            $("#form-bb #bb-a .top-spk-quantity").focus();
            // Change the border color to red
            $("#form-bb #bb-a .top-spk-quantity").css("border-color", "red");

            return
        }

        $("#form-bb #bb-a .l-length").text(top_length);
        $("#form-bb #bb-a .l-width").text(top_width);
        $("#form-bb #bb-a .l-height").text(top_height);

        var form_top_netto_width = top_height + top_width + top_height;
        var form_top_netto_length = top_height + top_length + top_height;

        $("#form-bb #bb-a .form-top-netto-width").val(form_top_netto_width);
        $("#form-bb #bb-a .form-top-netto-length").val(form_top_netto_length);

        $("#form-bb #bb-a .jl").text(form_top_netto_width);
        $("#form-bb #bb-a .jp").text(form_top_netto_length);

        // Perhitungan Panjang dan lebar Bruto
        var form_top_bruto_width = form_top_netto_width * 2;
        var form_top_bruto_length = form_top_netto_length + 20; // 20 penambahan buangan, ini bersifat dinamis tergantung dari customer

        $("#form-bb #bb-a .form-top-bruto-width").val(roundToNearestMultipleOf50(form_top_bruto_width));
        $("#form-bb #bb-a .form-top-bruto-length").val(roundToNearestMultipleOf5(form_top_bruto_length));

        var param1 = form_top_netto_width * 2;
        var param2 = roundToNearestMultipleOf50(form_top_bruto_width);

        if ((param2 - param1) < 50) {
            form_top_bruto_width = form_top_bruto_width + 50;
        }

        //perhitungan banyak sheet
        if (form_top_netto_width <= 850) {
            var qty_sheet = Math.ceil(spk_qty / 2);
        } else {
            var qty_sheet = spk_qty * 1;
        }

        $("#form-bb #bb-a .form-top-sheet-quantity").val(qty_sheet);
    });

    $("#form-bb #bb-a .form-netto-width").on("keyup", function() {
        $("#form-bb #bb-a .jl").text($(this).val())
    });

    $("#form-bb #bb-b .form-netto-length").on("keyup", function() {
        $("#form-bb #bb-a .jp").text($(this).val())
    });

    // Global function

    function roundToNearestMultipleOf5(number) {
        return 5 * Math.round(number / 5);
    }

    function roundToNearestMultipleOf50(number) {
        return 50 * Math.ceil(number / 50);
    }

});
