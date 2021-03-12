<?php

namespace App\Http\Controllers;

use App\Rider;
use Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class RiderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/auth-login');
        }
        if(Gate::allows('isSuperAdmin')){
            try {
            //code...
            $riders = Rider::orderBy('created_at', 'desc')->paginate(20);
            return view('pages.user.manage_rider')->with('riders', $riders);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with(['error' => 'An error occur while loading this page']);
        }
        }else {
            return Response::deny('You must be a super administrator.');
        }
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/auth-login');
        }
        if(Gate::allows('isSuperAdmin')){
            return view('pages.user.create_rider');
        }else {
            return Response::deny('You must be a super administrator.');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'middlename' => 'required|max:50',
            'email' => 'required|email',
            'staffId' => 'required',
            'gender' => 'required',
            'phoneNumber' => 'required|numeric',
            'dob' => 'required',
            'designation' => 'required',
            'employmentStatus' => 'required',
            'location' => 'required',
            'employmentDate' => 'required',
            'emergencyContactName' => 'required',
            'emergencyContactNumber' => 'required',
            'emergencyContactNameTwo' => 'required',
            'emergencyContactNumberTwo' => 'required',
            'NOKName' => 'required',
            'NOKAddress' => 'required',
            'NOKPhone' => 'required',
            'guarantorName' => 'required',
            'guarantorAddress' => 'required',
            'guarantorPhone' => 'required',
            'bankName' => 'required',
            'staffSalary' => 'required',
            'bankAccNumber' => 'required|numeric',
            'PFANumber' => 'required',
            'RSANumber' => 'required',
            'PFACode' => 'required',
            'driversLicense' => 'required',
            'insuranceDate' => 'required',
            'expiryDate' => 'required',
            'PTR' => 'required',
            'PRD' => 'required',
            'DSFPT' => 'required'
        ]);

        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $middlename = $request->middlename;
        $email = $request->email;
        $staffId = $request->staffId;
        $gender = $request->gender;
        $phoneNumber = $request->phoneNumber;
        $dob = $request->dob;
        $designation = $request->designation;
        $employmentStatus = $request->employmentStatus;
        $location = $request->location;
        $employmentDate = $request->employmentDate;
        $emergencyContactName = $request->emergencyContactName;
        $emergencyContactNumber = $request->emergencyContactNumber;
        $emergencyContactNameTwo = $request->emergencyContactNameTwo;
        $emergencyContactNumberTwo = $request->emergencyContactNumberTwo;
        $NOKName = $request->NOKName;
        $NOKAddress = $request->NOKAddress;
        $NOKPhone = $request->NOKPhone;
        $guarantorName = $request->guarantorName;
        $guarantorAddress = $request->guarantorAddress;
        $guarantorPhone = $request->guarantorPhone;
        $bankName = $request->bankName;
        $staffSalary = $request->staffSalary;
        $bankAccNumber = $request->bankAccNumber;
        $PFANumber = $request->PFANumber;
        $RSANumber = $request->RSANumber;
        $PFACode = $request->PFACode;
        $driversLicense = $request->driversLicense;
        $expiryDate = $request->expiryDate;
        $insuranceDate = $request->insuranceDate;
        $PTR = $request->PTR;
        $PRD = $request->PRD;       
        $DSFPT = $request->DSFPT;       
        // Check if rider already exist
        if(Rider::where('email', $email)->exists()){
            return back()->with(['error' =>' Email already exist!']);
        }else {
            $rider = new Rider();
            $rider->uuid = Uuid::uuid4();
            $rider->firstname = $firstname;
            $rider->lastname = $lastname;
            $rider->middlename = $middlename;
            $rider->email = $email;
            $rider->staffId =  $staffId;
            $rider->gender = $gender;
            $rider->phoneNumber = $phoneNumber;
            $rider->dob = $dob;
            $rider->designation = $designation;
            $rider->employmentStatus = $employmentStatus;
            $rider->location = $location;
            $rider->employmentDate = $employmentDate;
            $rider->emergencyContactName = $emergencyContactName;
            $rider->emergencyContactNumber = $emergencyContactNumber;
            $rider->emergencyContactNameTwo = $emergencyContactNameTwo;
            $rider->emergencyContactNumberTwo = $emergencyContactNumberTwo;
            // Next of kin (NOK)
            $rider->NOKName = $NOKName;
            $rider->NOKAddress = $NOKAddress;
            $rider->NOKPhone = $NOKPhone;
            $rider->guarantorName = $guarantorName;
            $rider->guarantorAddress = $guarantorAddress;
            $rider->guarantorPhone = $guarantorPhone;
            $rider->bankName = $bankName;
            $rider->staffSalary = $staffSalary;
            $rider->bankAccNumber = $bankAccNumber;
            $rider->PFANumber = $PFANumber;
            $rider->RSANumber = $RSANumber;
            $rider->PFACode = $PFACode;
            $rider->driversLicense = $driversLicense;
            $rider->expiryDate = $expiryDate;
            $rider->insuranceDate = $insuranceDate;
            $rider->PTR = $PTR;
            $rider->PRD = $PRD;
            $rider->DSFPT = $DSFPT; 
            $rider->save();
            // Redirect
            return redirect('/manage-rider')->with(['success' => ' Rider successfully created.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function show(Rider $rider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/auth-login');
        }
        if(Gate::allows('isSuperAdmin')){
            try {
            //code...
            $rider = Rider::where('uuid', '=' ,$uuid)->first();
            return view('pages.user.edit_rider')->with('rider', $rider);
        } catch (\Throwable $th) {
            //throw $th;
        }
        }else {
            return Response::deny('You must be a super administrator.');
        }
        
    }

    /**
     * Update fields
     */
    public function updateDetails($uuid)
    {
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/auth-login');
        }
        try {
            //code...
            $rider = Rider::where('uuid', $uuid)->first();
            return view('pages.user.update_rider')->with('rider', $rider);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'fullname' => 'required',
            'email' => 'required|email',
            'staffId' => 'required',
            'gender' => 'required',
            'phoneNumber' => 'required|numeric',
            'dob' => 'required',
            'designation' => 'required',
            'employmentStatus' => 'required',
            'location' => 'required',
            'employmentDate' => 'required',
            'emergencyContactName' => 'required',
            'emergencyContactNumber' => 'required',
            'emergencyContactNameTwo' => 'required',
            'emergencyContactNumberTwo' => 'required',
            'NOKName' => 'required',
            'NOKAddress' => 'required',
            'NOKPhone' => 'required',
            'guarantorName' => 'required',
            'guarantorAddress' => 'required',
            'guarantorPhone' => 'required',
            'bankName' => 'required',
            'staffSalary' => 'required',
            'bankAccNumber' => 'required|numeric',
            'PFANumber' => 'required',
            'RSANumber' => 'required',
            'PFACode' => 'required',
            'driversLicense' => 'required',
            'insuranceDate' => 'required',
            'expiryDate' => 'required',
            'PTR' => 'required',
            'PRD' => 'required',
            'DSFPT' => 'required'
        ]);

        $fullname = $request->fullname;
        $email = $request->email;
        $staffId = $request->staffId;
        $gender = $request->gender;
        $phoneNumber = $request->phoneNumber;
        $dob = $request->dob;
        $designation = $request->designation;
        $employmentStatus = $request->employmentStatus;
        $location = $request->location;
        $employmentDate = $request->employmentDate;
        $emergencyContactName = $request->emergencyContactName;
        $emergencyContactNumber = $request->emergencyContactNumber;
        $emergencyContactNameTwo = $request->emergencyContactNameTwo;
        $emergencyContactNumberTwo = $request->emergencyContactNumberTwo;
        $NOKName = $request->NOKName;
        $NOKAddress = $request->NOKAddress;
        $NOKPhone = $request->NOKPhone;
        $guarantorName = $request->guarantorName;
        $guarantorAddress = $request->guarantorAddress;
        $guarantorPhone = $request->guarantorPhone;
        $bankName = $request->bankName;
        $staffSalary = $request->staffSalary;
        $bankAccNumber = $request->bankAccNumber;
        $PFANumber = $request->PFANumber;
        $RSANumber = $request->RSANumber;
        $PFACode = $request->PFACode;
        $driversLicense = $request->driversLicense;
        $expiryDate = $request->expiryDate;
        $insuranceDate = $request->insuranceDate;
        $PTR = $request->PTR;
        $PRD = $request->PRD;       
        $DSFPT = $request->DSFPT;       
        try {
            
            //code...
            $rider = Rider::find($id);
            $rider->fullname = $fullname;
            $rider->email = $email;
            $rider->staffId =  $staffId;
            $rider->gender = $gender;
            $rider->phoneNumber = $phoneNumber;
            $rider->dob = $dob;
            $rider->designation = $designation;
            $rider->employmentStatus = $employmentStatus;
            $rider->location = $location;
            $rider->employmentDate = $employmentDate;
            $rider->emergencyContactName = $emergencyContactName;
            $rider->emergencyContactNumber = $emergencyContactNumber;
            $rider->emergencyContactNameTwo = $emergencyContactNameTwo;
            $rider->emergencyContactNumberTwo = $emergencyContactNumberTwo;
            // Next of kin (NOK)
            $rider->NOKName = $NOKName;
            $rider->NOKAddress = $NOKAddress;
            $rider->NOKPhone = $NOKPhone;
            $rider->guarantorName = $guarantorName;
            $rider->guarantorAddress = $guarantorAddress;
            $rider->guarantorPhone = $guarantorPhone;
            $rider->bankName = $bankName;
            $rider->staffSalary = $staffSalary;
            $rider->bankAccNumber = $bankAccNumber;
            $rider->PFANumber = $PFANumber;
            $rider->RSANumber = $RSANumber;
            $rider->PFACode = $PFACode;
            $rider->driversLicense = $driversLicense;
            $rider->expiryDate = $expiryDate;
            $rider->insuranceDate = $insuranceDate;
            // Pre-employment Test Result (PTR)
            $rider->PTR = $PTR;
            // Pre-employment Result Date (PRD)
            $rider->PRD = $PRD;
            // Date set for Pre-employment Test (DSFPT)  
            $rider->DSFPT = $DSFPT; 
            $rider->save();
            // Redirect
            return redirect('manage-rider')->with(['success' => ' Rider successfully created.']);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with(['error' =>' Cannot update rider ' .$th]);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rider $rider)
    {
        $this->validate($request, [
            'id' => 'required'
        ]);
        $id = $request->id;
        $deleteRider = Rider::find($id);
        if($deleteRider){
            //Delete
            $deleteRider->delete();
            return response()->json('Rider deleted successfully', 200);
        }else {
            return response()->json('Unable to delete user');
        }
    }
}