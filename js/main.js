$(document).ready(function() {
	
/*
 * Company Select
 */
	$('.company-current').find('.menu').click(function(){
		$('.company-selector').slideToggle();
	});
	
/* Compound list */
	$('.compound-list > li').click(function(){
		
		// Manage classes
		$('.compound-list > li').removeClass('active');
		$(this).addClass('active');
		
		// close others, except for the active one.
		$('.compound-list > li:not(.active)').find('.sub-list').slideUp();
		
		// open this
		$(this).find('.sub-list').slideDown();
		
	});
	
});
