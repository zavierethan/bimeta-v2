$(function() {

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

    $("#form-ab #ab-b .length").val(bottom_length);
    $("#form-ab #ab-b .width").val(bottom_width);
    $("#form-ab #ab-b .height").val(bottom_height);

    $("#calc-form-ab-b").click(function() {

        var l2 = "";
        var p1 = "";
        var l1 = "";
        var p2 = "";
        var tinggi = "";
        var plep = "";
        var kuping = "";

        var min_val = 850;
        var max_val = 1600;
        
        var spk_qty = $("#form-ab #ab-b .spk-quantity").val();

        if (spk_qty.trim().length === 0) {
            
            $("#form-ab #ab-b .spk-quantity").focus();
            // Change the border color to red
            $("#form-ab #ab-b .spk-quantity").css("border-color", "red");
            
            return
        }

        switch (bottom_ply_type) {
            case "SW":
                // if (meas_type === "UD") {
                    l2 = bottom_width;
                    p1 = bottom_length + 3;
                    l1 = bottom_width + 3;
                    p2 = bottom_length + 2;
                    tinggi = bottom_height + 5;
                    plep = Math.floor((parseFloat(l2) / 2) + 2);
    
                // } else {
                //     l2 = width - 2;
                //     p1 = length;
                //     l1 = width;
                //     p2 = length - 1;
                //     tinggi = height;
                //     plep = Math.floor((parseFloat(l2) / 2) + 2);
                // }
    
                kuping = 30;
                break;
            case "DW":
                // if (meas_type === "UD") {
                    l2 = bottom_width + 4;
                    p1 = bottom_length + 7;
                    l1 = bottom_width + 7;
                    p2 = bottom_length + 6;
                    tinggi = bottom_height + 14;
                    plep = Math.floor((parseFloat(l2) / 2) + 4);
                // } else {
                //     l2 = width - 4;
                //     p1 = length - 3;
                //     l1 = width - 3;
                //     p2 = length - 4;
                //     tinggi = height - 3;
                //     plep = Math.floor((parseFloat(l2) / 2) + 4);
                // }
    
                kuping = 40;
                break;
            case "TW":
                // if (meas_type === "UD") {
                    l2 = bottom_width + 4;
                    p1 = bottom_length + 7;
                    l1 = bottom_width + 7;
                    p2 = bottom_length + 6;
                    tinggi = bottom_height + 14;
                    plep = Math.floor((parseFloat(l2) / 2) + 5);
                // } else {
                //     l2 = width - 4;
                //     p1 = length - 3;
                //     l1 = width - 3;
                //     p2 = length - 4;
                //     tinggi = height - 3;
                //     plep = Math.floor((parseFloat(l2) / 2) + 5);
                // }
                kuping = 45;
                break;
            default:
                break;
        }

        // Auto Fill In Layout

        $("#form-ab #ab-b .l2").text(l2)
    
        $("#form-ab #ab-b .p1").text(p1)
    
        $("#form-ab #ab-b .l1").text(l1)
    
        $("#form-ab #ab-b .t").text(tinggi)
    
        $("#form-ab #ab-b .p2").text(p2)
    
        $("#form-ab #ab-b .plape").text(plep)
    
        $("#form-ab #ab-b .k").text(kuping)
    
        $("#form-ab #ab-b .jl").text($(this).val())
    
        $("#form-ab #ab-b .jp").text($(this).val())

        // Auto fill Form 

        $("#form-ab #ab-b .form-l2").val(l2);
    
        $("#form-ab #ab-b .form-p1").val(p1);
    
        $("#form-ab #ab-b .form-l1").val(l1);
    
        $("#form-ab #ab-b .form-t").val(tinggi);
    
        $("#form-ab #ab-b .form-p2").val(p2);
    
        $("#form-ab #ab-b .form-plape").val(plep);
    
        $("#form-ab #ab-b .form-k").val(kuping);

        var bottom_netto_width = tinggi + plep;
        var bottom_netto_length = l2 + p1 + l1 + p2 + kuping;
        $("#form-ab #ab-b .form-bottom-netto-width").val(bottom_netto_width);
        $("#form-ab #ab-b .form-bottom-netto-length").val(bottom_netto_length);

        $("#form-ab #ab-b .jl").text(bottom_netto_width)
        $("#form-ab #ab-b .jp").text(bottom_netto_length)

            // Perhitungan Panjang dan lebar Bruto
        var bottom_bruto_width = bottom_netto_width * 2;
        var bottom_bruto_length = bottom_netto_length + 20; // 20 penambahan buangan, ini bersifat dinamis tergantung dari customer
        $("#form-ab #ab-b .form-bottom-bruto-width").val(roundToNearestMultipleOf50(bottom_bruto_width));
        $("#form-ab #ab-b .form-bottom-bruto-length").val(roundToNearestMultipleOf5(bottom_bruto_length));

        var param1 = bottom_netto_width * 2;
        var param2 = roundToNearestMultipleOf50(bottom_bruto_width);

        if ((param2 - param1) < 50) {
            bottom_bruto_width = bottom_bruto_width + 50;
        }

            //perhitungan banyak sheet
        if (bottom_netto_width <= 850) {
            var qty_sheet = Math.ceil(spk_qty / 2);
        } else {
            var qty_sheet = spk_qty * 1;
        }

        $("#form-ab #ab-b .form-bottom-quantity-sheet").val(qty_sheet);

    });

    $("#form-ab #ab-b .form-l2").on("keyup", function() {
        $("#form-ab #ab-b .l2").text($(this).val());
    });

    $("#form-ab #ab-b .form-p1").on("keyup", function() {
        $("#form-ab #ab-b .p1").text($(this).val())
    });

    $("#form-ab #ab-b .form-l1").on("keyup", function() {
        $("#form-ab #ab-b .l1").text($(this).val())
    });

    $("#form-ab #ab-b .form-t").on("keyup", function() {
        $("#form-ab #ab-b .t").text($(this).val())
    });

    $("#form-ab #ab-b .form-p2").on("keyup", function() {
        $("#form-ab #ab-b .p2").text($(this).val())
    });

    $("#form-ab #ab-b .form-plape").on("keyup", function() {
        $("#form-ab #ab-b .plape").text($(this).val())
    });

    $("#form-ab #ab-b .form-k").on("keyup", function() {
        $("#form-ab #ab-b .k").text($(this).val())
    });

    $("#form-ab #ab-b .form-netto-width").on("keyup", function() {
        $("#form-ab #ab-b .jl").text($(this).val())
    });

    $("#form-ab #ab-b .form-netto-length").on("keyup", function() {
        $("#form-ab #ab-b .jp").text($(this).val())
    });

    // Form AB-A

    var top_meas_unit = $("#top-meas-unit").val();

    var top_length = $("#top-length").val();
    var top_width = $("#top-width").val();

    var top_ply_type = $("#top-ply-type").val();
    
    switch (top_meas_unit) {
        case "INCH":
            var top_length = Math.round(parseFloat(top_length * 25.4));
            var top_width = Math.round(parseFloat(top_width * 25.4));
            break;
        case "CM":
            var top_length = Math.round(parseFloat(top_length * 10));
            var top_width = Math.round(parseFloat(top_width * 10));
            break;
        default:
            var top_length = Math.round(parseFloat(top_length));
            var top_width = Math.round(parseFloat(top_width));
            break;
    }

    $("#form-ab #ab-a .length").val(top_length);
    $("#form-ab #ab-a .width").val(top_width);

    $("#calc-form-ab-a").click(function() {

        var spk_qty = $("#form-ab #ab-a .spk-quantity").val();

        if (spk_qty.trim().length === 0) {
            
            $("#form-ab #ab-a .spk-quantity").focus();
            // Change the border color to red
            $("#form-ab #ab-a .spk-quantity").css("border-color", "red");
            
            return
        }

        $("#form-ab #ab-a .form-top-netto-length").val(top_length);
        $("#form-ab #ab-a .form-top-netto-width").val(top_width);

        $("#form-ab #ab-a .jl").text(top_width)
        $("#form-ab #ab-a .jp").text(top_length)

        var top_netto_width = top_width;
        var top_netto_length = top_length;

         // Perhitungan Panjang dan lebar Bruto
         var top_bruto_width = top_netto_width * 2;
         var top_bruto_length = top_netto_length + 20; // 20 penambahan buangan, ini bersifat dinamis tergantung dari customer
 
         $("#form-ab #ab-a .form-top-bruto-width").val(roundToNearestMultipleOf50(top_bruto_width));
         $("#form-ab #ab-a .form-top-bruto-length").val(roundToNearestMultipleOf5(top_bruto_length));
 
         var param1 = top_netto_width * 2;
         var param2 = roundToNearestMultipleOf50(top_bruto_width);
 
         if ((param2 - param1) < 50) {
            top_bruto_width = top_bruto_width + 50;
         }
 
         //perhitungan banyak sheet
         if (top_netto_width <= 850) {
             var qty_sheet = Math.ceil(spk_qty / 2);
         } else {
             var qty_sheet = spk_qty * 1;
         }
 
         $("#form-ab #ab-a .form-top-sheet-quantity").val(qty_sheet);
    });

    $("#form-ab #ab-a .form-top-netto-width").on("keyup", function() {
        $("#form-ab #ab-a .jl").text($(this).val())
    });

    $("#form-ab #ab-a .form-top-netto-length").on("keyup", function() {
        $("#form-ab #ab-a .jp").text($(this).val())
    });

    function roundToNearestMultipleOf5(number) {
        return 5 * Math.round(number / 5);
    }

    function roundToNearestMultipleOf50(number) {
        return 50 * Math.ceil(number / 50);
    }

});