<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateBanner extends Component
{
    use WithFileUploads;

    public $banner;
    public $file_banner;
    public $title;
    protected $rules = [
        'title'       => 'required|max:120',
        'file_banner' => 'nullable|sometimes|image|max:5120',
    ];

    public function mount()
    {
        $this->title = $this->banner->title;
    }

    public function submit()
    {
        $this->validate();
        $this->banner->title = $this->title;

        if (!empty($this->file_banner)) {
            $this->banner->file_banner = $this->file_banner->store("banner", "public");;
        }

        try {
            $this->banner->saveOrFail();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash("fms_error", "Failed to Update. Please Try Again");
            return;
        }

        session()->flash("fms_info", "Data has been Updated");
    }

    public function render()
    {
        return view('livewire.form.update-banner');
    }
}
