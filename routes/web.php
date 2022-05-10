<?php

use App\Client\Tms;
use App\Http\Controllers\ConsigneeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DirectScheduleController;
use App\Http\Controllers\DraftDocumentController;
use App\Http\Controllers\FclController;
use App\Http\Controllers\InvoicingController;
use App\Http\Controllers\MasterCargoController;
use App\Http\Controllers\MasterLocationController;
use App\Http\Controllers\NonDirectScheduleController;
use App\Http\Controllers\NotifiPartyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShipperController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TrackingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {return redirect()->route("login");});
Route::middleware(['auth'])->get('/identifier', function () {
    if(request()->user()->team_id == 1) {
        return redirect()->route("internal.dashboard");
    }

    return redirect()->route("dashboard");
});

Route::middleware(['auth', 'userOnly'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, "dashboard"])->name('dashboard');
    Route::prefix("profile")->group(function () {
        Route::get("/setting", [ProfileController::class, "settingPage"])->name("profile.setting");
    });

    Route::prefix("master/cargo")->group(function () {
        Route::get("/list", [MasterCargoController::class, "list"])->name("master.cargo");
        Route::get("/create", [MasterCargoController::class, "formCreate"])->name("master.cargo-create");
        Route::get("/update/{cargo}", [MasterCargoController::class, "formUpdate"])->name("master.cargo-update");
        Route::get("/delete/{cargo}", [MasterCargoController::class, "deleteCargo"])->name("master.cargo-delete");
    });

    Route::prefix("master/location")->group(function () {
        Route::get("/list", [MasterLocationController::class, "list"])->name("master.location");
        Route::get("/create", [MasterLocationController::class, "formCreate"])->name("master.location-create");
        Route::get("/update/{location}", [MasterLocationController::class, "formUpdate"])->name("master.location-update");
        Route::get("/delete/{location}", [MasterLocationController::class, "deleteLocation"])->name("master.location-delete");
    });

    Route::prefix("master/shipper")->group(function () {
        Route::get("/list", [ShipperController::class, "list"])->name("master.shipper");
        Route::get("/create", [ShipperController::class, "formCreate"])->name("master.shipper-create");
        Route::get("/update/{shipper}", [ShipperController::class, "formUpdate"])->name("master.shipper-update");
        Route::get("/delete/{shipper}", [ShipperController::class, "deleteModel"])->name("master.shipper-delete");
    });

    Route::prefix("master/consignee")->group(function () {
        Route::get("/list", [ConsigneeController::class, "list"])->name("master.consignee");
        Route::get("/create", [ConsigneeController::class, "formCreate"])->name("master.consignee-create");
        Route::get("/update/{consignee}", [ConsigneeController::class, "formUpdate"])->name("master.consignee-update");
        Route::get("/delete/{consignee}", [ConsigneeController::class, "deleteModel"])->name("master.consignee-delete");
    });

    Route::prefix("master/notifi-party")->group(function () {
        Route::get("/list", [NotifiPartyController::class, "list"])->name("master.notifi-party");
        Route::get("/create", [NotifiPartyController::class, "formCreate"])->name("master.notifi-party-create");
        Route::get("/update/{notifiParty}", [NotifiPartyController::class, "formUpdate"])->name("master.notifi-party-update");
        Route::get("/delete/{notifiParty}", [NotifiPartyController::class, "deleteModel"])->name("master.notifi-party-delete");
    });

    Route::prefix("schedule")->group(function () {
        Route::get("/list-direct", [DirectScheduleController::class, "list"])->name("lcl-schedule.direct");
        Route::get("/list-non-direct", [NonDirectScheduleController::class, "list"])->name("lcl-schedule.non-direct");
    });

    Route::prefix("request/")->group(function () {
        Route::get("/quotation/{quote_type}", [FclController::class, "requestQuoteHandle"])->name("req-quote");
    });

    Route::prefix("manage/")->group(function () {
        Route::get("/quotation", [FclController::class, "editQuoteHandle"])->name("edit-quote");
        Route::get("/quotation/{quote_type}/delete", [FclController::class, "deleteHandle"])->name("edit-quote.delete");
        Route::get("/quotation/{quote_type}/cargos/{fcl}", [FclController::class, "detailCargoHandle"])->name("edit-quote.cargos");
        Route::get("/quotation/{quote_type}/documents/{fcl}", [FclController::class, "detailDocumentHandle"])->name("edit-quote.documents");
        Route::get("/quotation/{quote_type}/quotation/{fcl}", [FclController::class, "detailQuotation"])->name("edit-quote.quotation");
        Route::get("/quotation/{quote_type}/quotation/{fcl}/agree", [FclController::class, "handleAgree"])->name("edit-quote.quotation-agree");
        Route::any("/quotation/{quote_type}/quotation/{fcl}/reject", [FclController::class, "handleReject"])->name("edit-quote.quotation-reject");
        Route::get("/quotation/{quote_type}/ask/{fcl}", [FclController::class, "handleTicketing"])->name("edit-quote.ask");
        Route::get("/quotation/{quote_type}/shipping-instruction/{fcl}", [FclController::class, "shippingInstruction"])->name("edit-quote.shipping-instruction");
    });

    Route::prefix("manage/")->group(function () {
        Route::get("/shipment", [FclController::class, "shipmentHandle"])->name("manage-shipment");
        Route::get("/shipment/{quote_type}/detail/{fcl}", [FclController::class, "detailShipmentHandle"])->name("manage-shipment.detail-shipment");
        Route::get("/shipment/{quote_type}/booking-confirm/{fcl}", [FclController::class, "bookingConfirmHandle"])->name("manage-shipment.booking-confirm");
    });

    Route::get('/tracking-shipment', [TrackingController::class, "trackingHandler"])->name('tracking-shipment');
    Route::prefix("draft-document")->group(function () {
        Route::get("/{draft_type}", [DraftDocumentController::class, "list"])->name("draft-doc");
        Route::get("/{draft_type}/download/{draft}", [DraftDocumentController::class, "download"])->name("draft-doc.download");
        Route::get("/{draft_type}/create/{fcl}", [DraftDocumentController::class, "create"])->name("draft-doc.create");
        Route::get("/history/{fcl}", [DraftDocumentController::class, "listHistory"])->name("draft-doc.history");
    });

    Route::prefix("invoice")->group(function () {
        Route::get("/list", [InvoicingController::class, "list"])->name("invoice.list");
        Route::get("/history/{fcl}", [InvoicingController::class, "listHistory"])->name("invoice.history");
    });

    Route::prefix("ticket")->group(function () {
        Route::get("/list", [TicketController::class, "list"])->name("ticket.list");
        Route::get("/create/{ticket?}", [TicketController::class, "create"])->name("ticket.create");
        Route::get("/delete/{ticket}", [TicketController::class, "delete"])->name("ticket.delete");
        Route::get("/detail/{ticket}", [TicketController::class, "detail"])->name("ticket.detail");
        Route::post("/reply", [TicketController::class, "reply"])->name("ticket.reply");
    });

    Route::get('/tutorial', [DashboardController::class, "dashboard"])->name('tutorial.index');
});

Route::post('fms/auth/token/create', [Tms::class, "getToken"])->name('getToken');
require __DIR__ . '/admin.php';
require __DIR__ . '/auth.php';
