<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['nama'];

    public function information()
    {
        return $this->hasMany(Information::class, 'kategori_id');
    }
}