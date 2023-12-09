<?php

use App\Http\Controllers\Admin\AdditionalController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OutletsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TaxController;
use App\Http\Controllers\Admin\UtilsController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DealerController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\CustomShippingController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ImageUploaderController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\OfflineSaleController;
use App\Http\Controllers\Admin\ProductPriceController;
use App\Http\Controllers\Admin\ProductVerifyController;
use App\Http\Controllers\Admin\ReplySupportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\VariantController;
use App\Http\Controllers\Admin\WarrantyController;
use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\OfflineCustomerController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\VisitorController;
use App\Models\OfflineCustomer;
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



Route::prefix('admin')->middleware('can:isAdmin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.dashboard');

    Route::prefix('settings')->group(function () {
        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

            Route::get('/general', [SettingsController::class, 'index'])->name('general.settings');
            Route::post('/update/{id}', [SettingsController::class, 'update'])->name('settings.update');

            Route::get('privacy/poricy', [UtilsController::class, 'privacy'])->name('privacy.policy');
            Route::post('privacy/update/{id}', [UtilsController::class, 'privacyUpdate'])->name('privacy.update');
        });
    });
    Route::prefix('/item')->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::get('categories/active/{id}', [CategoryController::class, 'active'])->name('categories.active');
        Route::get('categories/inactive/{id}', [CategoryController::class, 'inActive'])->name('categories.inactive');
        Route::get('categories/recycle-bin', [CategoryController::class, 'recycleBin'])->name('categories.recycle-bin');

        Route::resource('sub-categories', SubCategoryController::class);
        Route::get('sub-categories/active/{id}', [SubCategoryController::class, 'active'])->name('sub_categories.active');
        Route::get('sub-categories/inactive/{id}', [SubCategoryController::class, 'inActive'])->name('sub_categories.inactive');

        Route::resource('brands', BrandController::class);
        Route::get('brands/active/{id}', [BrandController::class, 'active'])->name('brands.active');
        Route::get('brands/inactive/{id}', [BrandController::class, 'inActive'])->name('brands.inactive');

        Route::resource('taxs', TaxController::class);
        Route::get('taxs/active/{id}', [TaxController::class, 'active'])->name('taxs.active');
        Route::get('taxs/inactive/{id}', [TaxController::class, 'inActive'])->name('taxs.inactive');

        Route::resource('tags', TagController::class);
        Route::get('tags/active/{id}', [TagController::class, 'active'])->name('tags.active');
        Route::get('tags/inactive/{id}', [TagController::class, 'inActive'])->name('tags.inactive');

        Route::get('additions/index', [AdditionalController::class, 'index'])->name('additions.index');
        Route::resource('colors', ColorController::class);
        Route::resource('sizes', SizeController::class);

        Route::resource('attributes', AttributeController::class);
        Route::get('attributes/active/{id}', [AttributeController::class, 'active'])->name('attributes.active');
        Route::get('attributes/inactive/{id}', [AttributeController::class, 'inActive'])->name('attributes.inactive');

        Route::resource('variants', VariantController::class);
        Route::get('variants/active/{id}', [VariantController::class, 'active'])->name('variants.active');
        Route::get('variants/inactive/{id}', [VariantController::class, 'inActive'])->name('variants.inactive');

        Route::resource('coupons', CouponController::class);
        Route::get('coupons/active/{id}', [CouponController::class, 'active'])->name('coupons.active');
        Route::get('coupons/inactive/{id}', [CouponController::class, 'inActive'])->name('coupons.inactive');

        Route::resource('shippings', ShippingController::class);
        Route::get('shippings/active/{id}', [ShippingController::class, 'active'])->name('shippings.active');
        Route::get('shippings/inactive/{id}', [ShippingController::class, 'inActive'])->name('shippings.inactive');

        Route::resource('custom-shippings', CustomShippingController::class);
        Route::get('custom/shippings/active/{id}', [CustomShippingController::class, 'active'])->name('custom.shippings_active');
        Route::get('custom/shippings/inactive/{id}', [CustomShippingController::class, 'inActive'])->name('custom.shippings_inactive');
    });
    Route::resource('products', ProductController::class);
    Route::name('product.')->prefix('/product')->group(function () {
        Route::get('/edit/{id}', [ProductController::class, 'productEdit'])->name('edit');
        Route::get('/show/{id}', [ProductController::class, 'productShow'])->name('show');
        Route::get('/active/{id}', [ProductController::class, 'active'])->name('active');
        Route::get('/inactive/{id}', [ProductController::class, 'inActive'])->name('inactive');
        Route::get('/remove/arrival/{id}', [ProductController::class, 'removeArrival'])->name('remove_arrival');
        Route::get('/add/arrival/{id}', [ProductController::class, 'addArrival'])->name('add_arrival');
        Route::get('change_price/{id}', [ProductPriceController::class, 'changePrice'])->name('change_price');
        Route::post('price/update/{id}', [ProductPriceController::class, 'priceUpdateRegular'])->name('price_regular');
        Route::post('price/update/dealer/{id}', [ProductPriceController::class, 'priceUpdateDealer'])->name('price_dealer');
        Route::get('featured/{id}', [ProductController::class, 'addFeatured'])->name('featured');
        Route::get('featured/remove/{id}', [ProductController::class, 'removeFeatured'])->name('featured_remove');
        Route::get('comming/{id}', [ProductController::class, 'commingSoon'])->name('comming');
        Route::get('remove/comming/{id}', [ProductController::class, 'removeComming'])->name('remove_comming');
        Route::get('qr/code/{id}', [BarcodeController::class, 'qrCode'])->name('qr_code');
        Route::post('qr/code/store', [BarcodeController::class, 'qrCodeStore'])->name('store.qr_code');
        Route::get('qr/code/print/{id}/{quantity}', [BarcodeController::class, 'qrCodePrint'])->name('qr_code.print');
    });

    Route::name('inventory.')->prefix('/inventory')->group(function () {
        Route::get('/create/{product}', [InventoryController::class, 'create'])->name('product');
        Route::post('/store', [InventoryController::class, 'inventoryStore'])->name('store');
        Route::get('/edit/{id}', [InventoryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [InventoryController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [InventoryController::class, 'destroy'])->name('destroy');
    });
    Route::get('delete-product-image/{image?}', [ImageController::class, 'deleteProductImage'])->name('delete-product-image');

    Route::resource('dealerships', DealerController::class);
    Route::prefix('dealership')->group(function () {
        Route::get('active/{id}', [DealerController::class, 'active'])->name('dealerships.active');
        Route::get('inactive/{id}', [DealerController::class, 'inActive'])->name('dealerships.inactive');
        Route::get('approve/{id}', [DealerController::class, 'dillerApprove'])->name('dealerships.approve');
        Route::get('pending', [DealerController::class, 'pendingIndex'])->name('dealerships.pending.index');
        Route::get('approve', [DealerController::class, 'approveIndex'])->name('dealerships.approved.index');
    });
    Route::prefix('report')->group(function () {
        Route::get('/report-online', [ReportController::class, 'sales'])->name('report.sales');
        Route::get('/report-offline', [ReportController::class, 'offlineReport'])->name('offline.report.sales');
        Route::get('/show/{id}', [ReportController::class, 'show'])->name('report.show');
        Route::get('offline/show/{id}', [ReportController::class, 'offlineShow'])->name('offline.report.show');
        Route::get('/filter-route', [ReportController::class, 'filter'])->name('filter.route');
    });
    Route::name('order.')->prefix('order')->group(function () {
        Route::get('list', [OrderController::class, 'index'])->name('index');
        Route::get('show/{id}', [OrderController::class, 'show'])->name('show');
        Route::delete('destroy/{id}', [OrderController::class, 'destroy'])->name('destroy');
        Route::get('approve/{id}', [OrderController::class, 'approved'])->name('approve');
        Route::get('dispatch/{id}', [OrderController::class, 'dispatch'])->name('dispatch');
        Route::get('complete/{id}', [OrderController::class, 'complete'])->name('complete');
        Route::get('processing/{id}', [OrderController::class, 'processed'])->name('processing');
        Route::get('rejected/{id}', [OrderController::class, 'rejected'])->name('rejected');
        Route::get('dealer-list', [OrderController::class, 'dealerOrder'])->name('dealer_list');
        Route::get('user-list', [OrderController::class, 'userOrder'])->name('user_list');
        Route::get('pending-list', [OrderController::class, 'pendingOrder'])->name('pending_list');
        Route::get('processing-list', [OrderController::class, 'processingOrder'])->name('processing_list');
        Route::get('approve-list', [OrderController::class, 'approveOrder'])->name('approve_list');
        Route::get('intransit-list', [OrderController::class, 'intransitOrder'])->name('intransit_list');
        Route::get('return-add/{id}', [OrderController::class, 'addReturn'])->name('add_return');
        Route::get('return-accept/{id}', [OrderController::class, 'acceptReturn'])->name('return_accept');
        Route::get('amount-status/{id}', [OrderController::class, 'amountStatus'])->name('amount_status');
        Route::get('return-list', [OrderController::class, 'returnOrder'])->name('return_list');
        Route::get('rejected-list', [OrderController::class, 'rejectedOrder'])->name('rejected_list');
        Route::get('complete-list', [OrderController::class, 'completeOrder'])->name('complete_list');
    });


    Route::resource('news', NewsController::class);
    Route::get('active/news/{id}', [NewsController::class, 'active'])->name('news.active');
    Route::get('inactive/news/{id}', [NewsController::class, 'inActive'])->name('news.inactive');

    Route::resource('careers', CareerController::class);
    Route::get('active/career/{id}', [CareerController::class, 'active'])->name('career.active');
    Route::get('inactive/career/{id}', [CareerController::class, 'inActive'])->name('career.inactive');
    Route::get('career-apply-list', [CareerController::class, 'applyList'])->name('career.apply_list');
    Route::get('career-apply-show/{id}', [CareerController::class, 'applyShow'])->name('career.apply.show');
    Route::delete('career-apply-destroy/{id}', [CareerController::class, 'applyDestroy'])->name('career.apply.destroy');
    Route::get('career-apply-cv/download/{id}', [CareerController::class, 'downloadCv'])->name('download.cv');

    Route::resource('outlets', OutletsController::class);
    Route::get('active/outlet/{id}', [OutletsController::class, 'active'])->name('outlets.active');
    Route::get('inactive/outlet/{id}', [OutletsController::class, 'inActive'])->name('outlets.inactive');
    
    Route::prefix('customer')->group(function () {
        Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
        Route::resource('reply-supports', ReplySupportController::class);
        Route::get('reply-supports/active/{id}', [ReplySupportController::class, 'active'])->name('reply_support.active');
        Route::get('reply-supports/inactive/{id}', [ReplySupportController::class, 'inActive'])->name('reply_support.inactive');
        Route::get('reply-supports/show/{id}', [ReplySupportController::class, 'supportShow'])->name('support_details.show');
        Route::get('reply-supports/create/{id}', [ReplySupportController::class, 'supportCreate'])->name('support_details.create');
        Route::get('contact', [ContactUsController::class, 'index'])->name('admin.contact');
        Route::get('visitor', [VisitorController::class, 'index'])->name('visitor.index');
    });

    Route::resource('sliders', SliderController::class);
    Route::get('sliders/active/{id}', [SliderController::class, 'active'])->name('sliders.active');
    Route::get('sliders/inactive/{id}', [SliderController::class, 'inActive'])->name('sliders.inactive');

    Route::get('/warranty/index', [WarrantyController::class, 'index'])->name('admin.warranty_index');
    Route::get('/warranty/show/{id}', [WarrantyController::class, 'show'])->name('admin.warranty_show');
    Route::get('/warranty/reject/{id}', [WarrantyController::class, 'warrantyReject'])->name('admin.warranty_reject');
    Route::get('/warranty/attach/download/{id}', [WarrantyController::class, 'download'])->name('download.warranty.attach');
    Route::get('/purchase/product', [PurchaseController::class, 'productList'])->name('purchase.product');
    Route::get('/purchase/entry/{id}', [PurchaseController::class, 'purchaseEntry'])->name('purchase.entry');
    Route::get('/pdf/qr/{id}', [BarcodeController::class, 'downloadQr'])->name('purchase.qr_code_print');
    Route::post('/purchase/store', [PurchaseController::class, 'purchaseStore'])->name('purchase.store');
    Route::get('/purchase', [PurchaseController::class, 'index'])->name('purchase.index');

    Route::prefix('stock')->group(function () {
        Route::get('/list', [StockController::class, 'stockList'])->name('product.stock_list');
        Route::get('/ledger/product', [StockController::class, 'productLedger'])->name('product.ledger');
    });
    Route::name('offline.')->prefix('offline')->group(function () {
        Route::resource('customers', OfflineCustomerController::class);
        Route::get('/customer/sale/{id}', [OfflineSaleController::class, 'customerSale'])->name('customer_sale');
        Route::get('/customer/show/{id}', [OfflineCustomerController::class, 'customerShow'])->name('customer_show');
        Route::post('/sale/add-cart', [OfflineSaleController::class, 'saleAddCart'])->name('sale_add_cart');
        Route::post('/sale/store', [OfflineSaleController::class, 'saleStore'])->name('sale_store');
        Route::get('/sale/remove/entry/{id}', [OfflineSaleController::class, 'removeEnty'])->name('sale.remove_enty');
        Route::get('/sale/select/customer', [OfflineSaleController::class, 'selectProduct'])->name('sale.select_customer');
        Route::get('/sale/order', [OfflineSaleController::class, 'orderIndex'])->name('order.index');
        Route::get('/sale/order/show/{id}', [OfflineSaleController::class, 'orderShow'])->name('order.show');
        Route::get('/sale/order/amount-status/{id}', [OfflineSaleController::class, 'amountStatus'])->name('order.amount_status');
    });
    Route::prefix('verify')->group(function () {
        Route::get('/', [ProductVerifyController::class, 'index'])->name('admin.verify_index');
        Route::get('/show/{id}', [ProductVerifyController::class, 'show'])->name('admin.verify_show');
        Route::get('/invoice/download/{id}', [ProductVerifyController::class, 'downloadInvoice'])->name('download.verified.invoice');
    });
});

Route::resource('suppliers', SupplierController::class);
Route::get('suppliers/active/{id}', [SupplierController::class, 'active'])->name('suppliers.active');
Route::get('suppliers/inactive/{id}', [SupplierController::class, 'inActive'])->name('suppliers.inactive');
Route::get('barcode/index', [BarcodeController::class, 'index'])->name('barcode.index');

require __DIR__.'/auth.php';
