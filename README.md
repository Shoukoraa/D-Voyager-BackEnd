# 🗺️ D-Voyager Backend

D-Voyager Backend adalah RESTful API dan Admin Control Panel berbasis **Laravel** untuk platform layanan pemesanan travel & shuttle (D-Voyager). Sistem ini mencakup manajemen pemesanan (booking), manifest penumpang, pelacakan GPS armada secara real-time, integrasi sistem pembayaran, voucher diskon, chatbot bantuan, dan live chat dukungan pelanggan.

---

## 🚀 Fitur Utama

- **🔐 Autentikasi Keamanan & Sosial**:
  - Registrasi & Login (Pelanggan, Supir, Admin).
  - Verifikasi OTP via email.
  - Integrasi **Google OAuth** (Google Sign-In).
  - Manajemen Profil & Foto Profil.

- **📅 Manajemen Perjalanan & Pemesanan (Customer)**:
  - Pencarian lokasi halte asal/tujuan serta jadwal perjalanan aktif.
  - Pemilihan kursi secara interaktif.
  - Booking & Pembayaran otomatis terintegrasi dengan webhook pihak ketiga (DompetX).
  - Riwayat perjalanan dan penilaian (review) terhadap supir & layanan.

- **🚚 Sistem Supir (Driver)**:
  - Melihat daftar tugas jadwal supir secara personal.
  - Informasi Manifest Penumpang yang akurat.
  - Pelacakan GPS Real-time: update lokasi berkala supir yang disinkronkan langsung ke peta admin.

- **🛠️ Panel Kontrol Admin (Web Admin Portal)**:
  - Dashboard statistik interaktif.
  - Manajemen CRUD lengkap: Lokasi (Halte), Rute, Armada (Kendaraan), Supir, Pelanggan, Jadwal, Voucher Promosi, dan Data Pemesanan.
  - Fitur Ekspor Laporan bulanan dalam format **PDF** dan **Excel**.
  - Peta Pemantauan GPS Armada (menggunakan **Mapbox**).
  - Live Support Chat: Admin membalas obrolan langsung dari pelanggan secara real-time.

- **💬 Pusat Bantuan Cerdas (Chatbot & CS Live Chat)**:
  - Layanan bantuan chatbot interaktif dengan pembagian kategori masalah.
  - Eskalasi otomatis ke Live Chat Admin jika masalah belum teratasi.

- **⚡ Real-time Engine**:
  - Menggunakan **Laravel Reverb** (WebSockets) untuk sinkronisasi peta pelacakan GPS supir, status booking, dan chatting real-time.

---

## 🛠️ Tech Stack & Dependencies

- **Framework:** Laravel v13.x
- **Bahasa Pemrograman:** PHP v8.3+
- **Database:** MySQL
- **Real-time Server:** Laravel Reverb (WebSockets)
- **Library Kunci:**
  - `barryvdh/laravel-dompdf` (Generasi Laporan PDF)
  - `excel` / `maatwebsite/excel` (Generasi Laporan Excel)
  - `laravel/socialite` (Google OAuth)
  - `laravel/sanctum` (API Token Authentication)

---

## 💻 Panduan Instalasi Lokal

Ikuti langkah-langkah di bawah ini untuk menjalankan project di lokal server Anda:

### 1. Kloning Repository & Install Dependensi
```bash
git clone https://github.com/Shoukoraa/D-Voyager-BackEnd.git
cd D-Voyager-BackEnd
```

### 2. Setup Environment (`.env`)
Salin file konfigurasi `.env.example` ke `.env`:
```bash
cp .env.example .env
```
Sesuaikan konfigurasi database, SMTP email, Mapbox Token, Google Client API, dan Laravel Reverb pada file `.env`.

### 3. Setup Project (Otomatis)
Project ini dilengkapi dengan perintah setup otomatis yang akan menginstal dependensi PHP & JS, generate application key, menjalankan migrasi database, dan build aset:
```bash
composer run setup
```
*Atau, Anda bisa menjalankan secara manual:*
```bash
composer install
php artisan key:generate
php artisan migrate --seed
npm install
npm run build
```

### 4. Menjalankan Server Lokal
Untuk menjalankan server lokal, antrean queue (untuk email/proses background), dan server WebSocket (Laravel Reverb) secara bersamaan, jalankan perintah:
```bash
composer run dev
```
Perintah di atas akan secara otomatis menjalankan:
- PHP Development Server (`http://localhost:8000`)
- Laravel Queue Listener (`queue:listen`)
- Laravel Reverb (WebSocket) Server (`127.0.0.1:8080`)
- Vite Asset Compilation

---

## 📡 Dokumentasi Endpoint API
Untuk mempermudah integrasi frontend (D-Voyager FrontEnd), project ini dilengkapi dengan koleksi API:
- **Postman Collection:** [Dominic.postman.json](file:///C:/laragon/www/D-Voyager-BackEnd/Dominic.postman.json)
- **OpenAPI Schema:** [shuttle-openapi.json](file:///C:/laragon/www/D-Voyager-BackEnd/shuttle-openapi.json)
