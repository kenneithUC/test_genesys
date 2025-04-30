<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Inventory;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function create()
    {
        $items = Inventory::all();
        return view('sale.create', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'inventory_id' => 'required|exists:inventories,id',
            'jumlah'       => 'required|integer|min:1',
            'harga_satuan' => 'required|numeric|min:0',
        ]);


        $total = $request->jumlah * $request->harga_satuan;

        
        $sale = Sale::create([
            'inventory_id' => $request->inventory_id,
            'jumlah'       => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'total'        => $total,
        ]);

        
        Inventory::find($request->inventory_id)
                 ->decrement('stok', $request->jumlah);

        return redirect()
               ->route('sale.slip', $sale)
               ->with('success', 'Transaksi penjualan berhasil.');
    }

    public function slip(Sale $sale)
    {
        return view('sale.slip', compact('sale'));
    }
}
