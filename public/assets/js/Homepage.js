'use strict'

var Homepage = function()
{
	// Les départs

	this.departureCountry = $("#departure-country-search");
	this.departureCity = $("#departure-city-search");
	this.departureAirport = $("#departure-airport-search");

	// les arrivées

	this.arrivalCountry = $("#arrival-country-search");
	this.arrivalCity = $("#arrival-city-search");
	this.arrivalAirport = $("#arrival-airport-search");

	// la recherche

	this.search = $("#search")
};

Homepage.prototype.run = function()
{

	// Les départs

	this.departureCity.on('change',this.onSelectDepartureCity.bind(this));	
	this.departureCountry.on('change', this.onSelectDepartureCountry.bind(this));
	
	this.departureCity.parent().hide();
	this.departureAirport.parent().hide();

	// Les arrivées

	this.arrivalCity.on('change',this.onSelectArrivalCity.bind(this));	
	this.arrivalCountry.on('change', this.onSelectArrivalCountry.bind(this));
	
	this.arrivalCity.parent().hide();
	this.arrivalAirport.parent().hide();




	// quand l'utilisateur cliquera sur le bouton rechercher
	this.search.on('click', this.onSearch.bind(this));
	

	$("#city-search").trigger('change');
};


	// Les départs
Homepage.prototype.onSelectDepartureCountry = function(event)
{
	this.departureCity.parent().show();

	$("#departure-city-search option:not(.nohide)").hide();
	$("#departure-city-search option[data-departureCountry='"+this.departureCountry.val()+"']").show();
	$("#departure-city-search option[data-departureCountry='"+this.departureCountry.val()+"']").prop('selected', true);
};


Homepage.prototype.onSelectDepartureCity = function(event)
{
	this.departureAirport.parent().show();

	$("#departure-airport-search option:not(.nohide)").hide();
	$("#departure-airport-search option[data-departureCity='"+this.departureCity.val()+"']").show();
	$("#departure-airport-search option[data-departureCity='"+this.departureCity.val()+"']").prop('selected', true);
};


	// Les arrivées
Homepage.prototype.onSelectArrivalCountry = function(event)
{
	this.arrivalCity.parent().show();

	$("#arrival-city-search option:not(.nohide)").hide();
	$("#arrival-city-search option[data-arrivalCountry='"+this.arrivalCountry.val()+"']").show();
	$("#arrival-city-search option[data-arrivalCountry='"+this.arrivalCountry.val()+"']").prop('selected', true);
};


Homepage.prototype.onSelectArrivalCity = function(event)
{
	this.arrivalAirport.parent().show();

	$("#arrival-airport-search option:not(.nohide)").hide();
	$("#arrival-airport-search option[data-arrivalCity='"+this.arrivalCity.val()+"']").show();
	$("#arrival-airport-search option[data-arrivalCity='"+this.arrivalCity.val()+"']").prop('selected', true);
};




Homepage.prototype.onSearch = function() 
{
	$.get('searchflight', 
		{
			departureAirport : this.departureAirport.val(),
		}, 
		function(retour){
			$("#show_flights").html(retour);
		}
	);
};