# Digital Invitation Web
Website Pemesanan untuk Undangan Digital


## Tema Website
Tema dari website ini adalah "Elegansi Digital" yang menekankan konsep modern dalam pemesanan undangan digital. Didesain untuk membantu pelanggan dengan memberikan pengalaman yang praktis dan memberikan kesan modern.

User yang ditargetkan adalah berbagai kalangan yang ingin membuat undangan untuk berbagai jenis acara, seperti pernikahan, ulang tahun, pesta, dan lain-lain. Harga yang ditawarkan disesuaikan dengan paket-paket yang tersedia, memberikan fleksibilitas kepada pengguna untuk memilih sesuai dengan kebutuhan dan anggaran mereka.


## Harapan UX
Harapan terhadap pengalaman user ketika mengakses web, antara lain:
1. Desain antarmuka pengguna (UI) website sudah intuitif, memungkinkan pengguna dengan mudah menjelajahi berbagai fitur dan opsi yang ditawarkan tanpa kebingungan. Mencakup navigasi yang jelas dan pemahaman yang cepat tentang cara menggunakan platform.
2. Website dapat memberikan pengalaman yang konsisten dan responsif di berbagai jenis perangkat, termasuk komputer desktop, tablet, dan ponsel. 
3. Pengguna dapat dengan mudah memahami berbagai paket layanan yang ditawarkan, beserta harga dan fitur yang termasuk di dalamnya. Tentunya segera memilih paket yang tersedia.
4. Pengguna akan datang kembali untuk melakukan pemesanan lainnya.


## Dokumentasi Website
Dokumentasi dari web yang sudah dibuat:

