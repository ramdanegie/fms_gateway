<?php

namespace App\Http\Livewire\Form;

use App\Models\SizeContainer;
use Livewire\Component;

class UpdateSizeContainer extends Component
{
    public $sizeContainer;
    public $value;
    public $display;
    protected $rules = [
        'value'   => 'required|min:2',
        'display' => 'required|min:2',
    ];

    public function mount()
    {
        $this->value   = $this->sizeContainer->value;
        $this->display = $this->sizeContainer->display;
    }

    public function submit() 
    {
        $this->validate();
        if(SizeContainer::where("value", $this->value)->where("id", "!=", $this->sizeContainer->id)->count() > 0) {
            session()->flash("fms_error", "Size Container with Value {$this->value} exist");
            return;
        }

        $this->sizeContainer->value   = $this->value;
        $this->sizeContainer->display = $this->display;

        try {
            $this->sizeContainer->save();
        } catch (\Throwable $th) {
            session()->flash("fms_error", "Failed to Update. Please Try Again");
            return;
        }

        session()->flash("fms_info", "Data has been Updated");
    }

    public function render()
    {
        return view('livewire.form.update-size-container');
    }
}
