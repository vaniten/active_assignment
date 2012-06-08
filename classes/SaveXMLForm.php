<?php
class SaveXMLForm {

	private $_output = '';
	
	public function __construct($postVariable, $postFilename){	
		$name = $this->_sanitize($postVariable);
		$filename = $this->_sanitize($postFilename);
	
		$this->_output .=	'';
		$this->_output .=	'<form method="post">';
		$this->_output .=	'<label id="" for="filename">Enter a filename <br/><small>(less than 100 characters, alphanumeric and "-" only)</small></label><input type="textbox" class="textField" id="filename" name="'.$filename.'"  />';
		$this->_output .=	'<input type="submit" name="'.$name.'" id="saveXMLData" class="button" value="Save Data to XML" /><br/>';
		$this->_output .=	'</form>';
	}

	private function _sanitize($string) {
		return $string;
	}
	
	public function getForm() {
		return $this->_output;
	}
}