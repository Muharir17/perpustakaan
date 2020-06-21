<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'user_id', 'npm', 'nama', 'tempat_lahir', 'tgl_lahir', 'jk', 'prodi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
