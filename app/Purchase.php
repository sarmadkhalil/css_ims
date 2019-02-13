<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function supplier(){
        return $this->hasMany('Supplier');
    }
    public function product(){
        return $this->hasMany('Products');
    }
    


}
