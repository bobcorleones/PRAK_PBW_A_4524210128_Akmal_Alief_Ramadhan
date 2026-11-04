<h1 align="center">Prak_PBW_A_Akmal_4524210128</h1>
<h2 align="center">PRAKTIKUM PBW – A</h2>
<p align="center">Disusun Untuk Memenuhi Tugas Mata Kuliah Praktikum PBW A</p>

<p align="center">
  <img width="400" src="https://github.com/user-attachments/assets/90f9352b-90e0-4a5b-b628-eec3aadbba37" alt="Logo UP" />
</p>

<p align="center">
  <b>Disusun Oleh</b><br>
  Akmal Alief Ramadhan - 4524210128
</p>

<p align="center">
  <b>Dosen Pengampu</b><br>
  Bambang Riono Arsad, S.Kom., MMSI
</p>

<h3 align="center">
  PROGRAM STUDI TEKNIK INFORMATIKA<br>
  UNIVERSITAS PANCASILA<br>
  2026-2027
</h3>

<hr>

## 📂 Daftar Tugas & Dokumentasi Project

Berikut adalah hasil dari berbagai tugas praktikum beserta dokumentasi tampilannya.

### 1 & 2. Tugas Kalkulator & Biodata

**📸 Tampilan Hasil Project:**
Tugas 1 Kalkulator
<img width="1365" height="598" alt="image" src="https://github.com/user-attachments/assets/8eb050ec-8b2c-4ea0-b1cc-ee1da9f9335c" />
Tugas 2 Biodata
<img width="1365" height="597" alt="image" src="https://github.com/user-attachments/assets/0ecbb2d1-e09e-4d62-a124-0c432f5eef1a" />

---

### 3. Tugas LaraPress

**📸 Tampilan Hasil Project:**
<img width="1365" height="729" alt="image" src="https://github.com/user-attachments/assets/78da129d-5c27-4e62-93ea-1a172545b66e" />

---

### 4. Tugas Pertemuan 04

**📸 Tampilan Hasil Project:**
<img width="1360" height="669" alt="image" src="https://github.com/user-attachments/assets/aee91249-e4c0-422a-ad5b-0b96968dc5e9" />

---

### 5. Tugas SMP Mentari

**📸 Tampilan Hasil Project:**
<img width="1361" height="729" alt="image" src="https://github.com/user-attachments/assets/6b5e6c9c-89e5-4ed4-bec3-be751f147c08" />

---

### 6. Tugas AuthBook (Laravel & Filament 3.x)

**📸 Tampilan Hasil Project Utama:**
<img width="1365" height="589" alt="image" src="https://github.com/user-attachments/assets/78f69e03-ac77-4efb-b05b-35519cbb8c71" />

---

## 📚 Detail, Evaluasi & Dokumentasi: AuthBook Project

Bagian ini merupakan laporan lengkap untuk **AuthBook (Sistem Manajemen Buku)** yang mencakup implementasi dasar, kustomisasi, hingga analisis laporan praktikum.

### A. Bukti Implementasi & Screenshot (Tugas 1 & 2)
1. **Admin Panel Berhasil Login:** 
   > `[ MASUKKAN SCREENSHOT LOGIN ADMIN DI SINI ]`
2. **List Books dengan Data Terseed:** 
   > `[ MASUKKAN SCREENSHOT TABEL BUKU DI SINI ]`
3. **Form Create Book (Lengkap dengan Deskripsi & Kategori):** 
   > `[ MASUKKAN SCREENSHOT FORM CREATE BOOK DI SINI ]`
4. **Hasil Pencarian (Search):** 
   > `[ MASUKKAN SCREENSHOT PENCARIAN DI SINI ]`
5. **Filter Aktif (Status & Author):** 
   > `[ MASUKKAN SCREENSHOT FILTER DI SINI ]`

