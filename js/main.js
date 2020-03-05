$(document).on('click', '.openModal', function() {
    var size = $(this).attr('size');
    var url = $(this).attr('href');
    var header = $(this).attr("header");
    header = header ? header : '';
    $('#modal-'+size).find(".header-text").text(header);
    $('#modal-'+size+'-loader').show();
    $('#modal-'+size).modal('show').find('#modal-'+size+'-body')
    .html("").load(url, function() {
        $('#modal-'+size+'-loader').hide();
    });
    return false;
});
