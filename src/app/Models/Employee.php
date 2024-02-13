<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Employee as Authenticatable;
use App\Models\Timestamp;

class Employee extends Model
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token', 'role',];

    // public function getDetail()
    // {
    //     $txt = 'ID:'.$this->id . ' ' . $this->name . ' ' . $this->email . ' ' . $this->password;
    //     return $txt;
    // }
    public function timestamp()
    {
        return $this->hasMany(Timestamp::class);
    }
}
