@extends('layouts.app')
@section('content')
<div class="container py-4">
  <div class="card shadow-sm">
    <div class="card-header">Transaksi Penjualan</div>
    <div class="card-body">
      <form action="{{ route('sale.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label class="form-label">Barang</label>
          <select name="inventory_id" class="form-select" required>
            @foreach($items as $it)
            <option value="{{ $it->id }}">{{ $it->nama }} (Stok: {{ $it->stok }})</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Jumlah</label>
          <input type="number" name="jumlah" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Harga Satuan</label>
          <input type="number" name="harga_satuan" step="0.01" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('inventory.index') }}" class="btn btn-secondary ms-2">Batal</a>
      </form>
    </div>
  </div>
</div>
@endsection
