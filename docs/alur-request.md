# Alur Request GET /api/v1/laporan/ringkasan

## Diagram Alur

```text
Client
  |
  | GET /api/v1/laporan/ringkasan
  v
public/index.php
  |
  v
bootstrap/app.php
  |
  v
Middleware
  |
  v
Router
  |
  v
ProdukController::laporan()
  |
  v
LayananLaporan::ringkasan()
  |
  v
Response JSON
  |
  v
Client

Penjelasan
Client mengirim HTTP request GET /api/v1/laporan/ringkasan.
Request masuk melalui public/index.php sebagai entry point aplikasi Laravel.
Laravel melakukan konfigurasi aplikasi melalui bootstrap/app.php.
Request melewati middleware yang telah didaftarkan pada aplikasi.
Router mencocokkan URI /api/v1/laporan/ringkasan dengan route yang tersedia.
Route meneruskan request ke method laporan() pada ProdukController.
ProdukController menggunakan LayananLaporan melalui dependency injection.
LayananLaporan menjalankan method ringkasan() untuk menghasilkan data laporan.
Controller mengembalikan data dalam bentuk JSON response kepada client.