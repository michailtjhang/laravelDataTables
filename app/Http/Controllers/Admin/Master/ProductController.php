<?php

namespace App\Http\Controllers\Admin\Master;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\PermissionRole;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $data['product'] = Product::get();
        return view('admin.master.product.index', [
            'data' => $data,
            'page_title' => 'Daftar Product',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.master.product.create', [
            'page_title' => 'Tambah Daftar Product',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required | min:3 | string',
                'harga' => 'required | min:4 | numeric',
                'stok' => 'required | min:1 | numeric',
            ],
            [
                'nama.required' => 'Masukan Nama Product',
                'harga.required' => 'Masukan Harga Product',
                'stok.required' => 'Masukan Stok Product',
            ]
        );

        $dataProduct = Product::latest()->first();
        $Code = 'PD';

        if ($dataProduct == null) {
            $kodeProduct = $Code . '0001';
        } else {
            $kode = substr($dataProduct->id_product, 2, 4) + 1;
            $kode = str_pad($kode, 4, '0', STR_PAD_LEFT);
            $kodeProduct = $Code . $kode;
        }

        Product::create([
            'id_product' => $kodeProduct,
            'name_product' => $request->nama,
            'harga_satuan' => $request->harga,
            'stok_product' => $request->stok,
        ]);

        return redirect('/product')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataProduct = Product::where('id', $id)->first();

        return view('admin.master.product.edit', [
            'page_title' => 'Edit Daftar Product',
            'data' => $dataProduct,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama' => 'required | min:3 | string',
                'harga' => 'required | min:4 | numeric',
                'stok' => 'required | min:1 | numeric',
            ],
            [
                'nama.required' => 'Masukan Nama Product',
                'harga.required' => 'Masukan Harga Product',
                'stok.required' => 'Masukan Stok Product',
            ]
        );

        Product::where('id', $id)->update([
            'name_product' => $request->nama,
            'harga_satuan' => $request->harga,
            'stok_product' => $request->stok,
        ]);

        return redirect('/product')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/product')->with('success', 'Product deleted successfully');
    }
}