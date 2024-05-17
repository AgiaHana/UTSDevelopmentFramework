<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class create_recap_table extends Model
{

    use HasFactory;
    protected $fillable= ['nim', 'nama', 'jurusan'];
    protected $table = 'mahasiswa';
    public $timestamps = false;
}
