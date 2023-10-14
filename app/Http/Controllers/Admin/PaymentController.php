<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payment = User::whereHas('payment')->get();
        return view('pages.admin.dashboard.payment.index',compact('payment'));
    }

    public function update(Request $request,$id)
    {
        $payment = Payment::find($id);
        $data = $request->validate([
            'status' => 'required'
        ]);
        $payment->update($data);

        return redirect()->route('admin.payment.index')->with('edit','Success Edit Status');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->id; // Ensure that $request->id is an array

        // Use the "whereIn" method to delete multiple records by their IDs
        Payment::where('id', $ids)->delete();

        return redirect()->route('admin.payment.index')->with('success', 'Data berhasil dihapus.');
    }

}
