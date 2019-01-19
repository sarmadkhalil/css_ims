<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function purchase(){
        return $this->belongsTo('Purchase');
    }
    public function order(){
        return $this->belongsTo('Order');
    }

    protected $fillable = [
        'ProductName', 'PartNumber', 'ProductLabel', 'StartingInventory', 'InventoryRecieved', 'InventoryOnHand', 'MinimumRequired'
    ];
}
