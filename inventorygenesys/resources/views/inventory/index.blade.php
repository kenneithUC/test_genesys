@extends('layouts.app')
@section('content')
<div class="container py-4">
<div class="d-flex justify-content-between align-items-center mb-4">
  <h2 class="mb-0">Master Data Inventory</h2>
  <div class="btn-group">
    <a href="{{ route('inventory.create') }}" class="btn btn-success">Tambah Item</a>
    @auth
      <a href="{{ route('purchase.create') }}" class="btn btn-primary">Pembelian</a>
      <a href="{{ route('sale.create') }}" class="btn btn-primary">Penjualan</a>
    @endauth
  </div>
</div>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <div class="table-responsive">
    <table class="table table-hover align-middle">
      <thead class="table-primary">
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Harga</th>
          <th>Stok</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($items as $it)
        <tr>
          <td>{{ $it->id }}</td>
          <td>{{ $it->nama }}</td>
          <td>Rp{{ number_format($it->harga, 2, ',', '.') }}</td>
          <td>{{ $it->stok }}</td>
          <td>
            <a href="{{ route('inventory.edit', $it) }}" class="btn btn-sm btn-outline-warning me-1">Edit</a>
            <form action="{{ route('inventory.destroy', $it) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus item ini?')">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection