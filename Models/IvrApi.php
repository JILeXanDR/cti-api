<?php

class IvrApi extends Api
{
    public function search($params = [])
    {
        $data = json_decode(file_get_contents('ivr.json'), true);

        $tree = $data['tree'];

        $this->data = $tree;
    }
}