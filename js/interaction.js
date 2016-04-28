/* script zajistuje interaktivitu administratorskeho rozhrani
 *  - volani editace
 *  - tlacitko ted
 *  - odeslani editacniho formulare
 */

$(document).ready(function(){

    /* funkce nahrazujici tlacitko ted na aktualni datum */
    $(".btn-now").on('click', function(e) {
        var evt = e || window.event; // promenna pro event
        var par = $(evt.target).parent(); // promenna rodice tlacitka (bunky tabulky)
        var fullDate = new Date(); // ziskani casu
        var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1); // dvojciselny mesic
        var currentDate =  fullDate.getFullYear()+ "-" + twoDigitMonth + "-" + fullDate.getDate(); // pozadovany datum
        par.html(currentDate); // nahrazeni tlacitka datumem
    });

    /* funkce pro zobrazeni modalu s predvyplnenym formularem podle rozkliknuteho radku */
    $(".admin-tr").on('dblclick', function(e) {
        var evt = e || window.event; // promenna pro event
        var par = evt.currentTarget; // promenna rodice cile eventu (radku tabulky)
        var text1 //srovnávací text pro select

        /* pro zalozku tablety */
        if($("#tab-tablets").attr('class') == "active") {
            /* vybrani moznosti v selectu */
            if($('html')[0].lang == 'cs') {
                text1 = 'Tablet';
            }
            else if($('html')[0].lang == 'en') {
                text1 = 'Tablet';
            }
            $("select[name='b_e-choose-device'] option").filter(function() {
                return $(this).text() == text1;
            }).attr('selected', true);

            /* naplneni formulare */
            $("input[name='b_e-id']").val(par.childNodes[0].textContent);
            $("input[name='b_e-name']").val(par.childNodes[1].textContent);
            $("input[name='b_e-lastname']").val(par.childNodes[2].textContent);
            $("input[name='b_e-email']").val(par.childNodes[3].textContent);
            $("input[name='b_e-grant']").val(par.childNodes[4].textContent);
            $("input[name='b_e-device']").val(par.childNodes[5].textContent);
            $("input[name='b_e-price']").val(par.childNodes[6].textContent);
            $("input[name='b_e-bought']").val(par.childNodes[7].textContent);
            $("input[name='b_e-sn']").val(par.childNodes[8].textContent);
            $("input[name='b_e-imei']").val(par.childNodes[9].textContent);
            $("input[name='b_e-payment']").val(par.childNodes[10].textContent);
            $("input[name='b_e-supplier']").val(par.childNodes[11].textContent);
            $("input[name='b_e-claim']").val(par.childNodes[12].textContent);
            $("input[name='b_e-took']").val(par.childNodes[13].textContent);
            $("input[name='b_e-notes']").val(par.childNodes[14].textContent);
        }
        else {
        /* pro zalozku mobily */
            if($("#tab-phones").attr('class') == "active"){
                /* vybrani moznosti v selectu */
                if($('html')[0].lang == 'cs') {
                    text1 = 'Chytrý telefon';
                }
                else if($('html')[0].lang == 'en') {
                    text1 = 'Smartphone';
                }
                $("select[name='b_e-choose-device'] option").filter(function() {
                    return $(this).text() == text1;
                }).attr('selected', true);

                /* naplneni formulare */
                $("input[name='b_e-id']").val(par.childNodes[0].textContent);
                $("input[name='b_e-name']").val(par.childNodes[1].textContent);
                $("input[name='b_e-lastname']").val(par.childNodes[2].textContent);
                $("input[name='b_e-email']").val(par.childNodes[3].textContent);
                $("input[name='b_e-grant']").val(par.childNodes[4].textContent);
                $("input[name='b_e-device']").val(par.childNodes[5].textContent);
                $("input[name='b_e-price']").val(par.childNodes[6].textContent);
                $("input[name='b_e-bought']").val(par.childNodes[7].textContent);
                $("input[name='b_e-sn']").val(par.childNodes[8].textContent);
                $("input[name='b_e-imei']").val(par.childNodes[9].textContent);
                $("input[name='b_e-payment']").val(par.childNodes[10].textContent);
                $("input[name='b_e-supplier']").val(par.childNodes[11].textContent);
                $("input[name='b_e-claim']").val(par.childNodes[12].textContent);
                $("input[name='b_e-took']").val(par.childNodes[13].textContent);
                $("input[name='b_e-notes']").val(par.childNodes[14].textContent);
            }
        }
        $("#editModal").modal(); // zobrazeni modalu s formularem
    });

    /* funkce pro odesilani editacniho formulare */
    $("#btn-edit_b").click(function() {
        $("#edit_b-form").submit();
    });
});