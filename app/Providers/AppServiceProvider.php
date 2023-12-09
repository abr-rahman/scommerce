<?php

namespace App\Providers;

use App\Services\Interfaces\AttributeServiceInterface;
use App\Services\Interfaces\BrandServiceInterface;
use App\Services\Interfaces\CategoryServiceInterface;
use App\Services\Interfaces\CouponServiceInterface;
use App\Services\Interfaces\CustomerServiceInterface;
use App\Services\Interfaces\DealerServiceInterface;
use App\Services\Interfaces\InventoryServiceInterface;
use App\Services\Interfaces\ProductServiceInterface;
use App\Services\Interfaces\ReviewServiceInterface;
use App\Services\Interfaces\SubCategoryServiceInterface;
use App\Services\Interfaces\SupplierServiceInterface;
use App\Services\Interfaces\TagServiceInterface;
use App\Services\Interfaces\TaxServiceInterface;
use App\Services\Interfaces\VariantServiceInterface;
use App\Services\AttributeService;
use App\Services\BrandService;
use App\Services\CareerService;
use App\Services\CategoryService;
use App\Services\CouponService;
use App\Services\CustomerService;
use App\Services\CustomShippingService;
use App\Services\DealerService;
use App\Services\Interfaces\CareerServiceInterface;
use App\Services\Interfaces\CustomShippingServiceInterface;
use App\Services\Interfaces\NewsServiceInterface;
use App\Services\Interfaces\OfflineServiceInterface;
use App\Services\Interfaces\OutletsServiceInterface;
use App\Services\Interfaces\SettingsServiceInterface;
use App\Services\Interfaces\ShippingServiceInterface;
use App\Services\Interfaces\SliderServiceInterface;
use App\Services\InventoryService;
use App\Services\NewsService;
use App\Services\OfflineService;
use App\Services\OutletsService;
use App\Services\ProductService;
use App\Services\ReviewService;
use App\Services\SettingsService;
use App\Services\ShippingService;
use App\Services\SliderService;
use App\Services\SubCategoryService;
use App\Services\SupplierService;
use App\Services\TagService;
use App\Services\TaxService;
use App\Services\VariantService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
        $this->app->bind(SubCategoryServiceInterface::class, SubCategoryService::class);
        $this->app->bind(BrandServiceInterface::class, BrandService::class);
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
        $this->app->bind(TaxServiceInterface::class, TaxService::class);
        $this->app->bind(TagServiceInterface::class, TagService::class);
        $this->app->bind(SupplierServiceInterface::class, SupplierService::class);
        $this->app->bind(CustomerServiceInterface::class, CustomerService::class);
        $this->app->bind(AttributeServiceInterface::class, AttributeService::class);
        $this->app->bind(VariantServiceInterface::class, VariantService::class);
        $this->app->bind(DealerServiceInterface::class, DealerService::class);
        $this->app->bind(ReviewServiceInterface::class, ReviewService::class);
        $this->app->bind(InventoryServiceInterface::class, InventoryService::class);
        $this->app->bind(CouponServiceInterface::class, CouponService::class);
        $this->app->bind(NewsServiceInterface::class, NewsService::class);
        $this->app->bind(SettingsServiceInterface::class, SettingsService::class);
        $this->app->bind(OutletsServiceInterface::class, OutletsService::class);
        $this->app->bind(ShippingServiceInterface::class, ShippingService::class);
        $this->app->bind(CareerServiceInterface::class, CareerService::class);
        $this->app->bind(SliderServiceInterface::class, SliderService::class);
        $this->app->bind(OfflineServiceInterface::class, OfflineService::class);
        $this->app->bind(CustomShippingServiceInterface::class, CustomShippingService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
