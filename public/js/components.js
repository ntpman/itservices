$(document).ready(function() {
    //Initialize Select2 Elements
    $(".select2")
        .select2({
            theme: "bootstrap4",
            allowClear: true
        })
        .trigger("change");
    //Initialize Select2 Elements
    $(".select2-multi")
        .select2({
            theme: "bootstrap4",
            allowClear: true,
            placeholder: "-- โปรดเลือก --"
        })
        .trigger("change");

    //inputmask
    $("[data-mask]").inputmask();

    // bs-custom-file-input
    bsCustomFileInput.init();

    // Radio button that can be unchecked | jQuery
    var inputs = $("input[type=radio]");
    var checked = inputs.filter(":checked").val();
    inputs.on("click", function() {
        if ($(this).val() === checked) {
            $(this).prop("checked", false);
            checked = "";
        } else {
            $(this).prop("checked", true);
            checked = $(this).val();
        }
    });

    // Laravel Api AJAX
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });

    // Select Option Province Info
    // laravel old method dom attribute value
    var oldChId = $("#province_info_ch_id").attr("data-value");
    $.ajax({
        url: "/changwats",
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $.each(data, function(key, value) {
                if (oldChId == value.ch_id) {
                    $("#province_info_ch_id").append(`    
                        <option value="${value.ch_id}" selected>${value.changwat_t}</option>
                    `);
                    if (oldChId != "") {
                        $.ajax({
                            url: "/amphoes/" + oldChId,
                            type: "GET",
                            dataType: "JSON",
                            success: function(data) {
                                $.each(data, function(key, value) {
                                    $("#province_info_am_id").append(`
                                        <option value="${value.am_id}">${value.amphoe_t}</option>
                                    `);
                                });
                            }
                        });
                    }
                } else {
                    $("#province_info_ch_id").append(`    
                        <option value="${value.ch_id}">${value.changwat_t}</option>
                    `);
                }
            });
        }
    });
    // laravel old method dom attribute value
    var oldAmId = $("#province_info_am_id").attr("data-value");
    if (oldChId != "") {
        $.ajax({
            url: "/amphoes/" + oldChId,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $.each(data, function(key, value) {
                    if (oldAmId == value.am_id) {
                        $("#province_info_am_id").append(`
                            <option value="${value.am_id}" selected>${value.amphoe_t}</option>
                        `);
                        var oldTmId = $("#province_info_ta_id").attr(
                            "data-value"
                        );
                        if (oldAmId != "") {
                            $.ajax({
                                url: "/tambons/" + oldAmId,
                                type: "GET",
                                dataType: "JSON",
                                success: function(data) {
                                    // console.log(data);
                                    $.each(data, function(key, value) {
                                        if (oldTmId == value.ta_id) {
                                            $("#province_info_ta_id").append(`
                                                <option value="${value.ta_id}" selected>${value.tambon_t}</option>
                                            `);
                                        } else {
                                            $("#province_info_ta_id").append(`
                                                <option value="${value.ta_id}">${value.tambon_t}</option>
                                            `);
                                        }
                                    });
                                }
                            });
                        }
                    } else {
                        $("#province_info_am_id").append(`
                            <option value="${value.am_id}">${value.amphoe_t}</option>
                        `);
                    }
                });
            }
        });
    }
    // Event on change changwat
    $("#province_info_ch_id").on("change", function() {
        var ch_id = $(this).val();
        $("#province_info_am_id").html(
            '<option value="">-- เลือกเขต/อำเภอ --</option>'
        );
        $("#province_info_ta_id").html(
            '<option value="">-- เลือกแขวง/ตำบล --</option>'
        );
        if (ch_id != "") {
            $.ajax({
                url: "/amphoes/" + ch_id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $.each(data, function(key, value) {
                        $("#province_info_am_id").append(`
                            <option value="${value.am_id}">${value.amphoe_t}</option>
                        `);
                    });
                }
            });
        } else {
            $("#province_info_am_id").html(
                '<option value="">-- เลือกเขต/อำเภอ --</option>'
            );
            $("#province_info_ta_id").html(
                '<option value="">-- เลือกแขวง/ตำบล --</option>'
            );
        }
    });
    // Event on change amphoe
    $("#province_info_am_id").on("change", function() {
        var am_id = $(this).val();
        $("#province_info_ta_id").html(
            '<option value="">-- เลือกแขวง/ตำบล --</option>'
        );
        if (am_id != "") {
            $.ajax({
                url: "/tambons/" + am_id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $.each(data, function(key, value) {
                        $("#province_info_ta_id").append(`
                            <option value="${value.ta_id}">${value.tambon_t}</option>
                        `);
                    });
                }
            });
        } else {
            $("#province_info_ta_id").html(
                '<option value="">-- เลือกแขวง/ตำบล --</option>'
            );
        }
    });
    // ./Select Option Province Info
});
