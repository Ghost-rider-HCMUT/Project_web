$('.portfolio button').click(function (e) {
    if ($(this).hasClass('active')) {
        return;//kết thúc (không chạy code phía dưới nữa)
    }
    $('button.active').removeClass('active');
    $(this).addClass('active');
    const dataValue = $(this).attr('data');
    const allCols = $('.portfolio .row > div');//8 div
    if (dataValue == 'all') {
        allCols.show();//display:block;
        return;
    }
    const shownCols = $(`.portfolio .row > div[data=${dataValue}]`);
    const hiddenCols = allCols.not(shownCols);
    shownCols.show();//display:block;
    hiddenCols.hide();//display:none;
});

$(window).scroll(function () {
    // top của của cửa sổ trình duyệt so với top của document (tài liệu)
    // console.log($(window).scrollTop());

    // top của section portfolio so với top của document
    // console.log($('#portfolio').offset().top);
    if ($(window).scrollTop() >= $('#portfolio').offset().top - 1) {
        console.log('fixed menu');
        $('.navbar').addClass('fixed-top');
        $('header').addClass('dummy-padding');
    }
    else {
        console.log('normal menu');
        $('.navbar').removeClass('fixed-top');
        $('header').removeClass('dummy-padding');
    }

});