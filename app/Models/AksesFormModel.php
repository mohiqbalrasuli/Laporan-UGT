<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AksesFormModel extends Model
{
    protected $table = 'table_akses_form';
    protected $fillable = [
        'tanggal_mulai_pjgt',
        'tanggal_akhir_pjgt',
        'tanggal_mulai_gt',
        'tanggal_akhir_gt'
    ];
}
