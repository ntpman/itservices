$(document).ready(function() {
    // checkInput
    function checkInput() {
        let inputTypeNumber = [
            document.getElementById("org_postcode"),
            // document.getElementById("org_lat"),
            // document.getElementById("org_long"),
            document.getElementById("org_capital"),
            document.getElementById("org_employee_amount")
        ];
        let invalidChars = ["-", "+", "e", ".", "E"];
        for (i = 0; i < inputTypeNumber.length; i++) {
            inputTypeNumber[i].addEventListener("keydown", function(e) {
                if (invalidChars.includes(e.key)) {
                    e.preventDefault();
                }
            });
            inputTypeNumber[i].addEventListener("keyup", function(e) {
                if (invalidChars.includes(e.key)) {
                    e.preventDefault();
                }
            });
        }
    }
    checkInput();

    // Check Select Option
    // 1.7 การจำหน่าย/ส่งออกสินค้า/บริการ : กรณีเลือกอื่นๆ
    function checkSaleProduct() {
        // this value
        var data = $("#sale_products").val();
        if (data != null) {
            for (i = 0; i < data.length; i++) {
                if (data[i] == "2") {
                    var saleProductId = 2;
                }
            }
        }
        if (saleProductId == 2) {
            $("#display_country").removeClass("d-none");
            $("#countrys").prop("required", true);
        } else {
            $("#display_country").addClass("d-none");
            $("#countrys")
                .prop("required", false)
                .val(null)
                .trigger("change");
        }
        // event on selected
        $("#sale_products").on("select2:select select2:unselect", function() {
            var data = $("#sale_products").val();
            if (data != null) {
                for (i = 0; i < data.length; i++) {
                    if (data[i] == "2") {
                        var saleProductId = 2;
                    }
                }
            }
            if (saleProductId == 2) {
                $("#display_country").removeClass("d-none");
                $("#countrys").prop("required", true);
            } else {
                $("#display_country").addClass("d-none");
                $("#countrys")
                    .prop("required", false)
                    .val(null)
                    .trigger("change");
            }
        });
    }
    checkSaleProduct();

    // 1.8 ประเภทองค์กร : กรณีเลือกอื่นๆ
    function checkOrganisationType() {
        // this value
        var orgTypeId = $("#organisation_type_id").val();
        if (orgTypeId == 5) {
            $("#display_org_type_other").removeClass("d-none");
            $("#organisation_type_other").prop("required", true);
        } else {
            $("#display_org_type_other").addClass("d-none");
            $("#organisation_type_other").prop("required", false);
            $("#organisation_type_other").val(null);
        }
        // event on selected
        $("#organisation_type_id").on(
            "select2:select select2:unselect",
            function() {
                var orgTypeId = $("#organisation_type_id").val();
                if (orgTypeId == 5) {
                    $("#display_org_type_other").removeClass("d-none");
                    $("#organisation_type_other").prop("required", true);
                } else {
                    $("#display_org_type_other").addClass("d-none");
                    $("#organisation_type_other").prop("required", false);
                    $("#organisation_type_other").val(null);
                }
            }
        );
    }
    checkOrganisationType();

    // 1.10 ประเภทอุตสาหกรรม : กรณีเลือก อื่นๆ
    function checkIndustrialType() {
        // this value
        var data = $("#industrial_types").val();
        if (data != null) {
            for (i = 0; i < data.length; i++) {
                if (data[i] == "39") {
                    var indTypeId = 39;
                }
            }
        }
        if (indTypeId == 39) {
            $("#display_ind_type_other").removeClass("d-none");
            $("#industrial_type_other").prop("required", true);
        } else {
            $("#display_ind_type_other").addClass("d-none");
            $("#industrial_type_other").prop("required", false);
            $("#industrial_type_other").val(null);
        }
        // event on selected
        $("#industrial_types").on(
            "select2:select select2:unselect",
            function() {
                var data = $("#industrial_types").val();
                if (data != null) {
                    for (i = 0; i < data.length; i++) {
                        if (data[i] == "39") {
                            var indTypeId = 39;
                        }
                    }
                }
                if (indTypeId == 39) {
                    $("#display_ind_type_other").removeClass("d-none");
                    $("#industrial_type_other").prop("required", true);
                } else {
                    $("#display_ind_type_other").addClass("d-none");
                    $("#industrial_type_other").prop("required", false);
                    $("#industrial_type_other").val(null);
                }
            }
        );
    }
    checkIndustrialType();
});
