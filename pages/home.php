<?php
include './classes/StateRateSearch.php';
include './classes/SaveXMLForm.php';


$resultsField = 'rate-results';

$stateRateSearch = new StateRateSearch($resultsField);
$form = $stateRateSearch->getForm();
echo $form;

$postVariable = 'writeXML';
$postFilename = 'filename';
$saveXMLForm = new SaveXMLForm($postVariable, $postFilename);
$form = $saveXMLForm->getForm();
echo $form;


?>