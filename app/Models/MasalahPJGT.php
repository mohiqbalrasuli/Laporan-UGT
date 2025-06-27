<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasalahPJGT extends Model
{
    protected $table = 'table_laporan_permasalahan_pjgt';

    protected $fillable = [
        'pjgt_id',
        'Subjek',
        'Isi',
    ];

    public function pjgt()
    {
        return $this->belongsTo(PJGTModel::class, 'pjgt_id');
    }

    public function gt()
    {
        return $this->belongsTo(GTModel::class, 'gt_id');
    }
}
