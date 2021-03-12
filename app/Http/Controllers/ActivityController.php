<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Inventory;
use App\User;
use App\Pack;
use App\Item;
use App\Category;
use App\Location;
use App\Warehouse;
use Auth;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class ActivityController extends Controller
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
        /**
         * Get all items in a particular warehouse
         * Get a particular item for a particular warehouse 
         */
        try {
            //code...
            $activities = Activity::orderBy('created_at', 'desc')->paginate(20);
            // Total revenue for care pack
            $totalAmounts = Inventory::all()
            ->sum('amount');
            // Total number of care pack orders
            $totalOrders = Inventory::all()
            ->count();
            
            $lekki = Warehouse::where('location', 'lekki')->firstOrFail();
            $lekki_id = $lekki->id;
            
            $ikeja = Warehouse::where('location', 'ikeja')->firstOrFail();
            $ikeja_id = $ikeja->id;
            
            $ogba = Warehouse::where('location', 'ogba')->firstOrFail();
            $ogba_id = $ogba->id;
            // Total number of items in the inventory (pack).
            
            $totalPacksLekki = Pack::where('warehouse_id', $lekki_id)
                ->count();
                
                $totalPacksIkeja = Pack::where('warehouse_id', $ikeja_id)
                ->count();
                
                $totalPacksOgba = Pack::where('warehouse_id', $ogba_id)
                ->count();
            /**
             * We want to get total care pack for lekki and other locations
             * We are going to sum all received,
             * sum all transfer and order received from this location,
             * then substract both sums.
             */
            $carePack = Pack::where('name', 'care pack')->firstOrFail();
            $carepackId = $carePack->id;
            
            
            // Care pack transfer to lekki
            $transferToLekki = Activity::where('pack_id', $carepackId)->where('transferTo_id', $lekki_id)->sum('quantity');
            // Total care pack for lekki in pack table
            $carePackForLekki = Pack::where('name', 'care pack')->where('warehouse_id', $lekki_id)->sum('quantity');
            // Add both To and For lekki
            $toAndForLekki = $transferToLekki + $carePackForLekki;
            
            // care pack transfer from lekki
            $transferFromLekki = Activity::where('pack_id', $carepackId)->where('transferFrom_id', $lekki_id)->sum('quantity');
            // Order received by lekki
            $orderLekki = Inventory::where('warehouse_id', $lekki_id)->where('is_assigned', 1)->where('is_delivered', 1)->sum('quantity');
            // Add transfer and order lekki
            $lekkiAdd = $transferFromLekki + $orderLekki;
            // Total care pack for lekki
            $carePackLekki = $toAndForLekki - $lekkiAdd;

            // Care pack transfer to ikeja
            $transferToIkeja = Activity::where('pack_id', $carepackId)->where('transferTo_id', $ikeja_id)->sum('quantity');
            // Total care pack for ikeja in pack table
            $carePackForIkeja = Pack::where('name', 'care pack')->where('warehouse_id', $ikeja_id)->sum('quantity');
            // Add both To and For Ikeja
            $toAndForIkeja = $transferToIkeja + $carePackForIkeja;

            // care pack transfer from ikeja
            $transferFromIkeja = Activity::where('pack_id', $carepackId)->where('transferFrom_id', $ikeja_id)->sum('quantity');
            // Order received by ikeja
            $orderIkeja = Inventory::where('warehouse_id', $ikeja_id)->where('is_assigned', 1)->where('is_delivered', 1)->sum('quantity');
            // Add transfer and order ikeja
            $ikejaAdd = $transferFromIkeja + $orderIkeja;
            // Total care pack for ikeja
            $carePackIkeja = $toAndForIkeja - $ikejaAdd;

            // Care pack transfer to ogba
            $transferToOgba = Activity::where('pack_id', $carepackId)->where('transferTo_id', $ogba_id)->sum('quantity');
            // Total care pack for Ogba in pack table
            $carePackForOgba = Pack::where('name', 'care pack')->where('warehouse_id', $ogba_id)->sum('quantity');
            // Add both To and For Ogba
            $toAndForOgba = $transferToOgba + $carePackForOgba;

            // care pack transfer from ogba
            $transferFromOgba = Activity::where('pack_id', $carepackId)->where('transferFrom_id', $ogba_id)->sum('quantity');
            // Order received by ogba
            $orderOgba = Inventory::where('warehouse_id', $ogba_id)->where('is_assigned', 1)->where('is_delivered', 1)->sum('quantity');
            // Add transfer and order ogba
            $ogbaAdd = $transferFromOgba + $orderOgba;
            // Total care pack for ogba
            $carePackOgba = $toAndForOgba - $ogbaAdd;

            $items = Item::all();
            $warehouses = Warehouse::all();
            $categories = Category::all();
            return view('pages.inventory.inventory_activity', compact(['activities', $activities, 'totalAmounts', $totalAmounts, 'totalOrders', $totalOrders, 'carePackLekki', $carePackLekki, 'carePackIkeja', $carePackIkeja, 'carePackOgba', $carePackOgba, 'items', $items, 'categories', $categories, 'warehouses', $warehouses, 'totalPacksLekki', $totalPacksLekki, 'totalPacksIkeja', $totalPacksIkeja, 'totalPacksOgba', $totalPacksOgba]));
        } catch (\Throwable $th) {
            throw $th;
        }      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'item' => 'required',
            'status' => 'required',
            'numberOfItem' => 'required|numeric',
            'receivedFrom' => 'required',
            'collectedBy' => 'required',
            'transferFrom' => 'required',
            'transferTo' => 'required',
            'reason' => 'required',
            ]);

        $item = $request->item;
        $status = $request->status;
        $receivedFrom = $request->receivedFrom;
        $collectedBy = $request->collectedBy;
        $transferFrom = $request->transferFrom;
        $transferTo = $request->transferTo;
        $numberOfItem = $request->numberOfItem;
        $reason = $request->reason;
        if ($transferFrom === $transferTo) {
            return back()->with('error', ' You cannot transfer care packs from and to your warehouse');
        }
        try {
            //code...
            $locationA = Warehouse::where('location', $transferFrom)->firstOrFail(); // Warehouse transfering from
            $locationB = Warehouse::where('location', $transferTo)->firstOrFail(); // Warehouse transfering to

            // Collect IDs
            $locationA_id = $locationA->id;
            $locationB_id = $locationB->id;
            // Pack
            $pack = Pack::where('name', $item)->firstOrFail();
            $pack_id = $pack->id;
            // Total items in a warehouse
            $itemsReceived = Activity::where('pack_id', $pack_id)->where('transferTo_id', $locationA_id)->sum('quantity'); // If this warehouse as received any items before
            $itemsInStore = Pack::where('name', 'care pack')->where('warehouse_id', $locationA_id)->sum('quantity'); // Total carepack in store
            $totalItems = $itemsReceived + $itemsInStore;

            if ($totalItems < $numberOfItem) {
                return back()->with('error', ' '. $transferFrom . ' does not have enough care packs to perform this action!');
            }else {
                try {
                    //code...
                    $activity = new Activity();
                    $activity->uuid = Uuid::uuid4();
                    $activity->user_id =Auth::user()->id;
                    $activity->pack_id = $pack_id;
                    $activity->quantity = $numberOfItem;
                    $activity->transferFrom_id = $locationA_id;
                    $activity->transferTo_id = $locationB_id;
                    $activity->receivedFrom = $receivedFrom;
                    $activity->collectedBy = $collectedBy;
                    $activity->status = $status;
                    $activity->reason = $reason;
                    $activity->save();
                    return back()->with('success', 'Item updated successfully');
                } catch (\Throwable $th) {
                    throw $th;
                    // return redirect()->back()->with(['error' => 'Internal server error']);
                }
            }
        } catch (\Throwable $th) {
            throw $th;
            // return redirect()->back()->with(['error' => 'Internal server error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/auth-login');
        }
        try {
            //code...
            $activity = Activity::where('uuid', $uuid)->first();
            return view('pages.inventory.activity_details')->with('activity', $activity);
        } catch (\Throwable $th) {
            throw $th;
            // return back()->with('error', ' Internal server error');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
