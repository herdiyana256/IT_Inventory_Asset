<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Relasi antara Product dan AssetMaintenance
    public function assetMaintenances()
    {
        return $this->hasMany(AssetMaintenance::class);
    }
}
