<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'first_surname', 'second_surname', 'rfc', 'address', 'email'];
    protected $guarded = ['id'];
}
