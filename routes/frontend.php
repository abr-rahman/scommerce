<?php

use App\Http\Controllers\Frontend\CareerController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ContactUsController;
use App\Http\Controllers\Frontend\CouponController;
use App\Http\Controllers\Frontend\DealerController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\OutletsController;
use App\Http\Controllers\Frontend\ProductFrontendController;
use App\Http\Controllers\Frontend\ProductVerifyController;
use App\Http\Controllers\Frontend\ShippingController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\WarrantyController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Getway\SslCommerzPaymentController;
use App\Http\Controllers\ImageController;
// use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SupportController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Input\Input;

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');

// Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::post('user/upadate/{id}', [UserDashboardController::class, 'updateUser'])->name('user.update');
    Route::get('download/invoice/{id}', [UserDashboardController::class, 'downloadInvoice'])->name('download.invoice');

    Route::get('checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::post('district/shipping', [CheckoutController::class, 'disTiShipping'])->name('district.to_shipping');
    Route::post('order/confirm', [CheckoutController::class, 'orderConfirm'])->name('confirm.order');

    Route::get('/product/verify', [ProductVerifyController::class, 'index'])->name('product.verify');
    Route::post('/product/verify/store', [ProductVerifyController::class, 'store'])->name('product.verify_store');

// });

Route::get('product/details/{slug}/{id}', [FrontendController::class, 'productDetails'])->name('frontend.product.details');

Route::get('categories/wise/page/{id}', [FrontendController::class, 'categoryWisePage'])->name('categories.wise_page');

Route::get('about/salamat', [FrontendController::class, 'aboutSalamat'])->name('about.salamat');
Route::get('about/volt-me', [FrontendController::class, 'aboutVolt'])->name('about.volt_me');

Route::post('add/wishlist/{product_id}', [WishlistController::class, 'addWishlist'])->name('add.wishlist');
Route::get('remove/wishlist/{wishlist_id}', [WishlistController::class, 'removeWishlist'])->name('remove.wishlist');
Route::get('wishlist', [WishlistController::class, 'index'])->name('index.wishlist');

Route::post('add/cart/{product_id}', [CartController::class, 'addCart'])->name('add.cart');
Route::get('details/cart', [CartController::class, 'cartDetails'])->name('cart.details');
Route::post('coupon/add', [CouponController::class, 'addCoupon'])->name('frontend.coupon_add');
Route::post('remove/cart', [CartController::class, 'removeCart'])->name('frontend.remove.cart');
Route::post('increment/cart/', [CartController::class, 'increment'])->name('increment.quantity');
Route::post('decrement/cart/', [CartController::class, 'decrement'])->name('decrement.quantity');

Route::get('contact', [ContactUsController::class, 'index'])->name('contact');
Route::post('contact/store', [ContactUsController::class, 'store'])->name('contact.store');

Route::get('news', [FrontendController::class, 'newsIndex'])->name('forntend.news');
Route::get('news/details/{news}', [FrontendController::class, 'newsDetails'])->name('forntend.news.details');

Route::get('outlets', [OutletsController::class, 'index'])->name('frontend.outlets');
Route::get('outlets/district/{id}', [OutletsController::class, 'districtWise'])->name('outlets.district');
Route::get('outlets/area/{id}', [OutletsController::class, 'areaWise'])->name('outlets.area');

Route::get('privacy/poricy', [FrontendController::class, 'privacy'])->name('frontend.privacy.policy');
Route::get('warranty/poricy', [FrontendController::class, 'warrantyPrivacy'])->name('frontend.warranty.policy');
Route::get('refund/poricy', [FrontendController::class, 'refundPolicy'])->name('frontend.refund.policy');
Route::get('terms/condition', [FrontendController::class, 'terms'])->name('frontend.terms');

Route::post('division/district', [ShippingController::class, 'divToDis'])->name('division.to_district');
Route::post('district/upazila', [ShippingController::class, 'disToUpazila'])->name('district.to_upazila');

Route::get('/warranty/index', [WarrantyController::class, 'index'])->name('warranty.index');
Route::post('/warranty/store', [WarrantyController::class, 'store'])->name('warranty.store');
Route::get('/claim/warranty/{id}', [WarrantyController::class, 'claimWarranty'])->name('claim.warranty');
Route::post('/claim/warranty/store', [WarrantyController::class, 'claimStore'])->name('claim.store');

Route::resource('review', ReviewController::class);
Route::get('review/active/{id}', [ReviewController::class, 'active'])->name('review.active');
Route::get('review/inactive/{id}', [ReviewController::class, 'inActive'])->name('review.inactive');
Route::get('review/create/{id}', [ReviewController::class, 'createReview'])->name('product_review.create');

Route::get('career', [CareerController::class, 'index'])->name('frontend.career.index');
Route::get('career/apply/{id}', [CareerController::class, 'apply'])->name('frontend.career.apply');
Route::post('career/apply/store', [CareerController::class, 'applyStore'])->name('career.apply_store');

Route::get('dealership/register', [DealerController::class, 'register'])->name('dealerships.register');
Route::post('dealership/register/store', [DealerController::class, 'storeRegister'])->name('register.store');
Route::post('dealer/upadate/{id}', [DealerController::class, 'updateDealer'])->name('dealer.update');

Route::post('search', [FrontendController::class, 'search'])->name('search');
Route::get('search/result', [FrontendController::class, 'searchIndex'])->name('search.result');
Route::post('support/store', [SupportController::class, 'supportStore'])->name('support.store');
Route::get('shorting/product', [ProductFrontendController::class, 'shortProduct'])->name('shorting.product');

Route::get('delete-product-image/{image?}', [ImageController::class, 'deleteDealerAttachment'])->name('delete-attachment');

// Route::get('/scan-qr-code', [QRCodeController::class, 'scanQRCode'])->name('scan-qr-code');
// Route::post('/scan/code/store', [QRCodeController::class, 'processQRCode'])->name('process-qr-code');

// SSLCOMMERZ Start
Route::get('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END



