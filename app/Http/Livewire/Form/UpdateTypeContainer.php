<?php

namespace App\Http\Livewire\Form;

use App\Models\TypeContainer;
use Livewire\Component;

class UpdateTypeContainer extends Component
{
    public $typeContainer;
    public $title;
    public $description;
    protected $rules = [
        'title'       => 'required|min:2',
        'description' => 'required|min:2',
    ];

    public function mount()
    {
        $this->title       = $this->typeContainer->title;
        $this->description = $this->typeContainer->description;
    }

    public function submit() 
    {
        $this->validate();
        if(TypeContainer::where("title", $this->title)->where("id", "!=", $this->typeContainer->id)->count() > 0) {
            session()->flash("fms_error", "Type Container with title : {$this->title} exist");
            return;
        }

        $this->typeContainer->title       = $this->title;
        $this->typeContainer->description = $this->description;

        try {
            $this->typeContainer->save();
        } catch (\Throwable $th) {
            session()->flash("fms_error", "Failed to Update. Please Try Again");
            return;
        }

        session()->flash("fms_info", "Data has been Updated");
    }

    public function render()
    {
        return view('livewire.form.update-type-container');
    }
}
