<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\User;
use App\Models\Transaksi;

class ChatbotController extends Controller
{
    public function index()
    {
        return view('backend.chatbot.index');
    }

    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        $message = $request->input('message');

        $produks = Produk::all();
        $totalProduk = $produks->count();
        $totalKategori = Kategori::count();
        $totalUser = User::count();
        $totalTransaksi = Transaksi::count();

        $statistikKonteks = "Statistik Database Saat Ini:\n"
            . "- Jumlah Kategori: {$totalKategori}\n"
            . "- Jumlah Produk: {$totalProduk}\n"
            . "- Jumlah User: {$totalUser}\n"
            . "- Jumlah Transaksi: {$totalTransaksi}\n\n";

        $dataProdukText = "";
        if ($totalProduk > 0) {
            foreach ($produks as $p) {
                $dataProdukText .= "- {$p->nama_produk} (Harga: Rp " . number_format($p->harga, 0, ',', '.') . ", Stok: {$p->stok})\n";
            }
        } else {
            $dataProdukText = "Saat ini belum ada produk di database.\n";
        }

        try {
            $response = Http::withToken(env('GROQ_API_KEY'))
                ->post('https://api.groq.com/openai/v1/chat/completions', [
                    'model' => 'qwen/qwen3-32b', 
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => "Anda adalah asisten AI toko online. Balaslah HANYA dengan respon langsung kepada pengguna, JANGAN tampilkan proses berpikir internal (internal thought process) atau narasi berbahasa Inggris. Selalu gunakan Bahasa Indonesia dan sapa pengguna dengan panggilan 'Halo Admin'.\n\n" . $statistikKonteks . "Berikut adalah data produk yang ada di toko Anda saat ini:\n\n" . $dataProdukText
                        ],
                        [
                            'role' => 'user',
                            'content' => $message
                        ]
                    ],
                    'temperature' => 0.7,
                ]);

            if ($response->successful()) {
                $reply = $response->json()['choices'][0]['message']['content'] ?? 'Maaf, saya tidak mengerti.';
                
                // Cek dan hapus jika model (seperti Qwen/Deepseek) secara tidak sengaja memunculkan block <think>
                $reply = preg_replace('/<think>.*?<\/think>/is', '', $reply);
                
                return response()->json(['reply' => trim($reply)]);
            } else {
                return response()->json(['reply' => 'Terjadi kesalahan saat menghubungi API: ' . $response->body()], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['reply' => 'Error: ' . $e->getMessage()], 500);
        }
    }
}
