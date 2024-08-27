<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $table = 'biodata';
    protected $fillable = ['nama', 'nik', 'umur', 'alamat', 'image_path'];
    public $timestamps = true;
}
