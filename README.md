# UMKM API Backend

RESTful API Backend untuk pengelolaan data UMKM (Usaha Mikro, Kecil, dan Menengah) yang dibangun menggunakan framework **CodeIgniter 4** dan database **MySQL**.

---

## 🚀 Fitur & Endpoints API

Base URL: `http://localhost:8080`

| Method | Endpoint | Deskripsi |
|---|---|---|
| `GET` | `/api/umkm` | Mengambil seluruh data UMKM |
| `GET` | `/api/umkm/{id}` | Mengambil data UMKM berdasarkan ID |
| `POST` | `/api/umkm` | Menambahkan data UMKM baru |
| `PUT` | `/api/umkm/{id}` | Memperbarui data UMKM berdasarkan ID |
| `DELETE` | `/api/umkm/{id}` | Menghapus data UMKM berdasarkan ID |

---

## 📋 Struktur Data UMKM

| Field | Tipe Data | Keterangan |
|---|---|---|
| `id` | Integer | Primary key, Auto Increment |
| `nama_umkm` | String | Nama usaha UMKM *(Wajib)* |
| `pemilik` | String | Nama pemilik usaha |
| `alamat` | Text | Alamat lokasi usaha |
| `kategori` | String | Kategori usaha (misal: Kuliner, Fashion, Jasa) |
| `kontak` | String | Nomor telepon / WhatsApp |
| `created_at` | Datetime | Waktu pembuatan data (otomatis) |
| `updated_at` | Datetime | Waktu terakhir pembaruan data (otomatis) |

---

## 🛠️ Panduan Instalasi & Menjalankan

### 1. Prasyarat
- PHP >= 8.1 (dengan ekstensi `intl`, `mbstring`, `mysqli`)
- Composer
- MySQL Server (XAMPP / Laragon / Native MySQL)

### 2. Kloning Repositori
```bash
git clone <URL_REPO_ANDA>
cd umkm-api-backend
```

### 3. Install Dependensi
```bash
composer install
```

### 4. Konfigurasi Environment (`.env`)
Salin file `env.example` menjadi `.env`:
```bash
cp env.example .env
```
Sesuaikan konfigurasi database pada `.env`:
```ini
database.default.hostname = localhost
database.default.database = db_umkm_api
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

### 5. Setup Database
Pastikan database `db_umkm_api` sudah dibuat di MySQL, kemudian jalankan migrasi tabel:
```bash
php spark migrate
```
*Atau import file `database.sql` langsung melalui phpMyAdmin.*

### 6. Menjalankan Server Lokal
```bash
php spark serve
```
API siap diakses pada `http://localhost:8080/api/umkm`.

---

## 📦 Contoh Request & Response

### 1. Tambah UMKM (`POST /api/umkm`)
**Request Body (JSON):**
```json
{
  "nama_umkm": "Kopi Senja Nusantara",
  "pemilik": "Fikri Hidayat",
  "alamat": "Jl. Merdeka No. 10",
  "kategori": "Kuliner",
  "kontak": "08123456789"
}
```

**Response (201 Created):**
```json
{
  "success": true,
  "message": "Data UMKM berhasil ditambahkan",
  "data": {
    "id": "1",
    "nama_umkm": "Kopi Senja Nusantara",
    "pemilik": "Fikri Hidayat",
    "alamat": "Jl. Merdeka No. 10",
    "kategori": "Kuliner",
    "kontak": "08123456789",
    "created_at": "2026-11-17 03:30:00",
    "updated_at": "2026-11-17 03:30:00"
  }
}
```

---

## 📄 Lisensi
Proyek ini bersifat open-source di bawah lisensi MIT.
