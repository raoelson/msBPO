var lastResults = [];
$(".statuts").select2({
    tags: dataStatuts,
    placeholder: "Choisissez les statuts qui conviennent",
    tokenSeparators: [";"]
});
$(".categories").select2({
    tags: dataCategories,
    placeholder: "Choisissez les catégories applicables",
    tokenSeparators: [";"]
});
$(".transmissions").select2({
    tags: dataTransmissions,
    placeholder: "Choisissez les transmissions applicables",
    tokenSeparators: [";"]
});