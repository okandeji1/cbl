@extends('layouts.page')
@section('content')
    <div class="main-content">
        <section class="section">
            @include('partials.user.messages')
            <ul class="breadcrumb breadcrumb-style ">
                <li class="breadcrumb-item">
                    <h4 class="page-title m-b-0">labs details</h4>
                </li>
            </ul>
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <button class="btn btn-info mr-1" type="reset">Edit Details</button>
                                <button class="btn btn-danger mr-1" type="submit">Delete lab</button>
                                <button class="badge badge-secondary badge-shadow" data-toggle="modal"
                                    data-target="#share">Share lab supplies</button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>lab ID</label>
                                        <input type="text" value="{{ $lab->uuid }}" disabled class="form-control">
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Registration Date</label>
                                        <input type="text" value="{{ $lab->created_at->format('F j, Y') }}" disabled
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>lab Name</label>
                                        <input type="text" value="{{ $lab->fullname }}" disabled class="form-control">
                                    </div>
                                    <div class="form-group col-6">
                                        <label>lab Phone</label>
                                        <input type="text" value="{{ $lab->phoneNumber }}" disabled class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>lab Email</label>
                                        <input type="text" value="{{ $lab->email }}" disabled class="form-control">
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Total Samples</label>
                                        <input type="text" value="{{ $lab->supplies }}" disabled class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>lab Area</label>
                                        <input type="text" value="{{ $lab->region }}" disabled class="form-control">
                                    </div>
                                    <div class="form-group col-6">
                                        <label>lab Address</label>
                                        <input type="text" value="{{ $lab->address }}" disabled class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-danger" type="reset" onclick="history.back();">Cancel</button>
                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                            </div>
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

    {{-- Modal --}}
    <div class="modal fade" id="share" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Share Supplies</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/cbl-share" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>My Lab</label>
                            <input class="form-control" value="{{ $lab->fullname }}" disabled>
                            <input type="hidden" class="form-control :class=" { 'is-invalid' : form.errors.has('labA') }"
                                name="labA" value="{{ $lab->email }}">
                            <has-error :form="form" field="labA"></has-error>
                        </div>
                        <div class="form-group">
                            <label>Supplies</label>
                            <input type="text" class="form-control :class=" { 'is-invalid' : form.errors.has('supplies') }"
                                name="supplies" placeholder="Number of supplies you want to share">
                            <has-error :form="form" field="supplies"></has-error>
                        </div>
                        <div class="form-group">
                            <label>Choose a destination</label>
                            @if (count($labs) > 0)
                                <select class="form-control :class=" { 'is-invalid' : form.errors.has('labB') }" name="labB"
                                    required>
                                    @foreach ($labs as $lab)
                                        <option value="{{ $lab->email }}">{{ $lab->fullname }}</option>
                                    @endforeach
                                </select>
                                <has-error :form="form" field="labB"></has-error>
                            @else
                                <h3>No registered lab yet</h3>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Choose a destination</label>
                            @if (count($riders) > 0)
                                <select class="form-control :class=" { 'is-invalid' : form.errors.has('rider') }"
                                    name="rider" required>
                                    @foreach ($riders as $rider)
                                        <option value="{{ $rider->email }}">{{ $rider->fullname }}</option>
                                    @endforeach
                                </select>
                                <has-error :form="form" field="rider"></has-error>
                            @else
                                <h3>No registered rider yet</h3>
                            @endif
                        </div>
                        <div>
                            <button class="btn btn-success" type="submit">Share</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
