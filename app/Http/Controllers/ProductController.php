<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\TransaksiOlahraga;
use Illuminate\Support\Facades\Storage;


class productController extends Controller
{
    public function index()
    {
        $data_produk = Product::all();
        return view('product.product', ['data_produk' => $data_produk]);
    }


    public function product_create()
    {
        return view('product.product_create');
    }

    public function product_user()
    {
        $data_produk = Product::all();
        return view('product.product_user', ['data_produk' => $data_produk]);
    }




    public function show_produk(string $id_produkolahraga)
    {

        $product = Product::findOrFail($id_produkolahraga);


        return view('product.product_show', compact('product'));
    }

    public function product_user_show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.product_user_show', compact('product'));
    }



    public function product_store(Request $request)
    {
        // Atur pesan validasi
        $messages = [
            'nama_produkolahraga.required' => 'Nama produk wajib diisi.',
            'harga_produkolahraga.required' => 'Harga produk wajib diisi.',
            'stok_produkolahraga.required' => 'Stok produk wajib diisi.',
        ];

        // Validasi data dari request
        $validatedData = $request->validate([
            'nama_produkolahraga' => 'required|string|max:255',
            'harga_produkolahraga' => 'required|numeric',
            'stok_produkolahraga' => 'required|integer',
            'img_product ' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
        ], $messages);

        // Jika ada file gambar yang diunggah
        if ($request->hasFile('img_product')) {
            // Mendapatkan nama file dengan ekstensi
            $fileNameWithExt = $request->file('img_product')->getClientOriginalName();
            // Mendapatkan nama file tanpa ekstensi
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Mendapatkan ekstensi file
            $extension = $request->file('img_product')->getClientOriginalExtension();
            // Nama file yang akan disimpan
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            // Simpan file gambar ke folder public/img_product
            $path = $request->file('img_product')->storeAs('public/img', $fileNameToStore);
            // Ubah path menjadi URL
            $validatedData['img_product'] = 'img/' . $fileNameToStore;
        }

        // Simpan data produk ke dalam database
        Product::create($validatedData);

        // Redirect kembali ke halaman index produk dengan pesan sukses
        return redirect()->route('product')->with('success', 'Product ditambahkan');
    }

    public function edit($id_produkolahraga)
    {
        $product = Product::findOrFail($id_produkolahraga);
        return view('product.edit', compact('product'));
    }
    public function update(Request $request, string $id)
    {
        // Temukan produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Validasi data dari request
        $validatedData = $request->validate([
            'nama_produkolahraga' => 'required|string|max:255',
            'harga_produkolahraga' => 'required|numeric',
            'stok_produkolahraga' => 'required|integer',
            'img_product' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
        ], [
            'nama_produkolahraga.required' => 'Nama produk wajib diisi.',
            'harga_produkolahraga.required' => 'Harga produk wajib diisi.',
            'stok_produkolahraga.required' => 'Stok produk wajib diisi.',
            'harga_produkolahraga.numeric' => 'Harga harus berupa angka.',
            'stok_produkolahraga.integer' => 'Stok harus berupa bilangan bulat.',
            'img_product.image' => 'File harus berupa gambar.',
            'img_product.mimes' => 'Format gambar tidak valid. Format yang diperbolehkan: jpeg, png, jpg, gif.',
            'img_product.max' => 'Ukuran gambar tidak boleh melebihi 2MB.',
        ]);

        // Periksa apakah ada file gambar yang diunggah
        if ($request->hasFile('img_product')) {
            // Hapus gambar lama jika ada
            if ($product->img_product) {
                Storage::delete('public/' . $product->img_product);
            }

            // Simpan gambar baru
            $fileNameWithExt = $request->file('img_product')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('img_product')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('img_product')->storeAs('public/img', $fileNameToStore);
            $validatedData['img_product'] = 'img/' . $fileNameToStore;
        }

        // Update data produk ke dalam database
        $product->update($validatedData);

        // Redirect kembali ke halaman index produk dengan pesan sukses
        return redirect()->route('product')->with('success', 'Product updated successfully');
    }

    public function destroy(string $id_produkolaharga)
    {

        $data_product = Product::findOrFail($id_produkolaharga);


        $data_product->delete();


        return redirect()->route('product')->with('success', 'Product deleted successfully');
    }

    public function beli(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
        ]);

        // Temukan produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Dapatkan id_pengguna dari session
        $id_pengguna = session('id_pengguna');

        // Simpan data transaksi olahraga
        $transaction = new TransaksiOlahraga();
        $transaction->id_pengguna = $id_pengguna;
        $transaction->id_produkolahraga = $product->id_produkolahraga;
        $transaction->nama_pemesan = $request->nama;
        $transaction->jumlah = $request->jumlah;
        $transaction->created_at = now();
        $transaction->created_by = $id_pengguna;
        $transaction->updated_at = null;

        $transaction->save();

        // Redirect atau kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Produk berhasil dimasukkan dalam keranjang pembelian. Silahkan tunggu konfirmasi dari Admin');
    }


    public function keranjang()
    {
        // Ambil id_pengguna dari sesi
        $id_pengguna = session('id_pengguna');

        // Ambil transaksi olahraga berdasarkan id_pengguna
        $transaksi_olahraga = TransaksiOlahraga::where('id_pengguna', $id_pengguna)->get();

        // Hitung total produk dalam keranjang
        $total_produk = $transaksi_olahraga->count();

        // Tampilkan view keranjang belanja dan kirimkan data transaksi olahraga, total produk, dan total harga
        return view('product.user_keranjang', compact('transaksi_olahraga', 'total_produk'));
    }
}
