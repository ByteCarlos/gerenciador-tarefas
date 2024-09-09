$(document).ready(function() {
    var table = $('#list-tasks-table').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Portuguese.json"
        }
    });

    // Verifica o número de colunas
    console.log('Número de colunas:', table.columns().count());

    function filterTable() {
        var selectedValues = $('.priority-filter:checked').map(function() {
            return this.value;
        }).get();

        // Filtro de categoria
        var selectedCategory = $('#category-filter').val();


        if(selectedCategory) {
            if (table.columns().header().length > 0) {
                table.column(2).search(selectedCategory, true, false);
            } else {
                console.error('Coluna 0 não encontrada');
            }   
        }else {
            table.column(2).search('', true, false);
        }

        if (selectedValues.length === 0) {
            // Verifica se a coluna 0 existe antes de aplicar o filtro
            if (table.columns().header().length > 0) {
                table.column(0).search('').draw();
            } else {
                console.error('Coluna 0 não encontrada');
            }
        } else {
            var regex = '^(' + selectedValues.join('|') + ')$';
            if (table.columns().header().length > 0) {
                table.column(0).search(regex, true, false).draw();
            } else {
                console.error('Coluna 0 não encontrada');
            }
        }
    }

    $('.priority-filter').on('change', function() {
        filterTable();
    });

    $('#category-filter').on('change', function() {
        filterTable();
    });

    filterTable();
});
