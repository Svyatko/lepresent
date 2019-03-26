<?php

namespace App\Services;

class SettingService extends Service {
    public function saveJSON(array $array) {
        return \GuzzleHttp\json_encode($array);
    }
}