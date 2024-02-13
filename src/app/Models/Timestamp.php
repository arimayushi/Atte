<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Timestamp;

class Timestamp extends Model
{
    protected $fillable = ['user_id', 'punchIn', 'punchOut', 'breakBegin', 'breakEnd'];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
