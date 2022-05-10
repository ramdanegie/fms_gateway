<?php

namespace App\Http\Livewire\Form;

use App\Models\Team;
use Livewire\Component;

class UpdateTeam extends Component
{
    public $team;
    public $code;
    public $title;
    protected $rules = [
        'code'  => 'required|min:2|max:4',
        'title' => 'required|min:3|max:120',
    ];

    public function submit() 
    {
        $this->validate();
        if(Team::where("code", $this->code)->where("id", "!=", $this->team->id)->count() > 0) {
            session()->flash("fms_error", "Team with Code : {$this->code} exist");
            return;
        }

        $model = $this->team;
        if(empty($model)) {
            session()->flash("fms_error", "Team not found");
            return;
        }

        $model->code  = $this->code;
        $model->title = $this->title;

        try {
            $model->save();
        } catch (\Throwable $th) {
            session()->flash("fms_error", "Failed to Update. Please Try Again");
            return;
        }

        session()->flash("fms_info", "Data has been Updated");
    }

    public function mount()
    {
        $this->code  = $this->team->code;
        $this->title = $this->team->title;
    }

    public function render()
    {
        return view('livewire.form.update-team');
    }
}
