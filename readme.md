## Aplikasi Praktikum Laravel
Aplikasi Ini adalah aplikasi praktikum laravel berseri dengan dengan video pada link youtube 
https://www.youtube.com/watch?v=Ip8l7mngBAI&list=PL4G1JB5UFUnkXlS02nbAt36cJLZ_BMZaP

## Cara Menjalankan Aplikasi

1. Clone/download repositori dengan cara ```https://github.com/Muharir17/perpustakaan.git```
2. Lakukan perintah ```composer install``` dan  ```composer update``` pada terminal atau cmd
3. Lakukan perintah ```php artisan key:generate```
4. Buat Database dengan nama db_perpus dengan phpMyadmin atau Tools Lain yang sejenis
5. Lakukan Perintah ```php artisan migrate:refresh --seed```
6. untuk menjalankan bisa menggunakan ```php artisan serve``` kalau tidak menggunakan laragon, kalau menggunakan laragon tidak perlu menjalankan perintah ini, tinggal masukkan ke folder root di laragon dan reload apache. 
