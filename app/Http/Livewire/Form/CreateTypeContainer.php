<?php

namespace App\Http\Livewire\Form;

use App\Models\TypeContainer;
use Livewire\Component;

class CreateTypeContainer extends Component
{
    public $title;
    public $description;
    protected $rules = [
        'title'       => 'required|min:2',
        'description' => 'required|min:2',
    ];

    public function submit() 
    {
        $this->validate();
        if(TypeContainer::where("title", $this->title)->count() > 0) {
            session()->flash("fms_error", "Type Container with Value {$this->title} exist");
            return;
        }

        $model              = new TypeContainer();
        $model->title       = $this->title;
        $model->description = $this->description;

        try {
            $model->save();
        } catch (\Throwable $th) {
            info($th->getMessage());
            session()->flash("fms_error", "Failed to Save. Please Try Again");
            return;
        }

        session()->flash("fms_info", "Data Saved Successful");
        $this->reset();
    }

    public function render()
    {
        return view('livewire.form.create-type-container');
    }
}
