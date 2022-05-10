<?php

namespace App\Http\Livewire\Form;

use App\Models\ExportTransit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImportExportTransit extends Component
{
    use WithFileUploads;

    public $file_xls;
    public $buffer;
    protected $rules = [
        'file_xls' => 'required|max:5120',
    ];

    public function updatedFileXls()
    {
        $this->validate([
            'file_xls' => 'mimes:xlsx|max:5120', // 5MB Max
        ]);
    }

    public function upload()
    {
        $this->validate();

        $path = $this->file_xls->store("reader", "public");
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(public_path("files/{$path}"));
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = [];
        $output = [];
        foreach ($worksheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
            $cells = [];
            foreach ($cellIterator as $cell) {
                $cells[] = $cell->getValue();
            }
            $rows[] = $cells;
        }

        try {
            foreach ($rows as $i => $row) {
                if ($i == 0) {
                    continue;
                }

                $destination     = $row[0];
                $vessel          = $row[1];
                $voyage          = $row[2];
                $stf_cls         = $row[3];
                $etd_origin      = $row[4];
                $ves_connecting  = $row[5];
                $voy_connecting  = $row[6];
                $eta_destination = $row[7];
                $city_connecting = $row[8];
                $etd_destination = $row[9];

                if (empty($destination) || empty($vessel) || empty($voyage) || empty($stf_cls) || empty($etd_origin) || empty($eta_destination)) {
                    continue;
                }

                array_push($output, [
                    "destination"     => $destination,
                    "vessel"          => $vessel,
                    "voyage"          => $voyage,
                    "stf_cls"         => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($stf_cls),
                    "etd_origin"      => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($etd_origin),
                    "ves_connecting"  => $ves_connecting,
                    "voy_connecting"  => $voy_connecting,
                    "eta_destination" => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($eta_destination),
                    "city_connecting" => $city_connecting,
                    "etd_destination" => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($etd_destination),
                    "created_at"      => now(),
                    "updated_at"      => now(),
                ]);
            }

            if (empty($output)) {
                File::delete(public_path("files/{$path}"));
                session()->flash("fms_error", "No data to upload, possibly unsupported format or incomplete fields");
                return;
            }

            DB::transaction(function () use ($output) {
                ExportTransit::insert($output);
            }, 5);
        } catch (\Throwable $th) {
            info($th->getMessage());
            session()->flash("fms_error", "Import Data Failed");
            File::delete(public_path("files/{$path}"));
            return;
        }

        File::delete(public_path("files/{$path}"));
        session()->flash("fms_info", "Import Data Successful, " . count($output) . " Data has been Uploaded!");
        $this->reset();
    }

    public function render()
    {
        return view('livewire.form.import-export-transit');
    }
}
