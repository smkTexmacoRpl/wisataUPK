<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Info extends Model
{
    protected $table = 'infos';
    protected $guarded = ['id'];

    protected static function boot()

    {

        parent::boot();

  

        static::created(function ($info) {

            $info->slug = $info->createSlug($info->judul);

            $info->save();

        });
    }
        private function createSlug($judul){

            if (static::whereSlug($slug = Str::slug($judul))->exists()) {
    
                $max = static::wherejudul($judul)->latest('id')->skip(1)->value('slug');
    
      
    
                if (is_numeric($max[-1])) {
    
                    return preg_replace_callback('/(\d+)$/', function ($mathces) {
    
                        return $mathces[1] + 1;
    
                    }, $max);
    
                }
    
      
    
                return "{$slug}-2";
    
            }  
      
    
            return $slug;
    
        

    }
    public function kategori()
    {
        return $this->belongsTo(Kategory::class);
    }
}
