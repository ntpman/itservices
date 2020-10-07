$(document).ready(function() {
    // checkInput
    function checkInput() {
        let inputTypeNumber = [
            document.getElementById("product_lab_test_duration"),
            document.getElementById("proficiency_testing_year")
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

    //4.2 ProductType
    function checkProductType() {
        // this value
        var data = $("#product_type_id").val();
        console.log(data);
        if (data != null) {
            for (i = 0; i < data.length; i++) {
                if (data[i] == "39") {
                    var productTypeId = 39;
                }
            }
        }
        if (productTypeId == 39) {
            $("#display_product_type_other").removeClass("d-none");
            $("#product_type_other").prop("required", true);
        } else {
            $("#display_product_type_other").addClass("d-none");
            $("#product_type_other").val(null);
            $("#product_type_other").prop("required", false);
        }
        // event on selected
        $("#product_type_id").on("select2:select select2:unselect", function() {
            var data = $("#product_type_id").val();
            if (data != null) {
                for (i = 0; i < data.length; i++) {
                    if (data[i] == "39") {
                        var productTypeId = 39;
                    }
                }
                if (productTypeId == 39) {
                    $("#display_product_type_other").removeClass("d-none");
                    $("#product_type_other").prop("required", true);
                } else {
                    $("#display_product_type_other").addClass("d-none");
                    $("#product_type_other").prop("required", false);
                    $("#product_type_other").val(null);
                }
            }
            if (productTypeId == 39) {
                $("#display_product_type_other").removeClass("d-none");
                $("#product_type_other").prop("required", true);
            } else {
                $("#display_product_type_other").addClass("d-none");
                $("#product_type_other").prop("required", false);
                $("#product_type_other").val(null);
            }
        });
    }
    checkProductType();

    //4.7 testingCalibratingTypeId
    function checkTestingCalibratingTypeId() {
        // this value
        var data = $("#testing_calibrating_type_id").val();
        if (data == "6") {
            $("#display_testing_calibrating_type_other").removeClass("d-none");
            $("#testing_calibrating_type_other").prop("required", true);
        } else {
            $("#display_testing_calibrating_type_other").addClass("d-none");
            $("#testing_calibrating_type_other").prop("required", false);
            $("#testing_calibrating_type_other").val(null);
        }
        // event on selected
        $("#testing_calibrating_type_id").on(
            "select2:select select2:unselect",
            function() {
                var data = $("#testing_calibrating_type_id").val();
                if (data == "6") {
                    $("#display_testing_calibrating_type_other").removeClass(
                        "d-none"
                    );
                    $("#testing_calibrating_type_other").prop("required", true);
                } else {
                    $("#display_testing_calibrating_type_other").addClass(
                        "d-none"
                    );
                    $("#testing_calibrating_type_other").prop(
                        "required",
                        false
                    );
                    $("#testing_calibrating_type_other").val(null);
                }
            }
        );
    }
    checkTestingCalibratingTypeId();

    //4.7 testingCalibratingTypeId
    function checkTestingCalibratingMethodId() {
        // this value
        var data = $("#testing_calibrating_method_id").val();
        if (data != null) {
            $("#display_testing_calibrating_method_detail").removeClass(
                "d-none"
            );
            $("#testing_calibrating_method_detail").prop("required", true);
        } else {
            $("#display_testing_calibrating_method_detail").addClass("d-none");
            $("#testing_calibrating_method_detail").prop("required", false);
            $("#testing_calibrating_method_detail").val(null);
        }
        // event on selected
        $("#testing_calibrating_method_id").on(
            "select2:select select2:unselect",
            function() {
                var data = $("#testing_calibrating_method_id").val();
                if (data != null) {
                    $("#display_testing_calibrating_method_detail").removeClass(
                        "d-none"
                    );
                    $("#testing_calibrating_method_detail").prop(
                        "required",
                        true
                    );
                } else {
                    $("#display_testing_calibrating_method_detail").addClass(
                        "d-none"
                    );
                    $("#testing_calibrating_method_detail").prop(
                        "required",
                        false
                    );
                    $("#testing_calibrating_method_detail").val(null);
                }
            }
        );
    }
    checkTestingCalibratingMethodId();

    //4.14 ResultControlId
    function checkResultControlId() {
        // this value
        var data = $("#result_control_id").val();
        if (data != null) {
            for (i = 0; i < data.length; i++) {
                if (data[i] == "7") {
                    var resultControlId = 7;
                }
            }
        }
        if (resultControlId == 7) {
            $("#display_result_control_other").removeClass("d-none");
            $("#result_control_other").prop("required", true);
        } else {
            $("#display_result_control_other").addClass("d-none");
            $("#result_control_other").prop("required", false);
            $("#result_control_other").val(null);
        }
        // event on selected
        $("#result_control_id").on(
            "select2:select select2:unselect",
            function() {
                var data = $("#result_control_id").val();
                if (data != null) {
                    for (i = 0; i < data.length; i++) {
                        if (data[i] == "7") {
                            var resultControlId = 7;
                        }
                    }
                }
                if (resultControlId == 7) {
                    $("#display_result_control_other").removeClass("d-none");
                    $("#result_control_other").prop("required", true);
                } else {
                    $("#display_result_control_other").addClass("d-none");
                    $("#result_control_other").prop("required", false);
                    $("#result_control_other").val(null);
                }
            }
        );
    }
    checkResultControlId();

    //4.15 ProficiencyTestingId
    function checkProficiencyTestingId() {
        // this value
        var data = $("#proficiency_testing_id").val();
        if (data == "2") {
            $("#display_proficiency_testing_by").removeClass("d-none");
            $("#display_proficiency_testing_year").removeClass("d-none");
            $("#proficiency_testing_by").prop("required", true);
            $("#proficiency_testing_year").prop("required", true);
        } else {
            $("#display_proficiency_testing_by").addClass("d-none");
            $("#display_proficiency_testing_year").addClass("d-none");
            $("#proficiency_testing_by").prop("required", false);
            $("#proficiency_testing_year").prop("required", false);
            $("#proficiency_testing_by").val(null);
            $("#proficiency_testing_year").val(null);
        }
        // event on selected
        $("#proficiency_testing_id").on(
            "select2:select select2:unselect",
            function() {
                var data = $("#proficiency_testing_id").val();
                if (data == "2") {
                    $("#display_proficiency_testing_by").removeClass("d-none");
                    $("#display_proficiency_testing_year").removeClass(
                        "d-none"
                    );
                    $("#proficiency_testing_by").prop("required", true);
                    $("#proficiency_testing_year").prop("required", true);
                } else {
                    $("#display_proficiency_testing_by").addClass("d-none");
                    $("#display_proficiency_testing_year").addClass("d-none");
                    $("#proficiency_testing_by").prop("required", false);
                    $("#proficiency_testing_year").prop("required", false);
                    $("#proficiency_testing_by").val(null);
                    $("#proficiency_testing_year").val(null);
                }
            }
        );
    }
    checkProficiencyTestingId();
});
