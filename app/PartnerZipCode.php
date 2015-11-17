<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnerZipCode extends Model
{
    protected $table        = 'zip_code-partner';
    public $timestamps  	= false;
    protected $fillable 	= ['zip_code', 'partner_id'];
    protected $hidden 		= ['partner_id'];	//Hidden from JSON result

    public function partner()
    {
        return $this->belongsTo('App\Partner');
    }
}