<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategory extends Model
{
    protected $table = 'kategories';
    protected $fillable = ['kategori', 'slug'];
    public function info()
    {
        return $this->hasMany(Info::class);
    }
    public function wisatas(): HasMany
    {
        return $this->hasMany(Wisata::class);
    }
}
