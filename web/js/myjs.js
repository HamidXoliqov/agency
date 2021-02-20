$("body").delegate(".number",'focus',function(e) {
    $(this).select();
});

$("body").delegate(".number",'keyup',function(e) {
    let t = $(this);
    let val = t.val();
    if(e.which==107){
        t.val(1*val+1);
    }
    if(e.which==109){
        t.val(1*val-1);
    }
});
$("body").delegate(".number",'keydown keyup',function(e) {
    let t = $(this);
    let val = t.val();
    if (/^\s*[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?\s*$/.test(e.key) || e.which == 8 || e.which == 37 || e.which == 39 || e.which == 46 || e.which == 17 || e.which == 190 || e.which == 110 || e.which == 9) {
        if(!/^(\d+)[.]?(\d*)$/.test(val)&&val!=''){
            if(val=='.'||val==NaN){
                if(val=='.'||val=='0..'){
                    t.val('0.');
                }else {
                    t.val('');
                }
            }else {
                if(/^(\d+)[.]+(\d*)$/.test(val)||val=='0..'){
                    t.val(val.replace(/[^.\d]+/g,"").replace( /^([^\.]*\.)|\./g, '$1' ))
                }else {
                    t.val(parseFloat(val));
                }
            }
        }
    }else{
        e.preventDefault();
    }
    if(val<0){
        t.val(0);
    }
});
$("body").delegate(".number",'blur change',function(e) {
    let t = $(this);
    let val = t.val();
    if(val!='') {
        t.val(parseFloat(val));
    }
    if($(this).attr('data-max')&&$(this).attr('data-max')!=''){
        if(1*$(this).val()>1*$(this).attr('data-max')){
            $(this).val($(this).attr('data-max'));
            alert("Kiritilgan miqdor "+$(this).attr('data-max')+" dan oshmasligi kerak");
            $(this).focus();
        }
    }
});

function printByClass(className) {
    let printContents = document.getElementById(className).innerHTML;
    let originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}