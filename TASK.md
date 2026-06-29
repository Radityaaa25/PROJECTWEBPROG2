# Catatan Pengerjaan Fitur (TASK.md)

File ini berisi catatan lengkap dari seluruh aktivitas, penulisan kode, penambahan fitur, dan perbaikan *bug* yang telah dilakukan untuk menyelesaikan target pengembangan Aplikasi Toko Online.

---

## 1. Persiapan & Setup
- **Action**: Membuat file `TASK.md` sebagai jurnal.
- **Lokasi File**: `d:\PROJECT RADIT\Toko_online-Laravel\TASK.md`
- **Tujuan**: Untuk mencatat histori pekerjaan agar mudah dilacak, dipelajari, dan dikembangkan lebih lanjut.

---

## 2. Fitur Backend & Akses Admin

### 2.1 Tema Gelap & Terang (Dark Mode / Light Mode)
- **Tujuan**: Memberikan opsi tampilan yang nyaman bagi admin.
- **Lokasi File**: `resources/views/backend/v_layouts/app.blade.php`
- **Perubahan**:
  - Menambahkan *block* CSS kustom (`<style>`) di dalam tag `<head>` untuk kelas `.dark-mode` (Baris 24-62).
  - Menambahkan *button toggle* berlogo matahari/bulan pada navbar atas (Baris 149-157).
  - Menambahkan *script* JavaScript yang memanfaatkan `localStorage` di bagian bawah halaman untuk merekam preferensi mode dan menerapkannya secara dinamis (Baris 418-444).

### 2.2 Integrasi Chatbot AI Admin (Groq API)
- **Tujuan**: Membangun asisten AI berbentuk *Floating Bubble* di halaman *Backend*.
- **Lokasi File & Perubahan**:
  - `app/Http/Controllers/ChatbotController.php`: Membuat *controller* untuk memproses *prompt* menggunakan `Http::withToken` ke *endpoint* API Groq (`qwen3-32b`).
  - `routes/web.php` (Baris 65-66): Mendaftarkan rute `backend/chatbot` (GET) dan `backend/chatbot/chat` (POST).
  - `resources/views/backend/v_layouts/app.blade.php`:
    - Menghapus link *sidebar* Chatbot yang lama.
    - Membuat elemen UI *Floating Chat Bubble* (`#chatbot-bubble` & `#chatbot-window`) di pojok kanan bawah yang dapat di-klik dan di-*drag*.
    - Memasukkan logika Fetch API (AJAX) untuk pengiriman pesan secara *real-time* tanpa perlu me-*reload* halaman.
  - **Peningkatan Konteks**: Memodifikasi `ChatbotController.php` (Baris 24-34) dengan menginjeksi jumlah Kategori, Produk, User, dan Transaksi langsung dari *Database* ke dalam *system prompt* agar AI dapat menjawab pertanyaan kuantitatif statistik.

### 2.3 Pemisahan Sistem Autentikasi
- **Tujuan**: Menghindari percampuran *login* pelanggan dengan halaman admin.
- **Lokasi File & Perubahan**:
  - `app/Http/Controllers/LoginController.php`: Menambahkan method `loginFrontend`, `authenticateFrontend`, `logoutFrontend`, `registerFrontend`, dan `storeRegisterFrontend`. Menerapkan validasi `role` (Admin = 0/1 hanya backend, Customer = 2 hanya frontend).
  - `routes/web.php` (Baris 25-29): Memisahkan rute POST dan GET untuk login publik ke `/login` dan login admin tetap di `backend/login`.

---

## 3. Fitur Frontend & Akses Pelanggan

### 3.1 Perombakan UI Publik (Tema Glassmorphism)
- **Tujuan**: Membuat tampilan toko (*Frontend*) yang modern dan estetik.
- **Lokasi File & Perubahan**:
  - **Layout Utama** (`resources/views/frontend/layouts/app.blade.php`): Mendesain *navbar* mengambang (*floating*) dan kartu transparan dengan efek *blur* (*Glassmorphism*). Menggunakan jenis huruf *Outfit* dari Google Fonts.
  - **Navbar Interaktif** (`app.blade.php`): Menyesuaikan kondisi tombol. Jika belum masuk, tombol bertuliskan "Login Pelanggan". Jika sudah masuk, berganti menjadi "Halo, [Nama]" beserta tombol Logout.

