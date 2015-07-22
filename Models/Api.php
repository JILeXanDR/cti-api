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
     * @param $filters
     * @return bool
     */
    protected function compare($row, $filters)
    {
        foreach ($filters as $attribute => $value) {

            if (empty($value)) {
                continue;
            }

            $existValue = $row[$attribute];

            if ($attribute === 'Name') {
                $res = $this->like($existValue, $value);
            } else {
                $res = $this->exact($existValue, $value);
            }

            if (!$res) {
                return false;
            }
        }

        return true;
    }
}