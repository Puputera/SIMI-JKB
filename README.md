# Sistem Informasi Magang Industri Jurusan KOmputer dan Bisnis Politeknik Negeri Cilacap

Sistem Informasi Magang Industri adalah aplikasi berbasis web yang dikembangkan menggunakan Laravel 11 dan dirancang untuk memudahkan proses administrasi dan monitoring kegiatan magang mahasiswa. Sistem ini mendukung berbagai peran pengguna dengan fitur yang disesuaikan.

# 📌 Fitur
## Role
- Admin
- Koordinator Program Studi
- Jurusan 
- Mahasiswa 
- Dosen Pembimbing
- Instansi Perusahaan

## Fitur Berdasarkan Role
### Admin
- Login 
- Olah data user
- Olah data mahasiswa
- Olah data dosen
- Olah data program studi
- Olah data Jurusan
- Olah data perusahaan
- Olah data surat balasan magang
- Logout

### Jurusan
- Login 
- Melihat data pengajuan magang
- Melihat surat balasan magang
- Monitoring kegiatan magang
- Logout

### Koordinator Pogram Studi
- Login
- Menerima dan menolak ajuan magang
- Menambah surat balasan magang
- Verifikasi magang mahasiswa
- Menambah dosen pembimbing
- Menambah jadwal visitasi magang
- Melihat nilai magang
- Melihat hasil kuisioner dari perusahaan dan mahasiswa
- Menambah jadwal sidang magang
- Logout

### Mahasiswa
- Login
- Melihat rekomendasi tempat magang
- Mengajukan tempat magang
- Menambah surat balasan magang
- Melihat dosen pembimbing
- Melihat jadwal sidang magang 
- Melihat nilai magang
- Mengisi kuisioner perusahaan
- Logout

### Dosen Pembimbing
- Login
- Melihat mahasiswa bimbingan
- Melihat jadwal visitasi magang
- Melihat jadwal sidang magang
- Menambahkan nilai magang
- Logout

### Instansi Perusahaan
- Menjawab kuisioner
- Menambah nilai magang


# 🛠️ Teknologi yang Digunakan
- **PHP** `^8.2`
- **Composer** `^2.5`
- **Node.js** `^18.x` / `^20.x`
- **npm**`^9.x` / `^10.x`
- **MySQL** `^8.0`
- **Framework**: Laravel 11
- **Frontend**: Blade, Tailwind CSS, Flowbite
- **Autentikasi**: Laravel Breeze 

# ⚙️ Cara Install dan Menjalankan Proyek

1. **Clone repositori**
   ```bash
   git clone https://github.com/Puputera/SIMI-TA-PUPUT.git
   cd SIMI-TA-PUPUT
   ```

2. **Install dependensi PHP dan JavaScript**
   ```bash
   composer install
   npm i
   npm run dev
   ```

3. **Salin file environment dan generate key**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Konfigurasi dan migrasi database**
   ```bash
   php artisan migrate --seed
   ```

5. **Jalankan server**
   ```bash
   php artisan serve
   ```
