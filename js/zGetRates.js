$(document).ready(function() { 

var rawData;

$('#saveXMLData').click(function(e) {
	e.preventDefault();
	
//	var data = '{"rates": [{"thirtyYearFixed": "'+rawData.response.today.thirtyYearFixed+'"}]}';
	rawData = JSON.stringify(rawData);
	$.post('./ajax/storeResults.php', {rateResults:rawData}, function(returnData) {
//	$.post('./ajax/storeResults.php', {rateResults:data}, function(returnData) {
//		alert('The server said ' + returnData);
		$('<div/>', {
			'class': 'returned-rates',
			html: returnData
		}).appendTo('#rate-results');
	})		
	.success(function() {  })
	.error(function() { alert("error"); });
	
});

$('#get-rates').click(function(e) {
	e.preventDefault();
	$('#rate-results').empty();
	var state = $('#state').val();
	var baseURL = 'http://www.zillow.com/webservice/GetRateSummary.htm?zws-id=X1-ZWz1dcxqzk785n_86zet&output=json&callback=?';
	var URL = baseURL + '&state=' + state;
	$.getJSON(URL, function(data) {
		rawData = data;
		callback(data, state);
	})
	.success(function() {  })
	.error(function() { alert("error"); });
});


function MortgageRates(rates, state) {
	this.thirtyFixed = rates.thirtyYearFixed;
	this.fifteenFixed = rates.fifteenYearFixed;
	this.fiveOneArm = rates.fiveOneARM;
	this.state = state;
	return this;
}

MortgageRates.prototype.prevWeek = function() {
	this.title = 'Previous Weeks Rates (' + this.state + ')';
	return this;
}

MortgageRates.prototype.currentWeek = function() {
	this.title = 'Todays Rates (' + this.state + ')';
	return this;
}

MortgageRates.prototype.display = function() {
	var items = [];
	items.push('<h1>' + this.title + '</h1>');
	items.push('<span class="mortgage-type" id="">thirtyYearFixed</span><span class="mortgage-rate">' + this.thirtyFixed + '%</span><br/>');
	items.push('<span class="mortgage-type" id="">fifteenYearFixed</span><span class="mortgage-rate">' + this.fifteenFixed + '%</span><br/>');
	items.push('<span class="mortgage-type" id="">fiveOneARM</span><span class="mortgage-rate">' + this.fiveOneArm + '%</span><br/><br/>');

	$('<div/>', {
		'class': 'zillow-rates',
		html: items.join('')
	}).appendTo('#rate-results');
}

function callback(data, state) {
	if (data.message.code === '0') {
		var previous = new MortgageRates(data.response.lastWeek, state);
		var current = new MortgageRates(data.response.today, state);
		current.currentWeek().display();
		previous.prevWeek().display();
	}
	else fail(data.message.code);
}

function fail(code) {
	switch(code) {
		case '1':
			output = "Service error-there was a server-side error while processing the request";
			break;
		case '2':
			output = "The specified ZWSID parameter was invalid or not specified in the request";
			break;
		case '3':
			output = "Web services are currently unavailable";
			break;
		case '4':
			output = "The API call is currently unavailable";
			break;	
		case '500':
			output = "Rate data unavailable";
			break;	
		case '501':
			output = "Invalid state abbreviation specified";
			break;	
		default:
			output = "Everything is fine";
	}
	alert(output);
}

});

