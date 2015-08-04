$(function() {
	
	// token for ajax
	$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
		
	// format date on inputs	
	moment.locale(locale);
	$('input.date').each(function(i) {
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
	$('span.calendar').each(function(i) {
	  	var date = $.trim($(this).html());
	  	$(this).html(moment(date).calendar());	
	});
	$('span.date').each(function(i) {
	  	var date = $.trim($(this).html());
	  	$(this).html(moment(date).format('dddd Do MMMM YY'));	
	});
	
	// need to be after locale set up
	$('input.datepicker').pickadate({
		formatSubmit: 'yyyy-mm-dd',
		hiddenName: true,
		min: new Date()
	});
	
	// close mobile menu
	$('.mobile-menu-toggle').on('click', function() {
		$('.ui.labeled.icon.sidebar').sidebar('toggle');		
	});
	
	// style selects
	$('select.selection').dropdown();
	
	// faq accordion
	$('div.accordion').accordion();
	
	// toggle
	$('.ui.checkbox').checkbox();
	
	// close message banner
	$('.message .close').on('click', function() {
    	$(this)
			.closest('.message')
			.transition('fade');
	});
  	
	// ad moderation	
	$('.moderation').on('click', function(e) {
		e.preventDefault();
		var self = this;
		$.get($(self).attr('href')).done(function(data) {
			var that = $(self).parents('.card');
			that.transition({
				animation: 'horizontal flip',
				onComplete: function() {
					that.parent()
						.remove();
				}
			});
		});
	});

	// form validation
	$('form.validation').each(function() {
		var attrs = {};
		
		$(this).find('input[name!="_token"][name!=""], textarea, select').each(function() {
			var name = $(this).attr('name');
			var field = {
				identifier: name,
				rules: []
			};
			
			if ($(this).attr('type') == 'email')
				field.rules.push({
					prompt: trans.validation.email,
					type: 'email',
				});
	
			if ($(this).attr('required'))
				field.rules.push({
					prompt: trans.validation.required,
					type: 'empty',
				});
			else
				field.optional = true;
				
			if (min = $(this).attr('minlength'))
				field.rules.push({
					prompt: trans.validation.minlenght(min),
					type: 'length[' + min + ']',
				});
				
			if (max = $(this).attr('maxlength'))
				field.rules.push({
					prompt: trans.validation.maxlenght(max),
					type: 'maxLength[' + max + ']',
				});				
			
			attrs[name] = field;
		});
		
		$(this).form({
			on: 'blur',
			inline : true,
			fields: attrs,
			templates: {
		       prompt: function(error) {
		          return $('<div class="ui red pointing prompt label transition">'+error+'</div>');
		       }
		    }
		});
	});

	// ad deletion
	$('.ad-delete').on('click', function() {
		$('#confirm-delete').modal('show');
	});

	
});