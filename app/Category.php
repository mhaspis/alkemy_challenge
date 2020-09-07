<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    
    public function operation(){
        return $this->hasMany(Operation::class, 'category_id');
    }
}
