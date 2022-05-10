<?php

namespace App\Http\Livewire\Form\Fcl;

use Livewire\Component;
use Livewire\WithFileUploads;

class Attachments extends Component
{
    use WithFileUploads;

    public $quote_type;
    public $redir;

    public $fullContainerLoad;
    public $form_page;
    public $edit_mode;

    public $file_deliveryorder;
    public $file_packaging_list;
    public $file_deliverynote;
    public $file_invoice;
    public $file_cert_origin;
    public $file_bill_lading;
    public $file_others;
    protected $rules = [
        "file_deliveryorder"  => "nullable|mimes:xlsx,zip,pdf,png,jpg,jpeg|max:5120",
        "file_packaging_list" => "nullable|mimes:xlsx,zip,pdf,png,jpg,jpeg|max:5120",
        "file_deliverynote"   => "nullable|mimes:xlsx,zip,pdf,png,jpg,jpeg|max:5120",
        "file_invoice"        => "nullable|mimes:xlsx,zip,pdf,png,jpg,jpeg|max:5120",
        "file_cert_origin"    => "nullable|mimes:xlsx,zip,pdf,png,jpg,jpeg|max:5120",
        "file_bill_lading"    => "nullable|mimes:xlsx,zip,pdf,png,jpg,jpeg|max:5120",
        "file_others"         => "nullable|mimes:xlsx,zip,pdf,png,jpg,jpeg|max:5120",
    ];

    public function submit()
    {
        $this->validate();

        $files = [];
        if(!empty($this->file_invoice)){
            $files["file_invoice"] = $this->file_invoice->store("fclfiles", "public");
        }

        if(!empty($this->file_deliveryorder)){
            $files["file_deliveryorder"] = $this->file_deliveryorder->store("fclfiles", "public");
        }

        if(!empty($this->file_deliverynote)){
            $files["file_deliverynote"] = $this->file_deliverynote->store("fclfiles", "public");
        }

        if(!empty($this->file_packaging_list)){
            $files["file_packaging_list"] = $this->file_packaging_list->store("fclfiles", "public");
        }

        if(!empty($this->file_cert_origin)){
            $files["file_cert_origin"] = $this->file_cert_origin->store("fclfiles", "public");
        }

        if(!empty($this->file_bill_lading)){
            $files["file_bill_lading"] = $this->file_bill_lading->store("fclfiles", "public");
        }

        if(!empty($this->file_others)){
            $files["file_others"] = $this->file_others->store("fclfiles", "public");
        }

        try {
            $this->fullContainerLoad->file_documents = json_encode($files);
            $this->fullContainerLoad->save();
        } catch (\Throwable $th) {
            //throw $th;
            info($th->getMessage());
            session()->flash("fms_error", "Failed to Saved. Please Try Again");
            return;
        }

        return redirect()->route($this->redir, ["quote_type" => $this->quote_type, "page" => "page-4", "fcl_id" => $this->fullContainerLoad->id, "edit_mode" => $this->edit_mode]);
    }

    public function render()
    {
        return view('livewire.form.fcl.attachments');
    }
}
