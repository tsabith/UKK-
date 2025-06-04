## Instalasi
1. Clone repositori:

```bash
git clone https://github.com/tsabith/UKK-.git
cd UKK
```

2. Install dependensi:
```bash
composer install
npm install
```

3. Copy file environment dan konfigurasi:
```bash
cp .env.example .env
```
- Edit APP_URL=http://<ip>


```bash
php artisan key:generate
```

4. Migrate database:
```bash
php artisan migrate
```

5. Membuat user super admin untuk Filament Shield:
```bash
php artisan make:filament-user
```

6. Jalankan server lokal:
```bash
npm run dev
```
Lebih praktis 1 terminal:
```bash
composer run dev
```

7. Jika ingin deploy, build dulu:
```bash
npm run build
```
## Role dan Hak Akses

Filament Shield digunakan untuk mengelola peran seperti:

- Admin: Akses penuh ke seluruh modul
- Guru: Akses view ke data siswa yang dibimbing, industri, dan update data dirinya sendiri
- Siswa: Input data diri, menambah data industri, dan update status PKL.

Gunakan perintah berikut untuk mengelola peran dan izin:
```bash
php artisan shield:generate
php artisan shield:super-admin
```


