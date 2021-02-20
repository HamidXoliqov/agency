"use strict";
// Class definition

var KTDatatableHtmlTableDemo = function() {
    // Private functions

    // demo initializer
    var demo = function() {

		var datatable = $('#kt_datatable').KTDatatable({
			data: {
				saveState: {cookie: false},
			},
            layout: {
                scroll: true,
            },
			search: {
				input: $('#kt_datatable_search_query'),
				key: 'generalSearch'
			},
			columns: [
				{
					field: 'DepositPaid',
					type: 'number',
				},
                {
                    field: 'ID',
                    type: 'number',
                    width: 25,
                    template: function(row){
                        return "<span class='ml-2'>" + row.ID + "</span>";
                    }
                },
				{
					field: 'OrderDate',
					type: 'date',
					format: 'YYYY-MM-DD',
				}, 
                {
					field: 'Status',
					title: 'Status',
                    width: 70,
					autoHide: false,
					// callback function support for column rendering
					template: function(row) {
						var status = {
							1: {
                                'title': 'Active',
                                'class': ' label-light-success'
                            },
                            0: {
                                'title': 'Inactive',
                                'class': ' label-light-danger'
                            },
							2: {
                                'title': 'NoActive',
                                'class': ' label-light-warning'
                            },
							
						};
						return '<span class="label font-weight-bold label-lg' + status[row.Status].class + ' label-inline">' + status[row.Status].title + '</span>';
					},
				},
                {
					field: 'Type',
					title: 'Type',
					autoHide: false,
					// callback function support for column rendering
					template: function(row) {
						var status = {
							1: {
                                'title': 'Online',
                                'state': 'danger'
                            },
							2: {
                                'title': 'Retail',
                                'state': 'primary'
                            },
							3: {
                                'title': 'Direct',
                                'state': 'success'
                            },
						};
						return '<span class="label label-' + status[row.Type].state + ' label-dot mr-2"></span><span class="font-weight-bold text-' +status[row.Type].state + '">' +	status[row.Type].title + '</span>';
					},
                    
				},
                {
                    field: 'Action',
                    title: 'Action',
                    width: 80
                },
			],
            rows: {
                autoHide: false,
            },
		});



        $('#kt_datatable_search_status').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Status');
        });

        $('#kt_datatable_search_type').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Type');
        });

        $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();

    };

    return {
        // Public functions
        init: function() {
            // init dmeo
            demo();
        },
    };
}();

var KTDatatableHtmlTableDemo1 = function() {
    // Private functions

    // demo initializer
    var demo1 = function() {

        var datatable = $('#kt_datatable1').KTDatatable({
            data: {
                saveState: {cookie: false},
            },
            layout: {
                scroll: true,
            },
            search: {
                input: $('#kt_datatable_search_query1'),
                key: 'generalSearch'
            },
            rows: {
                autoHide: false,
            },
        });



        $('#kt_datatable_search_status1').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Status');
        });

        $('#kt_datatable_search_type1').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Type');
        });

        $('#kt_datatable_search_status1, #kt_datatable_search_type1').selectpicker();

    };

    return {
        // Public functions
        init: function() {
            // init dmeo
            demo1();
        },
    };
}();

var KTDatatableHtmlTableDemo2 = function() {
    // Private functions

    // demo initializer
    var demo2 = function() {

        var datatable = $('#kt_datatable2').KTDatatable({
            data: {
                saveState: {cookie: false},
            },
            layout: {
                scroll: true,
            },
            search: {
                input: $('#kt_datatable_search_query2'),
                key: 'generalSearch'
            },
            rows: {
                autoHide: false,
            },
        });



        $('#kt_datatable_search_status2').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Status');
        });

        $('#kt_datatable_search_type2').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Type');
        });

        $('#kt_datatable_search_status2, #kt_datatable_search_type2').selectpicker();

    };

    return {
        // Public functions
        init: function() {
            // init dmeo
            demo2();
        },
    };
}();

var KTDatatableHtmlTableDemo3 = function() {
    // Private functions

    // demo initializer
    var demo3 = function() {

        var datatable = $('#kt_datatable3').KTDatatable({
            data: {
                saveState: {cookie: false},
            },
            layout: {
                scroll: true,
            },
            search: {
                input: $('#kt_datatable_search_query3'),
                key: 'generalSearch'
            },
            rows: {
                autoHide: false,
            },
        });



        $('#kt_datatable_search_status3').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Status');
        });

        $('#kt_datatable_search_type3').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Type');
        });

        $('#kt_datatable_search_status3, #kt_datatable_search_type3').selectpicker();

    };

    return {
        // Public functions
        init: function() {
            // init dmeo
            demo3();
        },
    };
}();

var KTDatatableHtmlTableDemo4 = function() {
    // Private functions

    // demo initializer
    var demo4 = function() {

        var datatable = $('#kt_datatable4').KTDatatable({
            data: {
                saveState: {cookie: false},
            },
            layout: {
                scroll: true,
            },
            search: {
                input: $('#kt_datatable_search_query4'),
                key: 'generalSearch'
            },
            rows: {
                autoHide: false,
            },
        });



        $('#kt_datatable_search_status4').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Status');
        });

        $('#kt_datatable_search_type4').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Type');
        });

        $('#kt_datatable_search_status4, #kt_datatable_search_type4').selectpicker();

    };

    return {
        // Public functions
        init: function() {
            // init dmeo
            demo4();
        },
    };
}();

jQuery(document).ready(function() {
	KTDatatableHtmlTableDemo.init();
});
