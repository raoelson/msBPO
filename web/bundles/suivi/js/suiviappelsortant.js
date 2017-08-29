$('document').ready(function () {
    toggle_categorie();
    toggle_statut();
    addAttrib();
    $(function () {
        $("#filtre_date").datepicker({
            dateFormat: 'dd/mm/yy',
            closeText: 'Fermer',
            prevText: 'Précédent',
            nextText: 'Suivant',
            currentText: 'Aujourd\'hui',
            monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
            dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
            dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
            dayNamesMin: ['Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa'],
            weekHeader: 'Sem.',
        });
        $("#jourReception").datepicker({
            dateFormat: 'dd/mm/yy',
            closeText: 'Fermer',
            prevText: 'Précédent',
            nextText: 'Suivant',
            currentText: 'Aujourd\'hui',
            monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
            dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
            dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
            dayNamesMin: ['Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa'],
            weekHeader: 'Sem.',
        });
    });

});
toggle_categorie = function () {
    $('select.categorie option').addClass('hidden');
    $('select.categorie').val(0);
    var $selected = $("select.typeAction");
    if (parseInt($selected.val()) === 0 || $.trim($('#ref_type_action_categorie p#' + $selected.val()).text()).length === 0) {
        return false;
    }
    var categories = $.trim($('#ref_type_action_categorie p#' + $selected.val()).text()).split('_');
    for (var i in categories) {
        $('select.categorie option[value=' + categories[i] + ']').removeClass('hidden');
    }

    var actionText = $("option:selected", $selected).text();
    $("select.categorie").prop('disabled', true);
    $("select.categorie").val("");
    if (actionText.toLowerCase().indexOf("situation") >= 0) {
        $("select.categorie").prop('disabled', false);
    } 
};
toggle_statut = function () {
    $('select.statut option').addClass('hidden');
    $('select.statut').val(0);
    var $selectedAct = $("select.typeAction");
    if (parseInt($selectedAct.val()) === 0 || $.trim($('#ref_type_action_statut p#' + $selectedAct.val()).text()).length === 0) {
        return false;
    }
    var statuts = $.trim($('#ref_type_action_statut p#' + $selectedAct.val()).text()).split('_');
    for (var i in statuts) {
        $('select.statut option[value=' + statuts[i] + ']').removeClass('hidden');
    }


    var categText = $("option:selected", $("select.categorie")).text();
    if (categText.toLowerCase().indexOf("autre") >= 0) {
        $("select.statut option").each(function () {
            if ($(this).text().toLowerCase().indexOf("hors process") >= 0) {
                $('select.statut option').addClass('hidden');
                $('select.statut').val(0);
                $('select.statut option[value=' + $(this).val() + ']').removeClass('hidden');
                $('select.statut option[value=' + $(this).val() + ']').attr("selected", "selected");
            }
        });
    }
};
testRequired = function () {
    reponses = false;
    $('tbody tr:first').find('input').map(function () {
        if ($(this).attr('required') && $(this).val() === "") {
            reponses = true;
        }
    });
    $('tbody tr:first').find('select').map(function () {
        if ($(this).attr('required') && $(this).val() === "") {
            reponses = true;
        }
    });
    $('tbody tr:first').find('textarea').map(function () {
        if ($(this).attr('required') && $(this).val() === "") {
            reponses = true;
        }
    });
    return reponses;
};
$('select.typeAction').change(function () {
    toggle_categorie();
    toggle_statut();
    addAttrib();
});
addAttrib = function () {
    var $selected = $("select.typeAction");
    var actionText = $("option:selected", $selected).text();
    if (actionText.toLowerCase().indexOf("situation") >= 0) {
        $('select.statut').prop('required', true);
        $('select.categorie').prop('required', true);
        $('select.transmission').prop('required', true);
        $('input[name="garage"]').prop('required', true);
    } else {       
        $('select.statut').removeAttr('required');
        $('select.categorie').removeAttr('required');
        $('select.transmission').removeAttr('required');
        $('input[name="garage"]').removeAttr('required');
    }
};
$('select.categorie').change(function () {
    toggle_statut();
});

$('.numDossier').blur(function () {
    $(this).closest('tr').find('td.cabinetInfos').html("-");
    $('.idCabinet').val("");
    var numeroDossier = $(this).val();
    if (numeroDossier.length) {
        var numeroCabinet = numeroDossier.substring(0, 3);
        if ($.trim($('.associations #ref_cabinets p#' + numeroCabinet).text()).length) {
            var infosCabinet = $.trim($('.associations #ref_cabinets p#' + numeroCabinet).text()).split('##');
            $('.idCabinet').val(infosCabinet[infosCabinet.length - 1]);
            var linkInfoCabinet = $('<p class="form-control-static"><a href="javascript:void(0);">' + infosCabinet[1] + '</a></p>');
            $(this).closest('tr').find('td.cabinetInfos').html(linkInfoCabinet);
        }
    }
});

