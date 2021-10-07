$(document).ready(function() {
	$('.header__burger').click(function(event) {
		$('.header__burger,.header__menu').toggleClass('active');
		$('body').toggleClass('lock');
	});

	$(function () {
		
		var location = window.location.href;
		var cur_url = '#site/' + location.split('/').pop();
		
		$('.header__list li').each(function () {
			 var link = $(this).find('a').attr('href');
			 
			 if (cur_url == link) {
				  $(this).addClass('current');
			 }
		});
  });

});