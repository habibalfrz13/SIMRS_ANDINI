<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    use HasFactory;

    protected $table = 'databarang';
    protected $primaryKey = 'kode_brng';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_brng',
        'nama_brng',
        'kode_satbesar',
        'kode_sat',
        'letak_barang',
        'dasar',
        'h_beli',
        'ralan',
        'kelas1',
        'kelas2',
        'kelas3',
        'utama',
        'vip',
        'vvip',
        'beliluar',
        'jualbebas',
        'karyawan',
        'stokminimal',
        'kdjns',
        'isi',
        'kapasitas',
    ];
}
