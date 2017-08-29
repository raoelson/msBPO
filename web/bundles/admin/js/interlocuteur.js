$(".documents").select2({
    tags: dataDocuments,
    placeholder: "Définissez les documents appropriés, séparés par ;",
    tokenSeparators: [","]
});
$('document').ready(function () {   
    var documnts = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: documentJson
    });
    $('input.document').typeahead(null, {
        name: 'document',
        source: documnts
    });
    $('input.documentType').typeahead(null, {
        name: 'document',
        source: documnts
    });
});
