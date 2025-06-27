<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasalahGT extends Model
{
    protected $table = 'table_laporan_permasalahan_gt';

    protected $fillable = [
        'gt_id',
        'Subjek',
        'Isi',
    ];

    public function gt()
    {
        return $this->belongsTo(GTModel::class, 'gt_id');
    }

    public function pjgt()
    {
        return $this->belongsTo(PJGTModel::class, 'pjgt_id');
    }
}
