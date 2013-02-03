$(document).ready(function() {
	
/*
 * Company Select
 */
	$('.company-menu').click(function(){
		
		// TODO.  change this to CSS transformy thing with class swap.
		$('.company-selector').slideToggle('fast');
	});
	$('h1 .company-name').click(function(){
		
		// TODO.  change this to CSS transformy thing with class swap.
		$('.company-selector').slideToggle('fast');
	});
	
	
/* Compound list */
	$('.compound-list > li').click(function(){
		
		// Manage classes
		$('.compound-list > li').removeClass('active');
		$(this).addClass('active');
		
		// close others, except for the active one.
		$('.compound-list > li:not(.active)').find('.sub-list').slideUp('fast');
		
		// open this
		$(this).find('.sub-list').slideDown('fast');
		
	});
	
	// timer panel
	$('.timer-toggle').click(function(){
		$('.timer-dropdown').toggle();
		$(this).parent().toggleClass('active');
	});
	$('.time-for').click(function(){
		$('.panel').toggleClass('open');
	});
	
});
