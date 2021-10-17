<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['company_name', 'rfc', 'address', 'email'];
    protected $guarded = ['id'];

    public function invoice(){
        return $this->belongsTo(Company::class);
    }
}
