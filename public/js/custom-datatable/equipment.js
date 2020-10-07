$(document).ready(function() {
    // DataTable
    var groupColumn = 0;
    var table = $(".equipmentTable").DataTable({
        columnDefs: [
            {
                targets: [groupColumn],
                visible: false
            }
        ],
        ordering: true,
        paging: true,
        info: true,
        searching: true,
        responsive: true,
        fixedHeader: true,
        order: [[groupColumn, "desc"]],
        displayLength: 10,
        drawCallback: function(settings) {
            var api = this.api();
            var rows = api.rows({ page: "current" }).nodes();
            var last = null;

            api.column([groupColumn], { page: "current" })
                .data()
                .each(function(group, i) {
                    if (last !== group) {
                        $(rows)
                            .eq(i)
                            .before(
                                `<tr class="group bg-light" id="item-group">
                                    <th colspan="3">
                                        <i class="far fa-minus-square"></i> ${group}
                                    </th>
                                </tr>`
                            );

                        last = group;
                    }
                });
        }
    });

    // Event Toggle
    // $('tr.odd').toggle();
    // $('tr.even').toggle();
    $(".items").on("click", "tr.group", function(e) {
        let this_ = $(this)
            .find("i")
            .toggleClass("far fa-minus-square fas fa-plus-square");
        let row = this_.parents("tr");
        row.nextUntil("tr[id*=item-group]").toggle();
        return false;
    });
});
