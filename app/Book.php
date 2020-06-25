<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'judul', 'isbn', 'penerbit', 'tahun_terbit', 'jumlah', 'deskripsi', 'lokasi', 'cover'
    ];



}
