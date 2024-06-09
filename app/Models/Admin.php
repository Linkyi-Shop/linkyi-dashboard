<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use HasFactory, HasUuids;

    protected $table = 'admins';
    protected $fillable = ['id', 'name', 'email', 'password', 'status'];
    const STATUS_ACTIVED = 'ACTIVED';
    const STATUS_INACTIVED = 'INACTIVED';

    protected $hidden = [
        'password',
    ];
}
