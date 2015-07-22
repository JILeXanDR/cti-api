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

    /**
     * Точное совпадение
     * @param $string
     * @param $value
     * @return bool
     */
    protected function exact($string, $value)
    {
        return $string === $value;
    }

    /**
     * Сравнить строку с входящими параметрами для фильтрации
     * @param $row
     * @param $params
     * @return bool
     */
    protected function compare($row, $params)
    {
        foreach ($params as $attribute => $value) {

            if (empty($value)) {
                break;
            }

            $existValue = $row[$attribute];

            if ($attribute === 'Name') {
                return $this->like($existValue, $value);
            } else {
                return $this->exact($existValue, $value);
            }
        }

        return true;
    }
}