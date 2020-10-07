$(document).ready(function() {
    $("#log-comment-lab").on("click", ".upload", function() {
        let row = $(this).closest(".log-comment-lab-item");
        let data = parseInt(row.find(".log_comment_lab_id").text());
        console.log(data);
        // Set data
        $("#log_comment_lab_id").val(data);
    });
});
