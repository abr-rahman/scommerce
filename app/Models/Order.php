<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Notifications\Notifiable;

class Order extends BaseModel
{
    use Notifiable;

    protected $table = 'orders';

    protected $fillable = [
        'division_id',
        'user_id',
        'district_id',
        'upazila_id',
        'thana',
        'payment_method',
        'customer_name',
        'email',
        'phone',
        'address',
        'landmark',
        'sub_total',
        'shipping_charge',
        'payable_amount',
        'due_amount',
        'coupon_name',
        'discount_amount',
        'grand_total',
        'status',
        'role',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function division()
    {
        return $this->belongsTo(Division::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function upazila()
    {
        return $this->belongsTo(Upazila::class);
    }
    public function orderList()
    {
        return $this->hasMany(OrderList::class);
    }
}
