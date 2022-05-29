<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    public function card()
    {
        return $this->belongsToMany(Card::class);
    }
    public function subscription()
    {
        return $this->belongsToMany(Subscription::class);
    }
}