var serializer = function () {
    var data = "idJournee=" + $('input.idJournee').val();
    var sep = "&";
    $('tbody tr:first').find('input').map(function () {
        data += sep + $(this).attr('name') + '=' + $(this).val();
    });
    $('tbody tr:first').find('select').map(function () {
        data += sep + $(this).attr('name') + '=' + $(this).val();
    });
    $('tbody tr:first').find('textarea').map(function () {
        data += sep + $(this).attr('name') + '=' + $(this).val();
    });
    return data;
};

$('.save').click(function () {
    if (testRequired()) {
        $('#myModal').modal('show');
    } else {
        var obj = $(this);
        obj.blur();
        obj.addClass("disabled");

        var data = serializer();
        $.ajax({
            url: url_action,
            data: data,
            type: "POST",
            success: function (resultat) {
                obj.removeClass("disabled");
                if (resultat === "1") {
                    window.location = url_liste;
                } else {
                    alert(resultat);
                }
            },
            error: function () {
                obj.removeClass("disabled");
            }
        });
    }
});

$('.textAFloat button.close').click(function () {
    $(this).closest('.textAFloat').addClass('hidden');
});

$('button.comment').off('click').on('click', function () {
    $(this).closest('td.box').find('span.textAFloat').removeClass('hidden');
});

$('.textAFloat button.close').click(function () {
    $(this).closest('.textAFloat').addClass('hidden');
});

$('button.commentctrl').off('click').on('click', function () {
    $(this).closest('td.box').find('span.textAFloat').removeClass('hidden');
});

$(function () {
    $('[data-toggle="popover"]').popover();
});

$("input.jourReception").mask("99/99/9999", {placeholder: "__/__/____"});

var garages = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    prefetch: garagesJson
});

$('input.garage').typeahead(null, {
    name: 'garages',
    source: garages
});

$('input.garage').blur(function () {
    var lib = $(this).val();
    var id = 0;
    if ($('.associations #ref_garages p[id=' + lib + ']').length) {
        id = $('.associations #ref_garages p[id=' + lib + ']').attr('data-id');
    }
    $(this).closest('td').find('input.idgarage').val(id);
});


$('.save-modif').click(function () {
    var obj = $(this);
    obj.blur();
    obj.addClass("disabled");

    var data = "edit=1&id=" + $(this).closest('tr').find('input[name=idOperation]').val() + "&statut=" + $(this).closest('tr').find('select[name=statutOperation]').val() + "&commentaire=" + $(this).closest('tr').find('textarea[name=commentaireOperation]').val();
    $.ajax({
        url: url_action,
        data: data,
        type: "POST",
        success: function (resultat) {
            obj.removeClass("disabled");
            if (resultat === "1") {
                window.location = url_liste;
            } else {
                alert(resultat);
            }
        },
        error: function () {
            obj.removeClass("disabled");
        }
    });
});

$(document).off('mouseover', 'td.cabinetInfos a').on('mouseover', 'td.cabinetInfos a', function () {
    showInfo($(this));
});

var showInfo = function (obj) {
    var numCab = obj.attr('data-cabinet');
    var dataCab = $.trim($('.associations #ref_cabinets p#' + numCab).text()).split('##');
    var contenu = '<table class="table table-bordered table-condensed"><tr><th>Nom :</th><td>' + dataCab[1] + '</td><th>Numéro standard téléphonique :</th><td>' + dataCab[6] + '</td></tr>'
            + '<tr><th>Rue</th><td>' + dataCab[2] + '</td><th>Numéro ligne rouge</th><td>' + dataCab[7] + '</td></tr>'
            + '<tr><th>Code postal</th><td>' + dataCab[3] + '</td><th>Numéro fax</th><td>' + dataCab[8] + '</td></tr>'
            + '<tr><th>Ville</th><td>' + dataCab[4] + '</td><th>Email</th><td>' + dataCab[5] + '</td></tr>'
            + '<tr><th>Permanence téléphonique</th><td>' + dataCab[9] + '</td><th>Equipe expert</th><td>' + dataCab[11] + '</td></tr>'
            + '<tr><th>Permanence expertise</th><td>' + dataCab[10] + '</td><th>Equipe assistante</th><td>' + dataCab[12] + '</td></tr></table>';
    obj
            .popover({
                title: 'Infos <b>Cabinet ' + dataCab[0] + '</b>',
                content: contenu,
                trigger: 'hover',
                html: true
            })
            .popover('show');
};
$("input#filtre_date").mask("99/99/9999", {placeholder: "__/__/____"});
