<?php

ini_set('display_errors', true);

$request = $_REQUEST;

if (empty($request['search'])) {
    include 'example.html';
    exit;
}

$searchType = $request['search'];

unset($request['search']);

$params = $request;

require_once 'Api.php';
require_once 'ClientApi.php';

$api = new ClientApi();

$api->search($params);

echo $api->getResponse();