$(document).ready(function(){
    $(".btn-now").dblclick(function () {
        event.stopPropagation();
    })

    $(".btn-now").click(function () {
        var par = $(event.target).parent();
        var fullDate = new Date();
            var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
            var currentDate =  fullDate.getFullYear()+ "-" + twoDigitMonth + "-" + fullDate.getDate();
        par.html(currentDate);
    })

    $(".admin-tr").dblclick(function() {
        if(event.target.id == 14){ event.stopPropagation()}
        else {
            var par = event.currentTarget;
            var text1
            if($("#tab-tablets").attr('class') == "active") {
                if($('html')[0].lang == 'cz') text1 = 'Tablet';
                else if($('html')[0].lang == 'eng') text1 = 'Tablet';

                $("select[name='b_e-choose-device'] option").filter(function() {
                    return $(this).text() == text1;
                }).attr('selected', true);
                $("input[name='b_e-name']").val(par.childNodes[1].textContent);
                $("input[name='b_e-lastname']").val(par.childNodes[2].textContent);
                $("input[name='b_e-grant']").val(par.childNodes[3].textContent);
                $("input[name='b_e-device']").val(par.childNodes[4].textContent);
                $("input[name='b_e-price']").val(par.childNodes[5].textContent);
                $("input[name='b_e-bought']").val(par.childNodes[6].textContent);
                $("input[name='b_e-sn']").val(par.childNodes[7].textContent);
                $("input[name='b_e-imei']").val(par.childNodes[8].textContent);
                $("input[name='b_e-version']").val(par.childNodes[9].textContent);
                $("input[name='b_e-payment']").val(par.childNodes[10].textContent);
                $("input[name='b_e-supplier']").val(par.childNodes[11].textContent);
                $("input[name='b_e-claim']").val(par.childNodes[12].textContent);
                $("input[name='b_e-took']").val(par.childNodes[13].textContent);
                $("input[name='b_e-notes']").val(par.childNodes[14].textContent);
            }
            else {
                if($("#tab-phones").attr('class') == "active"){
                    if($('html')[0].lang == 'cz') text1 = 'Chytrý telefon';
                    else if($('html')[0].lang == 'eng') text1 = 'Smartphone';

                    $("select[name='b_e-choose-device'] option").filter(function() {
                        return $(this).text() == text1;
                    }).attr('selected', true);
                    $("input[name='b_e-name']").val(par.childNodes[1].textContent);
                    $("input[name='b_e-lastname']").val(par.childNodes[2].textContent);
                    $("input[name='b_e-grant']").val(par.childNodes[3].textContent);
                    $("input[name='b_e-device']").val(par.childNodes[4].textContent);
                    $("input[name='b_e-price']").val(par.childNodes[5].textContent);
                    $("input[name='b_e-bought']").val(par.childNodes[6].textContent);
                    $("input[name='b_e-sn']").val(par.childNodes[7].textContent);
                    $("input[name='b_e-imei']").val(par.childNodes[8].textContent);
                    $("input[name='b_e-payment']").val(par.childNodes[9].textContent);
                    $("input[name='b_e-supplier']").val(par.childNodes[10].textContent);
                    $("input[name='b_e-claim']").val(par.childNodes[11].textContent);
                    $("input[name='b_e-took']").val(par.childNodes[12].textContent);
                    $("input[name='b_e-notes']").val(par.childNodes[13].textContent);
                }
            }
            $("#editModal").modal();
        }
    });
});