### 3.2 Halaman & Fungsionalitas Belanja
- **Tujuan**: Menyediakan pengalaman belanja dari melihat hingga membayar.
- **Lokasi File & Perubahan**:
  - **Beranda** (`resources/views/frontend/home.blade.php`): Menampilkan *Hero Section* dan daftar produk unggulan/terbaru (maksimal 8 produk).
  - **Katalog** (`resources/views/frontend/katalog.blade.php`): Menampilkan semua produk dengan fitur *pagination* halaman.
  - **Detail Produk** (`resources/views/frontend/detail.blade.php`): Menampilkan informasi stok, harga, deskripsi, dan tombol "Tambah ke Keranjang".
  - **Keranjang Belanja** (`resources/views/frontend/keranjang.blade.php`): Sistem keranjang menggunakan basis `session()` Laravel agar produk tersimpan sementara. Dilengkapi fitur *update* kuantitas dan hapus item.
  - **Checkout** (`resources/views/frontend/checkout.blade.php` & `FrontendController@prosesCheckout`): Menampilkan rincian pesanan dan form alamat pengiriman. Sistem otomatis mencatat data ke tabel `transaksi` dan `detail_transaksi`, kemudian memotong `stok` produk secara akurat.

---

## 4. Perbaikan Bug Kritis & Optimasi (Hotfixes)

### 4.1 Registrasi User Baru (ENUM Role)
- **Gejala**: Pengguna yang baru mendaftar mendadak memiliki peran sebagai Super Admin.
- **Penyebab**: Kesalahan tipe data pada *array mapping*. MySQL membaca angka `2` (*integer*) sebagai *index* ENUM urutan kedua (Super Admin), bukan sebagai *value* teks `'2'`.
- **Lokasi Perbaikan**: `app/Http/Controllers/LoginController.php`.
- **Perubahan**: Mengubah kode `role => 2` menjadi `role => '2'` (*string*) di dalam blok penambahan *user* baru.

### 4.2 Error Rute `/backend` (404 Not Found)
- **Gejala**: Mengakses `localhost:8000/backend` menampilkan halaman 404, tidak mengarah ke *login*.
- **Lokasi Perbaikan**: `routes/web.php` (Baris 32).
- **Perubahan**: Menambahkan kode `Route::redirect('/backend', '/backend/beranda');`. Jika pengguna belum *login*, *middleware auth* akan otomatis melemparnya ke halaman *login* admin.

### 4.3 Broken Image Profil Admin
- **Gejala**: Jika admin belum mengunggah foto profil, gambar default yang muncul hanya *icon* rusak (*broken image*).
- **Lokasi Perbaikan**: `resources/views/backend/v_layouts/app.blade.php`.
- **Perubahan**: Mengubah jalur direktori *fallback* dari `storage/img-user/img-default.jpg` menjadi `image/img-default.jpg`. Dan, menambahkan atribut *handler* kesalahan bawaan HTML: `onerror="this.src='{{ asset('image/img-default.jpg') }}'"`.

### 4.4 Error Format Gambar (imagepng false given)
- **Gejala**: Munculnya layar *error fatal* `imagepng(): Argument #1 ($image) must be of type GdImage, false given` saat seseorang mengunggah gambar.
- **Penyebab**: Fungsi `imagecreatefrompng()` di PHP mencoba mengekstrak *file* JPG yang ujung namanya telah diubah menjadi .PNG secara paksa. Hal ini membuat pustaka GD gagal membaca data asli *file* tersebut, lantas mengembalikan nilai `false` lalu menyebabkan program macet di baris selanjutnya.
- **Lokasi Perbaikan**: `app/Helpers/ImageHelper.php` (Baris 13-30).
- **Perubahan**: 
  - Membuang logika lama (blok `switch case` yang membaca *file* berdasarkan nama akhir/ekstensi).
  - Menggantinya dengan memori tangguh `imagecreatefromstring(file_get_contents())` yang membaca konten asli (MIME) dari dalam *file* terlepas apa pun ekstensi namanya.
  - Memasukkan lapisan keamanan `if (!$image)` untuk menangkap *error* korupsi *file*, dan merawat nilai *Alpha/Transparency* agar latar belakang PNG transparan tidak hangus.
