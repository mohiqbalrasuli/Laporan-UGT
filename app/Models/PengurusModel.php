<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengurusModel extends Model
{
    protected $table ='table_pengurus';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
