<?php
namespace App\Http\Controllers;

use App\Models\AssetMaintenance;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AssetMaintenanceController extends Controller
{
    public function create()
    {
        // Mengambil data products dan users untuk ditampilkan di form
        $products = Product::all();
        $users = User::all();

        return view('asset_maintenance.create', compact('products', 'users'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'product_id' => 'required',
            'user_id' => 'required',
            'maintenance_type' => 'required',
            'description' => 'required',
            'maintenance_date' => 'required|date',
        ]);

        // Simpan data ke database
        AssetMaintenance::create([
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'maintenance_type' => $request->maintenance_type,
            'description' => $request->description,
            'maintenance_date' => $request->maintenance_date,
        ]);

        // Redirect atau beri respons sukses
        return redirect()->route('asset-maintenances.index')->with('success', 'Asset Maintenance created successfully!');
    }
}
