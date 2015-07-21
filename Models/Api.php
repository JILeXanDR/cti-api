<?php

abstract class Api
{
    protected $data = [];

    abstract public function search($params = []);

    public function getResponse()
    {
        header('Content-Type: application/json');

        return json_encode($this->data);
    }

    protected function like($string, $like)
    {
        return stripos($string, $like) !== false;
    }

    protected function compare($row, $params)
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