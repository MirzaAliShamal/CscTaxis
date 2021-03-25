<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendQueueEmail;
use Illuminate\Http\Request;
use App\Models\Booking;
use Carbon\Carbon;
use Mail;

class BookingController extends Controller
{
    public function list($status = null)
    {
        if (is_null($status)) {
            $list = Booking::all();
            return view('admin.booking.list', get_defined_vars());
        } else if ($status == "active") {
            $list = Booking::where('status', '1')->get();
            return view('admin.booking.active', get_defined_vars());
        } else if ($status == "completed") {
            $list = Booking::where('status', '2')->get();
            return view('admin.booking.completed', get_defined_vars());
        } else if ($status == "cancelled") {
            $list = Booking::where('status', '3')->get();
            return view('admin.booking.cancelled', get_defined_vars());
        }
    }

    public function detail($id = null)
    {
        $booking = Booking::find($id);

        return view('admin.booking.detail', get_defined_vars());
    }

    public function statusChange($id = null, $action = null)
    {
        $book = Booking::find($id);

        if ($action == "accept") {
            $book->status = "1";
            $book->save();

            $details = [
                'id' => $book->id,
                'action' => 'accept',
            ];

            $job = (new SendQueueEmail($details))->delay(now()->addSeconds(2));

            dispatch($job);
        }

        if ($action == "complete") {
            $book->status = "2";
            $book->save();

            $details = [
                'id' => $book->id,
                'action' => 'complete',
            ];

            $job = (new SendQueueEmail($details))->delay(now()->addSeconds(2));

            dispatch($job);
        }

        if ($action == "decline") {
            $book->status = "3";
            $book->save();

            if ($book->payment_method == "3") {
                $trans = $book->transaction;

                try {
                    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                    $refund = \Stripe\Refund::create(['charge' => $trans->stripe_charge_id]);

                    $trans->status = "2";
                    $trans->save();

                } catch(\Stripe\Error\InvalidRequest $e) {
                    dd($e->getMessage());
                } catch(\Stripe\Error\Card $e) {
                    dd($e->getMessage());
                }
            }

            $details = [
                'id' => $book->id,
                'action' => 'decline',
            ];

            $job = (new SendQueueEmail($details))->delay(now()->addSeconds(2));

            dispatch($job);
        }

        return redirect()->back()->with('success', 'Booking Status Changed Successfully!');
    }
}
