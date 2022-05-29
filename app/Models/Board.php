<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
    public function column()
    {
        return $this->belongsToMany(Column::class);
    }

}
