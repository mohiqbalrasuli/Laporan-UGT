<?php

namespace App\Models;

use App\Http\Controllers\PJGTController;
use Illuminate\Database\Eloquent\Model;

class GTModel extends Model
{
    protected $table = 'table_gt';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function madrasah()
    {
        return $this->belongsTo(MadrasahModel::class,'madrasah_id');
    }

    public function pjgt()
    {
        return $this->belongsTo(PJGTModel::class,'gt_id');
    }
}
