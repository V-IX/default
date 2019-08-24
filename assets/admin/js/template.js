function rightHeight() {
	var h = $(window).height() - $('.header').outerHeight() - $('.footer').outerHeight() - 30;
	var leftSide = $('.left-side');
	if(leftSide.height() > h) {
		h = leftSide.height()
	}
	$('.right-side-in').css('min-height', h);
}

$(window).load(function(){
	rightHeight()
});

$(window).resize(function(){
	rightHeight()
});