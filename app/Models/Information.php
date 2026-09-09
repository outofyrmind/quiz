<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table = 'information';
    protected $fillable = ['kategori_id', 'judul', 'ringkasan', 'isi', 'sumber', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }
}