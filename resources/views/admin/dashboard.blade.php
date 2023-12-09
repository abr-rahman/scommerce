@extends('layouts.admin-master')

@section('section')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 ">
                    <h2 class="h4 pt-2 px-1">Visitor Statement</h2>
                    <div class="row border rounded p-2 m-1">
                        <div class="col-lg-4 col-md-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $todayVisitor }}</h3>
                                    <p>Today Visitor</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="{{ route('visitor.index') }}" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $visitor7days }}</h3>
                                    <p>Last 7 Days Visitor</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="{{ route('visitor.index') }}" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $totalVisitor }}</h3>
                                    <p>Total Visitor</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="{{ route('visitor.index') }}" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <h2 class="h4 pt-2 px-1">User Statement</h2>
                    <div class="row border rounded p-2 m-1">
                        <div class="col-lg-4 col-md-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $userCount }}</h3>
                                    <p>Total User</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="small-box bg-dark">
                                <div class="inner">
                                    <h3>{{ $userDealer }}</h3>
                                    <p>Total Dealer</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="small-box bg-dark">
                                <div class="inner">
                                    <h3>{{ $dealerCount }}</h3>
                                    <p>Total Offline Dealer</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <h2 class="h4 pt-2 px-1">Order Statement</h2>
                    <h2 class="h5 text-center">Today Order Statement</h2>
                    <div class="row border rounded p-2 m-1">
                        <div class="col-lg-4 col-md-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $todayPendingOrders }}</h3>
                                    <p>Pending Orders</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $todayApproveOrders }}</h3>
                                    <p>Approved Orders</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $todayCompleteOrders }}</h3>
                                    <p>Complete Order</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <h2 class="h5 text-center">All Orders Statements</h2>
                    <div class="row border rounded p-2 m-1">
                        <div class="col-lg-4 col-md-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $allPendingOrder }}</h3>
                                    <p>Pending Orders</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $countAppOrder }}</h3>
                                    <p>Approved Orders</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $compOrder }}</h3>
                                    <p>Complete Order</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <h2 class="h4 pt-2 px-1">Sale Statement</h2>
                    {{-- <h2 class="h5 text-center">ToDay Statement</h2>
                    <div class="row border rounded p-2 m-1">
                        <div class="col-lg-4 col-md-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $todayShippingCharge }}</h3>
                                    <p>ToDay Shipping Charge</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $todaySubTotal }}</h3>
                                    <p>ToDay Sub-Total Amount</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $todayGrandTotal }}</h3>
                                    <p>ToDay Grand-Total Amount</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div> --}}
                    <h2 class="h5 text-center">All Sale Statement</h2>
                    <div class="row border rounded p-2 m-1">
                        <div class="col-lg-4 col-md-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $shippingCharge }}</h3>
                                    <p>Total Shipping Charge</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $subTotal }}</h3>
                                    <p>Sub-Total Amount</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="small-box bg-dark">
                                <div class="inner">
                                    <h3>{{ $grandTotal }}</h3>
                                    <p>Grand-Total Amount</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <h2 class="h5 text-center">Product Verification / Warranty</h2>
                    <div class="row border rounded p-2 m-1">
                        <div class="col-lg-6 col-md-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $countVerifyProduct }}</h3>
                                    <p>Total Verify Product</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $countWarrantyProduct }}</h3>
                                    <p>Total Claim Warranty</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
