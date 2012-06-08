<?php
include('simple_html_dom.php');
class SaveRateXML {

	private $_output = '';
	private $_resultsField;
	private $_filename;
	
	public function __construct($resultsField, $filename){	
		$this->_resultsField = $this->_sanitize($resultsField);
		$this->_filename = $this->_sanitize($filename);
	}

	private function _sanitize($string) {
		return $string;
	}
	
	private function _writeWritXML() {
		$file =  ABSPATH . './saved-results/'.$this->_filename.'.xml';	
		
		$xml = simplexml_load_file($file);
		if($xml !== FALSE) {
			$newType = $xml->addChild('writType');
			$newType->addchild('title', ent2ncr( $_POST['newWritType'] ));							
			$dom = new DOMDocument();
			$dom->preserveWhiteSpace = false;
			$dom->formatOutput = true;
			$dom->loadXML($xml->asXML());
			$success = $dom->save($file);
		}
		else $success = FALSE;
		$success !== FALSE ? $success = TRUE : $success = FALSE;
		
		return $success;
	}	
}
