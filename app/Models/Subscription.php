<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    public $fillable = [
        'state_id',
        'email',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
