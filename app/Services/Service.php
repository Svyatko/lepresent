<?php

namespace App\Services;

class Service {
    public function isVip($is_vip)
    {
        return ($is_vip === 'on') ? true : false;
    }
}