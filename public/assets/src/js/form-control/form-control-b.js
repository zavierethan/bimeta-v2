$(function() {

    var meas_unit = $("#meas-unit").val();
    var meas_type = $("#meas-type").val();

    var length = $("#length").val();
    var width = $("#width").val();
    var height = $("#height").val();

    var ply_type = $("#ply-type").val();

    switch (meas_unit) {
        case "INCH":
            var length = Math.round(parseFloat(length * 25.4));
            var width = Math.round(parseFloat(width * 25.4));
            var height = Math.round(parseFloat(height * 25.4));
            break;
        case "CM":
            var length = Math.round(parseFloat(length * 10));
            var width = Math.round(parseFloat(width * 10));
            var height = Math.round(parseFloat(height * 10));
            break;
        default:
            var length = Math.round(parseFloat(length));
            var width = Math.round(parseFloat(width));
            var height = Math.round(parseFloat(height));
            break;
    }

    $("#form-b .length").val(length);
    $("#form-b .width").val(width);
    $("#form-b .height").val(height);

    $("#calc-form-b").click(function() {

        var l2 = "";
        var p1 = "";
        var l1 = "";
        var p2 = "";
        var tinggi = "";
        var plep = "";
        var kuping = "";

        var min_val = 850;
        var max_val = 1600;
        var spk_qty = $("#form-b .spk-quantity").val();
        var flag_join = $("#flag-join").val();

        if (spk_qty.trim().length === 0) {

            $("#form-b .spk-quantity").focus();
            // Change the border color to red
            $("#form-b .spk-quantity").css("border-color", "red");
            return
        }

        switch (ply_type) {
            case "SW":
                if (meas_type === "UD") {
                    if (flag_join === "0" || flag_join === 0) {
                        l2 = width;
                        p1 = length + 3;
                        l1 = width + 3;
                        p2 = length + 2;
                        tinggi = height + 5;
                        plep = Math.floor((parseFloat(l2) / 2) + 2);
                    } else {
                        l1 = width;
                        p2 = length + 3;
                        tinggi = height + 5;
                        plep = Math.floor((parseFloat(l1) / 2) + 2);
                    }

                } else {
                    if (flag_join === "0" || flag_join === 0) {
                        l2 = width - 2;
                        p1 = length;
                        l1 = width;
                        p2 = length - 1;
                        tinggi = height;
                        plep = Math.floor((parseFloat(l2) / 2) + 2);
                    } else {
                        l1 = width - 2;
                        p2 = length;
                        tinggi = height;
                        plep = Math.floor((parseFloat(l1) / 2) + 2);
                    }
                }

                kuping = 30;
                break;
            case "DW":
                if (meas_type === "UD") {
                    if (flag_join === "0" || flag_join === 0) {
                        l2 = width + 4;
                        p1 = length + 7;
                        l1 = width + 7;
                        p2 = length + 6;
                        tinggi = height + 14;
                        plep = Math.floor((parseFloat(l2) / 2) + 4);
                    } else {
                        l1 = width + 4;
                        p2 = length + 7;
                        tinggi = height + 14;
                        plep = Math.floor((parseFloat(l1) / 2) + 4);
                    }
                } else {
                    if (flag_join === "0" || flag_join === 0) {
                        l2 = width - 4;
                        p1 = length - 3;
                        l1 = width - 3;
                        p2 = length - 4;
                        tinggi = height - 3;
                        plep = Math.floor((parseFloat(l2) / 2) + 4);
                    } else {
                        l1 = width - 4;
                        p2 = length - 3;
                        tinggi = height - 3;
                        plep = Math.floor((parseFloat(l1) / 2) + 4);
                    }
                }

                kuping = 40;
                break;
            case "TW":
                if (meas_type === "UD") {
                    if (flag_join === "0" || flag_join === 0) {
                        l2 = width + 4;
                        p1 = length + 7;
                        l1 = width + 7;
                        p2 = length + 6;
                        tinggi = height + 14;
                        plep = Math.floor((parseFloat(l2) / 2) + 5);
                    } else {
                        l1 = width + 4;
                        p2 = length + 7;
                        tinggi = height + 14;
                        plep = Math.floor((parseFloat(l1) / 2) + 5);
                    }
                } else {
                    if (flag_join === "0" || flag_join === 0) {
                        l2 = width - 4;
                        p1 = length - 3;
                        l1 = width - 3;
                        p2 = length - 4;
                        tinggi = height - 3;
                        plep = Math.floor((parseFloat(l2) / 2) + 5);
                    } else {
                        l1 = width - 4;
                        p2 = length - 3;
                        tinggi = height - 3;
                        plep = Math.floor((parseFloat(l1) / 2) + 5);
                    }
                }
                kuping = 45;
                break;
            default:
                break;
        }

        // Auto Fill In Layout

        $("#form-b .l2").text(l2)

        $("#form-b .p1").text(p1)

        $("#form-b .l1").text(l1)

        $("#form-b .t").text(tinggi)

        $("#form-b .p2").text(p2)

        $("#form-b .plape").text(plep)

        $("#form-b .k").text(kuping)

        $("#form-b .jl").text($(this).val())

        $("#form-b .jp").text($(this).val())

        // Auto fill Form

        $("#form-b .form-l2").val(l2);

        $("#form-b .form-p1").val(p1);

        $("#form-b .form-l1").val(l1);

        $("#form-b .form-t").val(tinggi);

        $("#form-b .form-p2").val(p2);

        $("#form-b .form-plape").val(plep);

        $("#form-b .form-k").val(kuping);


        if (flag_join === 0 || flag_join === "0") {

            // Perhitungan Panjang dan lebar Netto
            var netto_width = plep + tinggi + plep;
            var netto_length = l2 + p1 + l1 + p2 + kuping;
            $("#form-b .form-netto-width").val(netto_width);
            $("#form-b .form-netto-length").val(netto_length);

            $("#form-b .jl").text(netto_width)
            $("#form-b .jp").text(netto_length)

            // Perhitungan Panjang dan lebar Bruto
            var bruto_width = netto_width * 2;
            var bruto_length = netto_length + 20; // 20 penambahan buangan, ini bersifat dinamis tergantung dari customer
            //$("#form-b .form-bruto-width").val(roundToNearestMultipleOf50(bruto_width));
            //$("#form-b .form-bruto-length").val(roundToNearestMultipleOf5(bruto_length));

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

            //$("#form-b .form-qty-sheet").val(qty_sheet);
        } else {

            // Perhitungan Panjang dan lebar Netto
            var netto_width = plep + tinggi + plep;
            var netto_length = l1 + p2 + kuping;
            $("#form-b .form-netto-width").val(netto_width);
            $("#form-b .form-netto-length").val(netto_length);

            $("#form-b .jl").text(netto_width)
            $("#form-b .jp").text(netto_length)

            // Perhitungan Panjang dan lebar Bruto
            var bruto_width = netto_width * 2;
            var bruto_length = netto_length + 20; // 20 penambahan buangan, ini bersifat dinamis tergantung dari customer
            //$("#form-b .form-bruto-width").val(roundToNearestMultipleOf50(bruto_width));
            //$("#form-b .form-bruto-length").val(roundToNearestMultipleOf5(bruto_length));

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

            //$("#form-b .form-qty-sheet").val(qty_sheet);
        }
    });

    $("#form-b #flag-join").change(function() {
        var flag_join_form = $("#form-b .form-inp-non-join");

        if ($(this).val() === 1 || $(this).val() === "1") {
            flag_join_form.hide();
        } else {
            flag_join_form.show();
        }
    });

    $("#form-b .form-l2").on("keyup", function() {
        $("#form-b .l2").text($(this).val())
    });

    $("#form-b .form-p1").on("keyup", function() {
        $("#form-b .p1").text($(this).val())
    });

    $("#form-b .form-l1").on("keyup", function() {
        $("#form-b .l1").text($(this).val())
    });

    $("#form-b .form-t").on("keyup", function() {
        $("#form-b .t").text($(this).val())
    });

    $("#form-b .form-p2").on("keyup", function() {
        $("#form-b .p2").text($(this).val())
    });

    $("#form-b .form-plape").on("keyup", function() {
        $("#form-b .plape").text($(this).val())
        $("#form-b .plape").text($(this).val())
    });

    $("#form-b .form-k").on("keyup", function() {
        $("#form-b .k").text($(this).val())
    });

    $("#form-b .form-netto-width").on("keyup", function() {
        $("#form-b .jl").text($(this).val())
    });

    $("#form-b .form-netto-length").on("keyup", function() {
        $("#form-b .jp").text($(this).val())
    });

    function roundToNearestMultipleOf5(number) {
        return 5 * Math.round(number / 5);
    }

    function roundToNearestMultipleOf50(number) {
        return 50 * Math.ceil(number / 50);
    }
});
