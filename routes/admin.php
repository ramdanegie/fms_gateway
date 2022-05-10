<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\DraftDocumentController;
use App\Http\Controllers\FclController;
use App\Http\Controllers\Internal\BannerController;
use App\Http\Controllers\Internal\DashboardController;
use App\Http\Controllers\Internal\MasterExportDirectController;
use App\Http\Controllers\Internal\MasterExportTransitController;
use App\Http\Controllers\Internal\MasterImportDirectController;
use App\Http\Controllers\Internal\MasterImportTransitController;
use App\Http\Controllers\Internal\MasterSizeContainerController;
use App\Http\Controllers\Internal\MasterTeamController;
use App\Http\Controllers\Internal\MasterTypeContainerController;
use App\Http\Controllers\Internal\MasterUserController;
use App\Http\Controllers\Internal\TrackingController;
use App\Http\Controllers\InvoicingController;
use App\Http\Controllers\MasterDepotController;
use App\Http\Controllers\MasterPortController;
use App\Http\Controllers\MasterTruckController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
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

Route::middleware(['auth', 'adminOnly'])->prefix("internal")->name("internal.")->group(function () {
    Route::get('/dashboard', [DashboardController::class, "dashboard"])->name('dashboard');
    Route::prefix("profile")->group(function () {
        Route::get("/setting", [ProfileController::class, "settingPage"])->name("profile.setting");
    });

    Route::prefix("master/user")->group(function () {
        Route::get("/list", [MasterUserController::class, "list"])->name("master.user");
        Route::get("/create", [MasterUserController::class, "formCreate"])->name("master.user-create");
        Route::get("/update/{user}", [MasterUserController::class, "formUpdate"])->name("master.user-update");
        Route::get("/delete/{user}", [MasterUserController::class, "deleteUser"])->name("master.user-delete");
    });

    Route::prefix("master/team")->group(function () {
        Route::get("/list", [MasterTeamController::class, "list"])->name("master.team");
        Route::get("/create", [MasterTeamController::class, "formCreate"])->name("master.team-create");
        Route::get("/update/{team}", [MasterTeamController::class, "formUpdate"])->name("master.team-update");
        Route::get("/delete/{team}", [MasterTeamController::class, "deleteTeam"])->name("master.team-delete");
        Route::get("/role/{team}", [MasterTeamController::class, "roleTeam"])->name("master.team-role");
    });

    Route::prefix("master/size-container")->group(function () {
        Route::get("/list", [MasterSizeContainerController::class, "list"])->name("master.size");
        Route::get("/create", [MasterSizeContainerController::class, "formCreate"])->name("master.size-create");
        Route::get("/update/{sizeContainer}", [MasterSizeContainerController::class, "formUpdate"])->name("master.size-update");
        Route::get("/delete/{sizeContainer}", [MasterSizeContainerController::class, "deleteSize"])->name("master.size-delete");
    });

    Route::prefix("master/type-container")->group(function () {
        Route::get("/list", [MasterTypeContainerController::class, "list"])->name("master.type");
        Route::get("/create", [MasterTypeContainerController::class, "formCreate"])->name("master.type-create");
        Route::get("/update/{typeContainer}", [MasterTypeContainerController::class, "formUpdate"])->name("master.type-update");
        Route::get("/delete/{typeContainer}", [MasterTypeContainerController::class, "deleteType"])->name("master.type-delete");
    });

    Route::prefix("master/port")->group(function () {
        Route::get("/list", [MasterPortController::class, "list"])->name("master.port");
        Route::get("/create", [MasterPortController::class, "formCreate"])->name("master.port-create");
        Route::get("/update/{masterPort}", [MasterPortController::class, "formUpdate"])->name("master.port-update");
        Route::get("/delete/{masterPort}", [MasterPortController::class, "deletePort"])->name("master.port-delete");
    });

    Route::prefix("master/depot")->group(function () {
        Route::get("/list", [MasterDepotController::class, "list"])->name("master.depot");
        Route::get("/create", [MasterDepotController::class, "formCreate"])->name("master.depot-create");
        Route::get("/update/{depot}", [MasterDepotController::class, "formUpdate"])->name("master.depot-update");
        Route::get("/delete/{depot}", [MasterDepotController::class, "deleteDepot"])->name("master.depot-delete");
    });

    Route::prefix("master/truck")->group(function () {
        Route::get("/list", [MasterTruckController::class, "list"])->name("master.truck");
        Route::get("/create", [MasterTruckController::class, "formCreate"])->name("master.truck-create");
        Route::get("/update/{truck}", [MasterTruckController::class, "formUpdate"])->name("master.truck-update");
        Route::get("/delete/{truck}", [MasterTruckController::class, "deleteDepot"])->name("master.truck-delete");
    });

    Route::prefix("master/import-direct")->group(function () {
        Route::get("/list", [MasterImportDirectController::class, "list"])->name("master.import-direct");
        Route::get("/create", [MasterImportDirectController::class, "formCreate"])->name("master.import-direct-create");
        Route::get("/import", [MasterImportDirectController::class, "formImport"])->name("master.import-direct-import");
        Route::get("/update/{importDirect}", [MasterImportDirectController::class, "formUpdate"])->name("master.import-direct-update");
        Route::get("/delete/{importDirect}", [MasterImportDirectController::class, "deleteSchedule"])->name("master.import-direct-delete");
    });

    Route::prefix("master/import-transit")->group(function () {
        Route::get("/list", [MasterImportTransitController::class, "list"])->name("master.import-transit");
        Route::get("/create", [MasterImportTransitController::class, "formCreate"])->name("master.import-transit-create");
        Route::get("/import", [MasterImportTransitController::class, "formImport"])->name("master.import-transit-import");
        Route::get("/update/{importTransit}", [MasterImportTransitController::class, "formUpdate"])->name("master.import-transit-update");
        Route::get("/delete/{importTransit}", [MasterImportTransitController::class, "deleteSchedule"])->name("master.import-transit-delete");
    });

    Route::prefix("master/export-direct")->group(function () {
        Route::get("/list", [MasterExportDirectController::class, "list"])->name("master.export-direct");
        Route::get("/create", [MasterExportDirectController::class, "formCreate"])->name("master.export-direct-create");
        Route::get("/import", [MasterExportDirectController::class, "formImport"])->name("master.export-direct-import");
        Route::get("/update/{exportDirect}", [MasterExportDirectController::class, "formUpdate"])->name("master.export-direct-update");
        Route::get("/delete/{exportDirect}", [MasterExportDirectController::class, "deleteSchedule"])->name("master.export-direct-delete");
    });

    Route::prefix("master/export-transit")->group(function () {
        Route::get("/list", [MasterExportTransitController::class, "list"])->name("master.export-transit");
        Route::get("/create", [MasterExportTransitController::class, "formCreate"])->name("master.export-transit-create");
        Route::get("/import", [MasterExportTransitController::class, "formImport"])->name("master.export-transit-import");
        Route::get("/update/{exportTransit}", [MasterExportTransitController::class, "formUpdate"])->name("master.export-transit-update");
        Route::get("/delete/{exportTransit}", [MasterExportTransitController::class, "deleteSchedule"])->name("master.export-transit-delete");
    });

    Route::prefix("master/banner")->group(function () {
        Route::get("/list", [BannerController::class, "list"])->name("master.banner");
        Route::get("/create", [BannerController::class, "formCreate"])->name("master.banner-create");
        Route::get("/update/{banner}", [BannerController::class, "formUpdate"])->name("master.banner-update");
        Route::get("/delete/{banner}", [BannerController::class, "deleteBanner"])->name("master.banner-delete");
    });

    Route::prefix("tracking")->group(function () {
        Route::get("/list", [TrackingController::class, "list"])->name("tracking.list");
        Route::get("/update/{tracking}", [TrackingController::class, "formUpdate"])->name("tracking.update");
        Route::get("/delete/{tracking}", [TrackingController::class, "deleteBanner"])->name("tracking.delete");
    });

    Route::prefix("request/")->group(function () {
        Route::get("/quotation/{quote_type}", [FclController::class, "requestQuoteHandle"])->name("req-quote");
    });

    Route::prefix("manage/")->group(function(){
        Route::get("shipment", [Admin\FullContainerLoad::class, "list"])->name("fcl_list");
        Route::get("shipment/detail/{fcl}", [Admin\FullContainerLoad::class, "detailShipment"])->name("fcl_quotedetail");
        Route::get("shipment/shipping-instruction/{fcl}", [Admin\FullContainerLoad::class, "shippingInstrction"])->name("fcl_shipping");
        Route::get("shipment/create-tracking/{fcl}", [FclController::class, "createTracking"])->name("fcl_tracking");
        Route::get("shipment/cargos/{quote_type}/{fcl}", [FclController::class, "detailCargoHandle"])->name("fcl_cargos");
        Route::get("shipment/documents/{quote_type}/{fcl}", [FclController::class, "detailDocumentHandle"])->name("fcl_documents");
        Route::get("shipment/{fullContainerLoad}", [Admin\FullContainerLoad::class, "detail"])->name("fcl_detail");
        Route::any("shipment/{fullContainerLoad}/rejection", [Admin\FullContainerLoad::class, "rejection"])->name("fcl_rejection");
    });

    Route::prefix("draft-doc/")->group(function(){
        Route::get("/{draft_type}/create/{fcl}", [DraftDocumentController::class, "create"])->name("draft-doc.create");
        Route::get("shipments", [Admin\DraftDocument::class, "listShipment"])->name("draft-doc.list-shipment");
        Route::get("history/{fcl}", [DraftDocumentController::class, "listHistory"])->name("draft-doc.history");
        Route::get("/{draft_type}/download/{draft}", [DraftDocumentController::class, "download"])->name("draft-doc.download");
    });

    Route::prefix("invoicing/")->group(function(){
        Route::get("shipments", [Admin\InvoicingController::class, "listShipment"])->name("invoicing.list");
        Route::get("set-status/{fcl}/{status}", [Admin\InvoicingController::class, "setInvoiceStatus"])->name("invoicing.set-status");
        Route::get("history/{fcl}", [InvoicingController::class, "listHistory"])->name("invoicing.history");
    });

    Route::prefix("ticket")->group(function () {
        Route::get("/list", [TicketController::class, "list"])->name("ticket.list");
        Route::get("/create/{ticket?}", [TicketController::class, "create"])->name("ticket.create");
        Route::get("/delete/{ticket}", [TicketController::class, "delete"])->name("ticket.delete");
        Route::get("/detail/{ticket}", [TicketController::class, "detail"])->name("ticket.detail");
        Route::post("/reply", [TicketController::class, "reply"])->name("ticket.reply");
    });

});
