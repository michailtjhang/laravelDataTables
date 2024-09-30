@extends('layouts.admin')
@section('css')
@endsection
@section('content')
    <div class="card">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Daftar Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Daftar Product</li>
            </ol>
        </nav>
        <div class="card-body">
            <form action="{{ route('product.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nama">Nama Product</label>
                    <input type="text" name="nama" id="nama"
                        class="form-control @error('nama') is-invalid @enderror" placeholder="Isikan Nama">

                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="harga">Harga Satuan Product</label>
                    <input type="text" inputmode="numeric" name="harga" id="harga"
                        class="form-control @error('harga') is-invalid @enderror" placeholder="Isikan Harga Satuan Product">

                    @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="stok">Stok Product</label>
                    <input type="text" inputmode="numeric" name="stok" id="stok"
                        class="form-control @error('stok') is-invalid @enderror" placeholder="Isikan Harga Satuan Product">

                    @error('stok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
@section('js')
@endsection