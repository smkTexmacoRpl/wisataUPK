<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategory extends Model
{
    protected $table = 'kategories';
    protected $fillable = ['kategori', 'slug'];
    public function info()
    {
        return $this->hasMany(Info::class);
    }
}





