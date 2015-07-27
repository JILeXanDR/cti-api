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
}