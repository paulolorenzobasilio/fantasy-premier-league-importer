<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['first_name', 'second_name', 'form', 'total_points', 'influence', 'creativity', 'threat', 'ict_index'];
    
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->second_name}";
    }
}
