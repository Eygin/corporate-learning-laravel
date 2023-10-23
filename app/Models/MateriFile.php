<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriFile extends Model
{
    use HasFactory;
    protected $table = 'materi_file';
    protected $fillable = ['materi_file_id','materi_id','path','created_at','updated_at'];
}
