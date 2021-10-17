<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'value'];
    protected $guarded = ['id'];

    public function invoices()
    {
        return $this->belongsToMany(Invoice::class)->withPivot('amount_of_pieces');
    }
}
