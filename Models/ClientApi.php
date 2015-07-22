<?php

require_once 'Api.php';

class ClientApi extends Api
{
    public function search($params = [])
    {
        $data = json_decode(file_get_contents('data.json'), true);

        $clients = $data['clients'];

        foreach ($clients as $key => $client) {
            if ($this->compare($client, $params)) {
                $this->data[] = $client;
            }
        }
    }
}