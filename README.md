# TP8DPBO2526C1

## Janji
Saya Keysha Ega Magani dengan NIM 2507925 mengerjakan tugas praktikum 8 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Lecturer Management

**Lecturer Management** merupakan aplikasi website sederhana yang dikembangkan menggunakan **PHP Native** dengan menerapkan konsep **Object-Oriented Programming (OOP)** dan pola arsitektur **Model-View-Controller (MVC)** serta database MySQL.

Aplikasi ini dibuat untuk mengelola data dosen dan mata kuliah. Pengguna dapat melakukan penambahan, penampilan, perubahan, dan penghapusan data melalui antarmuka website.

Pengembangan aplikasi menerapkan pemisahan antara Model, View, dan Controller agar setiap bagian memiliki tanggung jawab masing-masing sehingga kode lebih terstruktur, modular, dan mudah dikelola.

---

## 1. Tujuan Pembuatan

Project ini dibuat untuk menerapkan materi praktikum **Modul 9 – Model View Controller (MVC)**, meliputi:

- Penerapan konsep Object-Oriented Programming (OOP) menggunakan PHP.
- Penerapan pola arsitektur Model-View-Controller (MVC).
- Pemisahan antara logika pengolahan data, tampilan, dan pengendali aplikasi.
- Penggunaan class dan object untuk mengelola data.
- Penghubungan PHP dengan database MySQL.
- Penerapan relasi antartabel menggunakan Foreign Key.
- Penggunaan Prepared Statement dalam menjalankan query database.
- Pembuatan antarmuka pengguna (GUI) menggunakan HTML, CSS, dan Bootstrap.
- Implementasi operasi CRUD (*Create, Read, Update, Delete*).

---

## 2. Teknologi yang Digunakan

| Teknologi | Penggunaan |
|---|---|
| PHP Native | Mengelola logika backend aplikasi |
| MySQL | Menyimpan dan mengelola data |
| HTML | Membuat struktur halaman website |
| CSS | Mengatur tampilan dan desain website |
| Bootstrap | Membantu pembuatan tampilan dan komponen antarmuka |
| XAMPP | Menjalankan server lokal dan MySQL |
| OOP | Mengorganisasi kode menggunakan class dan object |
| MVC | Memisahkan Model, View, dan Controller |

---

## 3. Struktur Folder Project

```text
tp8/
│
├── app/
│   ├── controllers/
│   │   ├── CourseController.php
│   │   └── LecturerController.php
│   │
│   ├── models/
│   │   ├── Course.php
│   │   └── Lecturer.php
│   │
│   └── views/
│       ├── courses/
│       │   ├── form.php
│       │   └── index.php
│       │
│       ├── lecturers/
│       │   ├── form.php
│       │   └── index.php
│       │
│       └── layouts/
│           ├── header.php
│           └── footer.php
│
├── config/
│   └── database.php
│
├── database/
│   └── tp_mvc25.sql
│
├── Dokumentasi/
│   └── PETUNJUK.txt
│
├── public/
│   ├── assets/
│   │   ├── bootstrap.bundle.min.js
│   │   └── bootstrap.min.css
│   │
│   └── index.php
│
├── index.php
└── README.md
```

---

## 4. Penerapan Materi Modul 9

Berikut merupakan penerapan materi yang dipelajari pada Modul 9 dalam project Lecturer Management.

### A. Object-Oriented Programming (OOP)

Konsep OOP diterapkan dengan membuat class yang bertanggung jawab terhadap masing-masing entitas database.

Contohnya:
- `Lecturer` untuk mengelola data dosen.
- `Course` untuk mengelola data mata kuliah.
- `Database` untuk mengelola koneksi ke database MySQL.

Setiap class memiliki atribut dan method sesuai dengan tanggung jawabnya. Dengan pendekatan ini, kode program menjadi lebih terorganisir dan mudah dikembangkan.

### B. Model-View-Controller (MVC)

Pola MVC diterapkan dengan membagi aplikasi menjadi tiga bagian utama, yaitu:

**1. Model**

Model bertanggung jawab untuk mengelola data dan berinteraksi langsung dengan database.

Contohnya:
- `Lecturer.php`
- `Course.php`

Kedua class tersebut memiliki method untuk mengambil, mencari, menambahkan, mengubah, dan menghapus data dari database.

**2. View**

View bertanggung jawab untuk menampilkan informasi kepada pengguna melalui antarmuka website.

Contohnya:
- `lecturers/index.php` untuk menampilkan daftar dosen.
- `lecturers/form.php` untuk formulir data dosen.
- `courses/index.php` untuk menampilkan daftar mata kuliah.
- `courses/form.php` untuk formulir data mata kuliah.
- `layouts/header.php` dan `layouts/footer.php` untuk bagian layout website.

