<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TravelPackage;

class DetailController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($slug)
    {
    	$item = TravelPackage::with('galleries')->where('slug',$slug)->firstOrFail();
    	// dd($item);
        return view('pages.detail',compact('item'));
    }
}
