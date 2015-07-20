<?php

ini_set('display_errors', true);

require_once 'ClientApi.php';

$request = $_REQUEST;

if (empty($request['search'])) {
    include 'example.html';
    exit;
}

$searchType = $request['search'];

unset($request['search']);

$params = $request;

$api = new ClientApi();

$api->search($params);

echo $api->getResponse();