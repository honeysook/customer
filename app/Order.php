<?php

namespace App;

use App\Customer;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    protected $table = 'Order';

    public $incrementing = false;
    
    public $timestamps = false;
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'OrderId';
    

    protected $fillable = [];


    /**
    * @return BelongsTo
    */
    public function customer()
    {
        return $this->belongsTo(Customer::class,'CustomerId','CustomerId');
    }
}
