<?php
namespace App\Http\Controllers;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $items = Inventory::all();
        return view('inventory.index', compact('items'));
    }

    public function create() { return view('inventory.create'); }

    public function store(Request $req)
    {
        $req->validate([ 'nama'=>'required', 'harga'=>'required|numeric', 'stok'=>'required|integer' ]);
        Inventory::create($req->all());
        return redirect()->route('inventory.index');
    }

    public function edit(Inventory $inventory)
    {
        return view('inventory.edit', compact('inventory'));
    }

    public function update(Request $req, Inventory $inventory)
    {
        $req->validate([ 'nama'=>'required', 'harga'=>'required|numeric', 'stok'=>'required|integer' ]);
        $inventory->update($req->all());
        return redirect()->route('inventory.index');
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return redirect()->route('inventory.index');
    }
}