HALAMAN UNTUK USER
1. Tampilan awal web
   ![Screenshot (941)](https://github.com/KadekMutiaSari/digital-invitation/assets/146809764/0c0b7d0e-1710-4d88-a33d-28011a258d36)
   Disini tab browser tampil dengan icon berinisial DI.
   Terdapat nama web, navigation bar, button untuk memesan dengan login terlebih dahulu, dan show beberapa produk yang dapat di slide.

2. Tampilan Menu Paket
   ![Screenshot (942)](https://github.com/KadekMutiaSari/digital-invitation/assets/146809764/afa2adfb-b10e-45dc-bbe0-67d3518ad55d)
   Disini terdapat berbagi pilihan paket dengan spesifikasi dan harga yang berbeda.
   Box paket dan tombol pesanan akan bereaksi saat ada pointer.

3. Tampilan Menu Tentang Kami
   ![Screenshot (945)](https://github.com/KadekMutiaSari/digital-invitation/assets/146809764/0a2ea995-9b0e-47bf-9771-84ebf6d98256)
   Berisi logo dan deskripsi tentang Digital Invitation.

4. Halaman Register Pelanggan
   ![image](https://github.com/KadekMutiaSari/digital-invitation/assets/146809764/f90db298-664e-4c9f-bab6-b45b3072f7c0)
   Halaman ini akan tampil ketika pelanggan klik menu register di navigation bar.

5. Halaman Login Pelanggan
   ![image](https://github.com/KadekMutiaSari/digital-invitation/assets/146809764/303eb48b-764f-4d85-8242-6e6f43196263)
   Halaman ini akan tampil jika pelanggan klik menu login di navigation bar atau saat klik button "Pesan Sekarang".

6. Halaman Pemesanan Paket
   ![image](https://github.com/KadekMutiaSari/digital-invitation/assets/146809764/a9c68bce-5205-45ed-ab1d-e0ef3ddfcfca)
   Halaman ini tampil setelah pelanggan berhasil login.
   Pelanggan dapat memilih pesanan yang ada dan harga akan otomatis muncul.
   Data Pesanan langsung masuk ke database.



HALAMAN ADMIN
1. Halaman login khusus admin
   ![image](https://github.com/KadekMutiaSari/digital-invitation/assets/146809764/a385a80b-10a8-45b9-a28d-80dd8bfcf5b3)
   Hanya admin yang sudah ditentukan yang dapat aksek halaman admin.

2. Halaman Admin
   ![image](https://github.com/KadekMutiaSari/digital-invitation/assets/146809764/0997a1a1-03c0-4c84-9861-2afe5d856f2d)
   Halaman dimana admin dapat melihat data-data pada database yang dibuat semantik.

3. Halaman Data Admin
   ![image](https://github.com/KadekMutiaSari/digital-invitation/assets/146809764/38ee6759-5081-4474-a088-8c535f0bf2f9)
   Menampilkan seluruh admin beserta datanya.

4. Halaman Data Paket
   ![image](https://github.com/KadekMutiaSari/digital-invitation/assets/146809764/6ffd5a24-69a5-4a8b-b462-e8ce7790927e)
   Menampilkan seluruh paket yang ada beserta datanya.
   
5. Halaman Data Pelanggan
   ![image](https://github.com/KadekMutiaSari/digital-invitation/assets/146809764/f17fd384-117d-459d-9067-c1ba0a89b190)
   Menampilkan seluruh pelanggan yang sudah teregister beserta datanya.

6. Halaman Data Pesanan
   ![image](https://github.com/KadekMutiaSari/digital-invitation/assets/146809764/567f63f1-bf12-497e-a403-a20f57692ecd)
   ![image](https://github.com/KadekMutiaSari/digital-invitation/assets/146809764/04b2efde-a5d6-4f58-a443-2ccee93a2f54)
   Menampilkan seluruh pesanan yang masuk beserta informasi pendukung seperti waktu pemesanan.
   Pada bagian status pesanan juga dapat di update oleh admin antara: pending, diproses dan selesai.


## Tech Stack
Technology stack merujuk pada kombinasi dari teknologi perangkat lunak dan perangkat keras 
yang digunakan untuk mengembangkan dan menjalankan aplikasi atau layanan suatu perusahaan atau proyek.
Berikut adalah beberapa tech stack yang diterapkan:

1. Lapisan Frontend (Client-side)
   HTML/CSS/JavaScript: Bahasa markup, gaya, dan skrip yang digunakan untuk membuat antarmuka pengguna di browser.

2. Lapisan Frontend (Client-side)
   Server-side programming language: PHP.
   Database: MySQL.

3. Database Management System (DBMS)
   SQL-based DBMS: MySQL, SQL Server.

4. Version Control
   Version control system: Git.

5. Code Editor atau IDE
   Code editor: Visual Studio Code.


## Instruksi Konfigurasi
Langkah 1: Konfigurasi dbconfig.php
- Buka file dbconfig.php pada editor teks.
- Tentukan nilai untuk konstanta-konstanta sesuai kondisi. Pastikan untuk menyediakan nilai yang sesuai dengan server dan database MySQL yang digunakan.
- Simpan dan tutup file dbconfig.php.
Langkah 2: Eksekusi db.sql
- Buka MySQL Command Line atau MySQL Workbench.
- Jalankan perintah SQL untuk membuat database dan tabel-tabel yang diinginkan.
- Pastikan untuk menjalankan perintah SQL dengan format yang tepat.


## Instruksi Penggunaan Website

UNTUK PELANGGAN

1. Pilih Register setelah berhasil masuk halaman utama web
   ![image](https://github.com/KadekMutiaSari/digital-invitation/assets/146809764/d4fe7a50-dd78-4c19-9337-559acaa18f02)
   Dapat dengan klik menu register.

2. Lengkapi data dan klik Register
   ![image](https://github.com/KadekMutiaSari/digital-invitation/assets/146809764/a576e8e0-a519-4164-979b-162824312bfb)

3. Masukkan email dan password saat diarahkan ke laman login, klik Login
   ![image](https://github.com/KadekMutiaSari/digital-invitation/assets/146809764/8f524940-bab7-4018-bc49-0c6a8a42779d)

4. Buat pesana dengan pilih paket sesuai dengan informasi pilihan paket yang tersedia di halaman utama web
   ![image](https://github.com/KadekMutiaSari/digital-invitation/assets/146809764/d87095d2-8545-4749-a716-c0f87f1f3e97)
   Saat memilih nama paket, nominal harga akan langsung keluar, silakan tambahkan note bila ada dan klik Buat Pesanan


UNTUK ADMIN
1. Akses link untuk login admin dan lakukan login
   ![image](https://github.com/KadekMutiaSari/digital-invitation/assets/146809764/2a66e314-441b-4ac5-9d90-6a66e279cb32)

2. Monitoring halaman admin
   ![image](https://github.com/KadekMutiaSari/digital-invitation/assets/146809764/fec2ba1d-0034-41f2-a8be-dc6a69930b2a)

3. Pilih data yang ingin dilihat
   ![image](https://github.com/KadekMutiaSari/digital-invitation/assets/146809764/b9fe9b31-7d14-45cb-953b-3c9ea9098fe4)

4. Ubah status pesanan sesuai situasi yang berlangsung dengan klik dan pilih pada list yang bisa dipilih
   ![image](https://github.com/KadekMutiaSari/digital-invitation/assets/146809764/12ea9350-c92d-48bd-ba36-e9a172776c49)

5. Logout setelah selesai
   ![image](https://github.com/KadekMutiaSari/digital-invitation/assets/146809764/9d3a8185-34f8-4579-9c4f-834568bfb7a0)

6. Dibawa kembali pada laman utama web


## Responsifitas
Halaman Utama Web
![image](https://github.com/KadekMutiaSari/digital-invitation/assets/146809764/a51b9560-611d-4207-b66f-26aaeed560cd)

Halaman Admin
![image](https://github.com/KadekMutiaSari/digital-invitation/assets/146809764/8a4786e0-3dcc-447d-80e5-1c1d6228eb14)









