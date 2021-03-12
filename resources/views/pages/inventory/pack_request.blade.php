@extends('layouts.page')
@section('content')
    <div class="main-content">
        <section class="section">
            <ul class="breadcrumb breadcrumb-style ">
                <li class="breadcrumb-item">
                    <h4 class="page-title m-b-0">Care Pack Request</h4>
                </li>
                <!--  -->
            </ul>
            <div class="section-body">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            {{-- Super admin request (CBL) --}}
                            @can('isSuperAdmin')
                                <div class="card-body">
                                    <form method="POST" action="/admin-request" id="wizard_with_validation">
                                        {{ csrf_field() }}
                                        @include('partials.user.messages')
                                        <h3>Request Information</h3>
                                        <fieldset>
                                            <div class="row">
                                                <div class="form-group form-float col-6">
                                                    <div class="form-line">
                                                        <label class="form-label">Description<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" list="packs" name="pack" class="form-control :class="
                                                            { 'is-invalid' : form.errors.has('pack') }" id="pack" required
                                                            placeholder="Eg: Request for ABC LGA ">
                                                        <datalist id="packs">
                                                            @foreach ($packs as $pack)
                                                                <option value="{{ $pack->name }}" />
                                                            @endforeach
                                                        </datalist>
                                                        <has-error :form="form" field="pack"></has-error>
                                                    </div>
                                                </div>
                                                <div class="form-group form-float col-6">
                                                    <div class="form-line">
                                                        <label class="form-label">Quantity<span class="text-danger">
                                                                *</span></label>
                                                        <input type="text" name="quantity"
                                                            class="form-control no-resize :class=" { 'is-invalid' :
                                                            form.errors.has('quantity') }" id="quantity" required>
                                                        <has-error :form="form" field="quantity"></has-error>
                                                    </div>
                                                </div>
                                                <div class="form-group form-float col-6">
                                                    <div class="form-line">
                                                        <label class="form-label">Pickup Region<span class="text-danger">
                                                                *</span></label>
                                                        <input list="regions" id="deliveryRegion" name="deliveryRegion"
                                                            class="form-control :class=" { 'is-invalid' :
                                                            form.errors.has('deliveryRegion') }" placeholder="Select Region"
                                                            required>
                                                        <datalist id="regions">
                                                            <option value="Abraham Adesanya Estate (Lagos)" />
                                                            <option value="Abule Egba (Lagos)" />
                                                            <option value="Ago (Lagos)" />
                                                            <option value="Ajah market (Lagos)" />
                                                            <option value="Akoka-unilag (Lagos)" />
                                                            <option value="Akoka (Lagos)" />
                                                            <option value="Alimosho" />
                                                            <option value="Alapere" /> 
                                                            <option value="Owoshooki" /> 
                                                            <option value="Awoyaya" />
                                                            <option value="Lagos Island (Idumota)"   />
                                                            <option value="Ojota" />
                                                            <option value="Ojo" />
                                                            <option value="Iyanapaja" />
                                                            <option value="Merian " />
                                                            <option value="Shasha" />
                                                            <option value="Egbeda " />
                                                            <option value="Amuwo odofin (Lagos)" />
                                                            <option value="Anthony (Lagos)" />
                                                            <option value="Anthony village (Lagos)" />
                                                            <option value="Apapa (Lagos)" />
                                                            <option value="Badore (Lagos)" />
                                                            <option value="Banana island (Lagos)" />
                                                            <option value="Dolphin Estate (Lagos)" />
                                                            <option value="Dopemu (Lagos)" />
                                                            <option value="E-centre Food Court (Lagos)" />
                                                            <option value="Eko Atlantic City (Lagos)" />
                                                            <option value="Fadeyi (Lagos)" />
                                                            <option value="Festac Town (Lagos)" />
                                                            <option value="Gbagada (Lagos)" />
                                                            <option value="Gowon Estate (Lagos)" />
                                                            <option value="Idimu 2 (Lagos)" />
                                                            <option value="Igbo Efon (Lagos)" />
                                                            <option value="Ijegun (Lagos)" />
                                                            <option value="Ikeja-Alausa (Lagos)" />
                                                            <option value="Ikeja-GRA (Lagos)" />
                                                            <option value="Ikeja-Oba Akran (Lagos)" />
                                                            <option value="Ikeja-Opebi (Lagos)" />
                                                            <option value="Ikeja Allen Avenue (Lagos)" />
                                                            <option value="Ikeja Local Airport (Lagos)" />
                                                            <option value="Ikeja Maryland (Lagos)" />
                                                            <option value="Ikeja Mobolaji Bank Anthony (Lagos)" />
                                                            <option value="Ikorodu-Central (Lagos)" />
                                                            <option value="Ikota (Lagos)" />
                                                            <option value="Ikota Shopping Complex (Lagos)" />
                                                            <option value="Ikotun (Lagos)" />
                                                            <option value="Ikoyi-Awolowo (Lagos)" />
                                                            <option value="Ikoyi-Bourdillon (Lagos)" />
                                                            <option value="Ikoyi (Lagos)" />
                                                            <option value="Ilupeju (Lagos)" />
                                                            <option value="Isolo (Lagos)" />
                                                            <option value="Jibowu-Fadeyi (Lagos)" />
                                                            <option value="Jumia ikeja (Lagos)" />
                                                            <option value="Ketu (Lagos)" />
                                                            <option value="Lagos Island (Lagos)" />
                                                            <option value="LCC (Lagos)" />
                                                            <option value="Lekki-Chevron (Lagos)" />
                                                            <option value="Lekki-Elegushi (Lagos)" />
                                                            <option value="Lekki 4th and 5th Roundabout (Lagos)" />
                                                            <option value="Lekki Elf (Lagos)" />
                                                            <option value="Lekki Phase 1 (Lagos)" />
                                                            <option value="Magodo Phase 1 (Lagos)" />
                                                            <option value="Magodo Phase 2 (Lagos)" />
                                                            <option value="Marina (Lagos)" />
                                                            <option value="Marina Express (Lagos)" />
                                                            <option value="Novare Lekki Mall (Lagos)" />
                                                            <option value="Obalende (Lagos)" />
                                                            <option value="Obanikoro (Lagos)" />
                                                            <option value="Ogba (Lagos)" />
                                                            <option value="Ogudu (Lagos)" />
                                                            <option value="Okota (Lagos)" />
                                                            <option value="Oluwaninshola (Lagos)" />
                                                            <option value="Omole Phase 1 (Lagos)" />
                                                            <option value="Onike (Lagos)" />
                                                            <option value="Oniru (Lagos)" />
                                                            <option value="Orile-Iganmu (Lagos)" />
                                                            <option value="Oshodi Isolo (Lagos)" />
                                                            <option value="Sangotedo-Abijo (Lagos)" />
                                                            <option value="Sangotedo-Lagoonside (Lagos)" />
                                                            <option value="Satellite Town (Lagos)" />
                                                            <option value="Surulere-Aguda (Lagos)" />
                                                            <option value="Surulere-Bode Thomas (Lagos)" />
                                                            <option value="Surulere Idi Araba (Lagos)" />
                                                            <option value="Surulere - Ojuelegba (Lagos)" />
                                                            <option value="Surulere-Stadium (Lagos)" />
                                                            <option value="VGC (Lagos)" />
                                                            <option value="Victoria Island (Lagos)" />
                                                            <option value="Yaba-Abule Ijesha (Lagos)" />
                                                            <option value="Yaba-Alagomeji (Lagos)" />
                                                            <option value="Yaba-Ebute Meta (Lagos)" />
                                                            <option value="Yaba-Makoju (Lagos)" />
                                                            <option value="Yaba-Sabo (Lagos)" />
                                                        </datalist>
                                                        <has-error :form="form" field="deliveryRegion"></has-error>
                                                    </div>
                                                </div>
                                                <div class="form-group form-float col-6">
                                                    <div class="form-line">
                                                        <label class="form-label">Pickup Address<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="deliveryAddress" class="form-control :class="
                                                            { 'is-invalid' : form.errors.has('deliveryAddress') }"
                                                            id="deliveryAddress" required>
                                                        <has-error :form="form" field="deliveryAddress"></has-error>
                                                    </div>
                                                </div>

                                                <div class="form-group form-float col-6">
                                                    <div class="form-line">
                                                        <label class="form-label">Delivery Region<span
                                                                class="text-danger">*</span></label>
                                                        <input list="regions" id="deliveryRegion" name="deliveryRegion"
                                                            class="form-control :class=" { 'is-invalid' :
                                                            form.errors.has('deliveryRegion') }" placeholder="Select Region"
                                                            required>
                                                        <datalist id="regions">
                                                            <option value="Abraham Adesanya Estate (Lagos)" />
                                                            <option value="Abule Egba (Lagos)" />
                                                            <option value="Ago (Lagos)" />
                                                            <option value="Ajah market (Lagos)" />
                                                            <option value="Akoka-unilag (Lagos)" />
                                                            <option value="Akoka (Lagos)" />
                                                            <option value="Alimosho" />
                                                            <option value="Alapere" /> 
                                                            <option value="Owoshooki" /> 
                                                            <option value="Awoyaya" />
                                                            <option value="Lagos Island (Idumota)"   />
                                                            <option value="Ojota" />
                                                            <option value="Ojo" />
                                                            <option value="Iyanapaja" />
                                                            <option value="Merian " />
                                                            <option value="Shasha" />
                                                            <option value="Egbeda " />
                                                            <option value="Amuwo odofin (Lagos)" />
                                                            <option value="Anthony (Lagos)" />
                                                            <option value="Anthony village (Lagos)" />
                                                            <option value="Apapa (Lagos)" />
                                                            <option value="Badore (Lagos)" />
                                                            <option value="Banana island (Lagos)" />
                                                            <option value="Dolphin Estate (Lagos)" />
                                                            <option value="Dopemu (Lagos)" />
                                                            <option value="E-centre Food Court (Lagos)" />
                                                            <option value="Eko Atlantic City (Lagos)" />
                                                            <option value="Fadeyi (Lagos)" />
                                                            <option value="Festac Town (Lagos)" />
                                                            <option value="Gbagada (Lagos)" />
                                                            <option value="Gowon Estate (Lagos)" />
                                                            <option value="Idimu 2 (Lagos)" />
                                                            <option value="Igbo Efon (Lagos)" />
                                                            <option value="Ijegun (Lagos)" />
                                                            <option value="Ikeja-Alausa (Lagos)" />
                                                            <option value="Ikeja-GRA (Lagos)" />
                                                            <option value="Ikeja-Oba Akran (Lagos)" />
                                                            <option value="Ikeja-Opebi (Lagos)" />
                                                            <option value="Ikeja Allen Avenue (Lagos)" />
                                                            <option value="Ikeja Local Airport (Lagos)" />
                                                            <option value="Ikeja Maryland (Lagos)" />
                                                            <option value="Ikeja Mobolaji Bank Anthony (Lagos)" />
                                                            <option value="Ikorodu-Central (Lagos)" />
                                                            <option value="Ikota (Lagos)" />
                                                            <option value="Ikota Shopping Complex (Lagos)" />
                                                            <option value="Ikotun (Lagos)" />
                                                            <option value="Ikoyi-Awolowo (Lagos)" />
                                                            <option value="Ikoyi-Bourdillon (Lagos)" />
                                                            <option value="Ikoyi (Lagos)" />
                                                            <option value="Ilupeju (Lagos)" />
                                                            <option value="Isolo (Lagos)" />
                                                            <option value="Jibowu-Fadeyi (Lagos)" />
                                                            <option value="Jumia ikeja (Lagos)" />
                                                            <option value="Ketu (Lagos)" />
                                                            <option value="Lagos Island (Lagos)" />
                                                            <option value="LCC (Lagos)" />
                                                            <option value="Lekki-Chevron (Lagos)" />
                                                            <option value="Lekki-Elegushi (Lagos)" />
                                                            <option value="Lekki 4th and 5th Roundabout (Lagos)" />
                                                            <option value="Lekki Elf (Lagos)" />
                                                            <option value="Lekki Phase 1 (Lagos)" />
                                                            <option value="Magodo Phase 1 (Lagos)" />
                                                            <option value="Magodo Phase 2 (Lagos)" />
                                                            <option value="Marina (Lagos)" />
                                                            <option value="Marina Express (Lagos)" />
                                                            <option value="Novare Lekki Mall (Lagos)" />
                                                            <option value="Obalende (Lagos)" />
                                                            <option value="Obanikoro (Lagos)" />
                                                            <option value="Ogba (Lagos)" />
                                                            <option value="Ogudu (Lagos)" />
                                                            <option value="Okota (Lagos)" />
                                                            <option value="Oluwaninshola (Lagos)" />
                                                            <option value="Omole Phase 1 (Lagos)" />
                                                            <option value="Onike (Lagos)" />
                                                            <option value="Oniru (Lagos)" />
                                                            <option value="Orile-Iganmu (Lagos)" />
                                                            <option value="Oshodi Isolo (Lagos)" />
                                                            <option value="Sangotedo-Abijo (Lagos)" />
                                                            <option value="Sangotedo-Lagoonside (Lagos)" />
                                                            <option value="Satellite Town (Lagos)" />
                                                            <option value="Surulere-Aguda (Lagos)" />
                                                            <option value="Surulere-Bode Thomas (Lagos)" />
                                                            <option value="Surulere Idi Araba (Lagos)" />
                                                            <option value="Surulere - Ojuelegba (Lagos)" />
                                                            <option value="Surulere-Stadium (Lagos)" />
                                                            <option value="VGC (Lagos)" />
                                                            <option value="Victoria Island (Lagos)" />
                                                            <option value="Yaba-Abule Ijesha (Lagos)" />
                                                            <option value="Yaba-Alagomeji (Lagos)" />
                                                            <option value="Yaba-Ebute Meta (Lagos)" />
                                                            <option value="Yaba-Makoju (Lagos)" />
                                                            <option value="Yaba-Sabo (Lagos)" />
                                                        </datalist>
                                                        <has-error :form="form" field="deliveryRegion"></has-error>
                                                    </div>
                                                </div>
                                                <div class="form-group form-float col-6">
                                                    <div class="form-line">
                                                        <label class="form-label">Delivery Address<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="deliveryAddress" class="form-control :class="
                                                            { 'is-invalid' : form.errors.has('deliveryAddress') }"
                                                            id="deliveryAddress" required>
                                                        <has-error :form="form" field="deliveryAddress"></has-error>
                                                    </div>
                                                </div>


                                                <div class="form-group form-float col-6">
                                                    <div class="form-line">
                                                        <label class="form-label">Delivery Contact name<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="deliveryContactName" id="deliveryContactName"
                                                            class="form-control :class=" { 'is-invalid' :
                                                            form.errors.has('deliveryContactName') }" required>
                                                        <has-error :form="form" field="deliveryContactName"></has-error>
                                                    </div>
                                                </div>
                                                <div class="form-group form-float col-6">
                                                    <div class="form-line">
                                                        <label class="form-label">Delivery Contact Phone<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="deliveryContactPhone"
                                                            class="form-control no-resize :class=" { 'is-invalid' :
                                                            form.errors.has('deliveryContactPhone') }" id="deliveryContactPhone"
                                                            required>
                                                        <has-error :form="form" field="deliveryContactPhone"></has-error>
                                                    </div>
                                                </div>
                                        </fieldset>
                                        <h3>Other Information</h3>
                                        <fieldset>
                                            <br>
                                            <div class="row">
                                                <div class="form-group form-float col-6">
                                                    <div class="form-line">
                                                        <label class="form-label">Assign Riders</label>
                                                        @if (count($riders) > 0)
                                                            <select class="form-control :class=" { 'is-invalid' :
                                                                form.errors.has('assignedRider') }" name="assignedRider">
                                                                @foreach ($riders as $rider)
                                                                    <option value="{{ $rider->email }}">{{ $rider->firstname }}
                                                                        {{ $rider->lastname }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <has-error :form="form" field="assignedRider"></has-error>
                                                        @else
                                                            <h3>No registered rider</h3>
                                                        @endif
                                                        <has-error :form="form" field="assignedRider"></has-error>
                                                    </div>
                                                </div>

                                                <div class="form-group form-float col-6">
                                                    <div class="form-line">
                                                        <label class="form-label">Warehouse</label>
                                                        @if (count($warehouses) > 0)
                                                            <input list="warehouses" class="form-control :class=" { 'is-invalid'
                                                                : form.errors.has('warehouse') }" name="warehouse"
                                                                id="warehouse" placeholder="Select warehouse for pickup"
                                                                required>
                                                            <datalist id="warehouses">
                                                                @foreach ($warehouses as $warehouse)
                                                                    <option value="{{ $warehouse->location }}" />
                                                                @endforeach
                                                            </datalist>
                                                        @else
                                                            <h3 class="text-danger">Please add warehouse</h3>
                                                        @endif
                                                        <has-error :form="form" field="warehouse"></has-error>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <input id="acceptTerms-2" name="acceptTerms" type="checkbox" required>
                                            <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
                                            <div class="form-group form-float col-6">
                                                <div class="form-line">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                    <button type="button" class="btn btn-danger" style="float:right;"
                                                        onclick="history.back();">Cancel</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            @endcan
                            {{-- Eko care request --}}
                            @can('isEkoCare')
                                <div class="card-body">
                                    <form method="POST" action="/pack-request" id="wizard_with_validation">
                                        {{ csrf_field() }}
                                        @include('partials.user.messages')
                                        <h3>Request Information</h3>
                                        <fieldset>
                                            <div class="row">
                                                <div class="form-group form-float col-6">
                                                    <div class="form-line">
                                                        <label class="form-label">Packs<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" list="packs" name="pack" class="form-control :class="
                                                            { 'is-invalid' : form.errors.has('pack') }" id="pack" required
                                                            placeholder="Select Pack">
                                                        <datalist id="packs">
                                                            @foreach ($packs as $pack)
                                                                <option value="{{ $pack->name }}" />
                                                            @endforeach
                                                        </datalist>
                                                        <has-error :form="form" field="pack"></has-error>
                                                    </div>
                                                </div>
                                                <div class="form-group form-float col-6">
                                                    <div class="form-line">
                                                        <label class="form-label">Quantity<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="quantity"
                                                            class="form-control no-resize :class=" { 'is-invalid' :
                                                            form.errors.has('quantity') }" id="quantity" required>
                                                        <has-error :form="form" field="quantity"></has-error>
                                                    </div>
                                                </div>
                                                <div class="form-group form-float col-6">
                                                    <div class="form-line">
                                                        <label class="form-label">Delivery Region<span
                                                                class="text-danger">*</span></label>
                                                        <input list="regions" id="deliveryRegion" name="deliveryRegion"
                                                            class="form-control :class=" { 'is-invalid' :
                                                            form.errors.has('deliveryRegion') }" placeholder="Select Region"
                                                            required>
                                                        <datalist id="regions">
                                                            <option value="Abraham Adesanya Estate (Lagos)" />
                                                            <option value="Abule Egba (Lagos)" />
                                                            <option value="Ago (Lagos)" />
                                                            <option value="Ajah market (Lagos)" />
                                                            <option value="Akoka-unilag (Lagos)" />
                                                            <option value="Akoka (Lagos)" />
                                                            <option value="Alimosho" />
                                                            <option value="Alapere" /> 
                                                            <option value="Owoshooki" /> 
                                                            <option value="Awoyaya" />
                                                            <option value="Lagos Island (Idumota)"   />
                                                            <option value="Ojota" />
                                                            <option value="Ojo" />
                                                            <option value="Iyanapaja" />
                                                            <option value="Merian " />
                                                            <option value="Shasha" />
                                                            <option value="Egbeda " />
                                                            <option value="Amuwo odofin (Lagos)" />
                                                            <option value="Anthony (Lagos)" />
                                                            <option value="Anthony village (Lagos)" />
                                                            <option value="Apapa (Lagos)" />
                                                            <option value="Badore (Lagos)" />
                                                            <option value="Banana island (Lagos)" />
                                                            <option value="Dolphin Estate (Lagos)" />
                                                            <option value="Dopemu (Lagos)" />
                                                            <option value="E-centre Food Court (Lagos)" />
                                                            <option value="Eko Atlantic City (Lagos)" />
                                                            <option value="Fadeyi (Lagos)" />
                                                            <option value="Festac Town (Lagos)" />
                                                            <option value="Gbagada (Lagos)" />
                                                            <option value="Gowon Estate (Lagos)" />
                                                            <option value="Idimu 2 (Lagos)" />
                                                            <option value="Igbo Efon (Lagos)" />
                                                            <option value="Ijegun (Lagos)" />
                                                            <option value="Ikeja-Alausa (Lagos)" />
                                                            <option value="Ikeja-GRA (Lagos)" />
                                                            <option value="Ikeja-Oba Akran (Lagos)" />
                                                            <option value="Ikeja-Opebi (Lagos)" />
                                                            <option value="Ikeja Allen Avenue (Lagos)" />
                                                            <option value="Ikeja Local Airport (Lagos)" />
                                                            <option value="Ikeja Maryland (Lagos)" />
                                                            <option value="Ikeja Mobolaji Bank Anthony (Lagos)" />
                                                            <option value="Ikorodu-Central (Lagos)" />
                                                            <option value="Ikota (Lagos)" />
                                                            <option value="Ikota Shopping Complex (Lagos)" />
                                                            <option value="Ikotun (Lagos)" />
                                                            <option value="Ikoyi-Awolowo (Lagos)" />
                                                            <option value="Ikoyi-Bourdillon (Lagos)" />
                                                            <option value="Ikoyi (Lagos)" />
                                                            <option value="Ilupeju (Lagos)" />
                                                            <option value="Isolo (Lagos)" />
                                                            <option value="Jibowu-Fadeyi (Lagos)" />
                                                            <option value="Jumia ikeja (Lagos)" />
                                                            <option value="Ketu (Lagos)" />
                                                            <option value="Lagos Island (Lagos)" />
                                                            <option value="LCC (Lagos)" />
                                                            <option value="Lekki-Chevron (Lagos)" />
                                                            <option value="Lekki-Elegushi (Lagos)" />
                                                            <option value="Lekki 4th and 5th Roundabout (Lagos)" />
                                                            <option value="Lekki Elf (Lagos)" />
                                                            <option value="Lekki Phase 1 (Lagos)" />
                                                            <option value="Magodo Phase 1 (Lagos)" />
                                                            <option value="Magodo Phase 2 (Lagos)" />
                                                            <option value="Marina (Lagos)" />
                                                            <option value="Marina Express (Lagos)" />
                                                            <option value="Novare Lekki Mall (Lagos)" />
                                                            <option value="Obalende (Lagos)" />
                                                            <option value="Obanikoro (Lagos)" />
                                                            <option value="Ogba (Lagos)" />
                                                            <option value="Ogudu (Lagos)" />
                                                            <option value="Okota (Lagos)" />
                                                            <option value="Oluwaninshola (Lagos)" />
                                                            <option value="Omole Phase 1 (Lagos)" />
                                                            <option value="Onike (Lagos)" />
                                                            <option value="Oniru (Lagos)" />
                                                            <option value="Orile-Iganmu (Lagos)" />
                                                            <option value="Oshodi Isolo (Lagos)" />
                                                            <option value="Sangotedo-Abijo (Lagos)" />
                                                            <option value="Sangotedo-Lagoonside (Lagos)" />
                                                            <option value="Satellite Town (Lagos)" />
                                                            <option value="Surulere-Aguda (Lagos)" />
                                                            <option value="Surulere-Bode Thomas (Lagos)" />
                                                            <option value="Surulere Idi Araba (Lagos)" />
                                                            <option value="Surulere - Ojuelegba (Lagos)" />
                                                            <option value="Surulere-Stadium (Lagos)" />
                                                            <option value="VGC (Lagos)" />
                                                            <option value="Victoria Island (Lagos)" />
                                                            <option value="Yaba-Abule Ijesha (Lagos)" />
                                                            <option value="Yaba-Alagomeji (Lagos)" />
                                                            <option value="Yaba-Ebute Meta (Lagos)" />
                                                            <option value="Yaba-Makoju (Lagos)" />
                                                            <option value="Yaba-Sabo (Lagos)" />
                                                        </datalist>
                                                        <has-error :form="form" field="deliveryRegion"></has-error>
                                                    </div>
                                                </div>
                                                <div class="form-group form-float col-6">
                                                    <div class="form-line">
                                                        <label class="form-label">Delivery Address<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="deliveryAddress" class="form-control :class="
                                                            { 'is-invalid' : form.errors.has('deliveryAddress') }"
                                                            id="deliveryAddress" required>
                                                        <has-error :form="form" field="deliveryAddress"></has-error>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group form-float col-6">
                                                    <div class="form-line">
                                                        <label class="form-label">Delivery Contact name<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="deliveryContactName" id="deliveryContactName"
                                                            class="form-control :class=" { 'is-invalid' :
                                                            form.errors.has('deliveryContactName') }" required>
                                                        <has-error :form="form" field="deliveryContactName"></has-error>
                                                    </div>
                                                </div>
                                                <div class="form-group form-float col-6">
                                                    <div class="form-line">
                                                        <label class="form-label">Delivery Contact Phone<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="deliveryContactPhone"
                                                            class="form-control no-resize :class=" { 'is-invalid' :
                                                            form.errors.has('deliveryContactPhone') }" id="deliveryContactPhone"
                                                            required>
                                                        <has-error :form="form" field="deliveryContactPhone"></has-error>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <input id="acceptTerms-2" name="acceptTerms" type="checkbox" required>
                                            <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
                                            <div class="form-group form-float col-6">
                                                <div class="form-line">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                    <button type="button" class="btn btn-danger" style="float:right;"
                                                        onclick="history.back();">Cancel</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            @endcan
                            {{-- LGA make request --}}
                            @can('isLGA')
                                <div class="card-body">
                                    <form method="POST" action="/pack-request" id="wizard_with_validation">
                                        {{ csrf_field() }}
                                        @include('partials.user.messages')
                                        <h3>Request Information</h3>
                                        <fieldset>
                                            <div class="row">
                                                <div class="form-group form-float col-6">
                                                    <div class="form-line">
                                                        <label class="form-label">Packs<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" list="packs" name="pack" class="form-control :class="
                                                            { 'is-invalid' : form.errors.has('pack') }" id="pack" required
                                                            placeholder="Select Pack">
                                                        <datalist id="packs">
                                                            @foreach ($packs as $pack)
                                                                <option value="{{ $pack->name }}" />
                                                            @endforeach
                                                        </datalist>
                                                        <has-error :form="form" field="pack"></has-error>
                                                    </div>
                                                </div>
                                                <div class="form-group form-float col-6">
                                                    <div class="form-line">
                                                        <label class="form-label">Quantity<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="quantity"
                                                            class="form-control no-resize :class=" { 'is-invalid' :
                                                            form.errors.has('quantity') }" id="quantity" required>
                                                        <has-error :form="form" field="quantity"></has-error>
                                                    </div>
                                                </div>
                                                <div class="form-group form-float col-6">
                                                    <div class="form-line">
                                                        <label class="form-label">Delivery Region<span
                                                                class="text-danger">*</span></label>
                                                        <input id="deliveryRegion" name="deliveryRegion"
                                                            class="form-control :class=" { 'is-invalid' :
                                                            form.errors.has('deliveryRegion') }" placeholder="Select Region"
                                                            required value="{{ Auth::user()->region }}">

                                                        <has-error :form="form" field="deliveryRegion"></has-error>
                                                    </div>
                                                </div>
                                                <div class="form-group form-float col-6">
                                                    <div class="form-line">
                                                        <label class="form-label">Delivery Address<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="deliveryAddress" class="form-control :class="
                                                            { 'is-invalid' : form.errors.has('deliveryAddress') }"
                                                            id="deliveryAddress" value="{{ Auth::user()->address }}" required>
                                                        <has-error :form="form" field="deliveryAddress"></has-error>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group form-float col-6">
                                                    <div class="form-line">
                                                        <label class="form-label">Delivery Contact name<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="deliveryContactName" id="deliveryContactName"
                                                            class="form-control :class=" { 'is-invalid' :
                                                            form.errors.has('deliveryContactName') }"
                                                            value="{{ Auth::user()->fullname }}" required>
                                                        <has-error :form="form" field="deliveryContactName"></has-error>
                                                    </div>
                                                </div>
                                                <div class="form-group form-float col-6">
                                                    <div class="form-line">
                                                        <label class="form-label">Delivery Contact Phone<span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="deliveryContactPhone"
                                                            class="form-control no-resize :class=" { 'is-invalid' :
                                                            form.errors.has('deliveryContactPhone') }" id="deliveryContactPhone"
                                                            value="{{ Auth::user()->phoneNumber }}" required>
                                                        <has-error :form="form" field="deliveryContactPhone"></has-error>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <input id="acceptTerms-2" name="acceptTerms" type="checkbox" required>
                                            <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
                                            <div class="form-group form-float col-6">
                                                <div class="form-line">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                    <button type="button" class="btn btn-danger" style="float:right;"
                                                        onclick="history.back();">Cancel</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
