<?php

namespace App\Http\Livewire\Form;

use App\Models\Ticket;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateTicket extends Component
{
    use WithFileUploads;

    public $ticket;
    public $shipment_no;
    public $user_id;
    public $subject;
    public $message;
    public $dept;
    public $attachment;
    protected $rules = [
        'subject'    => 'required|min:2',
        'message'    => 'required|min:3',
        'dept'       => 'required',
        'attachment' => 'nullable|mimes:xlsx,pdf,jpg,png',
    ];

    public function mount()
    {
        if(!empty($this->ticket))
        {
            $this->shipment_no = $this->ticket->ticketable->quote_no;
        }
    }

    public function submit() 
    {
        $this->validate();

        $model = new Ticket();
        if(!empty($this->ticket)) {
            $model = $this->ticket;
        }

        $model->user_id    = auth()->user()->id;
        $model->subject    = $this->subject;
        $model->message    = $this->message;
        $model->dept       = $this->dept;
        $model->is_publish = 1;

        if(!empty($this->attachment)) {
            $model->attachment = $this->attachment->store("ticket", "public");
        }

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
        return view('livewire.form.create-ticket');
    }
}
