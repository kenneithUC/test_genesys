@extends('layouts.app')
@section('content')
<div class="container py-4">
  <div class="card shadow-sm">
    <div class="card-header">Slip Pembelian</div>
    <div class="card-body">
      <p><strong>Transaksi #:</strong> {{ str_pad($purchase->id, 5, '0', STR_PAD_LEFT) }}</p>
      <p><strong>Barang:</strong> {{ $purchase->inventory->nama }}</p>
      <p><strong>Jumlah:</strong> {{ $purchase->jumlah }}</p>
      <p><strong>Harga Satuan:</strong> Rp{{ number_format($purchase->harga_satuan,2,',','.') }}</p>
      <p><strong>Total:</strong> Rp{{ number_format($purchase->total,2,',','.') }}</p>
      <p><strong>Tanggal:</strong> {{ $purchase->created_at }}</p>
      <a href="{{ route('inventory.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
  </div>
</div>
@endsection
