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

---

## 5. Improvement Frontend (Ramela Bakery)

### 5.1 Perubahan Nama dan Tampilan Beranda
- **Tujuan**: Menyesuaikan identitas toko dan meningkatkan UI/UX halaman pengguna.
- **Lokasi File & Perubahan**:
  - `resources/views/frontend/layouts/app.blade.php`: 
    - Mengubah `<title>` dan *alt* logo navbar menjadi "Ramela Bakery".
    - Merombak tampilan *footer* agar lebih profesional dengan membaginya ke dalam beberapa kolom (Informasi, Tautan Cepat, Sosial Media).
    - Menambahkan *library* AOS (Animate On Scroll) untuk efek transisi dan animasi masuk.
  - `resources/views/frontend/home.blade.php`:
    - Mengubah tulisan *Hero Section* menjadi "Selamat Datang di Ramela Bakery".
    - Menambahkan atribut animasi `data-aos` pada elemen-elemen halaman.
    - Menambahkan section daftar **Produk berdasarkan Kategori** tepat di bawah section "Produk Terbaru".

### 5.2 Penyesuaian Data Kategori
- **Tujuan**: Mengambil data relasi antara Kategori dan Produk.
- **Lokasi File & Perubahan**:
  - `app/Models/Kategori.php`: Menambahkan metode relasi `produk()` (`hasMany`).
  - `app/Http/Controllers/FrontendController.php`: Memodifikasi method `index()` untuk menarik data kategori beserta produknya yang kemudian di-*passing* ke `home.blade.php`.

### 5.3 Efek Hover Interaktif Global
- **Tujuan**: Memberikan respon visual yang dinamis di setiap elemen yang bisa diinteraksi agar terasa lebih "*hidup*".
- **Lokasi File & Perubahan**:
  - `resources/views/frontend/layouts/app.blade.php`: Menambahkan aturan CSS global untuk `a:hover`, `.btn:hover`, `input:hover`, `select:hover`, `textarea:hover`, serta animasi rotasi unik untuk tombol *Theme Toggle* (`#theme-toggle:hover`). Efek ini berlaku pada seluruh halaman yang mengekstensi *layout* utama.

---

## 6. Perbaikan Bug: Foreign Key Constraint pada Penghapusan Data

### 6.1 Error Hapus Kategori (Integrity Constraint Violation)
- **Gejala**: Muncul error `SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row` saat menghapus kategori yang masih memiliki produk.
- **Penyebab**: Method `destroy()` langsung menghapus data tanpa mengecek apakah masih ada produk yang mereferensi kategori tersebut via *foreign key* `kategori_id`.
- **Lokasi Perbaikan**:
  - `app/Http/Controllers/KategoriController.php`: Menambahkan pengecekan `$kategori->produk()->count()` sebelum menghapus. Jika masih ada produk terkait, redirect dengan pesan error yang ramah.
  - `resources/views/backend/v_kategori/index.blade.php`: Menambahkan blok alert `success` (hijau) dan `error` (merah) agar *flash message* dari controller tampil di halaman.

### 6.2 Error Hapus Produk (Integrity Constraint Violation)
- **Gejala**: Muncul error `SQLSTATE[23000]: Integrity constraint violation: 1451` saat menghapus produk yang pernah masuk ke dalam transaksi (`detail_transaksi`).
- **Penyebab**: Method `destroy()` langsung menghapus produk tanpa mengecek referensi di tabel `detail_transaksi`.
- **Lokasi Perbaikan**:
  - `app/Http/Controllers/ProdukController.php`: Mengubah logika penghapusan menjadi dua tahap:
    1. Cek apakah produk masih terkait transaksi yang **belum selesai** (`status != 'selesai'`). Jika ya, tolak penghapusan dengan pesan error.
    2. Jika semua transaksi terkait sudah berstatus **selesai**, hapus record `detail_transaksi` terkait terlebih dahulu, baru hapus produknya.
  - `resources/views/backend/v_produk/index.blade.php`: Menambahkan blok alert `success` dan `error` agar pesan flash tampil di halaman.
