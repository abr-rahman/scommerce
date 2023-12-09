 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('uploads/logo/'. $siteSettings->first()->logo) ?? asset('frontend/images/logo.png')  }}" alt="{{ config('app.name') }}" class="brand-image"> <br>
        <span class="brand-text font-weight-bold text-center">
            {{-- {{ config('app.name') }} --}}
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- SidebarSearch Form -->
    <!--
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      -->
      @can('isAdmin')
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <x-nav-group :icon="'nav-icon fas fa-tools'" :name="'Settings'" :prefix="'admin/settings*'">
            <x-nav-ul :prefix="'admin/settings*'">
                <x-nav-li :route="'general.settings'">
                    {{ __('General Settings') }}
                </x-nav-li>
                <x-nav-li :route="'profile.edit'">
                    {{ __('Profile') }}
                </x-nav-li>
                <x-nav-li :route="'privacy.policy'">
                    {{ __('Privacy & Policy') }}
                </x-nav-li>
            </x-nav-ul>
          </x-nav-group>
          <x-nav-group :icon="'nav-icon fas fa-solid fa-layer-group'" :name="'Product'" :prefix="'admin/product*'">
            <x-nav-ul :prefix="'admin/product*'">
                <x-nav-li :route="'products.index'">
                    {{ __('All Product') }}
                </x-nav-li>
                <x-nav-li :route="'products.create'">
                    {{ __('Create Product') }}
                </x-nav-li>
                <x-nav-li :route="'sliders.index'">
                    {{ __('Slider') }}
                </x-nav-li>
              </x-nav-ul>
            <x-nav-ul :prefix="'admin/item*'">
              <x-nav-li :prefix="'admin/item*'" :icon="'far fas fa-bars nav-icon'">
                {{ __('Items') }}
                <i class="right fas fa-angle-left"></i>
                <x-slot name="after">
                  <x-nav-ul :prefix="'admin/item*'">
                      <x-nav-li :route="'categories.index'">
                          {{ __('Category') }}
                      </x-nav-li>
                      {{-- <x-nav-li :route="'sub-categories.index'">
                          {{ __('Sub-Category') }}
                      </x-nav-li> --}}
                      <x-nav-li :route="'brands.index'">
                          {{ __('Brands') }}
                      </x-nav-li>
                      {{-- <x-nav-li :route="'additions.index'">
                        {{ __('Color & Size') }}
                      </x-nav-li>
                      <x-nav-li :route="'tags.index'">
                        {{ __('Tags') }}
                      </x-nav-li>
                      <x-nav-li :route="'taxs.index'">
                        {{ __('Tax') }}
                      </x-nav-li>
                      <x-nav-li :route="'attributes.index'">
                        {{ __('Attributes') }}
                      </x-nav-li>
                      <x-nav-li :route="'variants.index'">
                        {{ __('Variants') }}
                      </x-nav-li> --}}
                      <x-nav-li :route="'coupons.index'">
                        {{ __('Coupons') }}
                      </x-nav-li>
                      <x-nav-li :route="'custom-shippings.index'">
                        {{ __('Shipping Charge') }}
                      </x-nav-li>
                      {{-- <x-nav-li :route="'shippings.index'">
                        {{ __('Shipping Charge') }}
                      </x-nav-li> --}}
                  </x-nav-ul>
                </x-slot>
                </x-nav-li>
            </x-nav-ul>

            <x-nav-ul :prefix="'admin/product/review*'">
              <x-nav-li :prefix="'admin/product/review*'" :icon="'far fas fa-comment nav-icon'">
                {{ __('Review') }}
                <i class="right fas fa-angle-left"></i>
                <x-slot name="after">
                  <x-nav-ul :prefix="'admin/product/review*'">
                      <x-nav-li :route="'review.index'">
                          {{ __('All Review') }}
                      </x-nav-li>
                  </x-nav-ul>
                </x-slot>
              </x-nav-li>
            </x-nav-ul>
          </x-nav-group>
          <x-nav-group :icon="'nav-icon fa fa-shopping-cart'" :name="'Purchase'" :prefix="'admin/purchase*'">
            <x-nav-ul :prefix="'admin/purchase'">
                <x-nav-li :route="'purchase.product'" :icon="'far fa-circle nav-icon'">
                {{ __('Purchase Entry') }}
                </x-nav-li>
                <x-nav-li :route="'purchase.index'" :icon="'far fa-circle nav-icon'">
                {{ __('Purchase List') }}
                </x-nav-li>
            </x-nav-ul>
          </x-nav-group>
          <x-nav-group :icon="'nav-icon far fa-handshake'" :name="'Stock'" :prefix="'admin/stock*'">
            <x-nav-ul :prefix="'admin/stock'">
                <x-nav-li :route="'product.stock_list'" :icon="'far fa-circle nav-icon'">
                {{ __('Product Stock Lists') }}
                </x-nav-li>
                <x-nav-li :route="'product.ledger'" :icon="'far fa-circle nav-icon'">
                {{ __('Product Ledger') }}
                </x-nav-li>
            </x-nav-ul>
          </x-nav-group>
          <x-nav-group :icon="'nav-icon far fas fa-atom'" :name="'Order'" :prefix="'admin/order*'">
            <x-nav-ul :prefix="'admin/order'">
              <x-nav-li :route="'order.index'">
                {{ __('All Order') }}
              </x-nav-li>
              {{-- <x-nav-li :route="'order.dealer_list'">
                {{ __('Dealer Order') }}
              </x-nav-li>
              <x-nav-li :route="'order.user_list'">
                {{ __('User Order') }}
              </x-nav-li> --}}
              <x-nav-li :route="'order.pending_list'">
                {{ __('Pending Order') }}
              </x-nav-li>
              <x-nav-li :route="'order.approve_list'">
                {{ __('Approve Order') }}
              </x-nav-li>
              <x-nav-li :route="'order.processing_list'">
                {{ __('Processing Order') }}
              </x-nav-li>
              <x-nav-li :route="'order.intransit_list'">
                {{ __('Intransit Order') }}
              </x-nav-li>
              <x-nav-li :route="'order.return_list'">
                {{ __('Return Order') }}
              </x-nav-li>
              <x-nav-li :route="'order.complete_list'">
                {{ __('Complete Order') }}
              </x-nav-li>
              <x-nav-li :route="'order.rejected_list'">
                {{ __('Rejected Order') }}
              </x-nav-li>
            </x-nav-ul>
          </x-nav-group>
          <x-nav-group :icon="'nav-icon fas fa-baby-carriage'" :name="'Offline'" :prefix="'admin/offline*'">
            <x-nav-ul :prefix="'admin/offline'">
              <x-nav-li :route="'offline.customers.index'">
                {{ __('Customer') }}
              </x-nav-li>
              <x-nav-li :route="'offline.order.index'">
                {{ __('Order') }}
              </x-nav-li>
            </x-nav-ul>
          </x-nav-group>
          <x-nav-group :icon="'nav-icon fas fa-solid fa-users'" :name="'Dealer'" :prefix="'admin/dealer*'">
            <x-nav-ul :prefix="'admin/dealer'">
              <x-nav-li :route="'dealerships.index'">
                {{ __('All Dealer') }}
              </x-nav-li>
              <x-nav-li :route="'dealerships.approved.index'">
                {{ __('Approved Dealer') }}
              </x-nav-li>
              <x-nav-li :route="'dealerships.pending.index'">
                {{ __('Pending Dealer') }}
              </x-nav-li>
            </x-nav-ul>
          </x-nav-group>

          <x-nav-group :icon="'nav-icon fas fa-book-reader'" :name="'Report'" :prefix="'admin/report*'">
            <x-nav-ul :prefix="'admin/report'">
              <x-nav-li :route="'report.sales'">
                {{ __('Online Report') }}
              </x-nav-li>
              <x-nav-li :route="'offline.report.sales'">
                {{ __('Offline Report') }}
              </x-nav-li>
            </x-nav-ul>
          </x-nav-group>

          <x-nav-group :icon="'nav-icon fas fa-book-open'" :name="'News'" :prefix="'admin/news*'">
            <x-nav-ul :prefix="'admin/news'">
              <x-nav-li :route="'news.index'">
                {{ __('All News') }}
              </x-nav-li>
            </x-nav-ul>
          </x-nav-group>

          <x-nav-group :icon="'nav-icon fas fa-tablets'" :name="'Outlets'" :prefix="'admin/outlets*'">
            <x-nav-ul :prefix="'admin/outlets'">
              <x-nav-li :route="'outlets.index'">
                {{ __('All Outelets') }}
              </x-nav-li>
              <x-nav-li :route="'outlets.create'">
                {{ __('Create Outelets') }}
              </x-nav-li>
            </x-nav-ul>
          </x-nav-group>

          <x-nav-group :icon="'nav-icon fas fa-laptop-medical'" :name="'Career'" :prefix="'admin/careers*'">
            <x-nav-ul :prefix="'admin/careers'">
              <x-nav-li :route="'careers.index'">
                {{ __('Job Entry Lists') }}
              </x-nav-li>
              <x-nav-li :route="'careers.create'">
                {{ __('Job Entry') }}
              </x-nav-li>
              <x-nav-li :route="'career.apply_list'">
                {{ __('Apply Lists') }}
              </x-nav-li>
            </x-nav-ul>
          </x-nav-group>
          <x-nav-group :icon="'nav-icon fas fa-person-booth'" :name="'Customer'" :prefix="'admin/customer*'">
            <x-nav-ul :prefix="'admin/customer'">
              <x-nav-li :route="'customers.index'">
                {{ __('Customers') }}
              </x-nav-li>
              <x-nav-li :route="'reply-supports.index'">
                {{ __('Support') }}
              </x-nav-li>
              <x-nav-li :route="'admin.contact'">
                {{ __('Contact') }}
              </x-nav-li>
              <x-nav-li :route="'visitor.index'">
                {{ __('Visitors') }}
              </x-nav-li>
            </x-nav-ul>
          </x-nav-group>
          <x-nav-group :icon="'nav-icon fas fa-box-tissue'" :name="'Warranty'" :prefix="'admin/warranty*'">
            <x-nav-ul :prefix="'admin/warranty'">
              <x-nav-li :route="'admin.warranty_index'">
                {{ __('Warranty') }}
              </x-nav-li>
            </x-nav-ul>
          </x-nav-group>
          <x-nav-group :icon="'nav-icon fas fa-solid fa-peace'" :name="'Product Verify'" :prefix="'admin/verify*'">
            <x-nav-ul :prefix="'admin/verify'">
              <x-nav-li :route="'admin.verify_index'">
                {{ __('Product Verify') }}
              </x-nav-li>
            </x-nav-ul>
          </x-nav-group>
            {{-- <li class="nav-item">
              <a href="{{ route('suppliers.index') }}" class="nav-link {{ request()->routeIs('suppliers.index') ? 'active' : '' }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Suppliers</p>
              </a>
            </li> --}}
          </ul>
        </nav>
        @endcan
      <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
  </aside>
