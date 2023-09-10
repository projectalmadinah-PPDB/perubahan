<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payment = Payment::get();
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
    $selectedIds = explode(',', $request->input('selectedIds'));

    // Lakukan penghapusan item berdasarkan $selectedIds
    // Misalnya, jika Anda memiliki model 'Payment':
    Payment::whereIn('id', $selectedIds)->delete();

    return response()->json(['message' => 'Item yang dipilih berhasil dihapus.']);
}

}
