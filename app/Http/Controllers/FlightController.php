<?php

namespace App\Http\Controllers;

use App\Flight;
use Illuminate\Http\Request;
use Auth;
use App\Imports\FlightsImport;
use App\Exports\FlightsExport;
use Maatwebsite\Excel\Facades\Excel;
use Ramsey\Uuid\Uuid;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guest()){
            //is a guest so redirect
            return redirect('/auth-login');
        }
        try {
            //code...
            $flights = Flight::orderBy('created_at', 'desc')->paginate(20);
            return view('pages.flight.all_flight', compact(['flights', $flights]));
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with(['error' => 'Internal server error']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::guest()){
            //is a guest so redirect
            return redirect('/auth-login');
        }
        try {
            //code...
            return view('pages.flight.create_flight');
        } catch (\Throwable $th) {
            //throw $th;
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
            'passengerName' => 'required',
            'passengerEmail' => 'required|email',
            'passengerPhone' => 'required|numeric',
            'passportNumber' => 'required',
            'airline' => 'required',
            'time' => 'required',
            'origin' => 'required',
            'moment' => 'required',
            'paymentType' => 'required',
        ]);

        $passengerName = $request->passengerName;
        $passengerEmail = $request->passengerEmail;
        $passengerPhone = $request->passengerPhone;
        $passportNumber = $request->passportNumber;
        $airline = $request->airline;
        $origin = $request->origin;
        $time = $request->time;
        $moment = $request->moment;
        $paymentType = $request->paymentType;
        $amount = 51400;
        $arrival = $time . ' ' . $moment;
        try {
                //code...
                $newFlight = new Flight();
                $newFlight->uuid = Uuid::uuid4();
                $newFlight->user_id = Auth::user()->id;
                $newFlight->passengerName = $passengerName;
                $newFlight->passengerEmail = $passengerEmail;
                $newFlight->passengerPhone = $passengerPhone;
                $newFlight->passportNumber = $passportNumber;
                $newFlight->airline = $airline;
                $newFlight->time = $arrival;
                $newFlight->origin = $origin;
                $newFlight->amount = $amount;
                $newFlight->paymentType = $paymentType;
                // $newFlight->reference = $reference;
                $newFlight->save();
                return redirect('/all-flights')->with('success', 'Flight Successful!');
            } catch (\Throwable $th) {
                throw $th;
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function show(Flight $flight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function edit(Flight $flight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flight $flight)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flight $flight)
    {
        //
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function importFlight(Request $request) 
    {
        $this->validate($request, [
            'file' => 'required|mimes:xlsx',
        ]);

        $file = request()->file('file');
        try {
            //code...
            Excel::import(new FlightsImport, $file);
        return redirect('/all-flights')->with('success', 'Flight Successful!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function exportFlight() 
    {
        return Excel::download(new FlightsExport, 'flights.xlsx');
    }

    /**
     * Filter by date
     */
    public function search(Request $request)
    {
        $this->validate($request, [
            'search' => 'required',
        ]);
        $date = $request->get('date');
        try {
            //code...
            $flights = Flight::whereDate('created_at', $date)
            ->orderBy("created_at", 'desc')
            ->paginate(10);
            return response()->json($flights);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
