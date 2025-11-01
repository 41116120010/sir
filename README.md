## DISCLAIMER
Mohon Maaf atas Kekurangan dari Proyek ini dikarenakan Ketentuan dari Tugas Akhir dan Keterbatasan Waktu, Sehingga beberapa Rencana Tambahan Fitur Seperti :
1. Fitur Booking Konsol = Memungkinkan Calon Penyewa dapat Membooking Konsol yang tersedia dengan Validasi Waktu (Sebelum Akses dan Batas Toko Tutup) dan Pembayaran Booking melalui QRIS yang Terintegrasi dengan TRIPay atau Midtrans.
2. Fitur Forgot Password.
3. Beberapa Tambahan Proteksi untuk Keamanan.
4. Billing yang Terkoneksi pada Perangkat IoT yang terhubung langsung ke TV (Operator hanya perlu Insert Transaksi maka TV akan Nyala, dan Jika Waktu Berakhir maka TV langsung Mati).
5. Fitur Promo (Diskon seperti Kelipatan 2 jam maka akan mendapat Potongan Harga sebesar Rp 1.000)
6. Fitur Transaksi Makanan dan Minuman
7. Fitur Pengaturan Akun (Ubah Nama, Username, Password, Foto Profil)
   
Belum dapat saya Lanjutkan karena Ujian Akhir Semester akan berlangsung dalam beberapa hari, maka dari itu proyek ini akan saya hentikan sementara Pengembangannya dan Akan saya lanjut di Libur Semester. 

# SISTEM INFORMASI RENTAL (SIR)
Sistem Informasi Manajemen Rental PlayStation Berbasis Web - Ranah Playstation

## Live Preview : https://ranahplaystation.my.id/

## Akun Owner - Akun Operator - Akun Pengunjung
## Username : admin - operator - pengunjung
## Password : admin - operator - pengunjung

## ❗ Masalah Nyata di Lapangan
Berdasarkan observasi di daerah sekitar, banyak rental PS masih menggunakan catatan kertas (Termasuk Usaha Rental PS milik Tante Saya yang kebetulan Saya diamanahkan untuk menjadi Operator pada Rental tersebut), WhatsApp manual, atau bahkan hanya ingatan untuk mengelola transaksi. Ini menyebabkan:

- Kesalahan hitung tarif dan waktu
- Kehilangan data transaksi
- Tidak adanya rekap keuangan
- Tidak efisien dalam pemantauan konsol yang sedang dipakai

## 📌 Fokus Proyek
Fokus utama dari sistem ini adalah efisiensi pengelolaan rental PS3/PS4, khususnya untuk usaha mikro dan menengah di daerah yang masih menggunakan sistem pencatatan manual. Proyek ini dikembangkan menggunakan **CodeIgniter 3**

## ✅ Fitur-Fitur Utama
- **Manajemen Konsol**
  - Input, edit, hapus data konsol PS3/PS4
  - Validasi agar tidak digunakan ganda

- **Transaksi Sewa**
  - Pencatatan waktu mulai dan berakhir
  - Perhitungan otomatis tarif berdasarkan durasi

- **Notifikasi Telegram & WhatsApp**
  - Notifikasi saat waktu pemakaian hampir habis atau habis

- **Manajemen Pengguna**
  - Role-based access: Owner, Operator, Pengunjung

- **Laporan & Rekap**
  - Riwayat jam bermain
  - Rekap harian dan bulanan (pendapatan dan pengeluaran)
  - Export PDF, Excel, Print

- **Landing Page**
  - Informasi umum tentang rental
  - Daftar konsol tersedia / sedang digunakan (real-time)

## ⚙️ Cara Kerja Sistem
1. **Login**
   - Operator dan Owner login ke dashboard
   - Pengunjung hanya melihat dashboard yang menampilkan Daftar Game dan Daftar Konsol yang Tersedia maupun Disewa beserta Waktu Berakhir

2. **Transaksi**
   - Operator memilih konsol, durasi, dan sistem menghitung tarif otomatis
   - Setelah transaksi berjalan, sistem mencatat waktu berakhir

3. **Notifikasi**
   - 10 menit sebelum waktu habis, sistem mengirim notifikasi otomatis
   - Setelah habis, sistem juga memberi notifikasi

4. **Laporan**
   - Semua data dapat direkap harian atau bulanan
   - Data bisa di-export dalam berbagai format

Terima Kasih Start Bootstrap - SB Admin 2 v4.1.3 (https://startbootstrap.com/theme/sb-admin-2) & Grayscale v7.0.6 (https://startbootstrap.com/theme/grayscale)
