$('document').ready(function () {
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
    });

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
            var linkInfoCabinet = $('<p class="form-control-static"><a href="javascript:void(0);" data-cabinet="' + infosCabinet[0] + '">' + infosCabinet[1] + '</a></p>');
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
    $(this).blur();
    var regexphour = /^([01]?[0-9]|2[0-3]):[0-5][0-9]$/;
    //var regexpdate = /([0-9][1-2])\/([0-2][0-9]|[3][0-1])\/((19|20)[0-9]{2})/;
    var erreur = false;
    if ($('input.hRecpt').val() !== "" && !regexphour.test($('input.hRecpt').val())) {
        alert("Heure de reception doit être un temp valide et doit suivre le règle: hh:mm");
        return;
    }
//    if ($('input.hTtmt').val() !== "" && !regexphour.test($('input.hTtmt').val())) {
//        alert("Heure de traitement doit être un temp valide et doit suivre le règle: hh:mm");
//        return;
//    }

    var data = serializer();
    if ($('input.numDossier').val() === "") {
        erreur = true;
    }

    if ($('input.hRecpt').val() === "") {
        erreur = true;
    }

    if ($('select.typeAction').val() == 0) {
        erreur = true;
    }

    if ($('select.statut').val() == 0) {
        erreur = true;
    }

    if ($('select.interlocuteur').val() == 0) {
        erreur = true;
    }
    if ($('select.document').val() == 0) {
        erreur = true;
    }
    if (erreur) {
        $('#showModal').modal('show');
        return;
    } else {
        $.ajax({
            url: url_action,
            data: data,
            type: "POST",
            success: function (resultat) {
                if (resultat === "1") {
                     erreur = false;
                    window.location = url_liste;
                }
            },
            error: function () {

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

$(function () {
    $('[data-toggle="popover"]').popover()
});

$('select.typeAction').change(function () {
    $('select.statut option').addClass('hidden');
    $('select.statut').val(0);
    if (parseInt($(this).val()) === 0 || $.trim($('#ref_type_action_statut p#' + $(this).val()).text()).length === 0) {
        return false;
    }
    var statuts = $.trim($('#ref_type_action_statut p#' + $(this).val()).text()).split('_');
    for (var i in statuts) {
        $('select.statut option[value=' + statuts[i] + ']').removeClass('hidden');
    }
});

$('select.interlocuteur').change(function () {
    $('select.document option').addClass('hidden');
    $('select.document').val(0);
    if (parseInt($(this).val()) === 0 || $.trim($('#ref_interlocuteur_document p#' + $(this).val()).text()).length === 0) {
        return false;
    }
    var documents = $.trim($('#ref_interlocuteur_document p#' + $(this).val()).text()).split('_');
    for (var i in documents) {
        $('select.document option[value=' + documents[i] + ']').removeClass('hidden');
    }
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
$("input.hRecpt").mask("99:99", {placeholder: "--:--"});
//$("input.hTtmt").mask("99:99", {placeholder: "--:--"});
