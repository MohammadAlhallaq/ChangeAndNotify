<?php

namespace MohammadAlhallaq\ChangeAndNotify\Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use MohammadAlhallaq\ChangeAndNotify\Traits\NotifyWhenDirtyTrait;
use MohammadAlhallaq\ChangeAndNotify\Contracts\NotifyWhenDirtyContract;

class User extends Authenticatable implements NotifyWhenDirtyContract
{
    use HasFactory, Notifiable, NotifyWhenDirtyTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
