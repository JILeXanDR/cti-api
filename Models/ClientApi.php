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

    /**
     * Сравнить строку с входящими параметрами для фильтрации
     * @param $row
     * @param $filters
     * @return bool
     */
    protected function compare($row, $filters)
    {
        foreach ($filters as $attribute => $value) {

            if (empty($value) || empty($row[$attribute])) {
                continue;
            }

            $existValue = $row[$attribute];

            switch ($attribute) {
                case 'Name':
                    $res = $this->like($existValue, $value);
                    break;
                default:
                    $res = $this->exact($existValue, $value);
            }

            if (!$res) {
                return false;
            }
        }

        return true;
    }
}