**3. Controller**

Controller bertanggung jawab untuk menerima permintaan pengguna, memproses input, menjalankan validasi, memanggil Model, dan menentukan View yang akan ditampilkan.

Contohnya:
- `LecturerController.php` untuk mengatur proses pengelolaan data dosen.
- `CourseController.php` untuk mengatur proses pengelolaan data mata kuliah.

Dengan penerapan MVC, setiap bagian aplikasi memiliki tanggung jawab yang berbeda sehingga struktur kode lebih rapi dan mudah dipelihara.

### C. Database Connection

Koneksi database diterapkan melalui file `config/database.php`.

File ini menggunakan class `Database` dengan method `connect()` untuk menghubungkan aplikasi PHP dengan database MySQL bernama `tp_mvc25`.

Koneksi database menggunakan MySQLi dan diatur dengan charset `utf8mb4`.

Class Model kemudian menggunakan koneksi tersebut untuk menjalankan berbagai operasi terhadap database.

### D. Database Relationship

Database menggunakan dua tabel utama yang saling berhubungan, yaitu:

| Tabel | Fungsi |
|---|---|
| `lecturers` | Menyimpan informasi dosen. |
| `courses` | Menyimpan informasi mata kuliah. |

Relasi diterapkan pada tabel `courses` dan `lecturers`.

Tabel `courses` memiliki kolom `lecturer_id` sebagai Foreign Key yang mengacu pada kolom `id` di tabel `lecturers`.

Dengan relasi tersebut, setiap mata kuliah dapat dihubungkan dengan dosen pengampu yang sesuai.

Foreign Key juga menerapkan:
- `ON UPDATE CASCADE` untuk memperbarui relasi ketika ID dosen berubah.
- `ON DELETE CASCADE` untuk menghapus mata kuliah yang berkaitan ketika data dosen dihapus.

### E. Prepared Statement

Prepared Statement diterapkan menggunakan MySQLi dalam proses pengaksesan database.

Penerapannya dilakukan ketika menjalankan query yang melibatkan input pengguna, seperti menambahkan, mencari berdasarkan ID, mengubah, dan menghapus data.

Penggunaan Prepared Statement membantu mencegah SQL Injection karena input pengguna dipisahkan dari perintah SQL.

### F. CRUD (Create, Read, Update, Delete)

Aplikasi menyediakan fitur CRUD untuk mengelola data dosen dan mata kuliah.

| Operasi | Penerapan |
|---|---|
| **Create** | Menambahkan data dosen dan mata kuliah baru ke database. |
| **Read** | Menampilkan daftar dosen dan mata kuliah yang tersimpan di database. |
| **Update** | Mengubah informasi dosen dan mata kuliah yang sudah tersimpan. |
| **Delete** | Menghapus data dosen dan mata kuliah dari database. |

Operasi CRUD dijalankan melalui Controller yang kemudian memanggil method pada masing-masing Model.

### G. Validasi Input

Validasi diterapkan pada bagian Controller sebelum data disimpan atau diperbarui ke database.

Contohnya:
- Data dosen wajib diisi, meliputi nama, NIDN, nomor telepon, dan tanggal bergabung.
- Nama mata kuliah dan kode mata kuliah wajib diisi.
- Jumlah SKS harus berupa angka dengan nilai minimal 1.
- Dosen pengampu harus dipilih dari data dosen yang tersedia.
- ID yang digunakan untuk mengubah atau menghapus data harus valid.

Apabila terdapat input yang tidak sesuai, sistem akan menampilkan pesan kesalahan sehingga data yang tidak memenuhi ketentuan tidak langsung diproses.

### H. Graphical User Interface (GUI)

Penerapan GUI terdapat pada folder `app/views/` dan bagian layout website.

Antarmuka aplikasi dibuat menggunakan HTML, CSS, dan Bootstrap dengan tampilan yang sederhana dan responsif.

Beberapa komponen yang tersedia pada aplikasi antara lain:
- Navbar sebagai navigasi antara halaman Data Dosen dan Mata Kuliah.
- Tabel untuk menampilkan data dosen dan mata kuliah.
- Form untuk menambahkan dan mengubah data.
- Tombol Edit dan Hapus untuk mengelola data.
- Notifikasi untuk menampilkan status proses CRUD.
- Konfirmasi sebelum melakukan penghapusan data.

Bootstrap digunakan untuk membantu mengatur komponen antarmuka, sedangkan CSS digunakan untuk menyesuaikan warna, jarak, ukuran, dan tampilan halaman.

---

