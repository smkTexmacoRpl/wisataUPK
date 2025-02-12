<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Kabupaten extends Model
{
    protected $fillable=['kabupaten','keterangan'];
    public function kecamatans()
    {
      return  $this->hasOne(kecamatan::class);
    }
}
