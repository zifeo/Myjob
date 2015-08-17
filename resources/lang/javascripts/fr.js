var locale = 'fr';

var trans = {
	validation: {
		email: "Un email valide est requis.",
		minlenght: function(min) {
			return "Minimum " + min + " caractères requis.";
		},
		maxlenght: function(max) {
			return "Maximum " + max + " caractères autorisés.";
		},
		required: "Ce champs est requis."	
	}
};

$(function() {
	$.extend($.fn.pickadate.defaults, {
		monthsFull:["janvier","février","mars","avril","mai","juin","juillet","août","septembre","octobre","novembre","décembre"],
		monthsShort:["Jan","Fev","Mar","Avr","Mai","Juin","Juil","Aou","Sep","Oct","Nov","Dec"],
		weekdaysFull:["Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"],
		weekdaysShort:["Dim","Lun","Mar","Mer","Jeu","Ven","Sam"],
		today:"Aujourd'hui",
		clear:"Effacer",
		close:"Fermer",
		firstDay:1,
		format:"d mmmm yyyy",
		labelMonthNext:"Mois suivant",
		labelMonthPrev:"Mois précédent",
		labelMonthSelect:"Sélectionner un mois",
		labelYearSelect:"Sélectionner une année"
	});
});