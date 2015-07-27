<?php

header('Access-Control-Allow-Origin: *');
ini_set('display_errors', true);

require_once 'Models/ClientApi.php';
require_once 'Models/IvrApi.php';

$request = $_REQUEST;

if (empty($request['search'])) {
    include 'example.html';
    exit;
}

$searchType = $request['search'];
unset($request['search']);
$params = $request;

try {

    switch ($searchType) {
        case 'clients':
            $api = new ClientApi();
            break;
        case 'ivr':
            $api = new IvrApi();
            break;
        default:
            http_response_code(404);
            throw new Exception("404");
    }

    $api->search($params);
    echo $api->getResponse();
} catch (Exception $e) {
    echo $e->getMessage();
}