<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactEnquiry;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Terminal;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $terminalCount = Terminal::count();
        $activeBooking = Booking::where('status', '1')->count();
        $completedBooking = Booking::where('status', '2')->count();
        $cancelledBooking = Booking::where('status', '3')->count();
        return view('admin.dashboard', get_defined_vars());
    }

    public function profile()
    {
        $user = auth()->user();
        return view('admin.profile', get_defined_vars());
    }

    public function generalUpdate(Request $req)
    {
        session()->forget('pass_error');
        session(['general_error' => true]);
        $req->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        session()->forget('general_error');
        $user = auth()->user();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->save();

        return redirect()->back()->with('success', 'General Info Updated Successfully');
    }

    public function passUpdate(Request $req)
    {
        session()->forget('general_error');
        session(['pass_error' => true]);
        $req->validate([
            'current_password' => 'required|password',
            'password' => 'required|min:8|confirmed',
        ]);
        session()->forget('pass_error');

        $user = auth()->user();
        $user->password = bcrypt($req->password);
        $user->save();

        return redirect()->back()->with('success', 'Password updated Successfully!');
    }

    public function transaction(Request $req)
    {
        if (isset($req->booking_id)) {
            $booking = Booking::find($req->booking_id);
            $list = $booking->transaction->get();
        } else {
            $list = Transaction::orderBy("id", "DESC")->get();
        }

        return view('admin.transaction', get_defined_vars());
    }

    public function enquiries()
    {
        $enq = ContactEnquiry::all();

        return view('admin.enquiries', get_defined_vars());
    }
}
