<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransaksiAdminController extends Controller
{
    public function index()
    {
        return view('admin.transaksi.index', [
            'transactions' => Transaction::latest()->get(),
            // 'user' => $user
        ]);
    }

    public function confirm(Transaction $transaction)
    {
        // return $transaction;

        $validatedData['status'] = 'settlement';

        Transaction::where('id', $transaction->id)->update($validatedData);

        return redirect('/transaction')->with('success', 'order has been successfully paid');
    }

    public function send(Transaction $transaction)
    {
        // return $transaction;

        $validatedData['status'] = 'send';

        Transaction::where('id', $transaction->id)->update($validatedData);

        return redirect('/transaction')->with('success', 'the order is on the way');
    }

    public function delete(Transaction $transaction)
    {
        // return $transaction;
        Transaction::destroy($transaction->id);

        return redirect('/transaction')->with('success', 'Transaction has been deleted!');
    }
}
