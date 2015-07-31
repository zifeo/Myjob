$(function() {
	
	// token for ajax
	$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
	
	// locale should be like 'fr' or 'en'
	var locale = window.navigator.userLanguage || window.navigator.language;

	// format date on inputs	
	moment.locale(locale);
	$('input.moment').each(function(i) {
	  	var date = $.trim($(this).val());
	  	if (date.length > 0)
	  		$(this).val(moment(date).format('LL'));	
	  	else
	  		$(this).attr('placeholder', moment($(this).attr('placeholder')).format('LL'));	
	});
	$('span.moment').each(function(i) {
	  	var date = $.trim($(this).html());
	  	$(this).html(moment(date).fromNow());	
	});
	
	// format date on pickers
	switch (locale) {
		case 'fr':
			$('input.datepicker').pickadate({
			  	 formatSubmit: 'yyyy-mm-dd',
			  	 hiddenName: true,
			  	 monthsFull:["janvier","février","mars","avril","mai","juin","juillet","août","septembre","octobre","novembre","décembre"],
			  	 monthsShort:["Jan","Fev","Mar","Avr","Mai","Juin","Juil","Aou","Sep","Oct","Nov","Dec"],
			  	 weekdaysFull:["Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"],
			  	 weekdaysShort:["Dim","Lun","Mar","Mer","Jeu","Ven","Sam"],
			  	 today:"Aujourd'hui",
			  	 clear:"Effacer",
			  	 close:"Fermer",
			  	 firstDay:1,
			  	 format:"dd mmmm yyyy",
			  	 labelMonthNext:"Mois suivant",
			  	 labelMonthPrev:"Mois précédent",
			  	 labelMonthSelect:"Sélectionner un mois",
			  	 labelYearSelect:"Sélectionner une année"
		  	});
			break;
			
		default:
			$('input.datepicker').pickadate({
			  	 formatSubmit: 'yyyy-mm-dd',
			  	 hiddenName: true,
			  	 monthsFull:["January","February","March","April","May","June","July","August","September","October","November","December"],
			  	 monthsShort:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
			  	 weekdaysFull:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],
			  	 weekdaysShort:["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],
			  	 today:"Today",
			  	 clear:"Clear",
			  	 close:"Close",
			  	 firstDay:0,
			  	 format:"mmmm dd, yyyy",
			  	 labelMonthNext:"Next month",
			  	 labelMonthPrev:"Previous month",
			  	 labelMonthSelect:"Select a month",
			  	 labelYearSelect:"Select a year"
			});
	}
	
	// close mobile menu
	$('.mobile-menu-toggle').on('click', function() {
		$('.ui.labeled.icon.sidebar')
			.sidebar('toggle');		
	});
	
	// style selects
	$('select.selection').dropdown();
	
	// faq accordion
	$('.ui.accordion').accordion();
	
	// close message banner
	$('.message .close').on('click', function() {
    	$(this)
			.closest('.message')
			.transition('fade');
	});
  	
	// ad moderation
	$('.validation-accept-button').on('click', function() {
		var self = this;
		var id = $(this).attr("rel");
		$.post("moderation/", {id: id, accepted: 1}, function(data) {
			if (data == "ok") {
				var that = $(self).parents('.card');
				that.transition({
						animation: 'horizontal flip',
						onComplete: function() {
							console.log("+"+$(this).html())
							that.parent()
								.remove();
						}
					});
			}
		});
	});
	$('.validation-refuse-button').on('click', function() {
		var self = this;
		var id = $(this).attr("rel");
		$.post("moderation/", {id: id, accepted: 0}, function(data) {
			if (data == "ok")
				$(self).parents('.card').transition('horizontal flip').parent().remove();
		});
	});
	
});