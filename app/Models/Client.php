<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'first_surname', 'second_surname', 'rfc', 'address', 'email'];
    protected $guarded = ['id'];

    /**
     * Muttator to save client´s name with first letters in uppercase
     *
     * @param string $value
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    /**
     * Muttator to save client´s first_surname with first letters in uppercase
     *
     * @param string $value
     * @return void
     */
    public function setFirstSurnameAttribute($value)
    {
        $this->attributes['first_surname'] = ucfirst($value);
    }

    /**
     * Muttator to save client´s second_surname with first letter in uppercase
     *
     * @param string $value
     * @return void
     */
    public function setSecondSurnameAttribute($value)
    {
        $this->attributes['second_surname'] = ucfirst($value);
    }

    /**
     * Set RFC attribute in uppercase into database
     *
     * @param string $value
     * @return void
     */
    public function setRfcAttribute($value)
    {
        $this->attributes['rfc'] = mb_strtoupper($value);
    }

    /**
     * set email attribute in lower case into database
     *
     * @param string $value
     * @return void
     */
    public function setEmailAttribute(string $value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    //Relationships
    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }
}
