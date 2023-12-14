<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectID extends Model
{
    use HasFactory;

    protected $table = 'project_id';

    protected $fillable = [
        'project_id',
        'nama_project',
        'hpp',
        'rab',
        'nama_client',
        'alamat_client',
    ];
}
