@extends('layouts.app')
@section('content')
<div class="container py-4">
  <div class="card shadow-sm">
    <div class="card-header">Edit Inventory</div>
    <div class="card-body">
      <form action="{{ route('inventory.update', $inventory) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label class="form-label">Nama</label>
          <input type="text" name="nama" value="{{ $inventory->nama }}" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Harga</label>
          <input type="number" name="harga" step="0.01" value="{{ $inventory->harga }}" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Stok</label>
          <input type="number" name="stok" value="{{ $inventory->stok }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('inventory.index') }}" class="btn btn-secondary ms-2">Batal</a>
      </form>
    </div>
  </div>
</div>
@endsection