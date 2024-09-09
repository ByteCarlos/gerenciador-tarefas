$(document).ready(function() {
    function filterTable() {
        var selectedPriorities = [];
        $('.priority-filter:checked').each(function() {
            selectedPriorities.push($(this).val());
        });

        var selectedCategory = $('#category-filter').val();
        var selectedStatus = $('#status-filter').val();

        $('#list-tasks-table tbody tr').each(function() {
            var rowPriority = $(this).data('priority');
            var rowCategory = $(this).data('categoria');
            var rowStatus = $(this).data('status');

            var showRow = true;

            if (selectedPriorities.length > 0 && !selectedPriorities.includes(rowPriority)) {
                showRow = false;
            }

            if (selectedCategory && rowCategory !== selectedCategory) {
                showRow = false;
            }

            if (selectedStatus && rowStatus !== selectedStatus) {
                showRow = false;
            }

            $(this).toggle(showRow);
        });
    }

    $('.priority-filter').change(filterTable);
    $('#category-filter').change(filterTable);
    $('#status-filter').change(filterTable);

    // Run the filter function initially
    filterTable();
});
