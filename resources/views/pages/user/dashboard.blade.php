@extends('layouts.page')
@section('content')
    <div class="main-content">
        <section class="section">
            @include('partials.user.messages')
            <ul class="breadcrumb breadcrumb-style ">
                <li class="breadcrumb-item">
                    <h4 class="page-title m-b-0">Dashboard</h4>
                </li>
                <li class="breadcrumb-item">
                    <a href="index.html">
                        <i data-feather="home"></i></a>
                </li>
                <li class="breadcrumb-item active">Data collected on {{ date('d/m/Y') }}</li>
            </ul>
            {{-- @can('isSuperAdmin') --}}
            <div class="row ">
                <div class="col-xl-3 col-lg-6">
                    <div class="card l-bg-cherry">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i></div>
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Open Orders</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    {{-- @if ($pendingOrdersLab)
                                        --}}
                                        <h2 class="d-flex align-items-center mb-0">
                                            {{-- {{ $pendingOrdersLab }}
                                            --}}
                                            36
                                        </h2>
                                        {{-- @else
                                        <h2 class="d-flex align-items-center mb-0">
                                            0
                                        </h2>
                                    @endif --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card l-bg-green-dark">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-folder"></i></div>
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Pending Orders</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    {{-- @if ($pendingOrdersLSB)
                                        --}}
                                        <h2 class="d-flex align-items-center mb-0">
                                            {{-- {{ $pendingOrdersLSB }}
                                            --}}
                                            79
                                        </h2>
                                        {{-- @else
                                        <h2 class="d-flex align-items-center mb-0">
                                            0
                                        </h2>
                                    @endif --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card l-bg-orange-dark">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-boxes"></i></div>
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Total Inventory Items</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    {{-- @if ($pendingOrdersSurge) --}}
                                        <h2 class="d-flex align-items-center mb-0">
                                            {{-- {{ $pendingOrdersSurge }}
                                            --}}
                                            57
                                        </h2>
                                        {{-- @else
                                        <h2 class="d-flex align-items-center mb-0">
                                            0
                                        </h2>
                                    @endif --}}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card l-bg-blue-dark">
                        <div class="card-statistic-3 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-plane"></i></div>
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Flights Recorded</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    {{-- @if ($allOrders)
                                        --}}
                                        <h2 class="d-flex align-items-center mb-0">
                                            {{-- {{ $allOrders }}
                                            --}}
                                            234
                                        </h2>
                                        {{-- @else
                                        <h2 class="d-flex align-items-center mb-0">
                                            0
                                        </h2>
                                    @endif --}}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- @endcan --}}

            {{-- End of other admins card --}}
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Transactions</h4>
                        </div>
                        <div class="card-body">
                            <div id="schart1"></div>
                            <div class="row">
                                <div class="col-4">
                                    <p class="text-muted font-15 text-truncate">Total</p>
                                    <h5>
                                        <i
                                            class="fas fa-arrow-circle-up col-green m-r-5"></i>₦{{ number_format($totalTransactions, 2) }}
                                    </h5>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted font-15 text-truncate">Today
                                    </p>
                                    <h5>
                                        ₦{{ number_format($transactionsToday, 2) }}
                                    </h5>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted text-truncate">This Month</p>
                                    @if ($monthlyTransactions)
                                        <h5>
                                            ₦{{ number_format($monthlyTransactions, 2) }}
                                        </h5>
                                    @else
                                        <h5 class="d-flex align-items-center mb-0">
                                            ₦0.00
                                        </h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Orders</h4>
                        </div>
                        <div class="card-body">
                            <div id="schart2"></div>
                            <div class="row">
                                <div class="col-4">
                                    <p class="text-muted font-15 text-truncate">Total</p>
                                    <h5>
                                        {{ $totalOrders }}
                                    </h5>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted font-15 text-truncate">Today
                                    </p>
                                    <h5>
                                        {{ $ordersToday }}
                                    </h5>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted text-truncate">Last
                                        Month</p>
                                    <h5>
                                        <i class="fas fa-arrow-circle-up col-green m-r-5"></i>{{ $monthlyOrders }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6 col-xl-6 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Flights Recorded</h4>
                        </div>
                        <div class="card-body">
                            <div id="barChart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-6 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Inventory Activity </h4>
                        </div>
                        <div class="card-body">
                            <div id="lineChart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="settingSidebar">
            <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
            </a>
            <div class="settingSidebar-body ps-container ps-theme-default">
                <div class=" fade show active">
                    <div class="setting-panel-header">Setting Panel
                    </div>
                    <div class="p-15 border-bottom">
                        <h6 class="font-medium m-b-10">Select Layout</h6>
                        <div class="selectgroup layout-color w-50">
                            <label class="selectgroup-item">
                                <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout"
                                    checked>
                                <span class="selectgroup-button">Light</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                                <span class="selectgroup-button">Dark</span>
                            </label>
                        </div>
                    </div>
                    <div class="p-15 border-bottom">
                        <h6 class="font-medium m-b-10">Sidebar Color</h6>
                        <div class="selectgroup selectgroup-pills sidebar-color">
                            <label class="selectgroup-item">
                                <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                                <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                    data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar"
                                    checked>
                                <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                    data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                            </label>
                        </div>
                    </div>
                    <div class="p-15 border-bottom">
                        <div class="theme-setting-options">
                            <label class="m-b-0">
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                    id="mini_sidebar_setting">
                                <span class="custom-switch-indicator"></span>
                                <span class="control-label p-l-10">Mini Sidebar</span>
                            </label>
                        </div>
                    </div>
                    <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                        <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                            <i class="fas fa-undo"></i> Restore Default
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
