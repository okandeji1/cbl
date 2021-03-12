@extends('layouts.page')
@section('content')
    <div class="main-content">
        <section class="section">
          <ul class="breadcrumb breadcrumb-style ">
            <li class="breadcrumb-item">
              <h4 class="page-title m-b-0">Register Rider</h4>
            </li>
            <!--  -->
          </ul>
          <div class="section-body">
            <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="card-header">
                  </div>
                  <div class="card-body">
                    <form method="POST" action="/create-rider" id="wizard_with_validation">
                      {{ csrf_field() }}
                      <h3>Personal Details</h3>
                        @include('partials.user.messages')
                      <fieldset>
                        <div class="row">
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">First Name</label>
                              <input type="text" class="form-control :class="{ 'is-invalid': form.errors.has('firstname') }" name="firstname" id="firstname" required>
                              <has-error :form="form" field="firstname"></has-error>
                            </div>
                          </div>
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Last Name</label>
                              <input type="text" class="form-control :class="{ 'is-invalid': form.errors.has('lastname') }" name="lastname" id="lastname" required>
                              <has-error :form="form" field="lastname"></has-error>
                            </div>
                          </div>
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Middle Name</label>
                              <input type="text" class="form-control :class="{ 'is-invalid': form.errors.has('middlename') }" name="middlename" id="middlename" required>
                              <has-error :form="form" field="middlename"></has-error>
                            </div>
                          </div>
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Email</label>
                              <input type="email" class="form-control :class="{ 'is-invalid': form.errors.has('email') }" name="email" id="email" required>
                              <has-error :form="form" field="email"></has-error>
                            </div>
                          </div>
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Staff ID</label>
                              <input type="text" class="form-control :class="{ 'is-invalid': form.errors.has('staffId') }" name="staffId" id="staffId" required>
                              <has-error :form="form" field="staffId"></has-error>
                            </div>
                          </div>
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Gender</label>
                              <select class="form-control :class="{ 'is-invalid': form.errors.has('gender') }" name="gender" id="gender" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                              </select>
                              <has-error :form="form" field="gender"></has-error>
                            </div>
                          </div>
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Phone Number</label>
                              <input type="number" class="form-control :class="{ 'is-invalid': form.errors.has('phoneNumber') }" name="phoneNumber" id="phoneNumber">
                              <has-error :form="form" field="phoneNumber"></has-error>
                            </div>
                          </div>
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Date Of Birth</label>
                              <input type="date" class="form-control :class="{ 'is-invalid': form.errors.has('dob') }" name="dob" id="dob">
                              <has-error :form="form" field="dob"></has-error>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                      <h3>Employment Details</h3>
                      <fieldset>
                        <div class="row">
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Designation</label>
                              <input type="text" class="form-control :class="{ 'is-invalid': form.errors.has('designation') }" name="designation" id="designation">
                              <has-error :form="form" field="designation"></has-error>
                            </div>
                          </div>
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Employment Status</label>
                              <input type="text" class="form-control :class="{ 'is-invalid': form.errors.has('employmentStatus') }" name="employmentStatus" id="employmentStatus">
                              <has-error :form="form" field="employmentStatus"></has-error>
                            </div>
                          </div>
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Location</label>
                              <input type="text" class="form-control :class="{ 'is-invalid': form.errors.has('location') }" name="location" id="location">
                              <has-error :form="form" field="location"></has-error>
                            </div>
                          </div>
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Employment Date</label>
                              <input type="date" class="form-control :class="{ 'is-invalid': form.errors.has('employmentDate') }" name="employmentDate" id="employmentDate">
                              <has-error :form="form" field="employmentDate"></has-error>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                      <h3>Emergency Details</h3>
                      <fieldset>
                        <div class="row">
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Emergency Contact Name</label>
                              <input type="text" class="form-control :class="{ 'is-invalid': form.errors.has('emergencyContactName') }" name="emergencyContactName" id="emergencyContactName">
                              <has-error :form="form" field="emergencyContactName"></has-error>
                            </div>
                          </div>
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Emergency Contact Number</label>
                              <input type="text" class="form-control :class="{ 'is-invalid': form.errors.has('emergencyContactNumber') }" name="emergencyContactNumber" id="emergencyContactNumber">
                              <has-error :form="form" field="emergencyContactNumber"></has-error>
                            </div>
                          </div>
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Emergency Contact Name 2</label>
                              <input type="text" class="form-control :class="{ 'is-invalid': form.errors.has('emergencyContactNameTwo') }" name="emergencyContactNameTwo" id="emergencyContactNameTwo">
                              <has-error :form="form" field="emergencyContactNameTwo"></has-error>
                            </div>
                          </div>
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Emergency Contact Number 2</label>
                              <input type="text" class="form-control :class="{ 'is-invalid': form.errors.has('emergencyContactNumberTwo') }" name="emergencyContactNumberTwo" id="emergencyContactNumberTwo">
                              <has-error :form="form" field="emergencyContactNumberTwo"></has-error>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                      <h3>Next Of Kin</h3>
                      <fieldset>
                        <div class="row">
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Next of kin name</label>
                              <input type="text" class="form-control :class="{ 'is-invalid': form.errors.has('NOKName') }" name="NOKName" id="NOKName">
                              <has-error :form="form" field="NOKName"></has-error>
                            </div>
                          </div>
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Next of kin address</label>
                              <input type="text" class="form-control :class="{ 'is-invalid': form.errors.has('NOKAddress') }" name="NOKAddress" id="NOKAddress">
                              <has-error :form="form" field="NOKAddress"></has-error>
                            </div>
                          </div>
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Next of kin phone</label>
                              <input type="text" class="form-control :class="{ 'is-invalid': form.errors.has('NOKPhone') }" name="NOKPhone" id="NOKPhone">
                              <has-error :form="form" field="NOKPhone"></has-error>
                            </div>
                          </div>
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Guarantor Name</label>
                              <input type="text" class="form-control :class="{ 'is-invalid': form.errors.has('guarantorName') }" name="guarantorName" id="guarantorName">
                              <has-error :form="form" field="guarantorName"></has-error>
                            </div>
                          </div>
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Guarantor Address</label>
                              <input type="text" class="form-control :class="{ 'is-invalid': form.errors.has('guarantorAddress') }" name="guarantorAddress" id="guarantorAddress">
                              <has-error :form="form" field="guarantorAddress"></has-error>
                            </div>
                          </div>
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Guarantor Phone</label>
                              <input type="text" class="form-control :class="{ 'is-invalid': form.errors.has('guarantorPhone') }" name="guarantorPhone" id="guarantorPhone">
                              <has-error :form="form" field="guarantorPhone"></has-error>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                      <h3>Bank Details</h3>
                      <fieldset>
                        <div class="row">
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Bank Name</label>
                              <input type="text" class="form-control :class="{ 'is-invalid': form.errors.has('bankName') }" name="bankName" id="bankName">
                              <has-error :form="form" field="bankName"></has-error>
                            </div>
                          </div>
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Staff Salary</label>
                              <input type="text" class="form-control :class="{ 'is-invalid': form.errors.has('staffSalary') }" name="staffSalary" id="staffSalary">
                              <has-error :form="form" field="staffSalary"></has-error>
                            </div>
                          </div>
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Bank Account Number</label>
                              <input type="number" class="form-control :class="{ 'is-invalid': form.errors.has('bankAccNumber') }" name="bankAccNumber" id="bankAccNumber">
                              <has-error :form="form" field="bankAccNumber"></has-error>
                            </div>
                          </div>
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">PFA Number</label>
                              <input type="number" class="form-control :class="{ 'is-invalid': form.errors.has('PFANumber') }" name="PFANumber" id="PFANumber">
                              <has-error :form="form" field="PFANumber"></has-error>
                            </div>
                          </div>
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">RSA Number</label>
                              <input type="text" class="form-control :class="{ 'is-invalid': form.errors.has('RSANumber') }" name="RSANumber" id="RSANumber">
                              <has-error :form="form" field="RSANumber"></has-error>
                            </div>
                          </div>
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">PFA Code</label>
                              <input type="text" class="form-control :class="{ 'is-invalid': form.errors.has('PFACode') }" name="PFACode" id="PFACode">
                              <has-error :form="form" field="PFACode"></has-error>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                      <h3>Additional Info</h3>
                      <fieldset>
                        <div class="row">
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Drivers License Number</label>
                              <input type="text" class="form-control :class="{ 'is-invalid': form.errors.has('driversLicense') }" name="driversLicense" id="driversLicense">
                              <has-error :form="form" field="driversLicense"></has-error>
                            </div>
                          </div>
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Insurance Date</label>
                              <input type="date" class="form-control :class="{ 'is-invalid': form.errors.has('insuranceDate') }" name="insuranceDate" id="insuranceDate">
                              <has-error :form="form" field="insuranceDate"></has-error>
                            </div>
                          </div>
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Expiry Date</label>
                              <input type="date" class="form-control :class="{ 'is-invalid': form.errors.has('expiryDate') }" name="expiryDate" id="expiryDate">
                              <has-error :form="form" field="expiryDate"></has-error>
                            </div>
                          </div>
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Pre-employment Test Result</label>
                              <input type="text" class="form-control :class="{ 'is-invalid': form.errors.has('PTR') }" name="PTR" id="PTR">
                              <has-error :form="form" field="PTR"></has-error>
                            </div>
                          </div>
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Pre-employment Result Date</label>
                              <input type="date" class="form-control :class="{ 'is-invalid': form.errors.has('PRD') }" name="PRD" id="PRD">
                              <has-error :form="form" field="PRD"></has-error>
                            </div>
                          </div>
                          <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-line">
                              <label class="form-label">Date set for Pre-employment Test</label>
                              <input type="date" class="form-control :class="{ 'is-invalid': form.errors.has('DSFPT') }" name="DSFPT" id="DSFPT">
                              <has-error :form="form" field="DSFPT"></has-error>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                      <fieldset>
                         <div class="row">
                        <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12 col-6">
                          <div class="form-line">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </div>
                      </fieldset>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>
@endsection