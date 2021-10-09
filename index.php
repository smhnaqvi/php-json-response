<?php

/** import library */
require_once "Libraries/Response.php";
require_once "Libraries/Errors.php";

/** library namespace */

use Libraries\Response\Response;
use Libraries\Errors\Errors;

/** sample response data */
$data = new stdClass();
$data->username = "smhnaqvi";
$data->first_name = "syed mohammad hussain";
$data->last_name = "naqvi";
//$data->birth_date = "1998-08-04";


/** create instance for Response
 * pass three arguments
 * 1- success @boolen
 * 2- error @array
 * 3- data @array|@object|@string
 */

$response = new Response();

/** set response data */
$response->setData($data);


/** create instance to handle errors for response */
$errors = new Errors();

/** add error codes to Error instance
 *  use method addErrorCode(int) pass your code as integer
 */
if (!isset($data->username)) $errors->addErrorCode(80050);
if (!isset($data->first_name)) $errors->addErrorCode(80051);
if (!isset($data->last_name)) $errors->addErrorCode(80052);
if (!isset($data->birth_date)) $errors->addErrorCode(80053);


/**
 * you can check errors for your Error instance
 * using method Error::hasError return boolean value
 */
if ($errors->hasError()) {
    $response->setStatus(false);
    $errors->addMessage("user data has empty data", 80304);
    $errors->addMessage("multiple errors", 80405);
}

/**
 * using method Error::getErrorsMessages its return array of errors
 * you can set in your response object
 */
$response->setErrors($errors->getErrorsMessages());

$response->toJson();