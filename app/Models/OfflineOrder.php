<?php

namespace App\Models;

use App\Models\BaseModel;

class OfflineOrder extends BaseModel
{
    protected $fillable = [
        'offline_customer_id',
        'sub_total',
        'grand_total',
        'invoice_number',
        'payable_amount',
        'due_amount',
        'vat',
        'shipping_charge',
        'status',
    ];

    public function customerName()
    {
       return $this->belongsTo(OfflineCustomer::class, 'offline_customer_id', 'id'); 
    }
}
