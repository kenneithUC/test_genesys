<?php
namespace App\Http\Controllers;
use App\Models\Purchase;
use App\Models\Inventory;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function create()
    {
        $items = Inventory::all();
        return view('purchase.create', compact('items'));
    }

    public function store(Request $req)
    {
        $req->validate([ 'inventory_id'=>'required|exists:inventories,id', 'jumlah'=>'required|integer', 'harga_satuan'=>'required|numeric' ]);
        $total = $req->jumlah * $req->harga_satuan;
        $purchase = Purchase::create(array_merge($req->all(), ['total'=>$total]));
        $inv = Inventory::find($req->inventory_id);
        $inv->increment('stok', $req->jumlah);
        return redirect()->route('purchase.slip', $purchase);
    }

    public function slip(Purchase $purchase)
    {
        return view('purchase.slip', compact('purchase'));
    }
}
