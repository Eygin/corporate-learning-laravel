<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materi';
    protected $fillable = ['materi_id','title','category_id','created_at','updated_at'];

    public function category()
    {
        return $this->hasOne(Category::class, 'category_id', 'category_id');
    }

    public function materiFile()
    {
        return $this->hasMany(MateriFile::class, 'materi_id', 'materi_id');
    }
}