### B. Fitur Tambahan & Pengembangan (Tugas 2)
* **Field Description:** Menambahkan kolom `description` (tipe teks) pada tabel buku dan komponen `Textarea` di form Filament, di-generate menggunakan `fake()->paragraph()`.
* **Role-Based Access Control (RBAC):** Penambahan kolom `role` pada tabel `users` (`admin`, `staff`, `viewer`) yang diatur menggunakan otorisasi `BookPolicy` (Admin: akses penuh; Staff: buat, edit, lihat; Viewer: hanya melihat).
* **Dashboard Stats Widget:** Widget interaktif di halaman utama panel admin untuk memantau *Total Books*, *Total Authors*, dan *Status Ketersediaan Buku* (Available vs Borrowed).
* **Kategori Buku (Many-to-Many):** Relasi ganda antara model `Book` dan `Category` menggunakan tabel pivot `book_category` serta komponen *multiple select* pada form input buku.

### C. Analisis dan Dokumentasi (Tugas 3)

#### 1. Penjelasan Arsitektur
* **Relasi Tabel (ERD):** 
  * `User` mengatur hak akses sistem berdasarkan role.
  * `Author` berelasi *One-to-Many* dengan `Book` (1 Penulis memiliki banyak Buku).
  * `Book` berelasi *Many-to-Many* dengan `Category` via tabel perantara `book_category` (1 Buku dapat memiliki banyak Kategori).
* **Alur Aplikasi (Flow):** Request masuk melalui routing Filament panel -> Middleware otentikasi & Policy mengecek izin akses -> Eloquent ORM memproses data ke database SQLite -> Data dirender secara reaktif ke antarmuka menggunakan komponen Livewire/Filament.

#### 2. Perbandingan dengan Pendekatan Tradisional
* **Filament 3.x (Modern RAD):**
  * *Kelebihan:* Sangat cepat, komponen CRUD (form, table, filter, actions) otomatis terbentuk hanya dengan deklarasi deklaratif, kode lebih bersih dan terstruktur.
  * *Kekurangan:* Kurang fleksibel jika ingin mendesain antarmuka publik yang tampilannya sangat unik di luar gaya admin panel standar.
* **Pendekatan Manual (Blade + Native Controller):**
  * *Kelebihan:* Kontrol kustomisasi tampilan dan logika tanpa batas.
  * *Kekurangan:* Membutuhkan waktu yang jauh lebih lama untuk menulis boilerplate code validasi, pagination, dan sorting dari nol.
* **Kesimpulan Penggunaan:** Gunakan Filament untuk sistem backoffice, CMS, atau dashboard internal yang *CRUD-heavy*. Gunakan pendekatan tradisional/Inertia.js untuk website publik (*public-facing*).

#### 3. Refleksi Pembelajaran
* **Hal yang Dipelajari:** Memahami cara kerja ekosistem Laravel modern dipadukan dengan Filament 3.x, manajemen migrasi database relasional, pengelolaan storage file upload, serta penerapan aturan keamanan berbasis *Policy*.
* **Kesulitan & Solusi:** Sempat mengalami penyesuaian saat konfigurasi namespace relasi ganda dan *policy*, yang berhasil diatasi dengan memeriksa kembali struktur deklarasi *use* dan migrasi database.
* **Rencana Pengembangan:** Menambahkan modul transaksi peminjaman buku perpustakaan secara real-time dan fitur ekspor laporan data ke format PDF.

---

## 🚀 Cara Menjalankan Project Laravel (Local Development)

Jika ingin menjalankan project Laravel di repository ini (seperti LaraPress, SMP Mentari, atau AuthBook) pada komputer lokal, ikuti langkah berikut:

1. Clone repository ini:
   ```bash
   git clone [https://github.com/bobcorleones/PRAK_PBW_A_4524210128_Akmal_Alief_Ramadhan.git](https://github.com/bobcorleones/PRAK_PBW_A_4524210128_Akmal_Alief_Ramadhan.git)
