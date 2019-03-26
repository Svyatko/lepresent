<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    public function toArray()
    {
        $data = json_decode($this->value, 'true');
        $data['id'] = $this->id;

        return $data;
    }
}
