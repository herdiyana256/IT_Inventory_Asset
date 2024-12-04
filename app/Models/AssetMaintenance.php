<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetMaintenance extends Model
{
    use HasFactory;

    protected $table = 'asset_maintenance';

    public $timestamps = true;

    protected $fillable = [
        'product_id',      // ID produk yang terkait, perbaiki di sini
        'user_id',         // ID pengguna yang terkait
        'maintenance_type', // Jenis pemeliharaan (misalnya: perbaikan, penggantian)
        'description',      // Deskripsi pemeliharaan
        'maintenance_date', // Tanggal pemeliharaan
    ];

    // Mendefinisikan relasi ke produk (product) dan pengguna (user)
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');  // Menghubungkan dengan tabel products
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');  // Menghubungkan dengan tabel users
    }
}
