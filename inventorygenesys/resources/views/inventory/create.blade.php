@extends('layouts.app')
@section('content')
<div class="container py-4">
  <div class="card shadow-sm">
    <div class="card-header">Tambah Inventory</div>
    <div class="card-body">
      <form action="{{ route('inventory.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label class="form-label">Nama</label>
          <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Harga</label>
          <input type="number" name="harga" step="0.01" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Stok</label>
          <input type="number" name="stok" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('inventory.index') }}" class="btn btn-secondary ms-2">Batal</a>
      </form>
    </div>
  </div>
</div>
@endsection