<?php

namespace App;

use App\Order;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'Customer';
    public $incrementing = false;
    const MIN_Y_LOYAL_PERIOD = 1; //1 year (12 months)
    const MIN_M_LOYAL_PERIOD = 3; //3 months
    const MIN_M_LOYAL_TOTAL = 200; // AUD

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'CustomerId';
    
    /**
     * @var array The attributes that are mass assignable.
     */
    protected $fillable = [];

    public $timestamps = false;

    protected $appends = [
        'OrderTotalCnt',
        'OrderTotalSum',
        'CustomerStatusName',
        'CustomerType'
    ];
    
    // Active customers who have not placed any orders during the last 12 months in ORANGE
    //'Active' customers who have placed a minumum of AUD 200 in sales over the last 3 months in GREEN
    // check the OrderStatus and make sure you are only including Completed
    // Removed Customer : Red
    public function getCustomerTypeAttribute()
    {
        $rt = '';
        $orderCnt = $this->getOrderTotalCntAttribute();
        $currentDatetime = date("Y-m-d H:i:s");
        $loyalSalesTotal = 0 ;

        if($this->customer_status->Code === 'AC'){

            if( $orderCnt > 0 )
            {
                $interval = date_diff(date_create($currentDatetime), date_create($this->orders[$orderCnt-1]->CreatedDateTime));

                if($interval->format('%y') >= static::MIN_Y_LOYAL_PERIOD){
                    $rt = 'Orange';
                }else{

                    foreach($this->orders as $order){
                        $interval = date_diff(date_create($currentDatetime), date_create($order->CreatedDateTime));
                        if($interval->format('%m') <= static::MIN_M_LOYAL_PERIOD && $order->OrderStatus === 'Completed'){
                            $loyalSalesTotal += $order->OrderTotal;
                        }
                    }

                    if($loyalSalesTotal >= static::MIN_M_LOYAL_TOTAL){
                        $rt = 'Green';
                    }
                }
            }
            else
            {
                $interval = date_diff(date_create($currentDatetime), date_create($this->CreatedDateTime));

                if($interval->format('%y') >= static::MIN_Y_LOYAL_PERIOD){
                    $rt = 'Orange';
                }
            }

        } elseif($this->customer_status->Code === 'RE'){
            $rt = 'Red';
        }
        return $rt;
    }
    
    public function getCustomerStatusNameAttribute()
    {
        return $this->customer_status->Name;
    }


    public function getOrderTotalCntAttribute()
    {
        return $this->orders->count();  
    }

    public function getOrderTotalSumAttribute() 
    {
        $orderTotalPrice = 0 ;
        foreach($this->orders as $order){
            $orderTotalPrice += $order->OrderTotal;
        }
        return $orderTotalPrice;
    }

    /**
    * @return HasMany
    */
    public function orders()
    {
        return $this->hasMany(Order::class, 'CustomerId', 'CustomerId')
            ->orderBy('CreatedDateTime', 'desc');
    }

    /**
    * @return BelongsTo
    */
    public function customer_status()
    {
        return $this->belongsTo(CustomerStatus::class,'CustomerStatusId','CustomerStatusId');
    }
}
