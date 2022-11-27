<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class stamp extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'stamps';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'header',
                  'footer',
                  'image'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the country for this model.
     *
     * @return App\Models\countries
     */
    public function country()
    {
        return $this->belongsTo('App\Models\countries','country_id');
    }



}
