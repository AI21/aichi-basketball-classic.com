$(function(){

    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        paginationClickable: true,
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: 2500,
        autoplayDisableOnInteraction: false
    });

    //開閉用ボタンをクリックでクラスの切替え
    $('#about__btn').on('click', function () {
		$('[data-remodal-id=about]').remodal().open();
    });
    $('#schejule__btn').on('click', function () {
		$('[data-remodal-id=rarrySchejule]').remodal().open();
    });

	$('#rule_3on3__btn').on('click', function () {
		$('[data-remodal-id=rule_3on3]').remodal().open();
	});
	$('#rule_1on1__btn').on('click', function () {
		$('[data-remodal-id=rule_1on1]').remodal().open();
	});
    $('#rule_3p__btn').on('click', function () {
		$('[data-remodal-id=rule_3p]').remodal().open();
    });
    $('#rule_5on5__btn').on('click', function () {
        $('[data-remodal-id=rule_5on5]').remodal().open();
    });

    $('#exp_1on1__btn').on('click', function () {
        $('[data-remodal-id=exp_1on1]').remodal().open();
    });
    $('#exp_3p__btn').on('click', function () {
        $('[data-remodal-id=exp_3p]').remodal().open();
    });
    $('#win_1on1__btn').on('click', function () {
        $('[data-remodal-id=win_1on1]').remodal().open();
    });
    $('#win_3p__btn').on('click', function () {
        $('[data-remodal-id=win_3p]').remodal().open();
    });

    /* Colorbox */
    // $('img.cbox').colorbox({
    //     opacity: '0.7',
    //     maxWidth:'100%',
    //     maxHeight:'100%',
    //     speed:'200',
    //     rel:'photo'
    // });

    //開閉用ボタンをクリックでクラスの切替え
    $('img#zaseki__modal').on('click', function () {
        $('[data-remodal-id=zaseki]').remodal().open();
    });
    $('#shirt__modal').on('click', function () {
        $('[data-remodal-id=shirtSize]').remodal().open();
    });

});
