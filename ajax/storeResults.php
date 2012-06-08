<?php

$data = json_decode (stripslashes($_POST['rateResults']), true);
//print $data['rates'][0]['thirtyYearFixed'];
//print $data['response']['today']['thirtyYearFixed'];

foreach ( $data['response'] as $period ) {
	$i = 0;
	foreach ( $period as $title => $currentRate ) {
		$output .= 'Title: '. $title . ', Value: ' . $currentRate . '<br>';
	}
}

print $output;


/* JSON.stringify() format */
/*
{
	"request":{
		"output":"json",
		"callback":"jQuery16406966498368419707_1338316306736"
	},
	"message":{
		"text":"Request successfully processed",
		"code":"0"
	},
	"response":{
		"today":{
			"thirtyYearFixed":"3.58",
			"thirtyYearFixedCount":"18",
			"fifteenYearFixed":"2.88",
			"fifteenYearFixedCount":"14",
			"fiveOneARM":"2.37",
			"fiveOneARMCount":"14"
		},
		"lastWeek":{
			"thirtyYearFixed":"3.66",
			"thirtyYearFixedCount":"897",
			"fifteenYearFixed":"2.98",
			"fifteenYearFixedCount":"759",
			"fiveOneARM":"2.67",
			"fiveOneARMCount":"570"
		}
	}
}
*/
/* Other valid format */
/*
{
	"rates": [
		{
			"thirtyYearFixed": "'+rawData.response.today.thirtyYearFixed+'"
		}
	]
}
*/