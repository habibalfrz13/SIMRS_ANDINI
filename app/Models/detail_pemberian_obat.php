<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPemberianObat extends Model
{
    use HasFactory;

    protected $table = 'detail_pemberian_obat';
    protected $primaryKey = null; 
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'tgl_perawatan',
        'jam',
        'no_rawat',
        'kode_brng',
        'h_beli',
        'biaya_obat',
        'jml',
        'embalase',
        'tuslah',
        'total',
        'status',
        'kd_bangsal',
        'no_batch',
        'no_faktur',
    ];
}
