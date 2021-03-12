@extends('layouts.page')
@section('content')
    <div class="main-content">
        @include('partials.user.messages')
        <section class="section">
            <ul class="breadcrumb breadcrumb-style ">
                <li class="breadcrumb-item">
                    <h4 class="page-title m-b-0">Inventory</h4>
                </li>
                <li class="breadcrumb-item">
                    <button href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-success"
                        style="float:right;">Update Inventory Items</button>
                </li>
                <li class="breadcrumb-item">
                    <a href="/manage-packs" class="btn btn-primary" style="float:right;">View Inventory Items</a>
                </li>
                <!-- <li class="breadcrumb-item active">Inventory Dashboard</li> -->
            </ul>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-icon shadow-primary bg-purple">
                            <i class="fas fa-archive"></i>
                        </div>
                        <div class="card-wrap float-right">
                            {{-- Lekki --}}
                            <div class="card-header">
                                <h4>Total Items (Lekki)</h4>
                            </div>
                            <div class="card-body">
                                {{-- @if ($totalPacksLekki)
                                    {{ $totalPacksLekki }}
                                    @else
                                    0
                                @endif --}}
                                1
                            </div>
                            {{-- Ikeja --}}
                            <div class="card-header">
                                <h4>Total Items (Ikeja)</h4>
                            </div>
                            <div class="card-body">
                                {{-- @if ($totalPacksIkeja)
                                    {{ $totalPacksIkeja }}
                                    @else
                                    0
                                @endif --}}
                                1
                            </div>
                            <div class="card-header">
                                <h4>Total Items (Ogba)</h4>
                            </div>
                            <div class="card-body">
                                {{-- @if ($totalPacksIkeja)
                                    {{ $totalPacksIkeja }}
                                    @else
                                    0
                                @endif --}}
                                1
                            </div>
                        </div>
                        <div class="card-chart">
                            <canvas id="smallChart1" height="80"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-icon shadow-primary bg-orange">
                            <i class="fas fa-medkit"></i>
                        </div>
                        <div class="card-wrap float-right">
                            <div class="card-header">
                                <h4>Care Pack (Lekki)</h4>
                            </div>
                            <div class="card-body">
                                {{-- Lekki --}}
                                {{ $carePackLekki }}
                            </div>
                            <div class="card-header">
                                <h4>Care Pack (Ikeja)</h4>
                            </div>
                            <div class="card-body">
                                {{-- Ikeja --}}
                                {{ $carePackIkeja }}
                            </div>
                            <div class="card-header">
                                <h4>Care Pack (Ogba)</h4>
                            </div>
                            <div class="card-body">
                                {{-- Ogba --}}
                                {{ $carePackOgba }}
                            </div>
                        </div>
                        <div class="card-chart">
                            <canvas id="smallChart2" height="80"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-icon shadow-primary bg-green">
                            <i class="fas fa-file"></i>
                        </div>
                        <div class="card-wrap float-right">
                            <div class="card-header">
                                <h4>Orders </h4>
                            </div>
                            <div class="card-body">
                                @if ($totalOrders)
                                    {{ $totalOrders }}
                                @else
                                    0
                                @endif
                            </div>
                        </div>
                        <div class="card-chart">
                            <canvas id="smallChart3" height="80"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-icon shadow-primary bg-blue">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="card-wrap float-right">
                            <div class="card-header">
                                <h4>Revenue</h4>
                            </div>
                            <div class="card-body">
                                @if ($totalAmounts)
                                    N{{ number_format($totalAmounts) }}
                                @else
                                    N0
                                @endif
                            </div>
                        </div>
                        <div class="card-chart">
                            <canvas id="smallChart4" height="80"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-12 col-sm-12 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Inventory Items Chart (Monthly)</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Inventory input against Deduction</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart2"></div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Inventory Activity</h4>
                        </div>
                        @if (count($activities) > 0)
                            <div class="card-body">
                                <div class="table-responsive" id="proTeamScroll">
                                    <table class="table table-striped" id="table-2">
                                        <thead>
                                            <tr>
                                                {{-- <th>S/N</th>
                                                --}}
                                                <th>Date</th>
                                                <th>Item Category</th>
                                                <th>Item</th>
                                                <th>Activity</th>
                                                <th>Transfer From</th>
                                                <th>Number</th>
                                                <th>Collected By</th>
                                                <th>Transfer To</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        @foreach ($activities as $key => $activity)
                                            <tr>
                                                {{-- <td>{{ $key + 1 }}</td>
                                                --}}
                                                <td>{{ $activity->created_at->format('F j, Y') }}</td>
                                                <td class="font-weight-600">
                                                    {{ Str::of($activity->pack->category->name)->ucfirst() }}
                                                </td>
                                                <td class="text-truncate">
                                                    {{ Str::of($activity->pack->name)->ucfirst() }}
                                                </td>
                                                <td>
                                                    @switch($activity->status)
                                                        @case('ADDITION')
                                                        <div class="badge l-bg-green">{{ $activity->status }}</div>
                                                        @break
                                                        @default
                                                        <div class="badge l-bg-red">{{ $activity->status }}</div>
                                                    @endswitch
                                                </td>
                                                <td>{{ $activity->transferFrom->location }}</td>
                                                <td>{{ $activity->quantity }}</td>
                                                <td>{{ $activity->collectedBy }}</td>
                                                <td>{{ $activity->transferTo->location }}</td>
                                                <td>
                                                    <a href="/activity-details/{{ $activity->uuid }}"
                                                        class="btn btn-primary">Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        @else
                            <h3>No inventory activity</h3>
                        @endif
                    </div>
                </div>
            </div>

        </section>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModal">Update Inventory Items</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="" method="POST" action="/create-activity">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Item Category</label>
                                <div class="input-group">
                                    <select name="category" class="form-control :class=" { 'is-invalid' :
                                        form.errors.has('category') }">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->name }}">{{ Str::of($category->name)->ucfirst() }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <has-error :form="form" field="category"></has-error>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Select Item</label>
                                <div class="input-group">
                                    <select name="item" class="form-control :class=" { 'is-invalid' :
                                        form.errors.has('item') }" id="item" required>
                                        @foreach ($items as $item)
                                            <option value="{{ $item->name }}">{{ Str::of($item->name)->ucfirst() }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <has-error :form="form" field="item"></has-error>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Activity</label>
                                <div class="input-group">
                                    <select class="form-control :class=" { 'is-invalid' : form.errors.has('status') }"
                                        name="status">
                                        <option>--select activity--</option>
                                        <option value="ADDITION">Addition</option>
                                        {{-- <option value="DEDUCTION">Deduction</option>
                                        --}}
                                    </select>
                                    <has-error :form="form" field="status"></has-error>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Number</label>
                                <div class="input-group">
                                    <input type="text" class="form-control :class=" { 'is-invalid' :
                                        form.errors.has('numberOfItem') }" placeholder="Enter number of items"
                                        name="numberOfItem">
                                    <has-error :form="form" field="numberOfItem"></has-error>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Received From</label>
                                <div class="input-group">
                                    <input type="text" class="form-control :class=" { 'is-invalid' :
                                        form.errors.has('receivedFrom') }" placeholder="Received From" name="receivedFrom">
                                    <has-error :form="form" field="receivedFrom"></has-error>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Collected By</label>
                                <div class="input-group">
                                    <input type="text" class="form-control :class=" { 'is-invalid' :
                                        form.errors.has('collectedBy') }" placeholder="Collected By" name="collectedBy">
                                    <has-error :form="form" field="collectedBy"></has-error>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Transfer From</label>
                                <div class="input-group">
                                    <input list="locations" name="transferFrom" class="form-control :class=" { 'is-invalid'
                                        : form.errors.has('transferFrom') }" placeholder="Warehouse Location" required>
                                    <datalist id="locations">
                                        @foreach ($warehouses as $warehouse)
                                            <option value="{{ Str::of($warehouse->location)->ucfirst() }}">
                                        @endforeach
                                    </datalist>
                                    <has-error :form="form" field="transferFrom"></has-error>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Transfer To</label>
                                <div class="input-group">
                                    <input list="locations" name="transferTo" class="form-control :class=" { 'is-invalid' :
                                        form.errors.has('transferTo') }" placeholder="Warehouse Location" required>
                                    <datalist id="locations">
                                        @foreach ($warehouses as $warehouse)
                                            <option value="{{ Str::of($warehouse->location)->ucfirst() }}">
                                        @endforeach
                                    </datalist>
                                    <has-error :form="form" field="transferTo"></has-error>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Comment</label>
                                <div class="input-group">
                                    <textarea type="text" class="form-control :class=" { 'is-invalid' :
                                        form.errors.has('reason') }" name="reason" placeholder="Reasons for update"
                                        name="reason">
                                                                                                                                                </textarea>
                                    <has-error :form="form" field="reason"></has-error>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" id="remember-me">
                                    <label class="custom-control-label" for="remember-me">I acknowledge that I have counted
                                        and assessed the items</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Complete</button>
                            <button type="button" class="btn btn-danger m-t-15 waves-effect"
                                style="float:right;">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


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
                        <h6 class="font-medium m-b-10">Color Theme</h6>
                        <div class="theme-setting-options">
                            <ul class="choose-theme list-unstyled mb-0">
                                <li title="white" class="active">
                                    <div class="white"></div>
                                </li>
                                <li title="cyan">
                                    <div class="cyan"></div>
                                </li>
                                <li title="black">
                                    <div class="black"></div>
                                </li>
                                <li title="purple">
                                    <div class="purple"></div>
                                </li>
                                <li title="orange">
                                    <div class="orange"></div>
                                </li>
                                <li title="green">
                                    <div class="green"></div>
                                </li>
                                <li title="red">
                                    <div class="red"></div>
                                </li>
                            </ul>
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
                    <div class="p-15 border-bottom">
                        <div class="theme-setting-options">
                            <label class="m-b-0">
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                    id="sticky_header_setting">
                                <span class="custom-switch-indicator"></span>
                                <span class="control-label p-l-10">Sticky Header</span>
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
