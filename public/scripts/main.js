$(function(){
	//$('#category').chosen();


	// Toggles the datepicker
	$('.datepicker').datepicker({ 
		format: "dd-mm-yyyy",
		autoclose: true,
    	todayHighlight: true
	});

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
});