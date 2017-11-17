$(function() {
    $('form.js-ajax-filter').on('submit', function(e) {

        e.preventDefault();

        var waitElement = $(this).find('input[type="submit"], button[type="submit"]').get(0);

        BX.showWait(waitElement);

        $.post($(this).attr('action'), $(this).serialize(), function(ans) {

            $('.js-ajax-filter-search').html(ans);

            BX.closeWait(waitElement);
        });
    })
});