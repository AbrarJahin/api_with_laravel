<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceRating extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'service_rating';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['partner_id', 'customer_id', 'pss_id', 'comment', 'rating'];

    /**
     * Get the customer details
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    /**
     * Get the partner details
     */
    public function partner()
    {
        return $this->belongsTo('App\Partner');
    }

    /**
     * Get the partner service scheduling details
     */
    public function partner_service_scheduling()
    {
        return $this->belongsTo('App\PartnerServiceScheduling');
    }
}
