<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['inventory_id','jumlah','harga_satuan','total'];

    public function inventory() { return $this->belongsTo(Inventory::class); }
}

