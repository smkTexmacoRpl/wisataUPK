<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $guarded = ['id'];
    public function kategori()
    {
        return $this->belongsTo(Kategory::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
