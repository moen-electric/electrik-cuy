<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionAdminController extends Controller
{
    public function index()
    {
        return view('admin.transactions.index', [
            'transactions' => Transactions::latest()->get(),
            // 'user' => $user
        ]);
    }

    public function confirm(Transactions $transaction)
    {
        // return $transaction;

        $validatedData['status'] = 'settlement';

        Transactions::where('id', $transaction->id)->update($validatedData);

        return redirect('/transaction')->with('success', 'order has been successfully paid');
    }

    public function send(Transactions $transaction)
    {
        // return $transaction;

        $validatedData['status'] = 'send';

        Transactions::where('id', $transaction->id)->update($validatedData);

        return redirect('/transaction')->with('success', 'the order is on the way');
    }

    public function delete(Transactions $transaction)
    {
        // return $transaction;
        Transactions::destroy($transaction->id);

        return redirect('/transaction')->with('success', 'Transaction has been deleted!');
    }
}
