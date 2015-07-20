<?php

ini_set('display_errors', true);

if (empty($_REQUEST['search'])) {
    die('api');
}

$searchType = $_REQUEST['search'];

require_once 'Api.php';
require_once 'ClientApi.php';

$api = new ClientApi();

$api->search($_REQUEST);

echo $api->getResponse();