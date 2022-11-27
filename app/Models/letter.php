<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class letter extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'letters';

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
        'code',
        'from',
        'approved',
                  'to',
                  'Subject',
                  'message',
                  'Signature'
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
     * Set the Signature.
     *
     * @param  string  $value
     * @return void
     */
    public function setSignatureAttribute($value)
    {
        $this->attributes['Signature'] = json_encode($value);
    }

    /**
     * Get Signature in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getSignatureAttribute($value)
    {
        return json_decode($value) ?: [];
    }
  public function sender()
    {
        return $this->belongsTo('App\Models\User','from');
    }

     public function recever()
    {
        return $this->belongsTo('App\Models\User','to');
    }

}
