$(function() {
    // Laravel Api AJAX
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });

    /**
     * Check Value ProvinceId
     */
    var oldChId = $("#supplier_province_id").attr("data-value");
    $.ajax({
        url: "/api/provinces",
        type: "GET",
        dataType: "JSON",
        success: function(res) {
            $.each(res.data, function(key, value) {
                if (oldChId == value.province_id) {
                    $("#supplier_province_id").append(`    
                        <option value="${value.province_id}" selected>${value.province_name}</option>
                    `);
                    if (oldChId != "") {
                        $.ajax({
                            url: "/api/districts/" + oldChId,
                            type: "GET",
                            dataType: "JSON",
                            success: function(res) {
                                $.each(res.data, function(key, value) {
                                    $("#supplier_district_id").append(`
                                        <option value="${value.district_id}">${value.district_name}</option>
                                    `);
                                });
                            }
                        });
                    }
                } else {
                    $("#supplier_province_id").append(`    
                        <option value="${value.province_id}">${value.province_name}</option>
                    `);
                }
            });
        }
    });

    /**
     * Check Value DistrictId
     */
    var oldAmId = $("#supplier_district_id").attr("data-value");
    if (oldChId != "") {
        $.ajax({
            url: "/api/districts/" + oldChId,
            type: "GET",
            dataType: "JSON",
            success: function(res) {
                $.each(res.data, function(key, value) {
                    if (oldAmId == value.district_id) {
                        $("#supplier_district_id").append(`
                            <option value="${value.district_id}" selected>${value.district_name}</option>
                        `);
                        var oldTmId = $("#supplier_subdistrict_id").attr("data-value");
                        if (oldAmId != "") {
                            $.ajax({
                                url: "/api/subdistricts/" + oldAmId,
                                type: "GET",
                                dataType: "JSON",
                                success: function(res) {
                                    $.each(res.data, function(key, value) {
                                        if (oldTmId == value.subdistrict_id) {
                                            $("#supplier_subdistrict_id").append(`
                                                <option value="${value.subdistrict_id}" selected>${value.subdistrict_name}</option>
                                            `);
                                        } else {
                                            $("#supplier_subdistrict_id").append(`
                                                <option value="${value.subdistrict_id}">${value.subdistrict_name}</option>
                                            `);
                                        }
                                    });
                                }
                            });
                        }
                    } else {
                        $("#supplier_district_id").append(`
                            <option value="${value.district_id}">${value.district_name}</option>
                        `);
                    }
                });
            }
        });
    }

    /**
     * Event On Change ProvinceId
     */
    $("#supplier_province_id").on("change", function() {
        var ch_id = $(this).val();
        $("#supplier_district_id").html('<option value="" selected></option>');
        $("#supplier_subdistrict_id").html(
            '<option value="" selected></option>'
        );
        if (ch_id != "") {
            $.ajax({
                url: "/api/districts/" + ch_id,
                type: "GET",
                dataType: "JSON",
                success: function(res) {
                    $.each(res.data, function(key, value) {
                        $("#supplier_district_id").append(`
                            <option value="${value.district_id}">${value.district_name}</option>
                        `);
                    });
                }
            });
        } else {
            $("#supplier_district_id").html(
                '<option value="" selected></option>'
            );
            $("#supplier_subdistrict_id").html(
                '<option value="" selected></option>'
            );
        }
    });

    /**
     * Event On Change DistrictId
     */
    $("#supplier_district_id").on("change", function() {
        var am_id = $(this).val();
        $("#supplier_subdistrict_id").html(
            '<option value="" selected></option>'
        );
        if (am_id != "") {
            $.ajax({
                url: "/api/subdistricts/" + am_id,
                type: "GET",
                dataType: "JSON",
                success: function(res) {
                    $.each(res.data, function(key, value) {
                        $("#supplier_subdistrict_id").append(`
                            <option value="${value.subdistrict_id}">${value.subdistrict_name}</option>
                        `);
                    });
                }
            });
        } else {
            $("#supplier_subdistrict_id").html(
                '<option value="" selected></option>'
            );
        }
    });
});
