<?php

namespace App\Http\Livewire\Form;

use App\Models\Team;
use Livewire\Component;

class CreateTeam extends Component
{
    public $code;
    public $title;
    protected $rules = [
        'code'  => 'required|min:2|max:4',
        'title' => 'required|min:3|max:120',
    ];

    public function submit() 
    {
        $this->validate();
        if(Team::where("code", $this->code)->count() > 0) {
            session()->flash("fms_error", "Team with Code : {$this->code} exist");
            return;
        }

        $model        = new Team();
        $model->code  = $this->code;
        $model->title = $this->title;

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
        return view('livewire.form.create-team');
    }
}
