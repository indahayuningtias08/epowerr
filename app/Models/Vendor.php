<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_vendor',
        'alamat',
        'kota',
        'up',
        'telepon',
        'email',
    ]; 
}
