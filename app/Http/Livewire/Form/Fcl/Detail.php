<?php

namespace App\Http\Livewire\Form\Fcl;

use App\Exceptions\FmsException;
use App\Models\Cargo;
use App\Models\FclCargo;
use App\Models\FclContainer;
use App\Models\Location;
use App\Models\SizeContainer;
use App\Models\Truck;
use App\Models\TypeContainer;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Detail extends Component
{
    use WithFileUploads;

    public $quote_type;
    public $redir;

    public $fullContainerLoad;
    public $fclContainer;
    public $fclCargo;
    public $form_page;
    public $edit_mode;

    // insurance
    public $insurance_cur;
    public $insurance_amount;
    public $is_pickup;
    public $is_delivery;
    public $delivery_id;
    public $cargo_cur;
    public $cargo_amount;
    public $freight_cur;
    public $freight_amount;

    // containers 
    public $size;
    public $container_type;
    public $qty;
    public $frm_container = [0];
    public $frm_cidx = 1;

    public $truck_id;
    public $qty_unit;

    // cargo
    public $old_cargo_id;
    public $cargo_id;
    public $cargo_description;
    public $cargo_type;
    public $cargo_hs_code;
    public $cargo_length;
    public $cargo_height;
    public $cargo_depth;
    public $cargo_weight;
    public $cargo_volume;
    public $cargo_total_weight;
    public $cargo_total_unit;
    public $file_msds;
    public $is_volume;
    public $is_weight;
    public $file_cargo_image;
    public $frm_cargo = [0];
    public $frm_cargo_i = 1;

    public $size_containers;
    public $type_containers;
    public $cargos;
    public $origins = [];
    public $trucks;

    public $rules = [
        "cargo_id.*"   => "required",
        "cargo_type.*" => "required",
        "file_msds.*"  => "nullable|mimes:pdf,jpg,png,jpeg",
    ];

    public function addFormContainer($i)
    {
        array_push($this->frm_container, $i);
        $this->frm_cidx += $i;
    }

    public function removeFormContainer($i)
    {
        if (count($this->frm_container) == 1) {
            return;
        }

        unset($this->frm_container[$i]);
    }

    public function addFormCargo($i)
    {
        array_push($this->frm_cargo, $i);
        $this->frm_cargo_i += $i;
    }

    public function removeFormCargo($i)
    {
        if (count($this->frm_cargo) == 1) {
            return;
        }

        unset($this->frm_cargo[$i]);
    }

    public function mount()
    {
        if (empty($this->quote_type)) {
            return abort(403, "Invalid quote type");
        }
        $this->cargo_id         = [];
        $this->insurance_cur    = $this->fullContainerLoad->insurance_cur;
        $this->insurance_amount = $this->fullContainerLoad->insurance_amount;
        $this->cargo_cur        = $this->fullContainerLoad->cargo_cur;
        $this->cargo_amount     = $this->fullContainerLoad->cargo_amount;
        $this->freight_cur      = $this->fullContainerLoad->freight_cur;
        $this->freight_amount   = $this->fullContainerLoad->freight_amount;
        $this->is_pickup        = $this->fullContainerLoad->is_pickup;
        $this->is_delivery      = $this->fullContainerLoad->is_delivery;
        $this->delivery_id      = $this->fullContainerLoad->delivery_id;
        $this->truck_id         = $this->fullContainerLoad->truck_id;
        $this->qty_unit         = $this->fullContainerLoad->qty_unit;

        $trucks = Truck::mine();
        if(!in_array($this->fullContainerLoad->trade_type, ["IM", "EX"])) {
            $trucks = Truck::mine();
        }

        $this->trucks  = $trucks->get();
        $this->origins = Location::mine()->get();

        $this->fclContainer = FclContainer::where("fcl_id", $this->fullContainerLoad->id)->get();
        if (empty($this->fclContainer)) {
            $this->fclContainer[0]         = new FclContainer();
            $this->fclContainer[0]->fcl_id = $this->fullContainerLoad->id;
            $this->fclContainer[0]->save();
        }

        foreach ($this->fclContainer as $key => $containerSize) {
            if ($key > 0) {
                $this->addFormContainer($key);
            }

            $this->size[$key]           = $containerSize->size;
            $this->container_type[$key] = $containerSize->type;
            $this->qty[$key]            = $containerSize->qty;
        }

        $this->fclCargo = FclCargo::where("fcl_id", $this->fullContainerLoad->id)->get();
        if (empty($this->fclCargo)) {
            $this->fclCargo[0] = new FclCargo();
            $this->fclCargo[0]->fcl_id = $this->fullContainerLoad->id;
            $this->fclCargo[0]->save();
        }

        foreach ($this->fclCargo as $key => $fclCargo) {
            if ($key > 0) {
                $this->addFormCargo($key);
            }

            $this->cargo_description[$key]  = $fclCargo->cargo_description;
            $this->cargo_type[$key]         = $fclCargo->cargo_type;
            $this->cargo_hs_code[$key]      = $fclCargo->cargo_hs_code;
            $this->cargo_length[$key]       = $fclCargo->cargo_length;
            $this->cargo_height[$key]       = $fclCargo->cargo_height;
            $this->cargo_depth[$key]        = $fclCargo->cargo_depth;
            $this->cargo_weight[$key]       = $fclCargo->cargo_weight;
            $this->cargo_volume[$key]       = $fclCargo->cargo_volume;
            $this->cargo_total_weight[$key] = $fclCargo->cargo_total_weight;
            $this->cargo_total_unit[$key]   = $fclCargo->cargo_total_unit;
            $this->is_volume[$key]          = $fclCargo->is_volume;
            $this->cargo_id[$key]           = $fclCargo->cargo_id;
            $this->old_cargo_id[$key]       = $fclCargo->cargo_id;
        }

        $this->cargos          = Cargo::mine()->get();
        $this->size_containers = SizeContainer::orderBy("value", "asc")->get();
        $this->type_containers = TypeContainer::orderBy("title", "asc")->get();
    }

    public function changeCargo($cargo_id, $i)
    {
        if (empty($cargo_id)) {
            return;
        }

        $cargo = Cargo::find($cargo_id);
        if (!empty($cargo)) {
            $this->cargo_description[$i] = $cargo->description;
            $this->cargo_type[$i]        = $cargo->type;
            $this->cargo_length[$i]      = $cargo->length;
            $this->cargo_height[$i]      = $cargo->height;
            $this->cargo_depth[$i]       = $cargo->depth;
            $this->cargo_weight[$i]      = $cargo->weight;
            $this->cargo_hs_code[$i]     = $cargo->hs_code;
        }
    }

    public function submit()
    {
        if ($this->quote_type == "fcl") {
            array_merge($this->rules, [
                "size.*"           => "required",
                "container_type.*" => "required",
                "qty.*"            => "required",
            ]);
        }

        $this->validate($this->rules);
        $this->fullContainerLoad->insurance_cur    = $this->insurance_cur;
        $this->fullContainerLoad->insurance_amount = empty($this->insurance_amount) ? 0 : preg_replace("/[^0-9]/", "", $this->insurance_amount);
        $this->fullContainerLoad->cargo_cur        = $this->cargo_cur;
        $this->fullContainerLoad->cargo_amount     = empty($this->cargo_amount) ? 0 : preg_replace("/[^0-9]/", "", $this->cargo_amount);
        $this->fullContainerLoad->freight_cur      = $this->freight_cur;
        $this->fullContainerLoad->freight_amount   = empty($this->freight_amount) ? 0 : preg_replace("/[^0-9]/", "", $this->freight_amount);

        DB::beginTransaction();
        try {
            FclContainer::where("fcl_id", $this->fullContainerLoad->id)->delete();
            $this->fullContainerLoad->delivery_id = $this->delivery_id;
            $this->fullContainerLoad->truck_id    = $this->truck_id;
            $this->fullContainerLoad->qty_unit    = $this->qty_unit;
            $this->fullContainerLoad->save();

            foreach ($this->frm_cargo as $key => $value) {
                $this->fclCargo = new FclCargo();
                $chk = FclCargo::where([
                    ["fcl_id", $this->fullContainerLoad->id],
                    ["cargo_id", (isset($this->old_cargo_id[$key]) ? $this->old_cargo_id[$key] : null)],
                ])->first();
                if (!empty($chk)) {
                    $this->fclCargo = $chk;
                }

                if (isset($this->cargo_type[$key]) && $this->cargo_type[$key] == "Dangerous Goods" && empty($this->file_msds[$key])) {
                    throw new FmsException("MSDS file is required for cargo {$this->cargo_type[$key]}");
                }

                $this->fclCargo->fcl_id             = $this->fullContainerLoad->id;
                $this->fclCargo->cargo_id           = $this->cargo_id[$key];
                $this->fclCargo->cargo_description  = $this->cargo_description[$key];
                $this->fclCargo->cargo_type         = $this->cargo_type[$key];
                $this->fclCargo->cargo_hs_code      = $this->cargo_hs_code[$key];
                $this->fclCargo->cargo_length       = $this->cargo_length[$key];
                $this->fclCargo->cargo_height       = $this->cargo_height[$key];
                $this->fclCargo->cargo_depth        = $this->cargo_depth[$key];
                $this->fclCargo->cargo_weight       = $this->cargo_weight[$key];
                $this->fclCargo->cargo_volume       = $this->cargo_volume[$key];
                $this->fclCargo->cargo_total_weight = $this->cargo_total_weight[$key];
                $this->fclCargo->cargo_total_unit   = $this->cargo_total_unit[$key];
                $this->fclCargo->is_volume          = isset($this->is_volume[$key]) ? $this->is_volume[$key] : 0;
                $this->fclCargo->file_msds          = (isset($this->file_msds[$key]) && !empty($this->file_msds[$key])) ? $this->file_msds[$key]->store("fclfiles", "public") : null;
                $this->fclCargo->saveOrFail();
            }

            if (in_array($this->quote_type, ['fcl', 'ftl'])) {
                foreach ($this->qty as $key => $value) {
                    $this->fclContainer         = new FclContainer();
                    $this->fclContainer->fcl_id = $this->fullContainerLoad->id;
                    $this->fclContainer->size   = $this->size[$key];
                    $this->fclContainer->type   = $this->container_type[$key];
                    $this->fclContainer->qty    = $this->qty[$key];
                    $this->fclContainer->saveOrFail();
                }
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;
            info($th->getMessage());
            if ($th instanceof FmsException) {
                session()->flash("fms_error", $th->getMessage());
            } else {
                session()->flash("fms_error", "Failed to Saved. Please Try Again");
            }

            return;
        }

        DB::commit();
        if(!empty($this->redir)) {
            return redirect()->route($this->redir, ["quote_type" => $this->quote_type, "page" => "page-3", "fcl_id" => $this->fullContainerLoad->id, "edit_mode" => $this->edit_mode]);
        }

        session()->flash("fms_info", "Updated");
    }

    public function render()
    {
        foreach ($this->cargo_id as $key => $v) {
            $is_volume          = isset($this->is_volume[$key]) ? $this->is_volume[$key] : 0;
            $is_weight          = isset($this->is_weight[$key]) ? $this->is_weight[$key] : 0;
            $cargo_length       = isset($this->cargo_length[$key]) ? $this->cargo_length[$key] : 0;
            $cargo_depth        = isset($this->cargo_depth[$key]) ? $this->cargo_depth[$key] : 0;
            $cargo_height       = isset($this->cargo_height[$key]) ? $this->cargo_height[$key] : 0;
            $cargo_total_unit   = isset($this->cargo_total_unit[$key]) ? $this->cargo_total_unit[$key] : 0;
            $cargo_weight       = isset($this->cargo_weight[$key]) ? $this->cargo_weight[$key] : 0;

            if ($is_volume == 0) {
                try {
                    $this->cargo_volume[$key] = ((($cargo_length * $cargo_depth) * $cargo_height) / 1000000) * $cargo_total_unit;
                } catch (\Throwable $th) {
                    $this->cargo_volume[$key] = 0;
                }
            }

            if ($is_weight != 1) {
                try {
                    $this->cargo_total_weight[$key] = $cargo_weight * $cargo_total_unit;
                } catch (\Throwable $th) {
                    $this->cargo_total_weight[$key] = $cargo_weight;
                }
            }

            if ($is_volume == 1) {
                $this->cargo_height[$key]   = 0;
                $this->cargo_length[$key]   = 0;
                $this->cargo_depth[$key]    = 0;
                $this->cargo_weight[$key]   = 0;
            }

            if ($is_weight == 1) {
                $this->cargo_weight[$key]   = 0;
            }
        }

        return view('livewire.form.fcl.detail');
    }
}
