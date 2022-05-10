<?php

namespace App\Models;

use App\Helper\Common;
use App\Helper\Convert;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FullContainerLoad extends Model
{
    use HasFactory;
    const PENDING  = null;
    const PROGRESS = "PRO";
    const COMPLETE = "COMP";
    const REJECT   = "REJ";
    const CANCEL   = "CNL";

    private $msds_count = 0;

    public function origin()
    {
        if (empty($this->origin_id)) {
            return $this->belongsTo(MasterPort::class, "originport_id");
        }

        return $this->belongsTo(Location::class, "origin_id");
    }

    public function destination()
    {
        if (empty($this->destination_id)) {
            return $this->belongsTo(MasterPort::class, "destiport_id");
        }

        return $this->belongsTo(Location::class, "destination_id");
    }

    public function containers()
    {
        return $this->hasMany(FclContainer::class, "fcl_id");
    }

    public function cargos()
    {
        return $this->hasMany(FclCargo::class, "fcl_id");
    }

    public function tracking()
    {
        return $this->morphMany(Tracking::class, 'trackingable');
    }

    public function ticket()
    {
        return $this->morphMany(Ticket::class, 'ticketable');
    }

    public function pickup()
    {
        return $this->belongsTo(Location::class, "pickup_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function drafDocument()
    {
        return $this->hasOne(FclDraftDocument::class, "fcl_id");
    }

    public function invoicing()
    {
        return $this->hasOne(FclInvoicing::class, "fcl_id");
    }

    public function delivery()
    {
        return $this->belongsTo(Location::class, "delivery_id");
    }

    public function shippingInstruction()
    {
        return $this->hasOne(FclShippingInstruction::class, "fcl_id");
    }

    public function scopeMine(Builder $builder)
    {
        return $builder->where("user_id", auth()->user()->id);
    }

    public function scopeOngoing(Builder $builder)
    {
        return $builder->where("pi_status", "!=", "OK")
            ->where("is_temp", 0);
    }

    public function scopeOnShipment(Builder $builder)
    {
        return $builder->whereNotNull("shipment_no")
            ->whereNotIn("issued_status", [FullContainerLoad::COMPLETE, FullContainerLoad::REJECT]);
    }

    public function scopeOnShipmentComplete(Builder $builder)
    {
        return $builder->whereNotNull("shipment_no")
            ->where("issued_status", FullContainerLoad::COMPLETE);
    }

    public function isRequireMSDS()
    {
        $info = false;
        foreach ($this->cargos as $item) {
            if (Common::isRequireMSDS($item->cargo_type)) {
                $info = true;
                $this->msds_count++;
            }
        }

        return $info;
    }

    public function getCurrentStatus(bool $translated = true)
    {
        if (empty($this->issued_status) && empty($this->pi_status)) {
            return $translated ? config("quote_status")[100] : 100;
        }

        if (empty($this->issued_status) && $this->pi_status == "WR") {
            return $translated ? config("quote_status")[101] : 101;
        }

        if (empty($this->issued_status) && $this->pi_status == "OK") {
            return $translated ? config("quote_status")[102] : 102;
        }

        if (empty($this->issued_status) && $this->pi_status == "RJ") {
            return $translated ? config("quote_status")[101] : 400;
        }

        if (!empty($this->issued_status)) {
            return Convert::issuedStatus($this->issued_status);
        }

        return "{$this->issued_status} - {$this->pi_status}";
    }

    /**
     * this method should invoked after isRequireMSDS, return 0 by default.
     *
     * @return mixed
     */
    public function getMsdsCount()
    {
        return $this->msds_count;
    }

    /**
     * Set the value of msds_count
     *
     * @param   mixed  $msds_count  
     *
     * @return  self
     */
    public function setMsdsCount($msds_count)
    {
        $this->msds_count = $msds_count;

        return $this;
    }

    public function scopeSearch(Builder $builder, string $search = null)
    {
        if (empty($search)) {
            return $builder;
        }

        $search = trim($search);
        return $builder->where(function (Builder $sql) use ($search) {
            $sql->where("quote_no", "like", "%{$search}%")
                ->orWhere("shipment_no", "like", "%{$search}%");
        });
    }
}
