<?php

namespace App\Http\Livewire\Form;

use App\Models\Truck;
use Livewire\Component;

class UpdateTruck extends Component
{
    public $truck;
    public $name;
    public $type;
    protected $rules = [
        'name' => 'required|min:2',
    ];

    public function mount()
    {
        $this->name = $this->truck->name;
        $this->type = $this->truck->type;
    }

    public function submit()
    {
        $this->validate();
        if(Truck::where("name", $this->name)->where("id", "!=", $this->truck->id)->count() > 0) {
            session()->flash("fms_error", "Truck with name : {$this->name} exist");
            return;
        }

        $this->truck->name = $this->name;
        $this->truck->type = $this->type;

        try {
            $this->truck->save();
        } catch (\Throwable $th) {
            info($th->getMessage());
            session()->flash("fms_error", "Failed to Update. Please Try Again");
            return;
        }

        session()->flash("fms_info", "Data has been Updated");
    }

    public function render()
    {
        return view('livewire.form.update-truck');
    }
}
