<?php

namespace App\Http\Controllers;

use App\Pack;
use App\Category;
use App\Item;
use App\Warehouse;
use Auth;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class PackController extends Controller
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
        try {
            //code...
            $packs = Pack::orderBy('created_at', 'desc')->paginate(20);
            $categories = Category::all();
            $items = Item::all();
            $warehouses = Warehouse::all();
            return view('pages.inventory.manage_packs', compact(['packs', $packs, 'categories', $categories, 'warehouses', $warehouses, 'items', $items]));
        } catch (\Throwable $th) {
            // throw $th;
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
            'name' => 'required',
            'quantity' => 'required|numeric',
            'category' => 'required',
            'warehouse' => 'required',
            'collectedBy' => 'required',
            'receivedFrom' => 'required'
        ]);

        $name = $request->name;
        $quantity = $request->quantity;
        $catName = $request->category;
        $selectedWarehouse = $request->warehouse;
        $collectedBy = $request->collectedBy;
        $receivedFrom = $request->receivedFrom;
        // Convert pack name to lower case
        $convertName = Str::of($name)->lower();
        try {
            //code...
            $category = Category::where('name', $catName)->firstOrFail();
            $cat_id = $category->id;
            $warehouse = Warehouse::where('location', $selectedWarehouse)->firstOrFail();
            $warehouse_id = $warehouse->id;
            //Get role by name
            $newpack = new Pack();
            $newpack->uuid = Uuid::uuid4();
            $newpack->user_id = Auth::user()->id;
            $newpack->category_id = $cat_id;
            $newpack->warehouse_id = $warehouse_id;
            $newpack->name = $convertName;
            $newpack->quantity = $quantity;
            $newpack->collectedBy = $collectedBy;
            $newpack->receivedFrom = $receivedFrom;
            $newpack->save();
            // Redirect user
            return back()->with('success', ' New item Created Successfully');
        } catch (\Throwable $th) {
            throw $th;
            // return redirect()->back()->with(['error' => 'Internal server error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function show(Pack $pack)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function edit(Pack $pack)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pack $pack)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pack  $pack
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pack $pack)
    {
        //
    }
}
