<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;

class UpdateTracking extends Component
{
    public $tracking;
    public $shipment_status;
    public $shipment_date;

    public function mount()
    {
        $this->shipment_date   = $this->tracking->shipment_date;
        $this->shipment_status = $this->tracking->shipment_status;
    }

    public function submit()
    {
        $model                  = $this->tracking;
        $model->shipment_date   = $this->shipment_date;
        $model->shipment_status = $this->shipment_status;
        $model->is_publish      = 1;

        try {
            $model->save();
        } catch (\Throwable $th) {
            session()->flash("fms_error", $th->getMessage());
            return;
        }

        session()->flash("fms_info", "Tracking info updated");
    }

    public function render()
    {
        return view('livewire.form.update-tracking');
    }
}
