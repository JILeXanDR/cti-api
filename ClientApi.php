<?php

require_once 'Api.php';

class ClientApi extends Api
{
    public function search($params = [])
    {
        $json = json_decode(file_get_contents('data.json'), true);

        $this->data = $json['clients'];

        foreach ($this->data as $key => $client) {
            if (!$this->compare($client, $params)) {
                unset($this->data[$key]);
            }
        }
    }

    private function compare($row, $params)
    {
        foreach ($params as $name => $value) {

            if (empty($value)) {
                break;
            }

            if (!empty($row[$name]) && ($row[$name] != $value)) {
                return false;
            }
        }

        return true;
    }
}