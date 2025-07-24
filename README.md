<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## EVENTIX By - Kelompok 3
**Eventix** adalah sistem pembelian tiket online yang mengharuskan user login setiap kali mengakses form.  
Kami menggunakan session untuk menyimpan data user, serta memanfaatkan konsep class, object, dan model di Laravel.

### Apa yang dibuat?
- **Model**             : mengelola struktur data dan interaksi dengan database.  
- **Controller**        : menangani logika validasi dan alur permintaan (request).  
- **View**              : menampilkan antarmuka ke pengguna.  
- **Routes (web.php)**  : mendefinisikan URL dan menghubungkannya ke controller.


### Cara Instalasi 

1. **Clone Repository**

```bash
git clone https://github.com/lazamedia/Eventix.git
```

```bash
cd eventix
```

```bash
composer install
```

```bash
cp .env.example .env
```


2. **Buka `.env` lalu ubah baris berikut sesuai dengan databasemu yang ingin dipakai**

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Eventix
DB_USERNAME=root
DB_PASSWORD=
```

3. **Instalasi website**

```bash
php artisan key:generate
```

```bash
php artisan migrate --seed
```


4. **Jalankan website**

```bash
php artisan serve
```


## License
This project is licensed under the MIT License – see the [LICENSE](LICENSE) file for details.
