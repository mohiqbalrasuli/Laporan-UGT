<?php

namespace App\Models;

use App\Http\Controllers\GTController;
use App\Http\Controllers\MadrasahController;
use Illuminate\Database\Eloquent\Model;

class PJGTModel extends Model
{
    protected $table = 'table_pjgt';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function madrasah()
    {
        return $this->belongsTo(MadrasahModel::class, 'madrasah_id');
    }
    public function gt()
    {
        return $this->belongsTo(GTModel::class, 'gt_id');
    }
}
