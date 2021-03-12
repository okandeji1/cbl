<?php

namespace App\Http\Controllers;

use App\Order;
use App\Lab;
use App\User;
use App\Role;
use App\Transaction;
use Illuminate\Support\Facades\DB;
use Auth;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
            $today = Carbon::today();
            // Get pending order for lab
            // $pendingOrdersLab = Role::where('admin', $lab)
            //     ->join('users', 'role_id', 'roles.id')
            //     ->join('orders', 'orders.user_id', 'users.id')
            //     ->where('is_assigned', 0)
            //     ->where('is_completed', 0)
            //     ->get()
            //     ->count();

            // Today transaction
            $transactionsToday = Transaction::whereDate('created_at', Carbon::today())
                ->sum('amount');

            // Monthly transactions
            $monthlyTransactions = Transaction::whereMonth('created_at', Carbon::today())
                ->get()
                ->sum('amount');
            // $monthlyTransactions = Transaction::whereBetween('created_at', [$today->startOfMonth() ,Carbon::today()])->get()->sum('amount');

            // Total transactions
            $totalTransactions = Transaction::all()
                ->sum('amount');
            // All orders
            $totalOrders = Order::all()
                ->count();
            // Today orders
            $ordersToday = Order::whereDate('created_at', Carbon::today())->get()->count();
            // Monthly Order
            // $monthlyOrders = Order::whereBetween('created_at', [$today->startOfMonth() ,Carbon::today()])
            // ->get()
            // ->count();
            $monthlyOrders = Order::whereMonth('created_at', Carbon::today())
                ->get()
                ->count();
            return view('pages.user.dashboard', compact([
                'totalOrders', $totalOrders,
                'transactionsToday', $transactionsToday,
                'totalTransactions', $totalTransactions,
                'monthlyTransactions', $monthlyTransactions,
                'monthlyOrders', $monthlyOrders,
                'ordersToday', $ordersToday,
            ]));
        } catch (\Throwable $th) {
            throw $th;
            // return redirect()->back()->with(['error' => 'Internal server error']);
        }
    }

    /**
     * Lab Dashboard
     * Display everything about lab to the lab admin
     */
    public function myLab()
    {
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/auth-login');
        }
        try {
            //code...

            $userId = Auth::user()->id;
            $lab = Lab::where('admin_id', $userId)->first();
            $labs = Lab::all();
            return view('pages.user.my_lab', compact(['lab', $lab, 'labs', $labs]));
        } catch (\Throwable $th) {
            //throw $th;

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
