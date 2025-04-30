@extends('layouts.app')
@section('content')
<div class="container py-4">
  <div class="card shadow-sm">
    <div class="card-header">Slip Penjualan</div>
    <div class="card-body">
      <p><strong>Transaksi #:</strong> {{ str_pad($sale->id, 5, '0', STR_PAD_LEFT) }}</p>
      <p><strong>Barang:</strong> {{ $sale->inventory->nama }}</p>
      <p><strong>Jumlah:</strong> {{ $sale->jumlah }}</p>
      <p><strong>Harga Satuan:</strong> Rp{{ number_format($sale->harga_satuan,2,',','.') }}</p>
      <p><strong>Total:</strong> Rp{{ number_format($sale->total,2,',','.') }}</p>
      <p><strong>Tanggal:</strong> {{ $sale->created_at }}</p>
      <a href="{{ route('inventory.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
  </div>
</div>
@endsection