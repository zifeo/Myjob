$(function(){
	//$('#category').chosen();


	// Toggles the datepicker
	$('.datepicker').datepicker({});

	// Displays punctual-date datepicker or goes back to from-to-date
	$('#isPunctual').on("change", function() {
		if($('#isPunctual').is(':checked')) {
			// display punctual-date
			$('#hiddable-from-to-date').addClass('hidden');
			$('#hiddable-punctual-date').removeClass('hidden');
		} else {
			// display from-to-date
			$('#hiddable-from-to-date').removeClass('hidden');
			$('#hiddable-punctual-date').addClass('hidden');
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