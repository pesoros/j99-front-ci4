
$( document ).ready(function() {
    $('#dateto').datepicker({ 
        format: 'dd/mm/yyyy',
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome',
        size: 'default'
    });
    $("#slcbus").select2({
        dropdownPosition: 'below',
        placeholder: "Pilih Bus / shuttel"
    });
    $("#slcpenumpang").select2({
        minimumResultsForSearch: -1,
        dropdownPosition: 'below'
    });
    $("#slcincity").select2({
        dropdownPosition: 'below',
        placeholder: "Masukan Nama Daerah"
    });
    $("#slcoffcity").select2({
        dropdownPosition: 'below',
        placeholder: "Masukan Nama Daerah"
    });
    $("#slckelas").select2({
        minimumResultsForSearch: -1,
        dropdownPosition: 'below',
        placeholder: "Pilih Kelas"
    });
    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });
});