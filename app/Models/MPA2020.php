<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPA2020 extends Model
{
    use HasFactory;
    protected $fillable = [
        'tgl',
        'kd_inv',
        'nama_client',
        'alamat_client',
        'deskripsi',
        'item',
        'total_invoice',
        'fp',
        'status',
        'tgl_paid',
        'up',
        'no_bast',
        'jenis',
        'nomor',
        'due_date',
        'jumlah_total',
        'ppn',
        'nama_bank',
        'an',
        'ac',
        'no_fp',
        'deskripsi',
        'qty',
        'satuan',
        'harga',
        'jumlah',
        'deskripsi_lainnya',
        'qty_lainnya',
        'satuan_lainnya',
        'harga_lainnya',
        'jumlah_lainnya',
    ]; 

}
