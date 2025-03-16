$.ajax({
    "url": "/user/ajax/list",
    'method': "GET",
    'contentType': 'application/json'
}).done(function (data) {

    $('#basic-datatable').DataTable({
        buttons: [
            'print',
            'csv'
        ],

        "drawCallback": function () {
            $('.dataTables_paginate > .pagination').addClass('pagination-rounded');

            let print_button = $('.buttons-print');
            let export_csv_button = $('.buttons-csv');
            let search_label = $("#basic-datatable_filter > label")

            print_button.html('<button type="button" class="btn btn-warning text-end"><i class="mdi mdi-printer"></i></button>');
            print_button.css({"border": "none", "background-color": "transparent", "float": "right"});
            print_button.addClass("align-items-end");
            export_csv_button.html('<button type="button" class="btn btn-primary text-end"><i class="mdi mdi-export"></i></button>');
            export_csv_button.addClass("align-items-end");
            export_csv_button.css({"border": "none", "background-color": "transparent", "float": "right"});
            search_label.addClass("row")
            $('#basic-datatable_filter').addClass('col-sm-8')
        },

        "dom": "<'row'<'col-sm-2 align-self-start'f><'col-sm-10 align-self-end'B>><'row'<'col-sm-12't>><'row'<'col-sm-5 text-start'i><'col-sm-7'p>><'row'<'col-sm-3 text-start'l>>",
        "pageLength": 5,
        'lengthMenu': [[5, 10, 25, 50, -1], [5, 10, 25, 50, 'All']],
        "language": {
            "lengthMenu": "Afficher _MENU_ résultats par page",
            "zeroRecords": "Données vides - Désolé",
            "info": "Afficher la page _PAGE_ sur _PAGES_ / total entrèes _MAX_ ",
            "infoEmpty": "Aucun résultat",
            "infoFiltered": "(Filtré de _MAX_ total records)",
            "search": "Rechercher",
            "sPaginationType": "full_numbers",
            paginate: {
                first: "Premier",
                previous: "Précédent",
                next: "Suivant",
                last: "Dernier"
            },
        },
        "data": data,
        columns: [
            {
                data: "firstname",
                render: function (data, type, row) {
                    return "<a href='/user/show/" + row.id + "'>" + row.firstname + "</a>";
                }
            },
            {"data": "lastname"},
            {"data": "email"},
            {"data": "roles"},
            {"data": "createdAt"},
            {
                data: "status",
                render: function (row) {
                    let status;
                    if(row === 1) {
                        status = "Actif"
                    } else {
                        status = "Désactivé"
                    }
                    return "<p>"+status+"</p>"
                },
            },
            {
                "data": null,
                render: function (data, type, row) {
                    return "<span> <a href='/user/edit/"+ row.id+"'> " +
                        "<span><i class='mdi mdi-24px mdi-pencil'></i></span> </a> </span> " +
                        "<span> <a data-bs-toggle='modal' data-bs-target='#delete-modal' href='#' data-href='/user/delete/" +row.id+"'>" +
                        "<span><i class='mdi mdi-24px mdi-delete-empty'></i></span></a> </span>";
                },
                orderable: false
            }
        ]
    })
    $('tbody > tr').hover(function() {
        $(this).addClass('current-row');
        $( this ).css("background-color", "#ffffff");
    }, function() {
        $(this).removeClass('current-row');
        $( this ).css("background-color", "transparent");

    })

    $('table tr th').hover(function() {
        $(this).css('cursor','pointer');
    });

    $('select[name="basic-datatable_length"], #basic-datatable_filter, #basic-datatable_paginate').on('click', function () {
        $('tbody > tr').hover(function() {
            $(this).addClass('current-row');
            $( this ).css("background-color", "#ffffff");
        }, function() {
            $(this).removeClass('current-row');
            $( this ).css("background-color", "transparent");

        })
    })
})
