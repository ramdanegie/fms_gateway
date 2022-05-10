<?php

namespace App\Http\Livewire\Form;

use App\Models\Banner;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateBanner extends Component
{
    use WithFileUploads;

    public $file_banner;
    public $title;
    protected $rules = [
        'title'       => 'required|max:120',
        'file_banner' => 'required|image|max:5120',
    ];

    public function submit()
    {
        $this->validate();
        $model              = new Banner();
        $model->file_banner = $this->file_banner->store("banner", "public");
        $model->title       = $this->title;

        try {
            $model->saveOrFail();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash("fms_error", "Failed to Save. Please Try Again");
            return;
        }

        session()->flash("fms_info", "Data Saved Succesful");
        $this->reset();
    }

    public function render()
    {
        return view('livewire.form.create-banner');
    }
}
