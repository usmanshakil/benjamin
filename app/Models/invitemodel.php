<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invitemodel extends Model
{
    protected $fillable = [
        'email', 'invitation_token', 'registered_at',
    ];
}
