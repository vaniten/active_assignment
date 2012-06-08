<?php
class StateRateSearch {

	private $_output = '';

	public function __construct($resultsField){	
		$this->_output .=	'<h3>Select a state to view rates</h3>';
		$this->_output .=	'<form method="post">';
		$this->_output .=	"<p><select id='state' name='state'>";
		$this->_output .=	"<option ".$statesSelArray[0]." value='AL'>Alabama</option>";	
		$this->_output .=	"<option ".$statesSelArray[1]." value='AK'>Alaska</option>";	
		$this->_output .=	"<option ".$statesSelArray[2]." value='AZ'>Arizona</option>";	
		$this->_output .=	"<option ".$statesSelArray[3]." value='AR'>Arkansas</option>";	
		$this->_output .=	"<option ".$statesSelArray[4]." value='CA'>California</option>";	

		$this->_output .=	"<option ".$statesSelArray[5]." value='CO'>Colorado</option>";	
		$this->_output .=	"<option ".$statesSelArray[6]." value='CT'>Connecticut</option>";	
		$this->_output .=	"<option ".$statesSelArray[7]." value='DE'>Delaware</option>";	
		$this->_output .=	"<option ".$statesSelArray[8]." value='DC'>District of Columbia</option>";	
		$this->_output .=	"<option ".$statesSelArray[9]." value='FL'>Florida</option>";	

		$this->_output .=	"<option ".$statesSelArray[10]." value='GA'>Georgia</option>";	
		$this->_output .=	"<option ".$statesSelArray[11]." value='HI'>Hawaii</option>";	
		$this->_output .=	"<option ".$statesSelArray[12]." value='ID'>Idaho</option>";	
		$this->_output .=	"<option ".$statesSelArray[13]." value='IL'>Illinois</option>";	
		$this->_output .=	"<option ".$statesSelArray[14]." value='IN'>Indiana</option>";	

		$this->_output .=	"<option ".$statesSelArray[15]." value='IA'>Iowa</option>";	
		$this->_output .=	"<option ".$statesSelArray[16]." value='KS'>Kansas</option>";	
		$this->_output .=	"<option ".$statesSelArray[17]." value='KY'>Kentucky</option>";	
		$this->_output .=	"<option ".$statesSelArray[18]." value='LA'>Louisiana</option>";	
		$this->_output .=	"<option ".$statesSelArray[19]." value='ME'>Maine</option>";	

		$this->_output .=	"<option ".$statesSelArray[20]." value='MD'>Maryland</option>";	
		$this->_output .=	"<option ".$statesSelArray[21]." value='MA'>Massachusetts</option>";	
		$this->_output .=	"<option ".$statesSelArray[22]." value='MI'>Michigan</option>";	
		$this->_output .=	"<option ".$statesSelArray[23]." value='MN'>Minnesota</option>";	
		$this->_output .=	"<option ".$statesSelArray[24]." value='MS'>Mississippi</option>";	

		$this->_output .=	"<option ".$statesSelArray[25]." value='MO'>Missouri</option>";	
		$this->_output .=	"<option ".$statesSelArray[26]." value='MT'>Montana</option>";	
		$this->_output .=	"<option ".$statesSelArray[27]." value='NE'>Nebraska</option>";	
		$this->_output .=	"<option ".$statesSelArray[28]." value='NV'>Nevada</option>";	
		$this->_output .=	"<option ".$statesSelArray[29]." value='NH'>New Hampshire</option>";	

		$this->_output .=	"<option ".$statesSelArray[30]." value='NJ'>New Jersey</option>";	
		$this->_output .=	"<option ".$statesSelArray[31]." value='NM'>New Mexico</option>";	
		$this->_output .=	"<option ".$statesSelArray[32]." value='NY'>New York</option>";	
		$this->_output .=	"<option ".$statesSelArray[33]." value='NC'>North Carolina</option>";	
		$this->_output .=	"<option ".$statesSelArray[34]." value='ND'>North Dakota</option>";	

		$this->_output .=	"<option ".$statesSelArray[35]." value='OH'>Ohio</option>";	
		$this->_output .=	"<option ".$statesSelArray[36]." value='OK'>Oklahoma</option>";	
		$this->_output .=	"<option ".$statesSelArray[37]." value='OR'>Oregon</option>";	
		$this->_output .=	"<option ".$statesSelArray[38]." value='PA'>Pennsylvania</option>";	
		$this->_output .=	"<option ".$statesSelArray[39]." value='RI'>Rhode Island</option>";	

		$this->_output .=	"<option ".$statesSelArray[40]." value='SC'>South Carolina</option>";	
		$this->_output .=	"<option ".$statesSelArray[41]." value='SD'>South Dakota</option>";	
		$this->_output .=	"<option ".$statesSelArray[42]." value='TN'>Tennessee</option>";	
		$this->_output .=	"<option ".$statesSelArray[43]." value='TX'>Texas</option>";	
		$this->_output .=	"<option ".$statesSelArray[44]." value='UT'>Utah</option>";	

		$this->_output .=	"<option ".$statesSelArray[45]." value='VT'>Vermont</option>";	
		$this->_output .=	"<option ".$statesSelArray[46]." value='VA'>Virginia</option>";	
		$this->_output .=	"<option ".$statesSelArray[47]." value='WA'>Washington</option>";	
		$this->_output .=	"<option ".$statesSelArray[48]." value='WV'>West Virginia</option>";	
		$this->_output .=	"<option ".$statesSelArray[49]." value='WI'>Wisconsin</option>";	
		$this->_output .=	"<option ".$statesSelArray[50]." value='WY'>Wyoming</option>";	

		$this->_output .=	"</select>";	
		$this->_output .=	'<input type="submit" name="get-rates" id="get-rates" class="button" value="Get Rates" />';
		$this->_output .=	'</form>';
		$this->_output .=	'<div id="'.$resultsField.'"></div>';
	}
	
	public function getForm() {
		return $this->_output;
	}
}

