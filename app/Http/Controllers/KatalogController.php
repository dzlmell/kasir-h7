<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class KatalogController extends Controller
{
    public function index(Request $request): View
    {
        // 1. Pindahkan array data demo ke dalam method index()
        $produk = [
            [
                'id' => 1,
                'nama' => 'Kopi Ende',
                'kategori' => 'Minuman',
                'harga' => 15000,
                'stok' => 12,
            ],
            [
                'id' => 2,
                'nama' => 'Roti Cokelat',
                'kategori' => 'Makanan',
                'harga' => 8000,
                'stok' => 0,
            ],
            [
                'id' => 3,
                'nama' => 'Brownies',
                'kategori' => 'Makanan',
                'harga' => 12000,
                'stok' => 5,
            ],
            [
                'id' => 4,
                'nama' => 'Teh Manis',
                'kategori' => 'Minuman',
                'harga' => 5000,
                'stok' => 20,
            ]
        ];

        // 2. Tangkap kata kunci pencarian dari URL (?q=...)
        $q = $request->input('q', '');

        // 3. Filter array produk jika kata kunci pencarian diisi
        if ($q !== '') {
            $produk = array_filter($produk, function ($item) use ($q) {
                return stripos($item['nama'], $q) !== false;
            });
        }

        // 4. Kirim variabel $produk dan $q ke view
        return view('katalog.index', compact('produk', 'q'));
    }
}