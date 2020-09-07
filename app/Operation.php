<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $table = 'operations';
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    
}
