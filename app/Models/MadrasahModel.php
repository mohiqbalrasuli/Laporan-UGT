<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MadrasahModel extends Model
{
    protected $table = 'table_madrasah';
    protected $guarded = [];

    public function gt()
    {
        return $this->hasMany(GTModel::class, 'madrasah_id');
    }
    public function pjgts()
    {
        return $this->hasMany(PJGTModel::class, 'madrasah_id');
    }
}
