$(document).ready(function() {
    // checkInput
    function checkInput() {
        let inputTypeNumber = [
            document.getElementById("equipment_year"),
            document.getElementById("equipment_price"),
            document.getElementById("equipment_maintenance_budget")
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

    //3.2
    function checkScienceToolId() {
        // this value
        var sciToolId = $("#science_tool_id").val();
        if (sciToolId == 308) {
            $("#display_science_tool_other_name").removeClass("d-none");
            $("#science_tool_other_name").prop("required", true);
            // $("#display_science_tool_other_abbr").removeClass("d-none");
            // $("#science_tool_other_abbr").prop("required", true);
        } else {
            $("#display_science_tool_other_name").addClass("d-none");
            $("#science_tool_other_name").prop("required", false);
            $("#science_tool_other_name").val(null);
            // $("#display_science_tool_other_abbr").addClass("d-none");
            // $("#science_tool_other_abbr").prop("required", false);
            // $("#science_tool_other_abbr").val(null);
        }
        // event on selected
        $("#science_tool_id").on("select2:select select2:unselect", function() {
            var sciToolId = $("#science_tool_id").val();
            if (sciToolId == 308) {
                $("#display_science_tool_other_name").removeClass("d-none");
                $("#science_tool_other_name").prop("required", true);
                // $("#display_science_tool_other_abbr").removeClass("d-none");
                // $("#science_tool_other_abbr").prop("required", true);
            } else {
                $("#display_science_tool_other_name").addClass("d-none");
                $("#science_tool_other_name").prop("required", false);
                $("#science_tool_other_name").val(null);
                $("#display_science_tool_other_abbr").addClass("d-none");
                // $("#science_tool_other_abbr").prop("required", false);
                // $("#science_tool_other_abbr").val(null);
            }
        });
    }
    checkScienceToolId();

    //3.10
    function checkMajorTechnology() {
        // this value
        var data = $("#major_technology_id").val();
        // console.log(data);
        if (data != null) {
            for (i = 0; i < data.length; i++) {
                if (data[i] == "11") {
                    var majorOtherID = 11;
                }
            }
        }
        if (majorOtherID == 11) {
            $("#display_major_technology_other").removeClass("d-none");
            $("#major_technology_other").prop("required", true);
        } else {
            $("#display_major_technology_other").addClass("d-none");
            $("#major_technology_other").prop("required", false);
            $("#major_technology_other").val(null);
        }
        // event on selected
        $("#major_technology_id").on(
            "select2:select select2:unselect",
            function() {
                var data = $("#major_technology_id").val();
                if (data != null) {
                    for (i = 0; i < data.length; i++) {
                        if (data[i] == "11") {
                            var majorOtherID = 11;
                        }
                    }
                }
                if (majorOtherID == 11) {
                    $("#display_major_technology_other").removeClass("d-none");
                    $("#major_technology_other").prop("required", true);
                } else {
                    $("#display_major_technology_other").addClass("d-none");
                    $("#major_technology_other").prop("required", false);
                    $("#major_technology_other").val(null);
                }
            }
        );
    }
    checkMajorTechnology();

    // 3.15
    function checkEquipmentCalibrationId() {
        var data = $("#equipment_calibration_id").val();
        if (data == 2) {
            $("#display_equipment_calibration_by").removeClass("d-none");
            $("#equipment_calibration_by").prop("required", true);
            $("#display_equipment_calibration_year").removeClass("d-none");
            $("#equipment_calibration_year").prop("required", true);
        } else {
            $("#display_equipment_calibration_by").addClass("d-none");
            $("#equipment_calibration_by").prop("required", false);
            $("#equipment_calibration_by").val(null);
            $("#display_equipment_calibration_year").addClass("d-none");
            $("#equipment_calibration_year").prop("required", false);
            $("#equipment_calibration_year").val(null);
        }
        // event on selected
        $("#equipment_calibration_id").on(
            "select2:select select2:unselect",
            function() {
                var data = $("#equipment_calibration_id").val();
                if (data == 2) {
                    $("#display_equipment_calibration_by").removeClass(
                        "d-none"
                    );
                    $("#equipment_calibration_by").prop("required", true);
                    $("#display_equipment_calibration_year").removeClass(
                        "d-none"
                    );
                    $("#equipment_calibration_year").prop("required", true);
                } else {
                    $("#display_equipment_calibration_by").addClass("d-none");
                    $("#equipment_calibration_by").prop("required", false);
                    $("#equipment_calibration_by").val(null);
                    $("#display_equipment_calibration_year").addClass("d-none");
                    $("#equipment_calibration_year").prop("required", false);
                    $("#equipment_calibration_year").val(null);
                }
            }
        );
    }
    checkEquipmentCalibrationId();

    //3.16
    function checkMaintenance() {
        // this value
        var mtId = $("#equipment_maintenance_id").val();
        if (mtId == 6) {
            $("#display_equipment_maintenance_other").removeClass("d-none");
            $("#equipment_maintenance_other").prop("required", true);
        } else {
            $("#display_equipment_maintenance_other").addClass("d-none");
            $("#equipment_maintenance_other").prop("required", false);
            $("#equipment_maintenance_other").val(null);
        }
        // event on selected
        $("#equipment_maintenance_id").on(
            "select2:select select2:unselect",
            function() {
                var mtId = $("#equipment_maintenance_id").val();
                if (mtId == 6) {
                    $("#display_equipment_maintenance_other").removeClass(
                        "d-none"
                    );
                    $("#equipment_maintenance_other").prop("required", true);
                } else {
                    $("#display_equipment_maintenance_other").addClass(
                        "d-none"
                    );
                    $("#equipment_maintenance_other").prop("required", false);
                    $("#equipment_maintenance_other").val(null);
                }
            }
        );
    }
    checkMaintenance();

    // 3.19
    function checkManual() {
        var data = $("#equipment_manual_id").val();
        if (data == 2) {
            $("#display_equipment_manual_name").removeClass("d-none");
            $("equipment_manual_name").prop("required", true);
            $("#display_equipment_manual_locate").removeClass("d-none");
            $("#equipment_manual_locate").prop("required", true);
        } else {
            $("#display_equipment_manual_name").addClass("d-none");
            $("#equipment_manual_name").prop("required", false);
            $("#equipment_manual_name").val(null);
            $("#display_equipment_manual_locate").addClass("d-none");
            $("#equipment_manual_locate").prop("required", false);
            $("#equipment_manual_locate").val(null);
        }
        // event on selected
        $("#equipment_manual_id").on(
            "select2:select select2:unselect",
            function() {
                var data = $("#equipment_manual_id").val();
                if (data == 2) {
                    $("#display_equipment_manual_name").removeClass("d-none");
                    $("equipment_manual_name").prop("required", true);
                    $("#display_equipment_manual_locate").removeClass("d-none");
                    $("#equipment_manual_locate").prop("required", true);
                } else {
                    $("#display_equipment_manual_name").addClass("d-none");
                    $("#equipment_manual_name").prop("required", false);
                    $("#equipment_manual_name").val(null);
                    $("#display_equipment_manual_locate").addClass("d-none");
                    $("#equipment_manual_locate").prop("required", false);
                    $("#equipment_manual_locate").val(null);
                }
            }
        );
    }
    checkManual();

    // 3.20
    function checkEquipmentRentId() {
        var data = $("#equipment_rent_id").val();
        if (data == 2) {
            $("#display_equipment_rent_fee").removeClass("d-none");
            $("#equipment_rent_fee").prop("required", true);
            $("#display_equipment_rent_detail").removeClass("d-none");
            $("#equipment_rent_detail").prop("required", true);
        } else {
            $("#display_equipment_rent_fee").addClass("d-none");
            $("#equipment_rent_fee").prop("required", false);
            $("#equipment_rent_fee").val(null);
            $("#display_equipment_rent_detail").addClass("d-none");
            $("#equipment_rent_detail").prop("required", false);
            $("#equipment_rent_detail").val(null);
        }
        // event on selected
        $("#equipment_rent_id").on(
            "select2:select select2:unselect",
            function() {
                var data = $("#equipment_rent_id").val();
                if (data == 2) {
                    $("#display_equipment_rent_fee").removeClass("d-none");
                    $("#equipment_rent_fee").prop("required", true);
                    $("#display_equipment_rent_detail").removeClass("d-none");
                    $("#equipment_rent_detail").prop("required", true);
                } else {
                    $("#display_equipment_rent_fee").addClass("d-none");
                    $("#equipment_rent_fee").prop("required", false);
                    $("#equipment_rent_fee").val(null);
                    $("#display_equipment_rent_detail").addClass("d-none");
                    $("#equipment_rent_detail").prop("required", false);
                    $("#equipment_rent_detail").val(null);
                }
            }
        );
    }
    checkEquipmentRentId();
}); //Colback
