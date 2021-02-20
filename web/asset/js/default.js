$(document).ready(function (event) {

    $(document).ajaxStart(function () {
        Pace.restart()
    });

    $('.header-table-tabular').find('th').css({'border':'1px solid gray', 'background-color':'#0c5460', 'color':'whitesmoke'});
    $('tfoot').find('td').css('border','1px solid gray');

    // $('body').delegate('#js-search-language', 'change keyup keydown', function () {
    //     $('.multiple-input-list__item').find('td').css('border','1px solid gray');
    // });

    $('body').delegate('.view-modal-show', 'click', function(e) {
        e.preventDefault();
        let url=$(this).attr('href');
        $('.right-modal-all').html('');
        $('.right-modal-all').load(url);
        $('#kt_demo_panel_toggle').click();
    });
    $('input').change(function () {
        $('.click-button-ajax').click();
    });
    $('select').change(function () {
        $('.click-button-ajax').click();
    });

    $('.item-tr').css('color', 'whitesmoke');
    $('.button-print').click(function () {
        $('.no-print').css('display', 'none');
        $('.no-print-flex').css('display', 'none');
        $('table').css('color', 'black');
        $('.item-tr').css('color', 'black');
        window.print();
        $('.no-print').css('display', 'block');
        $('.print').find('th').css('color', 'white');
        $('.no-print-flex').css('display', 'flex');
        $('.item-tr').css('color', 'whitesmoke');
        $('.d-flex').css('display', 'flex!important');
    });

    $('body').delegate('.button-offcanvas', 'click', function (){
        $('.item-tr').find('th').css('color','white');
    });

   // $('.btn-sm-button').css({'padding':'0.3rem 0.3rem!important'});
    /*$('button[type="submit"]').on('click', function (event) {
        //event.preventDefault();
        $(this).prop('disabled', true);
    });*/
});