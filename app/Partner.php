<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table        = 'partners';
    protected $primaryKey   = 'user_id';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'business_type', 'company_name', 'type_of_phone', 'is_18_years_old'];

    public $timestamps  = false;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['user_id','id'];

    public function partner()
    {
        return $this->hasMany('App\PartnerZipCode');
    }
}