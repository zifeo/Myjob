$(function(){
	//$('#category').chosen();

	$('.mobile-menu-toggle').on('click', function(){
		$('.ui.labeled.icon.sidebar')
			.sidebar('toggle');		
	});
	
	$('.selection').dropdown();
	
	$('.ui.accordion').accordion();
	
	$('.message .close').on('click', function() {
    	$(this)
			.closest('.message')
			.transition('fade');
  	});

	// Toggles the datepicker
	/*$('.datepicker').datepicker({ 
		format: "dd-mm-yyyy",
		autoclose: true,
    	todayHighlight: true,
    	startDate: '0'
	});*/

	// Displays punctual-date datepicker or goes back to from-to-date
	$('#isPunctual').on("change", function() {
		if($('#isPunctual').is(':checked')) {
			$('#ends_at').val('');
			$('#ends_at').prop('disabled', true);
		} else {
			$('#ends_at').prop('disabled', false);
		}
	});
	
	$('.swipe a').on('swipeleft', function(){
		$('.swipe a').css({marginRight: '0'});
		$(this).animate({marginRight: '60px'}, 150);
	});
	
	$(window).on('scrollstart', function(){
		$('.swipe a').css({marginRight: '0'});
	});

	$('.validation-accept-button').on('click', function(){
		var self = this;
		var id = $(this).attr("rel");
		$.post("/moderation", {id: id, accepted: 1}, function( data ) {
  			if (data == "ok") {
  				$(self).parents('.panel').hide(500);
  			};
		});
	});

	$('.validation-refuse-button').on('click', function(){
		var self = this;
		var id = $(this).attr("rel");
		$.post("/moderation", {id: id, accepted: 0}, function( data ) {
  			if (data == "ok") {
  				$(self).parents('.panel').hide(500);
  			};
		});
	})
});