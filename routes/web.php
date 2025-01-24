<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/loadMenus', [App\Http\Controllers\HomeController::class, 'loadMenus'])->name('loadMenus');

    Route::prefix('master')->group(function () {

        Route::prefix('goods')->group(function () {
            Route::get('/', [App\Http\Controllers\Master\GoodsController::class, 'index'])->name('master.goods.index');
            Route::get('/lists', [App\Http\Controllers\Master\GoodsController::class, 'getLists'])->name('master.goods.get-lists');
            Route::get('/create', [App\Http\Controllers\Master\GoodsController::class, 'create'])->name('master.goods.create');
            Route::post('/save', [App\Http\Controllers\Master\GoodsController::class, 'save'])->name('master.goods.save');
            Route::get('/{id}', [App\Http\Controllers\Master\GoodsController::class, 'edit'])->name('master.goods.edit');
            Route::post('/update', [App\Http\Controllers\Master\GoodsController::class, 'update'])->name('master.goods.update');
        });

        Route::prefix('customers')->group(function () {
            Route::get('/', [App\Http\Controllers\Master\CustomerController::class, 'index'])->name('master.customer.index');
            Route::post('/save', [App\Http\Controllers\Master\CustomerController::class, 'save'])->name('master.customer.save');
            Route::get('/{id}', [App\Http\Controllers\Master\CustomerController::class, 'edit'])->name('master.customer.edit');
            Route::post('/update', [App\Http\Controllers\Master\CustomerController::class, 'update'])->name('master.customer.update');
            Route::get('/delete/{id}', [App\Http\Controllers\Master\CustomerController::class, 'delete'])->name('master.customer.delete');
        });

        Route::prefix('suppliers')->group(function () {
            Route::get('/', [App\Http\Controllers\Master\SupplierController::class, 'index'])->name('master.supplier.index');
            Route::get('/getData', [App\Http\Controllers\Master\SupplierController::class, 'getData'])->name('master.supplier.get-data');
            Route::post('/save', [App\Http\Controllers\Master\SupplierController::class, 'save'])->name('master.supplier.save');
            Route::get('/{id}', [App\Http\Controllers\Master\SupplierController::class, 'edit'])->name('master.supplier.edit');
            Route::post('/update', [App\Http\Controllers\Master\SupplierController::class, 'update'])->name('master.supplier.update');
            Route::get('/delete/{id}', [App\Http\Controllers\Master\SupplierController::class, 'delete'])->name('master.supplier.delete');
        });

        Route::prefix('materials')->group(function () {
            Route::get('/', [App\Http\Controllers\Master\MaterialController::class, 'index'])->name('master.material.index');
            Route::post('/save', [App\Http\Controllers\Master\MaterialController::class, 'save'])->name('master.material.save');
            Route::get('/{id}', [App\Http\Controllers\Master\MaterialController::class, 'edit'])->name('master.material.edit');
            Route::post('/update', [App\Http\Controllers\Master\MaterialController::class, 'update'])->name('master.material.update');
            Route::get('/delete/{id}', [App\Http\Controllers\Master\MaterialController::class, 'delete'])->name('master.material.delete');
        });

        Route::prefix('substances')->group(function () {
            Route::get('/', [App\Http\Controllers\Master\SubstanceController::class, 'index'])->name('master.substance.index');
            Route::get('/getData', [App\Http\Controllers\Master\SubstanceController::class, 'getData'])->name('master.substance.get-data');
            Route::post('/save', [App\Http\Controllers\Master\SubstanceController::class, 'save'])->name('master.substance.save');
            Route::get('/{id}', [App\Http\Controllers\Master\SubstanceController::class, 'edit'])->name('master.substance.edit');
            Route::post('/update', [App\Http\Controllers\Master\SubstanceController::class, 'update'])->name('master.substance.update');
            Route::get('/delete/{id}', [App\Http\Controllers\Master\SubstanceController::class, 'delete'])->name('master.substance.delete');
        });
    });

    Route::prefix('sales-order')->group(function () {
        Route::get('/', [App\Http\Controllers\Transaction\SalesOrderController::class, 'index'])->name('sales.index');
        Route::get('/create', [App\Http\Controllers\Transaction\SalesOrderController::class, 'create'])->name('sales.create');
        Route::post('/save', [App\Http\Controllers\Transaction\SalesOrderController::class, 'save'])->name('sales.save');
        Route::get('/{id}', [App\Http\Controllers\Transaction\SalesOrderController::class, 'edit'])->name('sales.edit');
        Route::post('/update', [App\Http\Controllers\Transaction\SalesOrderController::class, 'update'])->name('sales.update');
        Route::post('/confirm-order', [App\Http\Controllers\Transaction\SalesOrderController::class, 'confirmOrder'])->name('sales.confirm-order');

        Route::get('/{id}/detail/create', [App\Http\Controllers\Transaction\SalesOrderController::class, 'createDetail'])->name('sales.detail.create');
        Route::post('/detail/save', [App\Http\Controllers\Transaction\SalesOrderController::class, 'saveDetail'])->name('sales.detail.save');
        Route::post('/detail/edit', [App\Http\Controllers\Transaction\SalesOrderController::class, 'editDetail'])->name('sales.detail.edit');
        Route::post('/detail/update', [App\Http\Controllers\Transaction\SalesOrderController::class, 'updateDetail'])->name('sales.detail.update');
        Route::get('/detail/delete/{id}', [App\Http\Controllers\Transaction\SalesOrderController::class, 'deleteDetail'])->name('sales.detail.delete');

        Route::get('/monitoring/{id}', [App\Http\Controllers\Transaction\SalesOrderController::class, 'monitoring'])->name('sales.monitroing.index');
        Route::post('/detail/monitoring', [App\Http\Controllers\Transaction\SalesOrderController::class, 'detailMonitoring'])->name('sales.monitroing.detail');

        Route::get('/preview-attachment/{id}', [App\Http\Controllers\Transaction\SalesOrderController::class, 'preview'])->name('sales.detail.preview');

        Route::prefix('reports')->group(function () {
            Route::get('/index', [App\Http\Controllers\Transaction\SalesOrderReportController::class, 'index'])->name('sales.report.index');
        });

        Route::post('/api/customer', [App\Http\Controllers\Transaction\SalesOrderController::class, 'getDataCustomer'])->name('get-data-customer');
    });

    Route::prefix('index-price')->group(function () {
        Route::get('/', [App\Http\Controllers\Transaction\IndexPriceController::class, 'index'])->name('index-price.index');
        Route::post('/save', [App\Http\Controllers\Transaction\IndexPriceController::class, 'save'])->name('index-price.save');
        Route::get('/{id}', [App\Http\Controllers\Transaction\IndexPriceController::class, 'edit'])->name('index-price.edit');
        Route::post('/update', [App\Http\Controllers\Transaction\IndexPriceController::class, 'update'])->name('index-price.update');
        Route::get('/delete/{id}', [App\Http\Controllers\Transaction\IndexPriceController::class, 'delete'])->name('index-price.delete');
        Route::get('/get-index-price/{substance}', [App\Http\Controllers\Transaction\IndexPriceController::class, 'getIndexPrice']);
        Route::get('/get-index-substance/{tag}', [App\Http\Controllers\Transaction\IndexPriceController::class, 'getIndexSubstance']);
    });

    Route::prefix('production')->group(function () {

        Route::prefix('todo-list')->group(function () {
            Route::get('/', [App\Http\Controllers\Transaction\ProductionController::class, 'todoList'])->name('production.todo-list.index');
            Route::get('/detail/{id}', [App\Http\Controllers\Transaction\ProductionController::class, 'todoListDetail'])->name('production.todo-list.detail');
            Route::get('/claim-order/{id}', [App\Http\Controllers\Transaction\ProductionController::class, 'claimOrder'])->name('production.todo-list.claim-order');
        });

        Route::prefix('spk')->group(function () {
            Route::get('/', [App\Http\Controllers\Transaction\ProductionController::class, 'spk'])->name('production.spk.index');
            Route::get('/create/{id}', [App\Http\Controllers\Transaction\ProductionController::class, 'createSPK'])->name('production.spk.create');
            Route::get('/create/manual/{id}', [App\Http\Controllers\Transaction\ProductionController::class, 'createManualSpk'])->name('production.spk.create.manual');
            Route::post('/save', [App\Http\Controllers\Transaction\ProductionController::class, 'saveSpk'])->name('production.spk.save');
            Route::post('/save-manual', [App\Http\Controllers\Transaction\ProductionController::class, 'saveManualSpk'])->name('production.spk.save.manual');
            Route::get('/populate-from-template', [App\Http\Controllers\Transaction\ProductionController::class, 'populateFromTemplate'])->name('production.spk.populate.from.template');
            Route::get('/{id}', [App\Http\Controllers\Transaction\ProductionController::class, 'editSpk'])->name('production.spk.edit');
            Route::post('/update', [App\Http\Controllers\Transaction\ProductionController::class, 'updateSpk'])->name('production.spk.update');
            Route::get('/schedule/{id}', [App\Http\Controllers\Transaction\ProductionController::class, 'schedule'])->name('production.spk.schedule');
            Route::get('/mark-as-done/{id}', [App\Http\Controllers\Transaction\ProductionController::class, 'markAsDone'])->name('production.spk.mark-as-done');
            Route::post('/schedule/save', [App\Http\Controllers\Transaction\ProductionController::class, 'scheduleSave'])->name('production.spk.schedule.save');
            Route::post('/filtered-schedule/save', [App\Http\Controllers\Transaction\ProductionController::class, 'filteredScheduleSave'])->name('production.spk.filtered-schedule.save');
            Route::post('/export-to-finish-goods/save', [App\Http\Controllers\Transaction\ProductionController::class, 'exportToFinishGoods'])->name('production.spk.export-to-finish-goods.save');
            Route::get('/print/{id}', [App\Http\Controllers\Transaction\ProductionController::class, 'printSpk'])->name('production.spk.print');
            Route::post('/print-mass', [App\Http\Controllers\Transaction\ProductionController::class, 'printMassSPK'])->name('production.spk.print-mass');
            Route::get('/search/test', [App\Http\Controllers\Transaction\ProductionController::class, 'search'])->name('production.spk.search');
        });

        Route::prefix('monitoring')->group(function () {
            Route::get('/', [App\Http\Controllers\Transaction\ProductionController::class, 'monitoring'])->name('production.spk.monitoring.index');
            Route::get('/{id}', [App\Http\Controllers\Transaction\ProductionController::class, 'monitoringDetail'])->name('production.spk.monitoring.detail');
            Route::post('/production-progress/edit', [App\Http\Controllers\Transaction\ProductionController::class, 'progressItemEdit'])->name('production.spk.monitoring.production-progress-edit');
            Route::post('/production-progress/update', [App\Http\Controllers\Transaction\ProductionController::class, 'progressItemUpdate'])->name('production.spk.monitoring.production-progress.update'); //
            Route::post('/production-progress/detail/save', [App\Http\Controllers\Transaction\ProductionController::class, 'progressProductionDetailSave'])->name('production.spk.monitoring.production-progress.detail.save');
            Route::get('/personal-progress/q', [App\Http\Controllers\Transaction\ProductionController::class, 'monitoringPersonalProgress'])->name('production.spk.monitoring.personal-progress');
            Route::post('/personal-progress/save', [App\Http\Controllers\Transaction\ProductionController::class, 'monitoringPersonalProgressSave'])->name('production.spk.monitoring.personal-progress.save');
            Route::post('/cor-report-export', [App\Http\Controllers\Transaction\ProductionController::class, 'corReportExport'])->name('production.spk.monitoring.cor.report.export');

            Route::post('/production-report-export', [App\Http\Controllers\Transaction\ProductionController::class, 'productionReportExport'])->name('production.spk.monitoring.production.report.export');

            Route::get('/get-data-table', [App\Http\Controllers\Transaction\ProductionMonitoringController::class, 'getDataTable'])->name('production.spk.monitoring.get-data-table');
            Route::get('/get-data-spk/personal-progresss', [App\Http\Controllers\Transaction\ProductionMonitoringController::class, 'getDataSpk'])->name('production.spk.monitoring.get-data-spk');
        });

        Route::post('/progress-item/save', [App\Http\Controllers\Transaction\ProductionController::class, 'progressItemSave'])->name('production.spk.progress-item.save');
        Route::get('/progress-item/delete/{id}', [App\Http\Controllers\Transaction\ProductionController::class, 'progressItemDelete'])->name('production.spk.progress-item.delete');

        Route::prefix('progress-individu')->group(function () {
            Route::get('/', [App\Http\Controllers\Transaction\ProductionProgressIndividuController::class, 'index'])->name('production.pogress-individu.index');
            Route::get('/create', [App\Http\Controllers\Transaction\ProductionProgressIndividuController::class, 'create'])->name('production.pogress-individu.create');
            Route::post('/save', [App\Http\Controllers\Transaction\ProductionProgressIndividuController::class, 'save'])->name('production.pogress-individu.save');
            Route::get('/detail/{id}', [App\Http\Controllers\Transaction\ProductionProgressIndividuController::class, 'detail'])->name('production.pogress-individu.detail');
            Route::post('/update', [App\Http\Controllers\Transaction\ProductionProgressIndividuController::class, 'update'])->name('production.pogress-individu.update');

            Route::post('/detail/save', [App\Http\Controllers\Transaction\ProductionProgressIndividuController::class, 'detailSave'])->name('production.pogress-individu.detail.save');
            Route::post('/detail/edit', [App\Http\Controllers\Transaction\ProductionProgressIndividuController::class, 'getDetailById'])->name('production.pogress-individu.detail.edit');
            Route::post('/detail/update', [App\Http\Controllers\Transaction\ProductionProgressIndividuController::class, 'detailUpdate'])->name('production.pogress-individu.detail.update');
            Route::get('/detail/delete/{id}', [App\Http\Controllers\Transaction\ProductionProgressIndividuController::class, 'detailDelete'])->name('production.pogress-individu.detail.delete');
        });

        Route::prefix('material-used')->group(function () {
            Route::get('/', [App\Http\Controllers\Transaction\MaterialUsedController::class, 'index'])->name('production.material-used.index');
            Route::get('/create', [App\Http\Controllers\Transaction\MaterialUsedController::class, 'create'])->name('production.material-used.create');
            Route::post('/save', [App\Http\Controllers\Transaction\MaterialUsedController::class, 'save'])->name('production.material-used.save');
            Route::get('/detail/{id}', [App\Http\Controllers\Transaction\MaterialUsedController::class, 'detail'])->name('production.material-used.detail');

            Route::post('/detail/edit', [App\Http\Controllers\Transaction\MaterialUsedController::class, 'editDetail'])->name('production.material-used.detail.edit');
            Route::post('/detail/update', [App\Http\Controllers\Transaction\MaterialUsedController::class, 'updateDetail'])->name('production.material-used.detail.update');

            Route::post('/detail/save', [App\Http\Controllers\Transaction\MaterialUsedController::class, 'detailSave'])->name('production.material-used.detail.save');
            Route::get('/detail/delete/{id}', [App\Http\Controllers\Transaction\MaterialUsedController::class, 'detailDelete'])->name('production.material-used.detail.delete');
        });

        Route::prefix('report')->group(function () {
            Route::get('/', [App\Http\Controllers\Transaction\ProductionReportController::class, 'index'])->name('production.report.index');
        });
    });

    Route::prefix('warehouse')->group(function () {

        Route::prefix('shipping')->group(function () {
            Route::get('/', [App\Http\Controllers\Transaction\DeliveryController::class, 'index'])->name('warehouse.delivery.index');
            Route::get('/create', [App\Http\Controllers\Transaction\DeliveryController::class, 'create'])->name('warehouse.delivery.create');
            Route::post('/save', [App\Http\Controllers\Transaction\DeliveryController::class, 'save'])->name('warehouse.delivery.save');
            Route::get('/{id}', [App\Http\Controllers\Transaction\DeliveryController::class, 'edit'])->name('warehouse.delivery.edit');
            Route::post('/update', [App\Http\Controllers\Transaction\DeliveryController::class, 'update'])->name('warehouse.delivery.update');

            Route::post('/detail/save', [App\Http\Controllers\Transaction\DeliveryController::class, 'saveDetail'])->name('warehouse.delivery.detail.save');
            Route::post('/detail/edit', [App\Http\Controllers\Transaction\DeliveryController::class, 'editDetail'])->name('warehouse.delivery.detail.edit');
            Route::post('/detail/update', [App\Http\Controllers\Transaction\DeliveryController::class, 'updateDetail'])->name('warehouse.delivery.detail.update');
            Route::get('/detail/delete/{id}', [App\Http\Controllers\Transaction\DeliveryController::class, 'deleteDetail'])->name('warehouse.delivery.detail.delete');
            Route::get('/print/{id}', [App\Http\Controllers\Transaction\DeliveryController::class, 'print'])->name('warehouse.delivery.print');

            Route::post('/detail/lampiran/save', [App\Http\Controllers\Transaction\DeliveryController::class, 'saveAttachmentsDetail'])->name('warehouse.delivery.detail.lampiran.save');
            Route::get('/detail/lampiran/delete/{id}', [App\Http\Controllers\Transaction\DeliveryController::class, 'deleteAttachmentsDetail'])->name('warehouse.delivery.detail.lampiran.delete');

            // Generate manual surat jalan
            Route::get('/create/manual', [App\Http\Controllers\Transaction\DeliveryController::class, 'createManualDelivery'])->name('warehouse.delivery.create.manual');
            Route::post('/print/manual/', [App\Http\Controllers\Transaction\DeliveryController::class, 'printManual'])->name('warehouse.delivery.print.manual');
        });

        Route::prefix('raw-materials')->group(function () {
            Route::get('/', [App\Http\Controllers\Transaction\RawMaterialController::class, 'index'])->name('warehouse.raw-material.index');
            Route::post('/stock-opname/save', [App\Http\Controllers\Transaction\RawMaterialController::class, 'saveStockOpname'])->name('warehouse.raw-materials.stock-opname.save');
            Route::post('/stock-adjustment/save', [App\Http\Controllers\Transaction\RawMaterialController::class, 'saveStockAdjustment'])->name('warehouse.raw-materials.stock-adjustment.save');
            Route::get('/print-label/{id}', [App\Http\Controllers\Transaction\RawMaterialController::class, 'printLabel'])->name('warehouse.raw-materials.print-label');

            Route::post('/imports', [App\Http\Controllers\Transaction\RawMaterialController::class, 'import'])->name('warehouse.raw-materials.imports');
        });

        Route::prefix('finish-goods')->group(function () {
            Route::get('/', [App\Http\Controllers\Transaction\FinishGoodsController::class, 'index'])->name('warehouse.finish-goods.index');
            Route::post('/stock-opname/save', [App\Http\Controllers\Transaction\FinishGoodsController::class, 'saveStockOpname'])->name('warehouse.finish-goods.stock-opname.save');
            Route::post('/stock-adjustment/save', [App\Http\Controllers\Transaction\FinishGoodsController::class, 'saveStockAdjustment'])->name('warehouse.finish-goods.stock-adjustment.save');
            Route::get('/print-label/{id}', [App\Http\Controllers\Transaction\FinishGoodsController::class, 'printLabel'])->name('warehouse.finish-goods.print-label');
        });

        Route::prefix('report')->group(function () {
            Route::get('/', [App\Http\Controllers\Transaction\WarehouseReportController::class, 'index'])->name('warehouse.report.index');
        });
    });

    Route::prefix('procurement')->group(function () {
        Route::prefix('purchase-order')->group(function () {
            Route::get('/', [App\Http\Controllers\Transaction\PurchaseOrderController::class, 'index'])->name('procurement.purchase-order.index');
            Route::get('/create', [App\Http\Controllers\Transaction\PurchaseOrderController::class, 'create'])->name('procurement.purchase-order.create');
            Route::post('/save', [App\Http\Controllers\Transaction\PurchaseOrderController::class, 'save'])->name('procurement.purchase-order.save');
            Route::get('/{id}', [App\Http\Controllers\Transaction\PurchaseOrderController::class, 'edit'])->name('procurement.purchase-order.edit');
            Route::post('/update', [App\Http\Controllers\Transaction\PurchaseOrderController::class, 'update'])->name('procurement.purchase-order.update');
            Route::post('/confirm', [App\Http\Controllers\Transaction\PurchaseOrderController::class, 'confirm'])->name('procurement.purchase-order.confirm');
            Route::get('/print/{id}', [App\Http\Controllers\Transaction\PurchaseOrderController::class, 'print'])->name('procurement.purchase-order.print');

            Route::get('/monitorning/{id}', [App\Http\Controllers\Transaction\PurchaseOrderController::class, 'monitoring'])->name('procurement.purchase-order.monitoring');

            Route::post('/detail/save', [App\Http\Controllers\Transaction\PurchaseOrderController::class, 'saveDetail'])->name('procurement.purchase-order.detail.save');
            Route::post('/detail/edit', [App\Http\Controllers\Transaction\PurchaseOrderController::class, 'editDetail'])->name('procurement.purchase-order.detail.edit');
            Route::post('/detail/update', [App\Http\Controllers\Transaction\PurchaseOrderController::class, 'updateDetail'])->name('procurement.purchase-order.detail.update');
            Route::get('detail/delete/{id}', [App\Http\Controllers\Transaction\PurchaseOrderController::class, 'deleteDetail'])->name('procurement.purchase-order.detail.delete');
        });

        Route::prefix('report')->group(function () {
            Route::get('/', [App\Http\Controllers\Transaction\ProcurementReportController::class, 'index'])->name('procurement.report.index');
            Route::get('/export', [App\Http\Controllers\Transaction\ProcurementReportController::class, 'reportExport'])->name('procurement.report.export');
        });

        Route::prefix('goods-receive')->group(function () {
            Route::get('/', [App\Http\Controllers\Transaction\GoodsReceiveController::class, 'index'])->name('procurement.goods-receive.index');
            Route::post('/save', [App\Http\Controllers\Transaction\GoodsReceiveController::class, 'save'])->name('procurement.goods-receive.save');
            Route::get('/edit/{id}', [App\Http\Controllers\Transaction\GoodsReceiveController::class, 'edit'])->name('procurement.goods-receive.edit');
            Route::get('/confirm/{id}', [App\Http\Controllers\Transaction\GoodsReceiveController::class, 'confirm'])->name('procurement.goods-receive.confirm');

            Route::post('/detail/save', [App\Http\Controllers\Transaction\GoodsReceiveController::class, 'saveDetail'])->name('procurement.goods-receive.detail.save');
            Route::post('/detail/edit', [App\Http\Controllers\Transaction\GoodsReceiveController::class, 'editDetail'])->name('procurement.goods-receive.detail.edit');
            Route::post('/detail/update', [App\Http\Controllers\Transaction\GoodsReceiveController::class, 'updateDetail'])->name('procurement.goods-receive.detail.update');
            Route::get('/delete/{id}', [App\Http\Controllers\Transaction\GoodsReceiveController::class, 'deleteDetail'])->name('procurement.goods-receive.detail.delete');
        });
    });

    Route::prefix('finance')->group(function () {
        Route::prefix('invoice')->group(function () {
            Route::get('/', [App\Http\Controllers\Transaction\InvoiceController::class, 'index'])->name('finance.invoice.index');
            Route::post('/save', [App\Http\Controllers\Transaction\InvoiceController::class, 'save'])->name('finance.invoice.save');
            Route::get('/edit/{id}', [App\Http\Controllers\Transaction\InvoiceController::class, 'edit'])->name('finance.invoice.edit');
            Route::post('/update', [App\Http\Controllers\Transaction\InvoiceController::class, 'update'])->name('finance.invoice.update');
            Route::post('/update-spelled-out', [App\Http\Controllers\Transaction\InvoiceController::class, 'updateSpelledOut'])->name('finance.invoice.spelled-out');
            Route::get('/print/{id}', [App\Http\Controllers\Transaction\InvoiceController::class, 'print'])->name('finance.invoice.print');

            Route::post('/detail/save', [App\Http\Controllers\Transaction\InvoiceController::class, 'saveDetail'])->name('finance.invoice.detail.save');
            Route::get('/detail/delete/{id}', [App\Http\Controllers\Transaction\InvoiceController::class, 'deleteDetail'])->name('finance.invoice.detail.delete');

            Route::get('/kuitansi/print', [App\Http\Controllers\Transaction\InvoiceController::class, 'printKuitansi'])->name('finance.invoice.print.kuitansi');
        });
    });

    Route::prefix('user-management')->group(function () {
        Route::prefix('users')->group(function () {
            Route::get('/', [App\Http\Controllers\Transaction\UserManagementController::class, 'index'])->name('user-management.user.index');
            Route::post('/save', [App\Http\Controllers\Transaction\UserManagementController::class, 'save'])->name('user-management.user.save');
            Route::get('/privilege/{id}', [App\Http\Controllers\Transaction\UserManagementController::class, 'privilege'])->name('user-management.user.privilege');
            Route::post('/privilege/store', [App\Http\Controllers\Transaction\UserManagementController::class, 'store'])->name('user-management.user.privilege.store');
        });

        Route::prefix('roles')->group(function () {
            Route::get('/', [App\Http\Controllers\Transaction\RoleController::class, 'index'])->name('user-management.role.index');
            Route::post('/create', [App\Http\Controllers\Transaction\RoleController::class, 'save'])->name('user-management.role.save');
            Route::get('/edit/{id}', [App\Http\Controllers\Transaction\RoleController::class, 'edit'])->name('user-management.role.edit');
            Route::post('/update', [App\Http\Controllers\Transaction\RoleController::class, 'update'])->name('user-management.role.update');
            Route::get('/delete/{id}', [App\Http\Controllers\Transaction\RoleController::class, 'delete'])->name('user-management.role.delete');
            Route::get('/privilege/{id}', [App\Http\Controllers\Transaction\RoleController::class, 'privilege'])->name('user-management.role.privilege');
            Route::post('/privilege/store', [App\Http\Controllers\Transaction\RoleController::class, 'store'])->name('user-management.role.privilege.store');
        });
    });

    Route::prefix('settings')->group(function () {
        Route::prefix('backup')->group(function () {
            Route::get('/', [App\Http\Controllers\Transaction\BackupController::class, 'index'])->name('setting.backup.index');
        });

        Route::get('/general', [App\Http\Controllers\Setting\SettingController::class, 'index'])->name('settings.general');
    });

    Route::prefix('dashboard')->group(function () {
        Route::get('/', [App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard');
        Route::post('/executive', [App\Http\Controllers\Dashboard\DashboardController::class, 'executive'])->name('dashboard-executive');
        Route::post('/production', [App\Http\Controllers\Dashboard\DashboardController::class, 'production'])->name('dashboard-production');
        Route::post('/warehouse', [App\Http\Controllers\Dashboard\DashboardController::class, 'warehouse'])->name('dashboard-warehouse');
        Route::post('/sales', [App\Http\Controllers\Dashboard\DashboardController::class, 'sales'])->name('dashboard-sales');
        Route::post('/operator', [App\Http\Controllers\Dashboard\DashboardController::class, 'operator'])->name('dashboard-operator');
    });
});

Auth::routes();

