<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    protected $fillable = ['pdf_url', 'user_id', 'client_id', 'company_id'];
    protected $guarded = ['id'];

    public function user()
    {
        return BelongsTo(User::class);
    }

    public function client()
    {
        return $this->BelongsTo(Client::class);
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('amount_of_pieces');
    }
}
