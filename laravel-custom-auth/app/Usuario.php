<?php

namespace App;

use Illuminate\Foundation\Auth\User as Autenthicatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Autenthicatable
{
    use Notifiable;

    protected $fillable = [
        "nome", "login", "email", "senha"
    ];

    protected $hidden = ["senha"];
}
