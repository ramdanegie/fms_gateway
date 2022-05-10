<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FclShippingInstruction extends Model
{
    use HasFactory;

    public function fcl()
    {
        return $this->belongsTo(FullContainerLoad::class, "fcl_id");
    }

    public function shipper()
    {
        return $this->belongsTo(Shipper::class, "shipper_id");
    }

    public function consignee()
    {
        return $this->belongsTo(Consignee::class, "consignee_id");
    }

    public function notify()
    {
        return $this->belongsTo(NotifiParty::class, "notifi_id");
    }
}
