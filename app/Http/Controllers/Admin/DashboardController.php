<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TravelPackage;
use App\Transaction;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
    	$travel_package = TravelPackage::count();
    	$transaction = Transaction::count();
    	$transaction_pending = Transaction::where('transactional_status','PENDING')->count();
    	$transaction_success = Transaction::where('transactional_status','SUCCESS')->count();
    	return view('pages.admin.dashboard',compact('travel_package','transaction','transaction_pending','transaction_success'));
    }
}
