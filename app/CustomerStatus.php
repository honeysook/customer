<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerStatus extends Model
{
    protected $table = 'CustomerStatus';
    public $incrementing = false;
    protected $fillable = [];
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'CustomerStatusId';
    
    /**
    * @return HasMany
    */
    public function customers()
    {
        return $this->hasMany(Customer::class, 'CustomerStatusId', 'CustomerStatusId');
    }
}
