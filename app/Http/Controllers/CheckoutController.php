<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Transaction;
use App\TransactionDetail;
use App\TravelPackage;

use Carbon\Carbon;

class CheckoutController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $item = Transaction::with(['detail','travel_package','user'])->findOrFail($id);
        // dd($item);
        return view('pages.checkout', compact('item'));
    }

    public function process($id)
    {
        $travel_package = TravelPackage::findOrFail($id);
        $user = Auth::user();


        $transaction = Transaction::create([
            'travel_packages_id' => $id,
            'users_id' => $user->id,
            'additional_visa' => 0,
            'transactional_total' => $travel_package->price,
            'transactional_status' => 'IN-CART'
        ]);

        $transaction_detail = TransactionDetail::create([
            'transactions_id' => $transaction->id,
            'username' => $user->name,
            'nationality' => 'ID',
            'is_visa' => false,
            'doe_passport' => Carbon::now()->addYears(5)
        ]);

        return redirect()->route('checkout', $transaction->id);
    }

    public function remove(Request $request, $detail_id)
    {
        $item = TransactionDetail::findOrFail($detail_id);
        $id = $item->transactions_id;
        $transaction = Transaction::with(['detail','travel_package'])
            ->findOrFail($id);

        if($item->is_visa)
        {
            $transaction->transactional_total -=190;
            $transaction->additional_visa -=190;
        }

        $transaction->transactional_total -= $transaction->travel_package->price;

        $transaction->save();
        $item->delete();

        return redirect()->route('checkout', $id);
    }

    public function create(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string',
            'nationality' => 'required|string',
            'is_visa' => 'required|boolean',
            'doe_passport'
        ]);
        // dd($request->all());

        $data = $request->all();
        $data['transactions_id'] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with(['travel_package'])->find($id);

        if($request->is_visa)
        {
            $transaction->transactional_total +=190;
            $transaction->additional_visa +=190;
        }

        $transaction->transactional_total += $transaction->travel_package->price;

        $transaction->save();

        return redirect()->route('checkout', $id);
    }

    public function success($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->transactional_status = 'PANDING';

        $transaction->save();

        return view('pages.success');
    }
}
