<?php

namespace App\Http\Livewire\Form;

use App\Models\Cargo;
use App\Models\Location;
use App\Models\SizeContainer;
use App\Models\TypeContainer;
use Livewire\Component;

class CreateFcl extends Component
{
    public $trade_type;
    public $incoterm;
    public $shipment_type;
    public $date_pickup;
    public $date_est_shipment;
    public $date_unloading;
    public $file_documents;
    public $is_custom_clearance;
    public $is_request_cert_origin;
    public $insurance_cur;
    public $insurance_amount;

    public $size;
    public $type;
    public $qty;

    public $cargo_description;
    public $cargo_type;
    public $cargo_length;
    public $cargo_height;
    public $cargo_depth;
    public $cargo_weight;
    public $cargo_volume;
    public $cargo_total_weight;
    public $cargo_total_unit;
    public $is_volume;

    public $origin_id;
    public $origin_city;
    public $origin_country;
    public $origin_address;

    public $destination_id;
    public $destination_city;
    public $destination_country;
    public $destination_address;

    public $cargo_id;

    public $origins;
    public $cargos;
    public $destinations;

    public $form_page;

    public function mount()
    {
        $this->form_page    = "page:1";
        $this->trade_type   = "EX";
        $this->origins      = Location::mine()->get();
        $this->cargos       = Cargo::mine()->get();
        $this->destinations = Location::mine()->get();
    }

    public function incCargoLength(){
        $this->input_cargos_length += 1;
    }

    public function decCargoLength(){
        if($this->input_cargos_length ==  1) {
            return;
        }

        $this->input_cargos_length -= 1;
    }

    public function setFormPage($form_page){
        $this->form_page = $form_page;
    }

    public function changeOrigin($origin_id)
    {
        if(empty($origin_id)){
            return;
        }

        $loc = Location::find($origin_id);
        if(!empty($loc)) {
            $this->origin_address = $loc->address;
            $this->origin_country = $loc->country;
            $this->origin_city    = $loc->city;
            $this->origin_id      = $origin_id;
        }
    }

    public function changeDestination($origin_id)
    {
        if(empty($origin_id)){
            return;
        }

        $loc = Location::find($origin_id);
        if(!empty($loc)) {
            $this->destination_address = $loc->address;
            $this->destination_country = $loc->country;
            $this->destination_city    = $loc->city;
            $this->destination_id      = $origin_id;
        }
    }

    public function changeCargo($cargo_id) {
        if(empty($cargo_id)) {
            return;
        }

    }

    public function render()
    {
        $list_incoterm = [];
        if($this->trade_type == "IM") {
            $list_incoterm = config("form-fcl.list_im_incoterm");
        }

        if($this->trade_type == "EX") {
            $list_incoterm = config("form-fcl.list_ex_incoterm");
        }

        return view('livewire.form.create-fcl', [
            "size_containers" => SizeContainer::orderBy("value", "asc")->get(),
            "type_containers" => TypeContainer::orderBy("title", "asc")->get(),
            "list_trade_type" => config("form-fcl.list_trade_type"),
            "list_incoterm"   => $list_incoterm,
            "origins"         => $this->origins,
            "cargos"          => $this->cargos,
            "destinations"    => $this->destinations,
        ]);
    }
}
