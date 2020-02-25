<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public function getFullNameAttribute(){
        return "{$this->first_name} {$this->second_name}";
    }
}
