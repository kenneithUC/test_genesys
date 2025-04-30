<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = ['nama', 'harga', 'stok'];

    public function purchases() { return $this->hasMany(Purchase::class); }
    public function sales()     { return $this->hasMany(Sale::class); }
}

