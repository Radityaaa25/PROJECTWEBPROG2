# Product Requirements Document (PRD)
## Pengembangan Toko Online

### 1. Ringkasan
Dokumen ini berisi daftar perencanaan fitur tambahan untuk sistem Toko Online yang dibangun menggunakan Laravel 10. Fitur-fitur ini bertujuan untuk meningkatkan fungsionalitas, pelaporan, dan pengalaman pengguna baik di sisi admin maupun customer.

### 2. Daftar Fitur Tambahan

#### 2.1. Dark Mode / Light Mode
* **Deskripsi**: Penambahan opsi bagi pengguna (khususnya admin) untuk mengubah tema antarmuka antara mode gelap dan mode terang.
* **Tujuan**: Meningkatkan kenyamanan visual pengguna saat menggunakan sistem dalam berbagai kondisi pencahayaan.
* **Implementasi**: 
  * Memanfaatkan dukungan tema dari template admin yang sudah ada.
  * Menambahkan *toggle button* pada topbar.
  * Menyimpan preferensi tema pengguna (menggunakan session, local storage, atau database).

#### 2.2. Manajemen Transaksi / Pesanan
* **Deskripsi**: Sistem inti untuk mengelola aliran pesanan dari customer.
* **Tujuan**: Memungkinkan admin melihat, memverifikasi, dan memperbarui status pesanan customer.
* **Implementasi**:
  * Pembuatan tabel database baru: `transaksi` dan `detail_transaksi`.
  * Pembuatan Model, Migration, dan Controller untuk Transaksi.
  * Halaman backend khusus admin dengan fitur manajemen status (Pending, Diproses, Dikirim, Selesai, Dibatalkan).

#### 2.3. Laporan Penjualan
* **Deskripsi**: Fitur *reporting* yang merangkum data penjualan berdasarkan transaksi yang berhasil.
* **Tujuan**: Memberikan insight kepada pemilik toko terkait performa penjualan.
* **Implementasi**:
  * Pembuatan halaman filter laporan berdasarkan rentang tanggal (Start Date - End Date).
  * Menampilkan ringkasan total pendapatan dan produk terjual.
  * Fitur cetak/ekspor laporan ke format PDF (menggunakan DomPDF) atau Excel.

#### 2.4. Integrasi Chatbot AI Admin (Groq API)
* **Deskripsi**: Asisten virtual AI di dashboard admin untuk membantu berbagai pertanyaan terkait pengelolaan toko atau bantuan umum.
* **Tujuan**: Membantu admin mendapatkan informasi instan dan rekomendasi dengan memanfaatkan kecerdasan buatan.
* **Implementasi**:
  * Menggunakan `Illuminate\Support\Facades\Http` bawaan Laravel untuk memanggil API.
  * Membuat halaman atau popup chat UI di backend admin.
  * Menghubungkan ke API Groq untuk merespons *prompt* admin dengan cepat (Low Latency).

#### 2.5. Tampilan Halaman User (Customer Frontend)
* **Deskripsi**: Pembuatan halaman depan (*storefront*) yang dapat diakses oleh publik untuk melihat produk, mengelola keranjang belanja, dan melakukan proses checkout.
* **Tujuan**: Memberikan antarmuka belanja yang interaktif bagi *customer*.
* **Pendekatan Implementasi (Rekomendasi)**:
  * Menggunakan **Laravel Blade** secara penuh agar proses *development* lebih cepat dan tidak over-engineered.
  * Pembuatan struktur layout *frontend* baru terpisah dari layout admin.
  * Implementasi halaman krusial: Beranda, Katalog Produk, Detail Produk, Keranjang (Cart), dan Halaman Checkout.
