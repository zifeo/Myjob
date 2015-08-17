var locale = 'en';

var trans = {
	validation: {
		email: "A valid email is required.",
		minlenght: function(min) {
			return "Minimum " + min + " characters required.";
		},
		maxlenght: function(max) {
			return "Maximum " + max + " characters authorized.";
		},
		required: "This field is required."	
	}
};

$(function() {
	$.extend($.fn.pickadate.defaults, {
		monthsFull:["January","February","March","April","May","June","July","August","September","October","November","December"],
		monthsShort:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
		weekdaysFull:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],
		weekdaysShort:["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],
		today:"Today",
		clear:"Clear",
		close:"Close",
		firstDay:0,
		format:"mmmm d, yyyy",
		labelMonthNext:"Next month",
		labelMonthPrev:"Previous month",
		labelMonthSelect:"Select a month",
		labelYearSelect:"Select a year"
	});
});
