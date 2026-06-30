<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\Auth;

use App\Models\Kategori;

class FrontendController extends Controller
{
    public function index()
    {
        $produks = Produk::orderBy('id', 'desc')->take(8)->get();
        $kategoris = Kategori::with(['produk' => function($query) {
            $query->orderBy('id', 'desc');
        }])->get()->map(function($kategori) {
            $kategori->setRelation('produk', $kategori->produk->take(4));
            return $kategori;
        });
        return view('frontend.home', compact('produks', 'kategoris'));
    }

    public function katalog()
    {
        $produks = Produk::orderBy('id', 'desc')->paginate(12);
        return view('frontend.katalog', compact('produks'));
    }

    public function detail($id)
    {
        $produk = Produk::findOrFail($id);
        return view('frontend.detail', compact('produk'));
    }

    public function tambahKeranjang(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $qty = $request->input('qty', 1);

        if($qty > $produk->stok) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi.');
        }

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            if(($cart[$id]['qty'] + $qty) > $produk->stok) {
                return redirect()->back()->with('error', 'Stok tidak mencukupi untuk jumlah tersebut.');
            }
            $cart[$id]['qty'] += $qty;
        } else {
            $cart[$id] = [
                "id" => $produk->id,
                "nama_produk" => $produk->nama_produk,
                "harga" => $produk->harga,
                "foto" => $produk->foto,
                "qty" => $qty
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('frontend.keranjang')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function updateKeranjang(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        $qty = $request->input('qty');

        if(isset($cart[$id])) {
            $produk = Produk::find($id);
            if($produk && $qty <= $produk->stok && $qty > 0) {
                $cart[$id]['qty'] = $qty;
                session()->put('cart', $cart);
                return redirect()->route('frontend.keranjang')->with('success', 'Keranjang diperbarui.');
            }
            return redirect()->route('frontend.keranjang')->with('error', 'Stok tidak mencukupi atau jumlah tidak valid.');
        }
        return redirect()->route('frontend.keranjang');
    }

    public function hapusKeranjang($id)
    {
        $cart = session()->get('cart');
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->route('frontend.keranjang')->with('success', 'Produk dihapus dari keranjang.');
    }

    public function keranjang()
    {
        $cart = session()->get('cart', []);
        $totalHarga = 0;
        foreach($cart as $item) {
            $totalHarga += $item['harga'] * $item['qty'];
        }
        return view('frontend.keranjang', compact('cart', 'totalHarga'));
    }

    public function checkout()
    {
        if(!Auth::check()) {
            return redirect()->route('frontend.login')->with('error', 'Silakan login terlebih dahulu untuk checkout.');
        }
        
        $cart = session()->get('cart', []);
        if(count($cart) == 0){
            return redirect()->route('frontend.keranjang')->with('error', 'Keranjang Anda kosong.');
        }
        
        $totalHarga = 0;
        foreach($cart as $item) {
            $totalHarga += $item['harga'] * $item['qty'];
        }
        return view('frontend.checkout', compact('cart', 'totalHarga'));
    }

    public function prosesCheckout(Request $request)
    {
        if(!Auth::check()) {
            return redirect()->route('frontend.login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $request->validate([
            'nama_penerima' => 'required|string|max:255',
            'hp' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        $cart = session()->get('cart', []);
        if(count($cart) == 0){
            return redirect()->route('frontend.keranjang')->with('error', 'Keranjang kosong.');
        }

        $totalHarga = 0;
        foreach($cart as $item) {
            $totalHarga += $item['harga'] * $item['qty'];
        }

        // Generate kode transaksi
        $kode_transaksi = 'TRX-' . strtoupper(uniqid());

        // Create Transaksi
        $transaksi = Transaksi::create([
            'kode_transaksi' => $kode_transaksi,
            'user_id' => Auth::id(),
            'nama_penerima' => $request->nama_penerima,
            'hp' => $request->hp,
            'alamat' => $request->alamat,
            'total_harga' => $totalHarga,
            'status' => 'pending',
            'catatan' => $request->catatan,
        ]);

        // Insert Detail Transaksi & Update Stok
        foreach($cart as $item) {
            DetailTransaksi::create([
                'transaksi_id' => $transaksi->id,
                'produk_id' => $item['id'],
                'jumlah' => $item['qty'],
                'harga' => $item['harga'],
                'subtotal' => $item['harga'] * $item['qty']
            ]);

            // Kurangi stok
            $produk = Produk::find($item['id']);
            if($produk) {
                $produk->stok -= $item['qty'];
                $produk->save();
            }
        }

        // Hapus session keranjang
        session()->forget('cart');

        return redirect()->route('frontend.sukses', $transaksi->kode_transaksi)->with('success', 'Pesanan berhasil dibuat!');
    }

    public function sukses($kode)
    {
        $transaksi = Transaksi::where('kode_transaksi', $kode)->where('user_id', Auth::id())->firstOrFail();
        return view('frontend.sukses', compact('transaksi'));
    }
}
