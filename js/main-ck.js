$(document).ready(function(){$(".company-menu").click(function(){$(".company-selector").slideToggle("fast")});$("h1 .company-name").click(function(){$(".company-selector").slideToggle("fast")});$(".compound-list > li").click(function(){$(".compound-list > li").removeClass("active");$(this).addClass("active");$(".compound-list > li:not(.active)").find(".sub-list").slideUp("fast");$(this).find(".sub-list").slideDown("fast")});$(".timer-toggle").click(function(){$(".timer-dropdown").toggle();$(this).parent().toggleClass("active")});$(".time-for").click(function(){$(".panel").toggleClass("open")})});