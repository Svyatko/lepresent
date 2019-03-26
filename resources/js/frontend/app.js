$('header .main_for_click').on('click', function () {
    $(this).find('.dropdown').slideToggle();
    $(this).find('.main_link').toggleClass('active');
    return false
});

$('.cookie_message .permission .yes').on('click', function () {
    $('.cookie_message').hide();
    return false
});