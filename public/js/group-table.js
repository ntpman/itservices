$(document).ready(function () {
    // DataTable
    var groupColumn = 0;
    var table = $("#allRequest").DataTable({
        columnDefs: [
        {
            targets: [groupColumn],
            visible: false
        }
        ],
        ordering: true,
        paging: false,
        lengthChange: true,
        info: true,
        searching: true,
        responsive: true,
        fixedHeader: false,
        order: [[0, "asc"],[1, "asc"]],
        drawCallback: function (settings) {
        var api = this.api();
        var rows = api.rows({ page: "current" }).nodes();
        var last = null;
        var storedIndexArray = [];

        // รูปแบบใหม่
        // Ref: https://stackoverflow.com/questions/26103362/datatables-using-row-grouping-how-do-i-get-a-count-of-each-grouped-row
        api.column(0, { page: "current" })
            .data()
            .each((group, i) => {
            if (last !== group) {
                storedIndexArray.push(i);
                $(rows)
                    .eq(i)
                    .before(
                    `<tr class="group bg-light" id="item-group">
                        <td colspan="7">
                            <i class="far fa-minus-square"></i> ${group} 
                            <small class="badge badge-secondary group-count"></small>
                        </td>
                    </tr>`
                    );
                last = group;
                }
            });
        storedIndexArray.push(
            api.column(0, { page: "current" }).data().length
            );
            for (let i = 0; i < storedIndexArray.length - 1; i++) {
            let element = $(".group-count")[i];
            $(element).text(storedIndexArray[i + 1] - storedIndexArray[i]);
        }
        }
    });

  // Event Toggle
    $("tr.odd").toggle();
    $("tr.even").toggle();
    $("#items").on("click", "tr.group", function (e) {
        let this_ = $(this)
            .find("i")
            .toggleClass("far fa-minus-square fas fa-plus-square");
        let row = this_.parents("tr");
        row.nextUntil("tr[id*=item-group]").toggle();
        return false;
    });
});