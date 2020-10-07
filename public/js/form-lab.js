$(document).ready(function() {
    // checkInput
    function checkInput() {
        let inputTypeNumber = [document.getElementById("lab_employee_amount")];
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
    // 2.3 ที่ตั้งห้องปฏิบัติการ : กรณีเลือกนิคมอุตสาหกรรม หรือ อื่นๆ
    function checkLocationLab() {
        // this value
        var locationLabId = $("#location_lab_id").val();
        console.log(locationLabId);
        if (locationLabId == "3") {
            $("#display_industrial_estate_id").removeClass("d-none");
            $("#industrial_estate_id").prop("required", true);
        } else {
            $("#display_industrial_estate_id").addClass("d-none");
            $("#industrial_estate_id")
                .prop("required", false)
                .val(null)
                .trigger("change");
        }
        if (locationLabId == "4") {
            $("#display_lab_location_other").removeClass("d-none");
            $("#location_lab_other").prop("required", true);
        } else {
            $("#display_lab_location_other").addClass("d-none");
            $("#location_lab_other")
                .prop("required", false)
                .val(null);
        }
        // event on selected
        $("#location_lab_id").on("select2:select select2:unselect", function() {
            var locationLabId = $("#location_lab_id").val();
            if (locationLabId == "3") {
                $("#display_industrial_estate_id").removeClass("d-none");
                $("#industrial_estate_id").prop("required", true);
            } else {
                $("#display_industrial_estate_id").addClass("d-none");
                $("#industrial_estate_id")
                    .prop("required", false)
                    .val(null)
                    .trigger("change");
            }
            if (locationLabId == "4") {
                $("#display_lab_location_other").removeClass("d-none");
                $("#location_lab_other").prop("required", true);
            } else {
                $("#display_lab_location_other").addClass("d-none");
                $("#location_lab_other")
                    .prop("required", false)
                    .val(null);
            }
        });
    }
    checkLocationLab();

    function checkindEstateId() {
        // this value
        var indEstateId = $("#industrial_estate_id").val();
        if (indEstateId == "58") {
            $("#display_industrial_estate_other").removeClass("d-none");
            $("#industrial_estate_other").prop("required", true);
        } else {
            $("#display_industrial_estate_other").addClass("d-none");
            $("#industrial_estate_other")
                .prop("required", false)
                .val(null);
        }
        // Event On
        $("#industrial_estate_id").on("change", function() {
            var indEstateId = $(this).val();
            if (indEstateId == "58") {
                $("#display_industrial_estate_other").removeClass("d-none");
                $("#industrial_estate_other").prop("required", true);
            } else {
                $("#display_industrial_estate_other").addClass("d-none");
                $("#industrial_estate_other")
                    .prop("required", false)
                    .val(null);
            }
        });
    }
    checkindEstateId();

    // 2.7 ระดับการศึกษาของเจ้าหน้าที่ในห้องปฏิบัติการ
    function educationLevelAmount() {
        let edu_level_amount_1 = $("#education_primary_amount").val();
        let edu_level_amount_2 = $("#education_secondary_amount").val();
        let edu_level_amount_3 = $("#education_vocational_amount").val();
        let edu_level_amount_4 = $("#education_high_vocational_amount").val();
        let edu_level_amount_5 = $("#education_bachelor_amount").val();
        let edu_level_amount_6 = $("#education_master_amount").val();
        let edu_level_amount_7 = $("#education_doctor_amount").val();
        if (edu_level_amount_1 == "") {
            $("#education_primary_amount").val(0);
        }
        if (edu_level_amount_2 == "") {
            $("#education_secondary_amount").val(0);
        }
        if (edu_level_amount_3 == "") {
            $("#education_vocational_amount").val(0);
        }
        if (edu_level_amount_4 == "") {
            $("#education_high_vocational_amount").val(0);
        }
        if (edu_level_amount_5 == "") {
            $("#education_bachelor_amount").val(0);
        }
        if (edu_level_amount_6 == "") {
            $("#education_master_amount").val(0);
        }
        if (edu_level_amount_7 == "") {
            $("#education_doctor_amount").val(0);
        }
    }
    educationLevelAmount();

    // 2.10.1 เจ้าหน้าที่ได้รับการฝึกอบรมเพื่อการพัฒนาห้องปฏิบัติการหรือไม่อย่างไร :
    function labDevelopmentAmount() {
        let dev_amount_1 = $("#1_development_amount").val();
        let dev_amount_2 = $("#2_development_amount").val();
        let dev_amount_3 = $("#3_development_amount").val();
        let dev_amount_4 = $("#4_development_amount").val();
        let dev_amount_5 = $("#5_development_amount").val();
        let dev_amount_6 = $("#6_development_amount").val();
        let dev_amount_7 = $("#7_development_amount").val();
        if (dev_amount_1 == "") {
            $("#1_development_amount").val(0);
        }
        if (dev_amount_2 == "") {
            $("#2_development_amount").val(0);
        }
        if (dev_amount_3 == "") {
            $("#3_development_amount").val(0);
        }
        if (dev_amount_4 == "") {
            $("#4_development_amount").val(0);
        }
        if (dev_amount_5 == "") {
            $("#5_development_amount").val(0);
        }
        if (dev_amount_6 == "") {
            $("#6_development_amount").val(0);
        }
        if (dev_amount_7 == "") {
            $("#7_development_amount").val(0);
        }
    }
    labDevelopmentAmount();

    function labDevelopmentDay() {
        let dev_day_1 = $("#1_development_day").val();
        let dev_day_2 = $("#2_development_day").val();
        let dev_day_3 = $("#3_development_day").val();
        let dev_day_4 = $("#4_development_day").val();
        let dev_day_5 = $("#5_development_day").val();
        let dev_day_6 = $("#6_development_day").val();
        let dev_day_7 = $("#7_development_day").val();
        if (dev_day_1 == "") {
            $("#1_development_day").val(0);
        }
        if (dev_day_2 == "") {
            $("#2_development_day").val(0);
        }
        if (dev_day_3 == "") {
            $("#3_development_day").val(0);
        }
        if (dev_day_4 == "") {
            $("#4_development_day").val(0);
        }
        if (dev_day_5 == "") {
            $("#5_development_day").val(0);
        }
        if (dev_day_6 == "") {
            $("#6_development_day").val(0);
        }
        if (dev_day_7 == "") {
            $("#7_development_day").val(0);
        }
    }
    labDevelopmentDay();
});
