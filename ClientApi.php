<?php

require_once 'Api.php';

class ClientApi extends Api
{
    public function search($params = [])
    {
        //parent::search($params);

        $clients = file_get_contents('clients.json');

        $json = json_decode($clients, true);

        $clients = $json['items'];

        foreach ($clients as $client) {

            if ($client['id'] == $params['id']) {
                $this->data[] = $client;
            }
        }
    }
}