"use strict";
// Class definition

var KTAppsProjectsListDatatable = function() {
    // Private functions

    // basic demo
    var _demo = function() {
        var datatable = $('#kt_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        method:'GET',
                        url: AGENCY_APPEALS_LIST_API_URL,
                    },
                },
                pageSize: 10, // display 20 records per page
                serverPaging: true,
                serverFiltering: true,
                serverSorting: true,
            },

            // layout definition
            layout: {
                scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
                footer: false, // display/hide footer
            },

            // column sorting
            sortable: true,

            pagination: true,

            search: {
                input: $('#kt_subheader_search_form'),
                delay: 400,
                key: 'generalSearch'
            },

            // columns definition
            columns: [{
                field: 'num',
                title: '#',
                sortable: false,
                // sortable: 'asc',
                width: 40,
                type: 'number',
                selector: false,
                textAlign: 'left',
                template: function(data) {
                    return '<span class="font-weight-bolder">' + data.num + '</span>';
                }
            }, {
                field: 'contragent',
                title: 'Kontragent',
                sortable: false,
                width: 220,
                template: function(data) {
                    var number = KTUtil.getRandomInt(1, 10);
                    var output = '<div class="text-dark-75 font-size-lg mb-0">' + data.contragent + '</div>';
                    return output;
                },
            }, {
                field: 'region_id',
                sortable: false,
                // title: 'Regions',
                title: AppealDataTitles['Regions'],
                template: function(row) {
                    var output = '';
                    output += '<div class="font-weight-bold">' + Regions[row.region_id] + '</div>';
                    return output;
                }
            }, {
                field: 'created_at',
                title: AppealDataTitles['Created Date'],
                sortable: false,
                type: 'date',
                // format: 'MM/DD/YYYY',
                template: function(row) {
                    var output = '';
                    var index = KTUtil.getRandomInt(1, 4);

                    // output += '<div class="font-weight-bolder text-primary mb-0">' + row.ShipDate + '</div>';
                    output += '<div class="font-weight-bolder text-primary mb-0">' + row.created_at + '</div>';
                    // output += '<div class="text-muted">' + status[index].title + '</div>';

                    return output;
                },
            }, {
                field: 'appeal_type',
                title: AppealDataTitles['Appeal Type'],
                sortable: false,
                template: function(row) {
                    var output = '';

                    output += '<div class="font-weight-bolder">' + AppealTypes[row.appeal_type] + '</div>';

                    return output;
                }
            }, {
                field: 'appeal_status',
                title: AppealDataTitles['Appeal Status'],
                sortable: false,
                template: function(row) {
                    var output = '';
                    var status = {
                        1: {
                            'title': 'Янги',
                            'class': ' label-light-primary'
                        },
                        2: {
                            'title': 'Агентликка жўнатилди',
                            'class': ' label-light-info'
                        },
                        3: {
                            'title': 'Агентлик қабул қилди',
                            'class': ' label-light-success'
                        },
                        4: {
                            'title': 'Агентлик аризани қайтарди',
                            'class': ' label-light-danger'
                        },
                        5: {
                            'title': 'Кенгашга ўтказилди',
                            'class': ' label-light-primary'
                        },
                        6: {
                            'title': 'Кенгаш рад этди',
                            'class': ' label-light-danger'
                        },
                        7: {
                            'title': 'Кенгаш қабул қилди',
                            'class': ' label-light-success'
                        },
                        8: {
                            'title': 'Субсидия ажратилди',
                            'class': ' label-light-primary'
                        },
                    };

                    // output += '<div class="font-weight-bold text-muted ' + status[row.appeal_status].class + ' label-inline">' + AppealStatuses[row.appeal_status] + '</div>';
                    // output += '<div class="label label-lg font-weight-bold  ' + status[row.appeal_status].class + ' label-inline">' + AppealStatuses[row.appeal_status] + '</div>';
                    output += '<div class="label label-lg font-weight-bold  ' + status[row.appeal_status].class + ' label-inline">' + AppealStatuses[row.appeal_status] + '</div>';

                    return output;
                }
/*
            }, {
                field: 'Status',
                title: 'Status',
                // callback function support for column rendering
                template: function(row) {
                    var status = {
                        1: {
                            'title': 'Pending',
                            'class': ' label-light-primary'
                        },
                        2: {
                            'title': 'Delivered',
                            'class': ' label-light-danger'
                        },
                        3: {
                            'title': 'Canceled',
                            'class': ' label-light-primary'
                        },
                        4: {
                            'title': 'Success',
                            'class': ' label-light-success'
                        },
                        5: {
                            'title': 'Info',
                            'class': ' label-light-info'
                        },
                        6: {
                            'title': 'Danger',
                            'class': ' label-light-danger'
                        },
                        7: {
                            'title': 'Warning',
                            'class': ' label-light-warning'
                        },
                    };
                    return '<span class="label label-lg font-weight-bold ' + status[row.Status].class + ' label-inline">' + status[row.Status].title + '</span>';
                },
*/
            }, {
                field: 'Actions',
                title: AppealDataTitles['Actions'],
                sortable: false,
                width: 130,
                overflow: 'visible',
                autoHide: false,
                template: function(row) {
                    return '<a href="' + AppealViewUrl + row.appeal_id + '" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon" title="View">\
                                <span class="flaticon2-list-3"></span>\
                            </a>\
                            <a href="' + AppealViewDocUrl + row.appeal_id + '" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon" title="Print View">\
                                <span class="flaticon2-print"></span>\
                            </a>';
                },
            }]
        });
    };

    return {
        // public functions
        init: function() {
            _demo();
        },
    };
}();

jQuery(document).ready(function() {
    KTAppsProjectsListDatatable.init();
});
