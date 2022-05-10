<?php

namespace App\Http\Livewire\Form;

use App\Models\SizeContainer;
use Livewire\Component;

class CreateSizeContainer extends Component
{
    public $value;
    public $display;
    protected $rules = [
        'value'   => 'required|min:2',
        'display' => 'required|min:2',
    ];

    public function submit() 
    {
        $this->validate();
        if(SizeContainer::where("value", $this->value)->count() > 0) {
            session()->flash("fms_error", "Size Container with value : {$this->value} exist");
            return;
        }

        $model          = new SizeContainer();
        $model->value   = $this->value;
        $model->display = $this->display;

        try {
            $model->save();
        } catch (\Throwable $th) {
            session()->flash("fms_error", "Failed to Save. Please Try Again");
            return;
        }

        session()->flash("fms_info", "Data Saved Successful");
        $this->reset();
    }

    public function render()
    {
        return view('livewire.form.create-size-container');
    }
}
