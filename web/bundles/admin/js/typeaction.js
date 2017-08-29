$('button.save').click(function () {
    var obj = $(this);
    obj.attr("disabled", "disabled");
    obj.find("span")
            .removeClass("glyphicon-floppy-save")
            .addClass("glyphicon-hourglass");
    var url = url_ajout_type_action;
    var libelle = $(this).closest('tr').find('input.libelle').val();
    var statuts = $(this).closest('tr').find('input.statuts').val();
    var categories = $(this).closest('tr').find('input.categories').val();
    var transmissions = $(this).closest('tr').find('input.transmissions').val();

    $.ajax({
        url: url,
        data: "libelle=" + libelle + "&statuts=" + statuts + "&categories=" + categories + "&transmissions=" + transmissions,
        type: "POST",
        success: function (result) {
            obj.removeAttr("disabled");
            obj.find("span")
                    .removeClass("glyphicon-hourglass")
                    .addClass("glyphicon-floppy-save");
            window.location = url_index_type_action;
        },
        error: function () {
            obj.removeAttr("disabled");
            obj.find("span")
                    .removeClass("glyphicon-hourglass")
                    .addClass("glyphicon-floppy-save");
        }
    });
});
$('button.edit').click(function () {

    var url = url_modification_type_action;
    var id = $(this).closest('tr').find('input.id').val();
    var libelle = $(this).closest('tr').find('input.libelle').val();
    var statuts = $(this).closest('tr').find('input.statuts').val();
    var categories = $(this).closest('tr').find('input.categories').val();
    var transmissions = $(this).closest('tr').find('input.transmissions').val();
    if (libelle !== "") {
        var obj = $(this);
        obj.attr("disabled", "disabled");
        obj.find("span")
                .removeClass("glyphicon-floppy-disk")
                .addClass("glyphicon-hourglass");
        $.ajax({
            url: url,
            data: "id=" + id + "&libelle=" + libelle + "&statuts=" + statuts + "&categories=" + categories + "&transmissions=" + transmissions,
            type: "POST",
            success: function (result) {
                obj.removeAttr("disabled");
                obj.find("span")
                        .removeClass("glyphicon-hourglass")
                        .addClass("glyphicon-floppy-disk");
            },
            error: function () {
                obj.removeAttr("disabled");
                obj.find("span")
                        .removeClass("glyphicon-hourglass")
                        .addClass("glyphicon-floppy-save");
            }
        });
    } else {
        alert('Veuillez remplir le champs vide svp');
    }

});

function verifierLibelle() {
    if ($('input.libelle').val() == '') {
        $('.save').attr('disabled', true);
    } else {
        $('.save').attr('disabled', false);
    }
}
verifierLibelle();
$('body').undelegate('input.libelle', 'keyup').delegate('input.libelle', 'keyup', function () {
    verifierLibelle();
});
$('body').undelegate('input.libelle', 'blur').delegate('input.libelle', 'blur', function () {
    verifierLibelle();
});
$('body').undelegate('input.libelle', 'click').delegate('input.libelle', 'click', function () {
    verifierLibelle();
});